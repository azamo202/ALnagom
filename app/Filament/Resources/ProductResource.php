<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'إدارة المتجر';
    protected static ?string $modelLabel = 'إضافة منتج';
    protected static ?string $pluralModelLabel = 'المنتجات';
    protected static ?string $navigationLabel = 'المنتجات';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('name')
                        ->label('اسم المنتج')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('أدخل اسم المنتج'),

                    Textarea::make('description')
                        ->label('الوصف')
                        ->required()
                        ->rows(4)
                        ->placeholder('أدخل وصف المنتج'),

                    TextInput::make('price')
                        ->label('السعر')
                        ->numeric()
                        ->prefix('$')
                        ->required()
                        ->placeholder('أدخل السعر'),

                    TextInput::make('stock')
                        ->label('الكمية المتاحة')
                        ->numeric()
                        ->required()
                        ->placeholder('أدخل الكمية'),

                    Select::make('category_id')
                        ->label('التصنيف')
                        ->relationship('category', 'name')
                        ->searchable()
                        ->preload()
                        ->required()
                        ->placeholder('اختر التصنيف'),


                    FileUpload::make('image')
                        ->label('صورة المنتج')
                        ->image()
                        ->directory('products')
                        ->nullable()
                        ->helperText('رفع صورة للمنتج'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
                ->columns([   
                ImageColumn::make('image')
                    ->label('الصورة')
                    ->getStateUsing(fn ($record) => asset('storage/' . $record->image))
                    ->circular()
                    ->width(50)
                    ->height(50),


                TextColumn::make('name')
                    ->label('الاسم')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('price')
                    ->label('السعر')
                    ->money('USD', true)
                    ->sortable(),
                    
                TextColumn::make('stock')
                    ->label('المخزون')
                    ->sortable(),
                    
                TextColumn::make('category.name')
                    ->label('التصنيف')
                    ->sortable(),
                    
                TextColumn::make('created_at')
                    ->label('تاريخ الإضافة')
                    ->dateTime('d M Y, h:i A')
                    ->sortable(),
            ])
            ->filters([])
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
            ->emptyStateHeading('لا توجد منتجات')
            ->emptyStateDescription('قم بإنشاء منتج جديد لبدء المشاهدة');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}