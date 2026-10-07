<?php

namespace App\Filament\Admin\Resources\BlogPosts\Pages;

use App\Filament\Admin\Resources\BlogPosts\BlogPostResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogPost extends CreateRecord
{
    protected static string $resource = BlogPostResource::class;

    protected string $view = 'filament.admin.resources.blog-posts.pages.create-blog-post';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
