<?php

namespace App\Filament\Admin\Resources\BlogCategories\Pages;

use App\Filament\Admin\Resources\BlogCategories\BlogCategoryResource;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class ListBlogCategories extends ListRecords
{

    protected static string $resource = BlogCategoryResource::class;

    protected string $view = 'filament.admin.resources.blog-categories.pages.list-blog-categories';

    public string $search = '';
    public string $sortOrder = 'name_asc';

    // Bulk selection
    public array $selectedCategories = [];
    public bool $selectAll = false;

    // Create Modal
    public bool $showCreateModal = false;
    public string $createName = '';
    public string $createSlug = '';
    public string $createDescription = '';

    // Edit Modal
    public bool $showEditModal = false;
    public ?int $editingCategoryId = null;
    public string $editName = '';
    public string $editSlug = '';
    public string $editDescription = '';

    // Delete Confirmation Modal
    public bool $showDeleteModal = false;
    public ?int $categoryToDeleteId = null;
    public string $categoryToDeleteName = '';
    public int $categoryToDeleteCount = 0;
    public bool $isBulkDelete = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'sortOrder' => ['except' => 'name_asc'],
    ];

    public function updatingSearch(): void
    {
        $this->selectedCategories = [];
        $this->selectAll = false;
        $this->resetPage();
    }

    public function updatingSortOrder(): void
    {
        $this->resetPage();
    }

    public function updatedSelectAll(bool $value): void
    {
        if ($value) {
            $this->selectedCategories = $this->categories->pluck('id')->map(fn ($id) => (string) $id)->toArray();
        } else {
            $this->selectedCategories = [];
        }
    }

    public function deselectAll(): void
    {
        $this->selectedCategories = [];
        $this->selectAll = false;
    }

    public function selectAllCategories(): void
    {
        $this->selectedCategories = $this->categories->pluck('id')->map(fn ($id) => (string) $id)->toArray();
        $this->selectAll = true;
    }

    public function updatedSelectedCategories(): void
    {
        $currentPageIds = $this->categories->pluck('id')->map(fn ($id) => (string) $id)->toArray();
        if (!empty($currentPageIds) && count(array_intersect($currentPageIds, $this->selectedCategories)) === count($currentPageIds)) {
            $this->selectAll = true;
        } else {
            $this->selectAll = false;
        }
    }

    // ── Create Modal Handlers ──────────────────────────────────────────────
    public function openCreateModal(): void
    {
        $this->resetValidation();
        $this->createName = '';
        $this->createSlug = '';
        $this->createDescription = '';
        $this->showCreateModal = true;
    }

    public function closeCreateModal(): void
    {
        $this->showCreateModal = false;
        $this->createName = '';
        $this->createSlug = '';
        $this->createDescription = '';
        $this->resetValidation();
    }

    public function updatedCreateName(string $value): void
    {
        if (empty($this->createSlug) || $this->createSlug === Str::slug(substr($value, 0, -1))) {
            $this->createSlug = Str::slug($value);
        }
    }

    public function saveCreateCategory(): void
    {
        $this->validate([
            'createName' => 'required|string|max:255',
            'createSlug' => 'required|string|max:255|unique:blog_categories,slug',
            'createDescription' => 'nullable|string|max:1000',
        ], [
            'createName.required' => 'Please provide a category name.',
            'createSlug.required' => 'A unique URL slug is required.',
            'createSlug.unique' => 'This slug is already used by another category.',
        ]);

        $category = BlogCategory::create([
            'name' => trim($this->createName),
            'slug' => Str::slug($this->createSlug),
            'description' => trim($this->createDescription) ?: null,
        ]);

        $this->closeCreateModal();

        Notification::make()
            ->title('Category created successfully')
            ->body("Topic \"{$category->name}\" has been added to blog categories.")
            ->success()
            ->send();
    }

    // ── Edit Modal Handlers ────────────────────────────────────────────────
    public function openEditModal(int $categoryId): void
    {
        $this->resetValidation();
        $category = BlogCategory::find($categoryId);
        if (!$category) {
            return;
        }

        $this->editingCategoryId = $category->id;
        $this->editName = $category->name;
        $this->editSlug = $category->slug;
        $this->editDescription = $category->description ?? '';
        $this->showEditModal = true;
    }

    public function closeEditModal(): void
    {
        $this->showEditModal = false;
        $this->editingCategoryId = null;
        $this->editName = '';
        $this->editSlug = '';
        $this->editDescription = '';
        $this->resetValidation();
    }

    public function saveEditCategory(): void
    {
        if (!$this->editingCategoryId) {
            return;
        }

        $this->validate([
            'editName' => 'required|string|max:255',
            'editSlug' => 'required|string|max:255|unique:blog_categories,slug,' . $this->editingCategoryId,
            'editDescription' => 'nullable|string|max:1000',
        ], [
            'editName.required' => 'Please provide a category name.',
            'editSlug.required' => 'A unique URL slug is required.',
            'editSlug.unique' => 'This slug is already used by another category.',
        ]);

        $category = BlogCategory::find($this->editingCategoryId);
        if ($category) {
            $category->update([
                'name' => trim($this->editName),
                'slug' => Str::slug($this->editSlug),
                'description' => trim($this->editDescription) ?: null,
            ]);

            Notification::make()
                ->title('Category updated successfully')
                ->body("Changes to \"{$category->name}\" have been saved.")
                ->success()
                ->send();
        }

        $this->closeEditModal();
    }

    // ── Delete Confirmation Handlers ───────────────────────────────────────
    public function confirmSingleDelete(int $categoryId): void
    {
        $category = BlogCategory::withCount('posts')->find($categoryId);
        if ($category) {
            $this->categoryToDeleteId = $category->id;
            $this->categoryToDeleteName = $category->name;
            $this->categoryToDeleteCount = $category->posts_count;
            $this->isBulkDelete = false;
            $this->showDeleteModal = true;
        }
    }

    public function confirmBulkDelete(): void
    {
        if (empty($this->selectedCategories)) {
            return;
        }
        $this->categoryToDeleteId = null;
        $this->categoryToDeleteName = '';
        $this->categoryToDeleteCount = BlogPost::whereIn('blog_category_id', $this->selectedCategories)->count();
        $this->isBulkDelete = true;
        $this->showDeleteModal = true;
    }

    public function cancelDelete(): void
    {
        $this->showDeleteModal = false;
        $this->categoryToDeleteId = null;
        $this->categoryToDeleteName = '';
        $this->categoryToDeleteCount = 0;
        $this->isBulkDelete = false;
    }

    public function executeDelete(): void
    {
        if ($this->isBulkDelete) {
            $count = count($this->selectedCategories);
            BlogCategory::whereIn('id', $this->selectedCategories)->delete();
            $this->selectedCategories = [];
            $this->selectAll = false;

            Notification::make()
                ->title("Successfully deleted {$count} categories")
                ->success()
                ->send();
        } elseif ($this->categoryToDeleteId) {
            $category = BlogCategory::find($this->categoryToDeleteId);
            if ($category) {
                $name = $category->name;
                $category->delete();

                Notification::make()
                    ->title("Category \"{$name}\" deleted")
                    ->success()
                    ->send();
            }
        }

        $this->cancelDelete();
    }

    // ── Computed Categories Property ───────────────────────────────────────
    public function getCategoriesProperty(): LengthAwarePaginator
    {
        $query = BlogCategory::query()->withCount('posts');

        if (!empty($this->search)) {
            $s = trim($this->search);
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                  ->orWhere('slug', 'like', "%{$s}%")
                  ->orWhere('description', 'like', "%{$s}%");
            });
        }

        match ($this->sortOrder) {
            'name_desc' => $query->orderBy('name', 'desc'),
            'posts_desc' => $query->orderBy('posts_count', 'desc')->orderBy('name', 'asc'),
            'newest' => $query->orderBy('created_at', 'desc'),
            default => $query->orderBy('name', 'asc'),
        };

        return $query->paginate(10);
    }
}
