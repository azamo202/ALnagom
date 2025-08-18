<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // الرجوع إلى نفس الصفحة بعد الإنشاء
    }

    protected function afterCreate(): void
    {
        // إعادة تعبئة النموذج بدون بيانات
        $this->fillForm();
      
    }
}
