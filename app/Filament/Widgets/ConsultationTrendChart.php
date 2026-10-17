<?php

namespace App\Filament\Widgets;

use App\Models\Consultation;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class ConsultationTrendChart extends ChartWidget
{
    protected ?string $heading = 'Consultation Inquiry Rate (Last 30 Days)';

    protected function getData(): array
    {
        $data = Consultation::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count', 'date');

        return [
            'datasets' => [
                [
                    'label' => 'Consultations Received',
                    'data' => $data->values()->toArray(),
                    'borderColor' => '#10b981',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                    'fill' => true,
                    'tension' => 0.3,
                ],
            ],
            'labels' => $data->keys()->map(fn ($date) => Carbon::parse($date)->format('M d'))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}