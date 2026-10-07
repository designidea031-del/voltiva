<?php

namespace App\Filament\Admin\Pages;

use App\Models\Setting;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\Mailer\Transport\Dsn;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;

class EmailConfiguration extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static ?string $navigationLabel = 'Email Configuration';

    protected static ?string $title = 'Email & SMTP Configuration';

    protected static ?string $slug = 'email-configuration';

    protected static ?int $navigationSort = 11;

    protected string $view = 'filament.admin.pages.email-configuration';

    public function getBreadcrumbs(): array
    {
        return [
            url('/admin') => 'Dashboard',
            '#' => 'System & Settings',
            '' => 'Email & SMTP Configuration',
        ];
    }

    public function getHeading(): string
    {
        return '';
    }

    // Provider selection
    public string $selectedProvider = '';

    // SMTP Credentials
    public string $mail_host = '';
    public string $mail_port = '587';
    public string $mail_encryption = 'tls';
    public string $mail_username = '';
    public string $mail_password = '';
    public bool $showPassword = false;

    // Sender Identity & Distribution
    public string $mail_from_address = '';
    public string $mail_from_name = '';
    public string $mail_admin_recipients = '';

    // Automations
    public bool $mail_notify_admin_on_lead = true;
    public bool $mail_autoreply_customer = true;
    public bool $mail_verify_peer = true;

    // Sandbox / Test Recipient
    public string $test_recipient = '';
    public array $testLogs = [
        '> Diagnostic Engine ready.',
        '> Enter an email and click "Send Test Email".',
    ];
    public ?bool $lastTestSuccess = null;

    // Template Preview Modals
    public bool $showAdminTemplatePreview = false;
    public bool $showCustomerTemplatePreview = false;
    public bool $showGuideModal = false;

    public function mount(): void
    {
        $user = filament()->auth()->user();
        $this->test_recipient = $user?->email ?? 'admin@voltiva.com';

        if (!Schema::hasTable('settings')) {
            return;
        }

        $all = Setting::pluck('value', 'key')->toArray();

        $this->mail_host            = $all['mail_host'] ?? '';
        $this->mail_port            = $all['mail_port'] ?? '587';
        $this->mail_encryption      = $all['mail_encryption'] ?? 'tls';
        $this->mail_username        = $all['mail_username'] ?? '';
        $this->mail_password        = $all['mail_password'] ?? '';
        $this->mail_from_address    = $all['mail_from_address'] ?? ($all['contact_email'] ?? 'info@voltiva.com');
        $this->mail_from_name       = $all['mail_from_name'] ?? ($all['site_name'] ?? 'Voltiva');
        $this->mail_admin_recipients = $all['mail_admin_recipients'] ?? ($all['contact_email'] ?? 'info@voltiva.com');

        $this->mail_notify_admin_on_lead = (bool) ($all['mail_notify_admin_on_lead'] ?? true);
        $this->mail_autoreply_customer   = (bool) ($all['mail_autoreply_customer'] ?? true);
        $this->mail_verify_peer          = (bool) ($all['mail_verify_peer'] ?? true);
        $this->selectedProvider          = $all['mail_selected_provider'] ?? '';

        // Auto-detect provider if not explicitly stored
        if (empty($this->selectedProvider) && !empty($this->mail_host)) {
            if (str_contains($this->mail_host, 'gmail.com')) {
                $this->selectedProvider = 'gmail';
            } elseif (str_contains($this->mail_host, 'hostinger') || str_contains($this->mail_host, 'titan')) {
                $this->selectedProvider = 'hostinger';
            } elseif (str_contains($this->mail_host, 'office365') || str_contains($this->mail_host, 'outlook')) {
                $this->selectedProvider = 'microsoft365';
            } elseif (str_contains($this->mail_host, 'mail.')) {
                $this->selectedProvider = 'cpanel';
            }
        }
    }

    public function selectProvider(string $provider): void
    {
        $this->selectedProvider = $provider;

        if ($provider === 'gmail') {
            $this->mail_host = 'smtp.gmail.com';
            $this->mail_port = '587';
            $this->mail_encryption = 'tls';
        } elseif ($provider === 'hostinger') {
            $this->mail_host = 'smtp.hostinger.com';
            $this->mail_port = '465';
            $this->mail_encryption = 'ssl';
        } elseif ($provider === 'cpanel') {
            $domain = request()->getHost();
            if ($domain === '127.0.0.1' || $domain === 'localhost') {
                $domain = 'voltiva.com';
            }
            $this->mail_host = 'mail.' . $domain;
            $this->mail_port = '465';
            $this->mail_encryption = 'ssl';
        } elseif ($provider === 'microsoft365') {
            $this->mail_host = 'smtp.office365.com';
            $this->mail_port = '587';
            $this->mail_encryption = 'tls';
        }

        Notification::make()
            ->title(ucfirst($provider) . ' Settings Applied')
            ->body("Host and port set to {$this->mail_host}:{$this->mail_port} ({$this->mail_encryption}).")
            ->info()
            ->send();
    }

    public function togglePasswordVisibility(): void
    {
        $this->showPassword = !$this->showPassword;
    }

    public function save(): void
    {
        $this->validate([
            'mail_host' => 'required|string|max:255',
            'mail_port' => 'required|numeric|between:1,65535',
            'mail_encryption' => 'required|in:tls,ssl,none',
            'mail_username' => 'required|string|max:255',
            'mail_from_address' => 'required|email|max:255',
            'mail_from_name' => 'required|string|max:255',
        ]);

        if (!Schema::hasTable('settings')) {
            return;
        }

        $records = [
            'mail_mailer'                 => 'smtp',
            'mail_host'                   => trim($this->mail_host),
            'mail_port'                   => trim($this->mail_port),
            'mail_encryption'             => $this->mail_encryption,
            'mail_username'               => trim($this->mail_username),
            'mail_password'               => $this->mail_password,
            'mail_from_address'           => trim($this->mail_from_address),
            'mail_from_name'              => trim($this->mail_from_name),
            'mail_admin_recipients'       => trim($this->mail_admin_recipients),
            'mail_notify_admin_on_lead'   => $this->mail_notify_admin_on_lead ? '1' : '0',
            'mail_autoreply_customer'     => $this->mail_autoreply_customer ? '1' : '0',
            'mail_verify_peer'            => $this->mail_verify_peer ? '1' : '0',
            'mail_selected_provider'      => $this->selectedProvider,
        ];

        foreach ($records as $key => $val) {
            Setting::updateOrCreate(['key' => $key], ['value' => $val]);
        }

        // Apply immediately to runtime config
        $this->applyRuntimeMailConfig();

        Notification::make()
            ->title('Email Configuration Saved')
            ->body('Outgoing mail coordinates and automation triggers are updated.')
            ->success()
            ->send();
    }

    public function applyRuntimeMailConfig(): void
    {
        Config::set('mail.default', 'smtp');
        Config::set('mail.mailers.smtp.host', trim($this->mail_host));
        Config::set('mail.mailers.smtp.port', (int) $this->mail_port);
        Config::set('mail.mailers.smtp.encryption', $this->mail_encryption === 'none' ? null : $this->mail_encryption);
        Config::set('mail.mailers.smtp.username', trim($this->mail_username));
        Config::set('mail.mailers.smtp.password', $this->mail_password);
        Config::set('mail.from.address', trim($this->mail_from_address));
        Config::set('mail.from.name', trim($this->mail_from_name));

        if (!$this->mail_verify_peer) {
            Config::set('mail.mailers.smtp.stream', [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ],
            ]);
        }
    }

    public function sendTestEmail(): void
    {
        $this->validate([
            'test_recipient' => 'required|email',
            'mail_host' => 'required|string',
            'mail_port' => 'required|numeric',
            'mail_username' => 'required|string',
            'mail_from_address' => 'required|email',
        ]);

        $this->testLogs = [];
        $this->testLogs[] = '> Initializing SMTP Diagnostic Engine...';
        $this->testLogs[] = "> Target Host: {$this->mail_host}:{$this->mail_port} ({$this->mail_encryption})";
        $this->testLogs[] = "> Authenticating as: {$this->mail_username}";
        $this->testLogs[] = "> Recipient: {$this->test_recipient}";

        try {
            // Apply runtime mail settings
            $this->applyRuntimeMailConfig();

            // Direct socket test to provide precise diagnostic details
            $this->testLogs[] = "> Testing TCP socket handshake with {$this->mail_host}...";
            $connection = @fsockopen(
                $this->mail_host,
                (int) $this->mail_port,
                $errno,
                $errstr,
                5
            );

            if (!$connection) {
                throw new \Exception("Cannot connect to {$this->mail_host}:{$this->mail_port} - [Error {$errno}: {$errstr}]. Please check host and firewall.");
            }
            fclose($connection);
            $this->testLogs[] = '> [TCP OK] Host connection established.';

            // Send actual email via Laravel Mailer
            $this->testLogs[] = '> Dispatching test payload via SMTP transport...';

            $brandName = $this->mail_from_name ?: 'Voltiva';
            $senderEmail = $this->mail_from_address;
            $recipient = $this->test_recipient;

            Mail::html("
                <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 24px; border: 1px solid #e4e4e7; border-radius: 12px; background: #ffffff;'>
                    <div style='padding-bottom: 16px; border-bottom: 2px solid #18181b; margin-bottom: 20px;'>
                        <h2 style='margin: 0; color: #18181b; font-size: 20px;'>{$brandName} • SMTP Diagnostic Test</h2>
                        <span style='font-size: 12px; color: #0d9488; font-weight: bold;'>● Connection Successful</span>
                    </div>
                    <p style='color: #3f3f46; font-size: 14px; line-height: 1.6;'>
                        Hello,<br><br>
                        This is an automated confirmation verifying that your outgoing mail transfer agent (MTA) is fully operational.
                    </p>
                    <div style='background: #f4f4f5; padding: 14px; border-radius: 8px; font-size: 13px; color: #18181b; margin: 16px 0;'>
                        <strong>SMTP Host:</strong> {$this->mail_host}:{$this->mail_port}<br>
                        <strong>Encryption:</strong> {$this->mail_encryption}<br>
                        <strong>Sender:</strong> {$brandName} &lt;{$senderEmail}&gt;<br>
                        <strong>Timestamp:</strong> " . date('Y-m-d H:i:s') . "
                    </div>
                    <p style='color: #71717a; font-size: 12px; margin-top: 24px;'>
                        All systems operational. Incoming visitor inquiries will now trigger instant alerts.
                    </p>
                </div>
            ", function ($message) use ($recipient, $brandName, $senderEmail) {
                $message->to($recipient)
                        ->from($senderEmail, $brandName)
                        ->subject("{$brandName} • Live SMTP Diagnostic Verification");
            });

            $this->testLogs[] = '> [SUCCESS] Test message received by mail server & dispatched.';
            $this->testLogs[] = '> [DONE] Diagnostic complete. Check inbox or spam folder.';
            $this->lastTestSuccess = true;

            Notification::make()
                ->title('Test Email Dispatched Successfully')
                ->body("A diagnostic verification email was delivered to {$this->test_recipient}.")
                ->success()
                ->send();

        } catch (\Throwable $e) {
            $this->lastTestSuccess = false;
            $this->testLogs[] = '> [FAILED] ' . $e->getMessage();
            $this->testLogs[] = '> [HINT] If using Gmail, verify your 16-character App Password.';

            Notification::make()
                ->title('SMTP Test Failed')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function getIsConfiguredProperty(): bool
    {
        return !empty($this->mail_host) && !empty($this->mail_username) && !empty($this->mail_password);
    }
}
