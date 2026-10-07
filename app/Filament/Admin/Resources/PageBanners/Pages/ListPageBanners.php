<?php

namespace App\Filament\Admin\Resources\PageBanners\Pages;

use App\Filament\Admin\Resources\PageBanners\PageBannerResource;
use App\Models\PageBanner;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Pagination\LengthAwarePaginator;

class ListPageBanners extends ListRecords
{
    protected static string $resource = PageBannerResource::class;

    protected string $view = 'filament.admin.resources.page-banners.pages.list-page-banners';

    // Search & Filters
    public string $search = '';
    public string $statusFilter = 'all';
    public string $sortOrder = 'page_name_asc';
    public int $perPage = 12;

    // Bulk selection
    public array $selectedBanners = [];
    public bool $selectAll = false;

    // Delete Confirmation Modal
    public bool $showDeleteModal = false;
    public ?int $bannerToDeleteId = null;
    public string $bannerToDeleteName = '';
    public bool $isBulkDelete = false;

    protected $queryString = [
        'search'       => ['except' => ''],
        'statusFilter' => ['except' => 'all'],
        'sortOrder'    => ['except' => 'page_name_asc'],
        'perPage'      => ['except' => 12],
    ];

    public function updatingPerPage(): void
    {
        $this->selectedBanners = [];
        $this->selectAll = false;
        $this->resetPage();
    }

    public function updatingSearch(): void
    {
        $this->selectedBanners = [];
        $this->selectAll = false;
        $this->resetPage();
    }

    public function updatingStatusFilter(): void
    {
        $this->selectedBanners = [];
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
            $this->selectedBanners = $this->banners->pluck('id')->map(fn ($id) => (string) $id)->toArray();
        } else {
            $this->selectedBanners = [];
        }
    }

    public function deselectAll(): void
    {
        $this->selectedBanners = [];
        $this->selectAll = false;
    }

    public function updatedSelectedBanners(): void
    {
        $currentPageIds = $this->banners->pluck('id')->map(fn ($id) => (string) $id)->toArray();
        if (!empty($currentPageIds) && count(array_intersect($currentPageIds, $this->selectedBanners)) === count($currentPageIds)) {
            $this->selectAll = true;
        } else {
            $this->selectAll = false;
        }
    }

    // ── Toggle Active ──────────────────────────────────────────────────────
    public function toggleActive(int $bannerId): void
    {
        $banner = PageBanner::find($bannerId);
        if ($banner) {
            $banner->update(['is_active' => !$banner->is_active]);

            Notification::make()
                ->title($banner->is_active ? 'Banner Activated' : 'Banner Deactivated')
                ->body("\"{$banner->page_name}\" banner has been " . ($banner->is_active ? 'activated' : 'deactivated') . '.')
                ->success()
                ->send();
        }
    }

    // ── Delete Handlers ────────────────────────────────────────────────────
    public function confirmSingleDelete(int $bannerId): void
    {
        $banner = PageBanner::find($bannerId);
        if ($banner) {
            $this->bannerToDeleteId = $banner->id;
            $this->bannerToDeleteName = $banner->page_name;
            $this->isBulkDelete = false;
            $this->showDeleteModal = true;
        }
    }

    public function confirmBulkDelete(): void
    {
        if (empty($this->selectedBanners)) {
            return;
        }
        $this->bannerToDeleteId = null;
        $this->bannerToDeleteName = '';
        $this->isBulkDelete = true;
        $this->showDeleteModal = true;
    }

    public function cancelDelete(): void
    {
        $this->showDeleteModal = false;
        $this->bannerToDeleteId = null;
        $this->bannerToDeleteName = '';
        $this->isBulkDelete = false;
    }

    public function executeDelete(): void
    {
        if ($this->isBulkDelete) {
            $count = count($this->selectedBanners);
            PageBanner::whereIn('id', $this->selectedBanners)->delete();
            $this->selectedBanners = [];
            $this->selectAll = false;

            Notification::make()
                ->title("Deleted {$count} " . ($count === 1 ? 'banner' : 'banners'))
                ->success()
                ->send();
        } elseif ($this->bannerToDeleteId) {
            $banner = PageBanner::find($this->bannerToDeleteId);
            if ($banner) {
                $name = $banner->page_name;
                $banner->delete();

                Notification::make()
                    ->title("Banner \"{$name}\" deleted")
                    ->success()
                    ->send();
            }
        }

        $this->cancelDelete();
    }

    // ── Computed Banners Property ──────────────────────────────────────────
    public function getBannersProperty(): LengthAwarePaginator
    {
        $query = PageBanner::query();

        if (!empty($this->search)) {
            $s = trim($this->search);
            $query->where(function ($q) use ($s) {
                $q->where('page_name', 'like', "%{$s}%")
                  ->orWhere('page_key', 'like', "%{$s}%")
                  ->orWhere('title', 'like', "%{$s}%")
                  ->orWhere('subtitle', 'like', "%{$s}%");
            });
        }

        if ($this->statusFilter === 'active') {
            $query->where('is_active', true);
        } elseif ($this->statusFilter === 'inactive') {
            $query->where('is_active', false);
        }

        match ($this->sortOrder) {
            'page_name_desc' => $query->orderBy('page_name', 'desc'),
            'newest'         => $query->orderBy('created_at', 'desc'),
            'oldest'         => $query->orderBy('created_at', 'asc'),
            default          => $query->orderBy('page_name', 'asc'),
        };

        return $query->paginate($this->perPage);
    }
}
