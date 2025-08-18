<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'حجوزاتي';
    protected static ?string $pluralModelLabel = 'الحجوزات';
    protected static ?string $modelLabel = 'حجز';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('product.name')
                    ->label('اسم المنتج')
                    ->disabled(),
                Forms\Components\DatePicker::make('start_date')
                    ->label('تاريخ البدء')
                    ->disabled(),
                Forms\Components\DatePicker::make('end_date')
                    ->label('تاريخ الانتهاء')
                    ->disabled(),
                Forms\Components\TextInput::make('total_price')
                    ->label('السعر')
                    ->disabled(),
                Forms\Components\TextInput::make('status')
                    ->label('الحالة')
                    ->disabled(),
            ]);
    }

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('user.name')
                ->label('اسم المستخدم'),
            Tables\Columns\TextColumn::make('product.name')
                ->label('اسم المنتج'),
            Tables\Columns\TextColumn::make('start_date')
                ->label('تاريخ البدء'),
            Tables\Columns\TextColumn::make('end_date')
                ->label('تاريخ الانتهاء'),
            Tables\Columns\TextColumn::make('total_price')
                ->label('السعر'),
            Tables\Columns\TextColumn::make('payment_method')
                ->label('طريقة الدفع'),
            Tables\Columns\TextColumn::make('status')
                ->label('الحالة'),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\ViewAction::make(),
        ])
        ->bulkActions([]);
}


  public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery();
}

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
        ];
    }
}
