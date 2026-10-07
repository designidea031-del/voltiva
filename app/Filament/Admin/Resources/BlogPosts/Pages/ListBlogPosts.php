<?php

namespace App\Filament\Admin\Resources\BlogPosts\Pages;

use App\Filament\Admin\Resources\BlogPosts\BlogPostResource;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListBlogPosts extends ListRecords
{
    protected static string $resource = BlogPostResource::class;

    protected string $view = 'filament.admin.resources.blog-posts.pages.list-blog-posts';

    public string $search = '';
    public string $categoryFilter = 'all';
    public string $statusFilter = 'all'; // all, published, draft
    public string $sortOrder = 'desc';

    // Bulk selection & Delete confirmation modal
    public array $selectedPosts = [];
    public bool $selectAll = false;
    public bool $showDeleteModal = false;
    public ?int $postToDeleteId = null;
    public string $postToDeleteTitle = '';
    public bool $isBulkDelete = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'categoryFilter' => ['except' => 'all'],
        'statusFilter' => ['except' => 'all'],
        'sortOrder' => ['except' => 'desc'],
    ];

    public function updatingSearch(): void
    {
        $this->selectedPosts = [];
        $this->selectAll = false;
        $this->resetPage();
    }

    public function updatingCategoryFilter(): void
    {
        $this->selectedPosts = [];
        $this->selectAll = false;
        $this->resetPage();
    }

    public function updatingStatusFilter(): void
    {
        $this->selectedPosts = [];
        $this->selectAll = false;
        $this->resetPage();
    }

    public function filterByStatus(string $status): void
    {
        $this->statusFilter = $status;
        $this->selectedPosts = [];
        $this->selectAll = false;
        $this->resetPage();
    }

    public function updatedSelectAll(bool $value): void
    {
        if ($value) {
            $this->selectedPosts = $this->posts->pluck('id')->map(fn ($id) => (string) $id)->toArray();
        } else {
            $this->selectedPosts = [];
        }
    }

    public function deselectAll(): void
    {
        $this->selectedPosts = [];
        $this->selectAll = false;
    }

    public function selectAllPosts(): void
    {
        $this->selectedPosts = $this->posts->pluck('id')->map(fn ($id) => (string) $id)->toArray();
        $this->selectAll = true;
    }

    public function updatedSelectedPosts(): void
    {
        $currentPageIds = $this->posts->pluck('id')->map(fn ($id) => (string) $id)->toArray();
        if (!empty($currentPageIds) && count(array_intersect($currentPageIds, $this->selectedPosts)) === count($currentPageIds)) {
            $this->selectAll = true;
        } else {
            $this->selectAll = false;
        }
    }

    public function toggleStatus(int $postId): void
    {
        $post = BlogPost::find($postId);
        if ($post) {
            $newStatus = !$post->is_published;
            $post->update([
                'is_published' => $newStatus,
                'published_at' => $newStatus && !$post->published_at ? now() : $post->published_at,
            ]);

            $statusLabel = $newStatus ? 'Published Live' : 'Unpublished to Draft';
            Notification::make()
                ->title("Article \"{$post->title}\" is now {$statusLabel}")
                ->success()
                ->send();
        }
    }

    public function bulkToggleStatus(bool $status): void
    {
        if (empty($this->selectedPosts)) {
            return;
        }

        BlogPost::whereIn('id', $this->selectedPosts)->update([
            'is_published' => $status,
            'published_at' => $status ? now() : null,
        ]);

        $count = count($this->selectedPosts);
        $this->selectedPosts = [];
        $this->selectAll = false;

        $label = $status ? 'Published Live' : 'Draft';
        Notification::make()
            ->title("Updated {$count} articles to {$label}")
            ->success()
            ->send();
    }

    public function confirmSingleDelete(int $postId): void
    {
        $post = BlogPost::find($postId);
        if ($post) {
            $this->postToDeleteId = $post->id;
            $this->postToDeleteTitle = $post->title;
            $this->isBulkDelete = false;
            $this->showDeleteModal = true;
        }
    }

    public function confirmBulkDelete(): void
    {
        if (empty($this->selectedPosts)) {
            return;
        }
        $this->postToDeleteId = null;
        $this->postToDeleteTitle = '';
        $this->isBulkDelete = true;
        $this->showDeleteModal = true;
    }

    public function cancelDelete(): void
    {
        $this->showDeleteModal = false;
        $this->postToDeleteId = null;
        $this->postToDeleteTitle = '';
        $this->isBulkDelete = false;
    }

    public function executeDelete(): void
    {
        if ($this->isBulkDelete) {
            $count = count($this->selectedPosts);
            BlogPost::whereIn('id', $this->selectedPosts)->delete();
            $this->selectedPosts = [];
            $this->selectAll = false;

            Notification::make()
                ->title("Successfully deleted {$count} blog articles")
                ->success()
                ->send();
        } elseif ($this->postToDeleteId) {
            $post = BlogPost::find($this->postToDeleteId);
            if ($post) {
                $title = $post->title;
                $post->delete();
                Notification::make()
                    ->title("Article \"{$title}\" deleted successfully")
                    ->success()
                    ->send();
            }
        }

        $this->cancelDelete();
    }

    public function getPostsProperty()
    {
        $query = BlogPost::with('category');

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', "%{$this->search}%")
                  ->orWhere('excerpt', 'like', "%{$this->search}%")
                  ->orWhere('content', 'like', "%{$this->search}%")
                  ->orWhere('author_name', 'like', "%{$this->search}%")
                  ->orWhere('tags', 'like', "%{$this->search}%");
            });
        }

        if ($this->categoryFilter && $this->categoryFilter !== 'all') {
            $query->where('blog_category_id', $this->categoryFilter);
        }

        if ($this->statusFilter === 'published') {
            $query->where('is_published', true);
        } elseif ($this->statusFilter === 'draft') {
            $query->where('is_published', false);
        }

        $direction = $this->sortOrder === 'oldest' ? 'asc' : 'desc';
        return $query->orderBy('published_at', $direction)
                     ->orderBy('id', $direction)
                     ->paginate(15);
    }
}
