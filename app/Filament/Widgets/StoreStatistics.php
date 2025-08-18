<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StoreStatistics extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('عدد الطلبات', Order::count())
                ->description('إجمالي الطلبات في المتجر')
                ->color('info')
                ->icon('heroicon-o-shopping-cart')
                ->chart([7, 3, 4, 5, 6, 3, 5, 8])
                ->descriptionIcon('heroicon-m-arrow-trending-up'),

            Stat::make('عدد التصنيفات', Category::count())
                ->description('عدد التصنيفات المتاحة')
                ->color('success')
                ->icon('heroicon-o-tag')
                ->chart([3, 5, 2, 4, 6, 8, 5, 7])
                ->descriptionIcon('heroicon-m-arrow-trending-up'),

            Stat::make('عدد المستخدمين', User::count())
                ->description('المستخدمين المسجلين في النظام')
                ->color('primary')
                ->icon('heroicon-o-users')
                ->chart([2, 4, 3, 5, 6, 7, 8, 9])
                ->descriptionIcon('heroicon-m-arrow-trending-up'),

            Stat::make('عدد المنتجات', Product::count())
                ->description('المنتجات المتاحة في المتجر')
                ->color('warning')
                ->icon('heroicon-o-cube')
                ->chart([5, 3, 7, 4, 6, 8, 5, 9])
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
        ];
    }
}