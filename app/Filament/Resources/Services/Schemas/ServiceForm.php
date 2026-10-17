<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)->schema([
                    TextInput::make('title')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('badge')
                        ->label('Category / Badge')
                        ->placeholder('e.g. CONSULTING, OUTSOURCING'),

                    Select::make('accent')
                        ->options([
                            'emerald' => 'Emerald Green',
                            'teal' => 'Teal Cyan',
                            'violet' => 'Violet Purple',
                        ])
                        ->default('emerald')
                        ->required(),

                    Toggle::make('is_active')
                        ->label('Visible on Website')
                        ->default(true),
                ]),

                Textarea::make('description')
                    ->required()
                    ->rows(4),

                TagsInput::make('features')
                    ->label('Key Features / Deliverables')
                    ->placeholder('Add feature and press Enter'),

                FileUpload::make('image')
                    ->image()
                    ->directory('services')
                    ->columnSpanFull(),
            ]);
    }
}