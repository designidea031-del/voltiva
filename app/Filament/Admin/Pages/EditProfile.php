<?php

namespace App\Filament\Admin\Pages;

use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class EditProfile extends BaseEditProfile
{
    use WithFileUploads;

    protected string $view = 'filament.admin.pages.edit-profile';

    public ?string $name = null;
    public ?string $email = null;
    public ?string $phone = null;
    public ?string $avatar_fit = 'contain';
    public $avatar_file = null;

    public ?string $current_password = null;
    public ?string $new_password = null;
    public ?string $new_password_confirmation = null;

    public static function isSimple(): bool
    {
        return false;
    }

    public function getTitle(): string|Htmlable
    {
        return 'Profile Settings';
    }

    public function getHeading(): string|Htmlable
    {
        return '';
    }

    public function mount(): void
    {
        $user = filament()->auth()->user();

        if ($user) {
            $this->name = $user->name;
            $this->email = $user->email;
            $this->phone = $user->phone ?? '+91 76007 57008';
            $this->avatar_fit = $user->avatar_fit ?? 'contain';
        }
    }

    public function updatedAvatarFile(): void
    {
        try {
            $this->validate([
                'avatar_file' => 'required|file|max:5120',
            ]);

            $extension = strtolower($this->avatar_file->getClientOriginalExtension());
            $allowed = ['jpg', 'jpeg', 'png', 'webp', 'svg', 'gif'];

            if (!in_array($extension, $allowed)) {
                $this->addError('avatar_file', 'Please upload a valid image (JPG, PNG, WEBP, or SVG).');
                Notification::make()
                    ->title('Unsupported file format')
                    ->body('Please upload a JPG, PNG, WEBP, or SVG image.')
                    ->danger()
                    ->send();
                $this->avatar_file = null;
                return;
            }

            $user = filament()->auth()->user();
            if (!$user) {
                return;
            }

            // Ensure destination directory exists on public disk
            if (!Storage::disk('public')->exists('avatars')) {
                Storage::disk('public')->makeDirectory('avatars');
            }

            // Remove previous avatar if exists
            if (!empty($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $filename = 'avatar_' . $user->id . '_' . time() . '.' . $extension;
            $path = $this->avatar_file->storeAs('avatars', $filename, 'public');

            $user->update(['avatar' => $path]);
            $user->refresh();

            $this->avatar_file = null;

            Notification::make()
                ->title('Profile photo updated successfully')
                ->success()
                ->send();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $msg = collect($e->errors())->flatten()->first() ?? 'Invalid image file.';
            $this->addError('avatar_file', $msg);
            Notification::make()
                ->title('Upload failed')
                ->body($msg)
                ->danger()
                ->send();
            $this->avatar_file = null;
        } catch (\Throwable $e) {
            $this->addError('avatar_file', $e->getMessage());
            Notification::make()
                ->title('Error uploading photo')
                ->body($e->getMessage())
                ->danger()
                ->send();
            $this->avatar_file = null;
        }
    }

    public function removeAvatar(): void
    {
        $user = filament()->auth()->user();
        if (!$user) {
            return;
        }

        if (!empty($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
            $user->update(['avatar' => null]);
            $user->refresh();
        }

        Notification::make()
            ->title('Profile photo removed')
            ->success()
            ->send();
    }

    public function setAvatarFit(string $fit): void
    {
        if (!in_array($fit, ['contain', 'cover'])) {
            return;
        }

        $user = filament()->auth()->user();
        if (!$user) {
            return;
        }

        $this->avatar_fit = $fit;
        $user->update(['avatar_fit' => $fit]);
        $user->refresh();

        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
                \App\Models\Setting::updateOrCreate(['key' => 'site_logo_fit'], ['value' => $fit]);
            }
        } catch (\Throwable $e) {}

        Notification::make()
            ->title('Avatar display mode set to ' . ($fit === 'contain' ? 'Fit Logo' : 'Fill Photo'))
            ->success()
            ->send();
    }

    public function savePersonalInfo(): void
    {
        $user = filament()->auth()->user();
        if (!$user) {
            return;
        }

        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:50',
        ]);

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        Notification::make()
            ->title('Profile changes saved successfully')
            ->success()
            ->send();
    }

    public function updateSecurityPassword(): void
    {
        $user = filament()->auth()->user();
        if (!$user) {
            return;
        }

        $this->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|same:new_password_confirmation',
        ]);

        if (!Hash::check($this->current_password, $user->password)) {
            $this->addError('current_password', 'The current password you provided is incorrect.');
            
            Notification::make()
                ->title('Current password is incorrect')
                ->danger()
                ->send();
            return;
        }

        $user->update([
            'password' => Hash::make($this->new_password),
        ]);

        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);

        Notification::make()
            ->title('Security password updated successfully')
            ->success()
            ->send();
    }

    public function form(Schema $schema): Schema
    {
        return $schema;
    }
}
