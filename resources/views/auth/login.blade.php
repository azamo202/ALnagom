<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول | محلات النجوم</title>
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

    <!-- قسم تسجيل الدخول -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    تسجيل الدخول إلى حسابك
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    أو <a href="{{ route('register') }}" class="font-medium text-orange-600 hover:text-orange-500">
                        إنشاء حساب جديد
                    </a>
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="auth-card bg-white py-8 px-6 shadow rounded-lg">
                <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
                    @csrf

                    <!-- البريد الإلكتروني -->
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">البريد الإلكتروني</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input id="email" name="email" type="email" autocomplete="email" required 
                                       class="appearance-none relative block w-full px-3 py-3 pr-10 border border-gray-300 
                                              placeholder-gray-500 text-gray-900 rounded-md focus:outline-none 
                                              focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm"
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
                                <input id="password" name="password" type="password" autocomplete="current-password" required 
                                       class="appearance-none relative block w-full px-3 py-3 pr-10 border border-gray-300 
                                              placeholder-gray-500 text-gray-900 rounded-md focus:outline-none 
                                              focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm"
                                       placeholder="••••••••">
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 text-sm" />
                        </div>
                    </div>

                    <!-- تذكرني ونسيت كلمة المرور -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox" 
                                   class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
                            <label for="remember_me" class="mr-2 block text-sm text-gray-900">
                                تذكرني
                            </label>
                        </div>

                        <div class="text-sm">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="font-medium text-orange-600 hover:text-orange-500">
                                    نسيت كلمة المرور؟
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- زر تسجيل الدخول -->
                    <div>
                        <button type="submit" 
                                class="group relative w-full flex justify-center py-3 px-4 border border-transparent 
                                       text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 
                                       focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500
                                       transition duration-300">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <i class="fas fa-sign-in-alt text-orange-300 group-hover:text-orange-200"></i>
                            </span>
                            تسجيل الدخول
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