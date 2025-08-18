<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class OrderItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $recordTitleAttribute = 'product.name';

    public function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Select::make('product_id')
                ->relationship('product', 'name')
                ->required()
                ->searchable(),

            TextInput::make('quantity')
                ->numeric()
                ->minValue(1)
                ->required(),

            TextInput::make('price')
                ->numeric()
                ->prefix('$')
                ->required(),
        ]);
    }

    public function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('product.name')->label('Product'),
            TextColumn::make('quantity'),
            TextColumn::make('price')->money('usd'),
        ])
        ->headerActions([
            Tables\Actions\CreateAction::make(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }
}
