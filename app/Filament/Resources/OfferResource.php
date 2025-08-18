<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OfferResource\Pages;
use App\Models\Offer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OfferResource extends Resource
{
    protected static ?string $model = Offer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('اسم العرض الأساسي')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->label('الوصف')
                    ->required()
                    ->rows(3),

                Forms\Components\TextInput::make('price')
                    ->label('السعر')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->step(0.01),

                            Forms\Components\FileUpload::make('image')
                    ->label('صورة العرض')
                    ->image()
                    ->directory('offers')
                    ->required()
                    ->maxSize(2048) // حجم 2 ميجا بايت كحد أقصى
                    ->imageResizeTargetWidth(400) // عرض الصورة بعد التحجيم
                    ->imageResizeTargetHeight(400) // ارتفاع الصورة بعد التحجيم
                    ->imageResizeMode('cover'), // طريقة التحجيم
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('اسم العرض')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('السعر')
                    ->money('SAR', true)
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('صورة العرض')
                    ->square(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOffers::route('/'),
            'create' => Pages\CreateOffer::route('/create'),
            'edit' => Pages\EditOffer::route('/{record}/edit'),
        ];
    }
    public static function getModelLabel(): string
{
    return 'عرض';
}

public static function getPluralModelLabel(): string
{
    return 'العروض';
}

}
