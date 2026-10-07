<?php

namespace App\Filament\Admin\Resources\BlogPosts\Tables;

use App\Models\BlogPost;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class BlogPostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->square()
                    ->size(50)
                    ->extraImgAttributes(['class' => 'rounded-lg object-cover shadow-xs']),

                TextColumn::make('title')
                    ->label('Article Title & Excerpt')
                    ->description(fn (BlogPost $record): ?string => $record->excerpt ? \Illuminate\Support\Str::limit($record->excerpt, 65) : null)
                    ->searchable(['title', 'excerpt'])
                    ->sortable()
                    ->weight('bold')
                    ->wrap(),

                TextColumn::make('category.name')
                    ->label('Category')
                    ->badge()
                    ->color('gray')
                    ->sortable()
                    ->searchable()
                    ->placeholder('Uncategorized'),

                TextColumn::make('is_published')
                    ->label('Status')
                    ->badge()
                    ->color(fn (bool $state): string => $state ? 'success' : 'warning')
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Live' : 'Draft')
                    ->sortable(),

                TextColumn::make('views')
                    ->label('Views')
                    ->badge()
                    ->color('info')
                    ->icon('heroicon-o-eye')
                    ->sortable(),

                TextColumn::make('published_at')
                    ->label('Date')
                    ->dateTime('d M Y')
                    ->description(fn (BlogPost $record): string => $record->published_at ? $record->published_at->diffForHumans() : '')
                    ->sortable(),
            ])
            ->defaultSort('published_at', 'desc')
            ->filters([
                SelectFilter::make('blog_category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload(),

                TernaryFilter::make('is_published')
                    ->label('Publication Status')
                    ->trueLabel('Live Articles')
                    ->falseLabel('Drafts'),
            ])
            ->filtersTriggerAction(
                fn (\Filament\Actions\Action $action) => $action
                    ->button()
                    ->label('Filter')
                    ->icon('heroicon-o-funnel')
                    ->color('gray')
            )
            // No record actions or bulk actions here — handled by custom UI in list-blog-posts.blade.php
            ->recordActions([])
            ->toolbarActions([]);
    }
}
