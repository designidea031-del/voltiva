<?php

namespace App\Filament\Admin\Resources\BlogPosts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\View;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BlogPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(['default' => 1, 'lg' => 3])
            ->components([
                // ══════════════════════════════════════════════════════════════
                // LEFT COLUMN (Span 2): Content, SEO, Banner Studio
                // ══════════════════════════════════════════════════════════════
                Group::make([
                    // 1. Article Body & Details
                    Section::make('Article Body & Details')
                        ->description('Title, permalink URL slug, excerpt, and full rich text article content.')
                        ->icon('heroicon-o-document-text')
                        ->components([
                            TextInput::make('title')
                                ->label('Article Title')
                                ->placeholder('e.g. Modern Innovations in Electrical Safety')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn (string $operation, $state, \Filament\Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                            TextInput::make('slug')
                                ->label('URL Permalink Slug')
                                ->placeholder('e.g. modern-innovations-in-electrical-safety')
                                ->required()
                                ->maxLength(255)
                                ->unique(ignoreRecord: true),

                            Textarea::make('excerpt')
                                ->label('Short Excerpt')
                                ->placeholder('Brief summary of the article for blog archive cards and Google snippets...')
                                ->rows(3),

                            RichEditor::make('content')
                                ->label('Full Article Body')
                                ->placeholder('Write your comprehensive article content here...')
                                ->columnSpanFull(),
                        ]),

                    // 2. Search Engine Optimization (SEO)
                    Section::make('Search Engine Optimization (SEO)')
                        ->description('Configure dedicated Google SERP meta tags for this article.')
                        ->icon('heroicon-o-magnifying-glass')
                        ->collapsible()
                        ->collapsed(false)
                        ->components([
                            TextInput::make('meta_title')
                                ->label('SEO Meta Title')
                                ->placeholder('Optimal: 50-60 characters')
                                ->maxLength(70)
                                ->helperText('Target title shown in Google search results and browser tab.'),

                            Textarea::make('meta_description')
                                ->label('SEO Meta Description')
                                ->placeholder('Optimal: 140-160 characters describing the article value proposition...')
                                ->rows(2)
                                ->maxLength(180)
                                ->helperText('Target description shown in Google search snippets.'),

                            TextInput::make('meta_keywords')
                                ->label('Target Meta Keywords')
                                ->placeholder('e.g. electrical, transformers, industrial safety')
                                ->helperText('Comma-separated search keywords.'),
                        ]),

                    // 3. Breadcrumb Hero Banner & Studio
                    Section::make('Breadcrumb Hero Banner & Studio')
                        ->description('Custom header hero banner image for article details page.')
                        ->icon('heroicon-o-photo')
                        ->collapsible()
                        ->collapsed(false)
                        ->components([
                            View::make('filament.admin.resources.blog-posts.components.banner-studio-preview'),

                            FileUpload::make('banner_image')
                                ->label('Header Hero Banner')
                                ->image()
                                ->disk('public')
                                ->directory('blog/banners')
                                ->helperText('Recommended size: 1920x450px landscape.'),

                            Select::make('banner_position')
                                ->label('Banner Focus Alignment')
                                ->options([
                                    'center'      => 'Center (Default)',
                                    'top'         => 'Top Center',
                                    'top left'    => 'Top Left',
                                    'top right'   => 'Top Right',
                                    'bottom'      => 'Bottom Center',
                                ])
                                ->default('center'),
                        ]),
                ])
                ->columnSpan(['default' => 1, 'lg' => 2]),

                // ══════════════════════════════════════════════════════════════
                // RIGHT COLUMN (Span 1): Publish, SEO Score, Media, Category, Stats, Danger
                // ══════════════════════════════════════════════════════════════
                Group::make([
                    // 1. Publish Status Card
                    Section::make('Publish Status')
                        ->description('Set visibility and schedule.')
                        ->icon('heroicon-o-calendar')
                        ->components([
                            Toggle::make('is_published')
                                ->label('Live Public Status')
                                ->helperText('When enabled, this article is visible on the website.')
                                ->default(true),

                            DateTimePicker::make('published_at')
                                ->label('Published Date')
                                ->default(now()),

                            TextInput::make('author_name')
                                ->label('Author Name')
                                ->default('Admin')
                                ->placeholder('e.g. Voltiva Editorial Team')
                                ->maxLength(100),

                            TextInput::make('tags')
                                ->label('Tags / Topics')
                                ->placeholder('e.g. Technology, Safety, Power')
                                ->helperText('Comma-separated topics.'),

                            TextInput::make('views')
                                ->label('View Count')
                                ->numeric()
                                ->default(0)
                                ->disabled()
                                ->dehydrated(false)
                                ->helperText('Total unique public page reads.'),

                            View::make('filament.admin.resources.blog-posts.components.publish-button'),
                        ]),

                    // 2. SEO Health Score Card
                    View::make('filament.admin.resources.blog-posts.components.seo-score'),

                    // 3. Featured Image Card
                    Section::make('Featured Image')
                        ->description('Primary thumbnail image.')
                        ->icon('heroicon-o-photo')
                        ->components([
                            FileUpload::make('image')
                                ->label('Featured Thumbnail')
                                ->image()
                                ->disk('public')
                                ->directory('blog')
                                ->nullable()
                                ->helperText('Optional. Recommended size: 800×500px.'),

                            TextInput::make('image_alt')
                                ->label('Image Alt Text')
                                ->placeholder('Descriptive text for accessibility & SEO')
                                ->maxLength(150),
                        ]),

                    // 4. Category & Taxonomy Card
                    Section::make('Category & Taxonomy')
                        ->description('Assign article category.')
                        ->icon('heroicon-o-tag')
                        ->components([
                            Select::make('blog_category_id')
                                ->label('Category')
                                ->relationship('category', 'name')
                                ->searchable()
                                ->preload()
                                ->createOptionForm([
                                    TextInput::make('name')
                                        ->required()
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(fn ($state, \Filament\Forms\Set $set) => $set('slug', Str::slug($state))),
                                    TextInput::make('slug')->required(),
                                ])
                                ->placeholder('Select Category')
                                ->nullable(),
                        ]),

                    // 5. Article Analytics Card
                    View::make('filament.admin.resources.blog-posts.components.analytics'),

                    // 6. Danger Zone Card
                    View::make('filament.admin.resources.blog-posts.components.danger-zone'),
                ])
                ->columnSpan(['default' => 1, 'lg' => 1]),
            ]);
    }
}
