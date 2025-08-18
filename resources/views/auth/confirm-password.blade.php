<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تأكيد كلمة المرور | محلات النجوم</title>
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
        .security-badge {
            background: linear-gradient(to right, #4f46e5, #7c3aed);
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

    <!-- قسم تأكيد كلمة المرور -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <div class="security-badge inline-flex items-center px-4 py-2 rounded-full text-white mb-4">
                    <i class="fas fa-shield-alt ml-2"></i>
                    <span>منطقة آمنة</span>
                </div>
                <h2 class="mt-2 text-3xl font-extrabold text-gray-900">
                    تأكيد كلمة المرور
                </h2>
            </div>

            <!-- رسالة توضيحية -->
            <div class="mb-4 text-sm text-gray-600 bg-blue-50 p-4 rounded-lg border border-blue-100 text-center">
                <i class="fas fa-lock text-blue-500 ml-2"></i>
                هذه منطقة آمنة من التطبيق. يرجى تأكيد كلمة المرور قبل المتابعة.
            </div>

            <div class="auth-card bg-white py-8 px-6 shadow rounded-lg">
                <form method="POST" action="{{ route('password.confirm') }}" class="mt-8 space-y-6">
                    @csrf

                    <!-- كلمة المرور -->
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">كلمة المرور</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <i class="fas fa-key text-gray-400"></i>
                                </div>
                                <input id="password" name="password" type="password" required 
                                       autocomplete="current-password"
                                       class="appearance-none relative block w-full px-3 py-3 pr-10 border border-gray-300 
                                              placeholder-gray-500 text-gray-900 rounded-md input-focus
                                              focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
                                       placeholder="أدخل كلمة المرور الحالية">
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 text-sm" />
                        </div>
                    </div>

                    <!-- زر التأكيد -->
                    <div class="mt-6">
                        <button type="submit" 
                                class="group relative w-full flex justify-center py-3 px-4 border border-transparent 
                                       text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 
                                       focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500
                                       transition duration-300 shadow-lg">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <i class="fas fa-check-circle text-orange-300 group-hover:text-orange-200"></i>
                            </span>
                            تأكيد كلمة المرور
                        </button>
                    </div>
                </form>
                
                <!-- رابط استعادة كلمة المرور -->
                <div class="mt-4 text-center text-sm">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-orange-600 hover:text-orange-500 font-medium">
                            <i class="fas fa-question-circle ml-2"></i>
                            نسيت كلمة المرور؟
                        </a>
                    @endif
                </div>
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