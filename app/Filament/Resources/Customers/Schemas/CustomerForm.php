<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('mobile')
                    ->label('Mobile')
                    ->tel()
                    ->required()
                    ->maxLength(20),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                Forms\Components\TextInput::make('ticket_no')
                    ->label('Ticket No')
                    ->required()
                    ->maxLength(50),

                Forms\Components\TextInput::make('amount')
                    ->numeric()
                    ->label('Amount')
                    ->prefix('₹')
                    ->step('0.01'),

                Forms\Components\DatePicker::make('draw_date')
                    ->label('Draw Date')
                    ->native(false),

                Forms\Components\Select::make('status')
                    ->label('Payment Status')
                    ->options([
                        0 => 'Payment Transfer',
                        1 => 'Payment Pending',
                        2 => 'Transaction Successful',
                    ])
                    ->nullable()
                    ->native(false),
                Forms\Components\TextInput::make('status_desc')
                    ->label('Status Description'),
                   // ->required()
                   // ->maxLength(50),
            ]);
    }
}
