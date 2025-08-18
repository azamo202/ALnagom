<?php

namespace App\Filament\Resources\UserresourceResource\Widgets;

use Filament\Widgets\ChartWidget;

class UserCount extends ChartWidget
{
    protected static ?string $heading = 'Chart';

   protected function getData(): array
{
    $users = \App\Models\User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->whereYear('created_at', now()->year)
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('count', 'month');

    $months = range(1, 12);

    return [
        'datasets' => [
            [
                'label' => 'عدد المستخدمين الجدد',
                'data' => collect($months)->map(fn ($month) => $users[$month] ?? 0),
                'backgroundColor' => '#3b82f6',
            ],
        ],
        'labels' => collect($months)->map(fn ($month) => "شهر {$month}"),
    ];
}


    protected function getType(): string
    {
        return 'bar';
    }
}
