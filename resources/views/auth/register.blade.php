<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب جديد | محلات النجوم</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <!-- إضافة مكتبة Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- إضافة خط Tajawal -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- إضافة أيقونات Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f8fafc;
        }
        .auth-container {
            background: linear-gradient(to bottom, #111828, #1e293b);
        }
        .auth-card {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .input-focus:focus {
            border-color: #f97316;
            box-shadow: 0 0 0 2px rgba(249, 115, 22, 0.2);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- شريط التنقل العلوي -->
    <nav class="bg-[#111828] py-4 px-6">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="{{ asset('images/logo_NA.png') }}" style="height:50px;" alt="شعار محلات النجوم">
                <span class="text-white text-xl font-bold mr-2">محلات النجوم</span>
            </a>
            <a href="{{ route('home') }}" class="text-gray-300 hover:text-white">
                <i class="fas fa-home ml-2"></i> العودة للرئيسية
            </a>
        </div>
    </nav>

    <!-- قسم إنشاء الحساب -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    إنشاء حساب جديد
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    لديك حساب بالفعل؟ <a href="{{ route('login') }}" class="font-medium text-orange-600 hover:text-orange-500">
                        تسجيل الدخول
                    </a>
                </p>
            </div>

            <div class="auth-card bg-white py-8 px-6 shadow rounded-lg">
                <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-6">
                    @csrf

                    <!-- الاسم الكامل -->
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">الاسم الكامل</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                <input id="name" name="name" type="text" autocomplete="name" required 
                                       class="appearance-none relative block w-full px-3 py-3 pr-10 border border-gray-300 
                                              placeholder-gray-500 text-gray-900 rounded-md input-focus
                                              focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
                                       placeholder="أدخل اسمك بالكامل" value="{{ old('name') }}">
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600 text-sm" />
                        </div>
                    </div>

                    <!-- البريد الإلكتروني -->
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div class="mt-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">البريد الإلكتروني</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input id="email" name="email" type="email" autocomplete="email" required 
                                       class="appearance-none relative block w-full px-3 py-3 pr-10 border border-gray-300 
                                              placeholder-gray-500 text-gray-900 rounded-md input-focus
                                              focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
                                       placeholder="example@example.com" value="{{ old('email') }}">
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 text-sm" />
                        </div>
                    </div>

                    <!-- كلمة المرور -->
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div class="mt-4">
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">كلمة المرور</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input id="password" name="password" type="password" autocomplete="new-password" required 
                                       class="appearance-none relative block w-full px-3 py-3 pr-10 border border-gray-300 
                                              placeholder-gray-500 text-gray-900 rounded-md input-focus
                                              focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
                                       placeholder="••••••••">
                            </div>
                            <p class="mt-1 text-xs text-gray-500">يجب أن تكون كلمة المرور 8 أحرف على الأقل</p>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 text-sm" />
                        </div>
                    </div>

                    <!-- تأكيد كلمة المرور -->
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div class="mt-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">تأكيد كلمة المرور</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input id="password_confirmation" name="password_confirmation" type="password" 
                                       autocomplete="new-password" required 
                                       class="appearance-none relative block w-full px-3 py-3 pr-10 border border-gray-300 
                                              placeholder-gray-500 text-gray-900 rounded-md input-focus
                                              focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
                                       placeholder="••••••••">
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600 text-sm" />
                        </div>
                    </div>

                    <!-- شروط الخدمة -->
                    <div class="flex items-start mt-4">
                        <div class="flex items-center h-5">
                            <input id="terms" name="terms" type="checkbox" 
                                   class="focus:ring-orange-500 h-4 w-4 text-orange-600 border-gray-300 rounded" required>
                        </div>
                        <div class="mr-3 text-sm">
                            <label for="terms" class="font-medium text-gray-700">
                                أوافق على <a href="#" class="text-orange-600 hover:text-orange-500">شروط الخدمة</a> 
                                و <a href="#" class="text-orange-600 hover:text-orange-500">سياسة الخصوصية</a>
                            </label>
                        </div>
                    </div>

                    <!-- زر التسجيل -->
                    <div class="mt-6">
                        <button type="submit" 
                                class="group relative w-full flex justify-center py-3 px-4 border border-transparent 
                                       text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 
                                       focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500
                                       transition duration-300 shadow-lg">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <i class="fas fa-user-plus text-orange-300 group-hover:text-orange-200"></i>
                            </span>
                            إنشاء حساب جديد
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- الفوتر -->
    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p class="text-gray-400">&copy; 2025 محلات النجوم. جميع الحقوق محفوظة</p>
            <div class="flex justify-center space-x-6 mt-4 space-x-reverse">
                <a href="#" class="text-gray-400 hover:text-white">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-white">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-white">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-white">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>
    </footer>
</body>
</html>