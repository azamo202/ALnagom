<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    // اسم الصفحة في لوحة التنقل
    protected static ?string $navigationLabel = 'المستخدمون';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('الاسم')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('البريد الإلكتروني')
                    ->email()
                    ->required()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->label('رقم الهاتف')
                    ->tel()
                    ->maxLength(20),

                Select::make('role')
                    ->label('الدور')
                    ->options([
                        'admin' => 'مدير',
                        'user' => 'مستخدم',
                    ])
                    ->required(),

                TextInput::make('password')
                    ->label('كلمة المرور')
                    ->password()
                    ->required(fn ($record) => is_null($record)) // مطلوب عند الإنشاء فقط
                    ->minLength(6)
                    ->dehydrateStateUsing(fn ($state) => $state ? bcrypt($state) : null) // تشفير الباسورد
                    ->dehydrated(fn ($state) => !is_null($state)), // لا يحفظ إذا فارغ (مثلاً عند التعديل)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),

                TextColumn::make('name')
                    ->label('الاسم')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('email')
                    ->label('البريد الإلكتروني')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('الهاتف'),

                        TextColumn::make('role')
                ->label('الدور')
                ->sortable()
                ->formatStateUsing(fn (string $state): string => match ($state) {
                    'admin' => 'مدير',
                    'user' => 'مستخدم',
                    default => $state,
                }),


                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->label('فلتر الدور')
                    ->options([
                        'admin' => 'مدير',
                        'user' => 'مستخدم',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
