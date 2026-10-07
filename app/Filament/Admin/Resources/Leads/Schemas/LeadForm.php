<?php

namespace App\Filament\Admin\Resources\Leads\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(['default' => 1, 'lg' => 3])
            ->components([
                // Left Column - Contact & Requirement Info
                Group::make([
                    Section::make('Customer Contact Information')
                        ->description('Primary contact details provided by the customer.')
                        ->icon('heroicon-o-user')
                        ->components([
                            TextInput::make('name')
                                ->label('Customer Name')
                                ->placeholder('e.g. Rajesh Patel')
                                ->required()
                                ->maxLength(255),

                            TextInput::make('email')
                                ->label('Email Address')
                                ->placeholder('e.g. rajesh@example.com')
                                ->email()
                                ->maxLength(255),

                            TextInput::make('phone')
                                ->label('Phone / WhatsApp')
                                ->placeholder('e.g. +91 98250 12345')
                                ->tel()
                                ->maxLength(50),

                            TextInput::make('ip_address')
                                ->label('Origin IP Address')
                                ->disabled()
                                ->dehydrated(false)
                                ->placeholder('Captured automatically upon form submit'),
                        ])
                        ->columns(2),

                    Section::make('Inquiry Requirement & Message')
                        ->description('Customer interest, subject matter, and message content.')
                        ->icon('heroicon-o-chat-bubble-left-ellipsis')
                        ->components([
                            TextInput::make('subject')
                                ->label('Subject / Purpose')
                                ->placeholder('e.g. Dealership Inquiry / Bulk Order')
                                ->maxLength(255),

                            TextInput::make('product_name')
                                ->label('Interested Product / Line')
                                ->placeholder('e.g. Smart Touch Modular Switches')
                                ->maxLength(255),

                            Textarea::make('message')
                                ->label('Inquiry Message')
                                ->placeholder('Detailed message or requirements from customer...')
                                ->rows(5)
                                ->required(),
                        ]),
                ])
                ->columnSpan(['default' => 1, 'lg' => 2]),

                // Right Column - Workflow & Notes
                Group::make([
                    Section::make('Lead Status & Pipeline')
                        ->description('Track and update inquiry handling lifecycle.')
                        ->icon('heroicon-o-arrow-path')
                        ->components([
                            Select::make('status')
                                ->label('Current Status')
                                ->options([
                                    'new' => 'New / Unread',
                                    'contacted' => 'Contacted',
                                    'in_progress' => 'In Progress / Discussion',
                                    'closed' => 'Closed / Converted',
                                    'junk' => 'Junk / Spam',
                                ])
                                ->default('new')
                                ->required()
                                ->native(false),

                            Select::make('source')
                                ->label('Acquisition Source')
                                ->options([
                                    'Contact Page' => 'Website Contact Page',
                                    'Product Inquiry' => 'Product Page Inquiry',
                                    'Direct Call' => 'Direct Phone / Call',
                                    'WhatsApp' => 'WhatsApp Chat',
                                    'Email' => 'Direct Email',
                                    'Exhibition' => 'Trade Expo / Exhibition',
                                ])
                                ->default('Contact Page')
                                ->native(false),
                        ]),

                    Section::make('Internal Follow-Up Notes')
                        ->description('Private notes for your sales & support team.')
                        ->icon('heroicon-o-clipboard-document-list')
                        ->components([
                            Textarea::make('admin_notes')
                                ->label('Staff Notes')
                                ->placeholder('e.g. Called customer on 10:30 AM, requested wholesale catalog and pricing sheet.')
                                ->rows(5),
                        ]),
                ])
                ->columnSpan(['default' => 1, 'lg' => 1]),
            ]);
    }
}
