<?php

namespace App\Filament\Admin\Resources\PageSeos\Pages;

use App\Filament\Admin\Resources\PageSeos\PageSeoResource;
use App\Models\PageSeo;
use App\Models\Setting;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Livewire\WithFileUploads;

class EditPageSeo extends EditRecord
{
    use WithFileUploads;

    protected static string $resource = PageSeoResource::class;

    protected string $view = 'filament.admin.resources.page-seos.pages.edit-page-seo';

    // Editable form properties
    public string $meta_title = '';
    public string $meta_description = '';
    public string $meta_keywords = '';
    public string $canonical_url = '';
    public bool $robots_index = true;
    public bool $robots_follow = true;
    public string $robots = 'index, follow';
    public string $og_title = '';
    public string $og_description = '';
    public ?string $og_image = null;
    public $og_image_file = null;
    public string $schema_type = 'WebPage';
    public string $schema_markup = '';
    public int $seo_score = 85;

    // UI state
    public string $devicePreview = 'desktop'; // desktop or mobile
    public string $socialPreview = 'whatsapp'; // whatsapp or twitter

    // Pre-calculated checklist
    public array $checklist = [];

    // Suggested high-intent keywords
    public array $suggestedKeywords = [
        'modular switches',
        'luxury electrical accessories',
        'smart touch switch',
        'electric switch plates',
        'voltiva switch',
        'led dimmer switch',
        'hotel key card switch',
        'fire retardant switches',
        'copper contacts switches',
        'architectural electrical fittings',
    ];

    protected function getViewData(): array
    {
        return [
            'page'              => $this->record,
            'meta_title'        => $this->meta_title,
            'meta_description'  => $this->meta_description,
            'meta_keywords'     => $this->meta_keywords,
            'canonical_url'     => $this->canonical_url,
            'robots_index'      => $this->robots_index,
            'robots_follow'     => $this->robots_follow,
            'robots'            => $this->robots,
            'og_title'          => $this->og_title,
            'og_description'    => $this->og_description,
            'og_image'          => $this->og_image,
            'schema_type'       => $this->schema_type,
            'schema_markup'     => $this->schema_markup,
            'seo_score'         => $this->seo_score,
            'devicePreview'     => $this->devicePreview,
            'socialPreview'     => $this->socialPreview,
            'checklist'         => $this->checklist,
            'suggestedKeywords' => $this->suggestedKeywords,
        ];
    }

    public function mount(int|string $record): void
    {
        parent::mount($record);

        $page = $this->record;
        $this->meta_title       = (string)($page->meta_title ?? '');
        $this->meta_description = (string)($page->meta_description ?? '');
        $this->meta_keywords    = (string)($page->meta_keywords ?? '');
        $this->canonical_url    = (string)($page->canonical_url ?? '');
        $this->robots_index     = (bool)($page->robots_index ?? true);
        $this->robots_follow    = (bool)($page->robots_follow ?? true);
        $this->robots           = $this->robots_index
            ? ($this->robots_follow ? 'index, follow' : 'index, nofollow')
            : ($this->robots_follow ? 'noindex, follow' : 'noindex, nofollow');
        $this->og_title         = (string)($page->og_title ?: $page->meta_title ?: '');
        $this->og_description   = (string)($page->og_description ?: $page->meta_description ?: '');
        $this->og_image         = $page->og_image;
        $this->schema_type      = $page->schema_type ?: 'WebPage';
        $this->schema_markup    = (string)($page->schema_markup ?? '');
        
        $this->recomputeScore();
    }

    public function updatedRobots(string $value): void
    {
        if ($value === 'index, follow') {
            $this->robots_index = true;
            $this->robots_follow = true;
        } elseif ($value === 'noindex, follow') {
            $this->robots_index = false;
            $this->robots_follow = true;
        } elseif ($value === 'index, nofollow') {
            $this->robots_index = true;
            $this->robots_follow = false;
        } else {
            $this->robots_index = false;
            $this->robots_follow = false;
        }
        $this->recomputeScore();
    }

    public function updatedMetaTitle(): void
    {
        if (empty($this->og_title) || $this->og_title === $this->record->meta_title) {
            $this->og_title = $this->meta_title;
        }
        $this->recomputeScore();
    }

    public function updatedMetaDescription(): void
    {
        if (empty($this->og_description) || $this->og_description === $this->record->meta_description) {
            $this->og_description = $this->meta_description;
        }
        $this->recomputeScore();
    }

    public function updatedMetaKeywords(): void
    {
        $this->recomputeScore();
    }

    public function updatedOgImageFile(): void
    {
        $this->validate([
            'og_image_file' => 'nullable|image|max:3072',
        ]);

        if ($this->og_image_file) {
            $path = $this->og_image_file->store('seo', 'public');
            $this->og_image = $path;
            $this->recomputeScore();
            Notification::make()->title('Image uploaded for preview')->info()->send();
        }
    }

    public function resetOgImage(): void
    {
        $logo = Setting::where('key', 'site_logo')->value('value') ?: Setting::where('key', 'site_favicon')->value('value');
        $this->og_image = $logo ?: 'assets/images/logo.png';
        $this->og_image_file = null;
        $this->recomputeScore();
        Notification::make()->title('OG image reset to default brand logo')->info()->send();
    }

    public function addKeyword(string $kw): void
    {
        $current = array_filter(array_map('trim', explode(',', $this->meta_keywords)));
        if (!in_array($kw, $current)) {
            $current[] = $kw;
            $this->meta_keywords = implode(', ', $current);
            $this->recomputeScore();
        }
    }

    public function smartAutoGenerate(): void
    {
        $name = $this->record->page_name;
        $site = 'Voltiva';

        if (empty($this->meta_title) || strlen($this->meta_title) < 20) {
            $this->meta_title = "{$name} | {$site} - Luxury Modular Switches & Electrical Systems";
        }
        if (empty($this->meta_description) || strlen($this->meta_description) < 40) {
            $this->meta_description = "Explore {$name} with {$site}. Engineered for utmost safety, architectural aesthetics, and durability in residential and commercial spaces.";
        }
        if (empty($this->og_title)) {
            $this->og_title = $this->meta_title;
        }
        if (empty($this->og_description)) {
            $this->og_description = $this->meta_description;
        }
        if (empty($this->meta_keywords)) {
            $this->meta_keywords = strtolower("{$name}, {$site}, modular switches, electric plates, switchboard fittings, home automation");
        }
        if (empty($this->canonical_url)) {
            $this->canonical_url = url($this->record->route_path ?: '/');
        }

        $this->recomputeScore();
        Notification::make()->title('Generated smart metadata based on page entity')->success()->send();
    }

    public function autoGenerateSchema(): void
    {
        $siteUrl = url('/');
        $pageUrl = $this->canonical_url ?: url($this->record->route_path ?: '/');

        $schema = [
            '@context'    => 'https://schema.org',
            '@type'       => $this->schema_type ?: 'WebPage',
            'name'        => $this->meta_title ?: $this->record->page_name,
            'description' => $this->meta_description ?: 'Luxury modular switches and electrical fittings by Voltiva.',
            'url'         => $pageUrl,
            'publisher'   => [
                '@type' => 'Organization',
                'name'  => 'Voltiva',
                'url'   => $siteUrl,
                'logo'  => [
                    '@type' => 'ImageObject',
                    'url'   => asset('assets/images/logo.png'),
                ],
            ],
        ];

        $this->schema_markup = json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        $this->recomputeScore();
        Notification::make()->title('Valid JSON-LD schema generated')->success()->send();
    }

    public function recomputeScore(): void
    {
        $score = 0;
        $titleLen = mb_strlen($this->meta_title);
        $descLen = mb_strlen($this->meta_description);

        // Checklist
        $this->checklist = [
            'title_optimal' => [
                'label'   => 'Meta Title Length (30-60 characters)',
                'pass'    => ($titleLen >= 30 && $titleLen <= 65),
                'current' => "{$titleLen} chars",
            ],
            'desc_optimal' => [
                'label'   => 'Meta Description Length (80-160 characters)',
                'pass'    => ($descLen >= 80 && $descLen <= 165),
                'current' => "{$descLen} chars",
            ],
            'keywords' => [
                'label'   => 'Target Keywords populated',
                'pass'    => !empty(trim($this->meta_keywords)),
                'current' => !empty(trim($this->meta_keywords)) ? count(explode(',', $this->meta_keywords)) . ' tags' : 'Missing',
            ],
            'og_image' => [
                'label'   => 'Social Share Graphic (OG Image)',
                'pass'    => !empty($this->og_image),
                'current' => !empty($this->og_image) ? 'Attached' : 'Missing',
            ],
            'robots' => [
                'label'   => 'Indexable by Search Engines',
                'pass'    => $this->robots_index,
                'current' => $this->robots_index ? 'index, follow' : 'noindex',
            ],
            'canonical' => [
                'label'   => 'Canonical URL defined',
                'pass'    => !empty($this->canonical_url),
                'current' => !empty($this->canonical_url) ? 'Present' : 'Not set',
            ],
        ];

        // Title score
        if ($titleLen >= 30 && $titleLen <= 65) {
            $score += 30;
        } elseif ($titleLen > 0) {
            $score += 15;
        }

        // Desc score
        if ($descLen >= 80 && $descLen <= 165) {
            $score += 30;
        } elseif ($descLen > 0) {
            $score += 15;
        }

        // Keywords
        if (!empty(trim($this->meta_keywords))) {
            $score += 15;
        }

        // OG image
        if (!empty($this->og_image)) {
            $score += 10;
        }

        // Robots
        if ($this->robots_index) {
            $score += 10;
        }

        // Canonical
        if (!empty($this->canonical_url)) {
            $score += 5;
        }

        $this->seo_score = min(100, max(15, $score));
    }

    public function save(bool $shouldRedirect = false, bool $shouldSendSavedNotification = true): void
    {
        $this->recomputeScore();

        $page = $this->record;
        $page->meta_title       = $this->meta_title;
        $page->meta_description = $this->meta_description;
        $page->meta_keywords    = $this->meta_keywords;
        $page->canonical_url    = $this->canonical_url;
        $page->robots_index     = $this->robots_index;
        $page->robots_follow    = $this->robots_follow;
        $page->og_title         = $this->og_title;
        $page->og_description   = $this->og_description;
        $page->og_image         = $this->og_image;
        $page->schema_type      = $this->schema_type;
        $page->schema_markup    = $this->schema_markup;
        $page->seo_score        = $this->seo_score;
        $page->save();

        Notification::make()
            ->title('SEO configuration saved successfully!')
            ->success()
            ->body("Health score is now {$this->seo_score}% Optimal.")
            ->send();
    }
}
