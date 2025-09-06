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

                // Tables\Columns\TextColumn::make('email')
                //     ->label('Email')
                //     ->searchable(),

                Tables\Columns\TextColumn::make('ticket_no')
                    ->label('Ticket No')
                    ->sortable(),

                Tables\Columns\TextColumn::make('amount')
                    ->money('inr', true)
                    ->sortable(),

                // Tables\Columns\TextColumn::make('draw_date')
                //     ->date('d M Y')
                //     ->sortable(),

                // ==== status column: format + badge + colors ====
                Tables\Columns\TextColumn::make('status')
                    ->label('Payment Status')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ((int) $state) {
                        0 => 'Payment Transfer',
                        1 => 'Payment Pending',
                        2 => 'Transaction Successful',
                        default => 'Unknown',
                    })
                    ->colors([
                        // color => callback
                        'primary' => fn ($state) => (int) $state === 0,
                        'warning' => fn ($state) => (int) $state === 1,
                        'success' => fn ($state) => (int) $state === 2,
                    ]),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        0 => 'Payment Transfer',
                        1 => 'Payment Pending',
                        2 => 'Transaction Successful',
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
