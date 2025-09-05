<?php

namespace App\Filament\Resources\Customers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;

class CustomersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('mobile')
                    ->label('Mobile')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('ticket_no')
                    ->label('Ticket No')
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('payment_status')
                    ->label('Payment Status')
                    ->colors([
                        'success' => 'Paid',
                        'warning' => 'Pending',
                        'danger'  => 'Failed',
                    ])
                    ->sortable(),
            ])
            ->filters([
                // Example: filter by status
                Tables\Filters\SelectFilter::make('payment_status')
                    ->options([
                        'Paid' => 'Paid',
                        'Pending' => 'Pending',
                        'Failed' => 'Failed',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
