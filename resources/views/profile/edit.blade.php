@extends('layouts.app')

@section('title', 'زينة سيارات الأفراح')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto space-y-8">
            <!-- بطاقة معلومات الملف الشخصي -->
            <div class="profile-card p-6 md:p-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">
                        <i class="fas fa-user-circle text-orange-500 mr-2"></i>
                        معلومات الملف الشخصي
                    </h2>
                </div>
                
                <div class="space-y-6">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            
            <!-- بطاقة تحديث كلمة المرور -->
            <div class="profile-card p-6 md:p-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">
                        <i class="fas fa-lock text-blue-500 mr-2"></i>
                        تحديث كلمة المرور
                    </h2>
                </div>
                
                <div class="space-y-6">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            
            <!-- بطاقة حذف الحساب -->
            <div class="profile-card p-6 md:p-8 border border-red-100">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">
                        <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                        حذف الحساب
                    </h2>
                </div>
                
                <div class="space-y-6">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection