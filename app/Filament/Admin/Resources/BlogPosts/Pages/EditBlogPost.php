<?php

namespace App\Filament\Admin\Resources\BlogPosts\Pages;

use App\Filament\Admin\Resources\BlogPosts\BlogPostResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditBlogPost extends EditRecord
{
    protected static string $resource = BlogPostResource::class;

    protected string $view = 'filament.admin.resources.blog-posts.pages.edit-blog-post';

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getSeoScore(): int
    {
        return $this->record?->seo_score ?? 0;
    }

    /**
     * Danger zone: delete this article and redirect to list.
     */
    public function delete(): void
    {
        $title = $this->record?->title ?? 'Article';
        $this->record?->delete();

        Notification::make()
            ->title("Article \"{$title}\" deleted successfully.")
            ->success()
            ->send();

        $this->redirect($this->getResource()::getUrl('index'));
    }
}
