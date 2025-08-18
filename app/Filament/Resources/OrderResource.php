<?php

namespace App\Filament\Resources;

use App\Models\Order;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\OrderResource\Pages;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    
    protected static ?string $modelLabel = 'طلب';
    
    protected static ?string $pluralModelLabel = 'الطلبات';
    
    protected static ?string $navigationLabel = 'الطلبات';
    
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->searchable()
                    ->label('المستخدم')
                    ->placeholder('اختر المستخدم'),

                TextInput::make('total')
                    ->numeric()
                    ->prefix('$')
                    ->required()
                    ->label('المبلغ الإجمالي')
                    ->placeholder('أدخل المبلغ الإجمالي'),

                Select::make('status')
                    ->options([
                        'pending' => 'قيد الانتظار',
                        'completed' => 'مكتمل',
                        'cancelled' => 'ملغى',
                    ])
                    ->required()
                    ->label('حالة الطلب')
                    ->placeholder('اختر حالة الطلب'),

                TextInput::make('payment_method')
                    ->required()
                    ->label('طريقة الدفع')
                    ->placeholder('أدخل طريقة الدفع'),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('المستخدم')
                    ->sortable()
                    ->searchable(),
                    
                TextColumn::make('total')
                    ->label('المبلغ الإجمالي')
                    ->money('usd')
                    ->sortable(),
                    
                TextColumn::make('status')
                    ->label('الحالة')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                    }),
                    
                TextColumn::make('payment_method')
                    ->label('طريقة الدفع')
                    ->sortable()
                    ->searchable(),
                    
                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('تعديل'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('حذف المحدد'),
                ]),
            ])
            ->emptyStateHeading('لا توجد طلبات')
            ->emptyStateDescription('قم بإنشاء طلب جديد لبدء المشاهدة');
    }



    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}