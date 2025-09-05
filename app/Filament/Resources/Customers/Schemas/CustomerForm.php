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

                Forms\Components\Select::make('payment_status')
                    ->label('Payment Status')
                    ->options([
                        'Paid'    => 'Paid',
                        'Pending' => 'Pending',
                        'Failed'  => 'Failed',
                    ])
                    ->default('Pending')
                    ->required(),
            ]);
    }
}
