<?php

namespace App\Filament\Widgets;

use App\Models\Consultation;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ConsultationStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Inquiries', Consultation::count())
                ->description('All-time consultation requests')
                ->color('success'),

            Stat::make('This Month', Consultation::whereMonth('created_at', now()->month)->count())
                ->description('New requests this month'),

            Stat::make('Urgent Requests', Consultation::where('urgency', 'Urgent')->count())
                ->description('Requires immediate action')
                ->color('danger'),
        ];
    }
}