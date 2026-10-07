<?php

namespace App\Filament\Admin\Resources\PageBanners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PageBannerForm
{
    /**
     * Registry of known page keys used on the site.
     * Extend this list whenever a new page/route is added.
     * The 'page_key' field is a free-text input — any key can be typed.
     */
    public static array $knownPageKeys = [
        'home'            => 'Home',
        'about'           => 'About Us',
        'products'        => 'Products',
        'product'         => 'Product Detail',
        'blogs'           => 'Blogs / Articles',
        'blog'            => 'Blog Post Detail',
        'contact'         => 'Contact Us',
        'gallery'         => 'Gallery',
        'shop-details'    => 'Shop Details',
        'product-details' => 'Product Details',
        'category'        => 'Category Page',
        'sub-category'    => 'Sub-Category Page',
        'search'          => 'Search Results',
        'faq'             => 'FAQ',
        'career'          => 'Careers',
        'terms'           => 'Terms & Conditions',
        'privacy'         => 'Privacy Policy',
    ];

    public static function configure(Schema $schema): Schema
    {
        $keyHint = implode(', ', array_keys(self::$knownPageKeys));

        return $schema
            ->columns(['default' => 1, 'lg' => 3])
            ->components([
                // ── Main Column (Span 2) ──────────────────────────────
                Group::make([
                    Section::make('Banner Content')
                        ->description('Configure the title, subtitle, and call-to-action for this page banner.')
                        ->icon('heroicon-o-document-text')
                        ->components([
                            Grid::make(['default' => 1, 'sm' => 2])
                                ->components([
                                    TextInput::make('page_name')
                                        ->label('Page Name')
                                        ->placeholder('e.g. Home Page')
                                        ->required()
                                        ->maxLength(255)
                                        ->helperText('Friendly display label shown in admin.'),

                                    TextInput::make('page_key')
                                        ->label('Page Key')
                                        ->placeholder('e.g. home, about, products, blogs')
                                        ->required()
                                        ->maxLength(100)
                                        ->unique('page_banners', 'page_key', ignoreRecord: true)
                                        ->helperText("Must be unique. Known keys: {$keyHint}")
                                        ->extraInputAttributes(['autocomplete' => 'off']),
                                ]),

                            TextInput::make('title')
                                ->label('Banner Title')
                                ->placeholder('e.g. Welcome to Voltiva')
                                ->maxLength(255),

                            TextInput::make('subtitle')
                                ->label('Banner Subtitle')
                                ->placeholder('e.g. Powering Homes, Empowering Lives')
                                ->maxLength(255),
                        ]),

                    Section::make('Call to Action')
                        ->description('Optional button displayed on the banner.')
                        ->icon('heroicon-o-cursor-arrow-rays')
                        ->collapsible()
                        ->components([
                            Grid::make(['default' => 1, 'sm' => 2])
                                ->components([
                                    TextInput::make('button_text')
                                        ->label('Button Text')
                                        ->placeholder('e.g. Explore Products')
                                        ->maxLength(255),

                                    TextInput::make('button_link')
                                        ->label('Button URL')
                                        ->placeholder('e.g. /products or https://...')
                                        ->maxLength(255)
                                        ->helperText('Relative path (e.g. /products) or full URL.'),
                                ]),
                        ]),

                    Section::make('Display Settings')
                        ->description('Control visibility and overlay opacity.')
                        ->icon('heroicon-o-adjustments-horizontal')
                        ->components([
                            Grid::make(['default' => 1, 'sm' => 2])
                                ->components([
                                    TextInput::make('overlay_opacity')
                                        ->label('Overlay Opacity (%)')
                                        ->numeric()
                                        ->minValue(0)
                                        ->maxValue(100)
                                        ->default(40)
                                        ->suffix('%')
                                        ->helperText('0 = transparent, 100 = fully opaque overlay.'),

                                    Toggle::make('is_active')
                                        ->label('Active')
                                        ->default(true)
                                        ->helperText('Only active banners are shown on the site.')
                                        ->onColor('success')
                                        ->offColor('danger'),
                                ]),
                        ]),
                ])
                ->columnSpan(['default' => 1, 'lg' => 2]),

                // ── Right Column (Media - Span 1) ─────────────────────
                Group::make([
                    Section::make('Banner Images')
                        ->description('Upload desktop and mobile versions of the banner.')
                        ->icon('heroicon-o-photo')
                        ->components([
                            FileUpload::make('desktop_image')
                                ->label('Desktop Image')
                                ->image()
                                ->disk('public')
                                ->directory('banners')
                                ->imageEditor()
                                ->imageEditorAspectRatios(['16:5', '16:6', '4:1'])
                                ->helperText('Recommended: 1920×500px or wider.')
                                ->maxSize(5120),

                            FileUpload::make('mobile_image')
                                ->label('Mobile Image')
                                ->image()
                                ->disk('public')
                                ->directory('banners')
                                ->imageEditor()
                                ->imageEditorAspectRatios(['4:3', '1:1', '3:4'])
                                ->helperText('Recommended: 768×350px or similar.')
                                ->maxSize(3072),
                        ]),
                ])
                ->columnSpan(['default' => 1, 'lg' => 1]),
            ]);
    }
}
