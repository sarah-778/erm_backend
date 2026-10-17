<?php

namespace App\Filament\Resources\Services\Tables;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ServicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->square(),
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('badge')->badge()->color('info'),
                IconColumn::make('is_active')->label('Visible')->boolean(),
                TextColumn::make('created_at')->dateTime('M d, Y')->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}