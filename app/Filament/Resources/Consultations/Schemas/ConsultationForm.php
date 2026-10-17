<?php

namespace App\Filament\Resources\Consultations\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class ConsultationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),

                Forms\Components\TextInput::make('phone'),

                Forms\Components\TextInput::make('company'),

                Forms\Components\TextInput::make('industry'),

                Forms\Components\TextInput::make('service')
                    ->required(),

                Forms\Components\Select::make('urgency')
                    ->options([
                        'Standard' => 'Standard',
                        'Priority' => 'Priority',
                        'Urgent' => 'Urgent',
                    ])
                    ->required(),

                Forms\Components\Textarea::make('message')
                    ->columnSpanFull(),
            ]);
    }
}