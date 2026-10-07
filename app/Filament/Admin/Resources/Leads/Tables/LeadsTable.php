<?php

namespace App\Filament\Admin\Resources\Leads\Tables;

use App\Models\Lead;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class LeadsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Customer')
                    ->description(fn (Lead $record): string => trim(($record->phone ? $record->phone . ' • ' : '') . ($record->email ?? '')))
                    ->searchable(['name', 'email', 'phone'])
                    ->weight(FontWeight::Bold)
                    ->sortable(),

                TextColumn::make('subject')
                    ->label('Requirement / Subject')
                    ->description(fn (Lead $record): ?string => $record->product_name ? 'Product: ' . $record->product_name : null)
                    ->searchable(['subject', 'product_name'])
                    ->wrap()
                    ->limit(50),

                TextColumn::make('message')
                    ->label('Message')
                    ->limit(60)
                    ->tooltip(fn (Lead $record): string => (string) $record->message)
                    ->wrap()
                    ->toggleable(),

                TextColumn::make('source')
                    ->label('Source')
                    ->badge()
                    ->color('gray')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new' => 'danger',
                        'contacted' => 'warning',
                        'in_progress' => 'info',
                        'closed' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'new' => 'New / Unread',
                        'contacted' => 'Contacted',
                        'in_progress' => 'In Progress',
                        'closed' => 'Closed',
                        'junk' => 'Junk / Spam',
                        default => ucfirst($state),
                    })
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime('d M Y, h:i A')
                    ->description(fn (Lead $record): string => $record->created_at ? $record->created_at->diffForHumans() : '')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'new' => 'New / Unread',
                        'contacted' => 'Contacted',
                        'in_progress' => 'In Progress',
                        'closed' => 'Closed',
                        'junk' => 'Junk / Spam',
                    ]),

                SelectFilter::make('source')
                    ->label('Lead Source')
                    ->options([
                        'Contact Page' => 'Contact Page',
                        'Product Inquiry' => 'Product Inquiry',
                        'Direct Call' => 'Direct Phone / Call',
                        'WhatsApp' => 'WhatsApp Chat',
                        'Email' => 'Direct Email',
                    ]),
            ])
            ->filtersTriggerAction(
                fn (Action $action) => $action
                    ->button()
                    ->label('Filter')
                    ->icon('heroicon-o-funnel')
                    ->color('gray')
            )
            ->recordActions([
                Action::make('quick_view')
                    ->label('View')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->iconButton()
                    ->tooltip('Quick View Inquiry')
                    ->modalHeading(fn (Lead $record): string => 'Inquiry from ' . $record->name)
                    ->modalWidth('xl')
                    ->modalContent(fn (Lead $record) => view('filament.admin.components.lead-modal-view', ['lead' => $record])),

                Action::make('whatsapp')
                    ->icon('heroicon-o-chat-bubble-bottom-center-text')
                    ->color('success')
                    ->iconButton()
                    ->tooltip('Chat on WhatsApp')
                    ->visible(fn (Lead $record) => filled($record->phone))
                    ->url(fn (Lead $record) => 'https://wa.me/' . preg_replace('/[^0-9]/', '', $record->phone) . '?text=' . urlencode("Hello {$record->name}, thank you for contacting Voltiva regarding {$record->subject}. How can we assist you?"), shouldOpenInNewTab: true),

                Action::make('call')
                    ->icon('heroicon-o-phone')
                    ->color('gray')
                    ->iconButton()
                    ->tooltip('Call Customer')
                    ->visible(fn (Lead $record) => filled($record->phone))
                    ->url(fn (Lead $record) => 'tel:' . preg_replace('/[^0-9+]/', '', $record->phone)),

                Action::make('update_status')
                    ->label('Update Status')
                    ->icon('heroicon-o-arrow-path')
                    ->color('warning')
                    ->iconButton()
                    ->tooltip('Change Status & Notes')
                    ->form([
                        Select::make('status')
                            ->label('Inquiry Status')
                            ->options([
                                'new' => 'New / Unread',
                                'contacted' => 'Contacted',
                                'in_progress' => 'In Progress',
                                'closed' => 'Closed',
                                'junk' => 'Junk / Spam',
                            ])
                            ->default(fn (Lead $record): string => $record->status)
                            ->required(),
                        Textarea::make('admin_notes')
                            ->label('Internal Notes')
                            ->default(fn (Lead $record): ?string => $record->admin_notes)
                            ->rows(4),
                    ])
                    ->action(function (Lead $record, array $data): void {
                        $record->update([
                            'status' => $data['status'],
                            'admin_notes' => $data['admin_notes'],
                        ]);
                        Notification::make()
                            ->title('Status updated successfully')
                            ->success()
                            ->send();
                    }),

                EditAction::make()
                    ->iconButton()
                    ->icon('heroicon-o-pencil-square')
                    ->color('gray')
                    ->tooltip('Full Edit'),

                DeleteAction::make()
                    ->iconButton()
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->tooltip('Delete Inquiry'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('mark_contacted')
                        ->label('Mark as Contacted')
                        ->icon('heroicon-o-phone')
                        ->color('warning')
                        ->action(fn (Collection $records) => $records->each->update(['status' => 'contacted'])),

                    BulkAction::make('mark_closed')
                        ->label('Mark as Closed')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(fn (Collection $records) => $records->each->update(['status' => 'closed'])),

                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
