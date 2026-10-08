<?php

namespace App\Filament\Admin\Resources\SubCategories\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\Width;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(['default' => 1, 'sm' => 2])
            ->schema([
                TextInput::make('title')
                    ->label('Product Title')
                    ->placeholder('e.g. Electrical Buzzer')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull()
                    ->prefixIcon('heroicon-o-cube'),

                TextInput::make('code')
                    ->label('Product Code / SKU')
                    ->placeholder('e.g. 6079G')
                    ->prefixIcon('heroicon-o-qr-code')
                    ->maxLength(255),

                TextInput::make('size')
                    ->label('Size / Specification')
                    ->placeholder('e.g. 2M')
                    ->prefixIcon('heroicon-o-adjustments-horizontal')
                    ->maxLength(255),

                TextInput::make('price')
                    ->label('Unit Price')
                    ->numeric()
                    ->prefix('₹')
                    ->placeholder('0.00'),

                TextInput::make('pkd')
                    ->label('Pkd (Quantity)')
                    ->numeric()
                    ->prefixIcon('heroicon-o-archive-box')
                    ->placeholder('e.g. 10'),

                TextInput::make('tags')
                    ->label('Color / Finish')
                    ->placeholder('e.g. Pure White, Matt Black, Graphite Grey')
                    ->prefixIcon('heroicon-o-paint-brush')
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Description')
                    ->placeholder('Enter product description...')
                    ->rows(2),

                FileUpload::make('image')
                    ->label('Select Main Image')
                    ->image()
                    ->disk('public')
                    ->directory('products')
                    ->imagePreviewHeight('130')
                    ->maxSize(5120)
                    ->helperText('Select or drag a product image (PNG, JPG, WEBP).'),

                Placeholder::make('image_preview')
                    ->label('Current Image Preview')
                    ->content(function ($record) {
                        $imageUrl = null;
                        if (!empty($record?->image)) {
                            $imageUrl = str_starts_with($record->image, 'http')
                                ? $record->image
                                : asset('storage/' . ltrim($record->image, '/'));
                        } elseif (!empty($record?->icon_path)) {
                            $imageUrl = asset($record->icon_path);
                        }

                        if ($imageUrl) {
                            return new \Illuminate\Support\HtmlString('
                                <div class="flex flex-col items-center justify-center p-3 rounded-xl border border-slate-200 bg-slate-50/90 shadow-xs h-[140px] text-center">
                                    <img src="' . e($imageUrl) . '" alt="Product preview" class="max-h-[100px] max-w-full object-contain rounded-md drop-shadow-sm transition-transform hover:scale-105 duration-200" />
                                    <span class="text-[11px] font-medium text-slate-500 mt-2 truncate max-w-full">' . e(basename($imageUrl)) . '</span>
                                </div>
                            ');
                        }

                        return new \Illuminate\Support\HtmlString('
                            <div class="flex flex-col items-center justify-center p-4 rounded-xl border border-dashed border-slate-300 bg-slate-50/50 text-slate-400 h-[140px] text-center">
                                <svg class="w-8 h-8 mb-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span class="text-xs font-medium">No image uploaded yet</span>
                            </div>
                        ');
                    }),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                ImageColumn::make('image')
                    ->label('IMAGE')
                    ->disk('public')
                    ->square()
                    ->size(46),

                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),

                TextColumn::make('code')
                    ->label('CODE')
                    ->searchable()
                    ->badge()
                    ->color('gray'),

                TextColumn::make('price')
                    ->label('PRICE')
                    ->money('INR')
                    ->sortable(),

                TextColumn::make('pkd')
                    ->label('PKD')
                    ->badge()
                    ->color('warning')
                    ->toggleable(),

                TextColumn::make('size')
                    ->label('SIZE')
                    ->badge()
                    ->color('slate')
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
                    ->modalHeading('Add New Product')
                    ->modalWidth(Width::FourExtraLarge)
                    ->modalAlignment(Alignment::Start)
                    ->modalFooterActionsAlignment(Alignment::End)
                    ->stickyModalHeader()
                    ->stickyModalFooter()
                    ->modalSubmitAction(fn ($action) => $action
                        ->color('primary')
                        ->extraAttributes([
                            'style' => 'background-color: #000000 !important; color: #ffffff !important; -webkit-text-fill-color: #ffffff !important; border-radius: 10px !important;',
                        ])
                        ->label(new \Illuminate\Support\HtmlString('<span style="color: #ffffff !important; -webkit-text-fill-color: #ffffff !important; font-weight: 600; letter-spacing: -0.01em;">Create Product</span>'))
                    )
                    ->modalCancelAction(fn ($action) => $action
                        ->color('gray')
                        ->extraAttributes([
                            'style' => 'background-color: #ffffff !important; color: #525252 !important; -webkit-text-fill-color: #525252 !important; border: 1px solid #b7b7b7 !important; border-radius: 10px !important;',
                        ])
                        ->label(new \Illuminate\Support\HtmlString('<span style="color: #525252 !important; -webkit-text-fill-color: #525252 !important; font-weight: 600;">Cancel</span>'))
                    ),
            ])
            ->recordActions([
                EditAction::make()
                    ->iconButton()
                    ->icon('heroicon-o-pencil-square')
                    ->color('gray')
                    ->tooltip('Edit Product')
                    ->modalHeading(fn ($record) => "Edit {$record->title}")
                    ->modalWidth(Width::FourExtraLarge)
                    ->modalAlignment(Alignment::Start)
                    ->modalFooterActionsAlignment(Alignment::End)
                    ->stickyModalHeader()
                    ->stickyModalFooter()
                    ->modalSubmitAction(fn ($action) => $action
                        ->color('primary')
                        ->extraAttributes([
                            'style' => 'background-color: #000000 !important; color: #ffffff !important; -webkit-text-fill-color: #ffffff !important; border-radius: 10px !important;',
                        ])
                        ->label(new \Illuminate\Support\HtmlString('<span style="color: #ffffff !important; -webkit-text-fill-color: #ffffff !important; font-weight: 600; letter-spacing: -0.01em;">Save changes</span>'))
                    )
                    ->modalCancelAction(fn ($action) => $action
                        ->color('gray')
                        ->extraAttributes([
                            'style' => 'background-color: #ffffff !important; color: #525252 !important; -webkit-text-fill-color: #525252 !important; border: 1px solid #b7b7b7 !important; border-radius: 10px !important;',
                        ])
                        ->label(new \Illuminate\Support\HtmlString('<span style="color: #525252 !important; -webkit-text-fill-color: #525252 !important; font-weight: 600;">Cancel</span>'))
                    ),

                DeleteAction::make()
                    ->iconButton()
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->tooltip('Delete Product'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
