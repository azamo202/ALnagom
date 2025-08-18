<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>استعادة كلمة المرور | محلات النجوم</title>
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

    <!-- قسم استعادة كلمة المرور -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    استعادة كلمة المرور
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    <a href="{{ route('login') }}" class="font-medium text-orange-600 hover:text-orange-500">
                        العودة لتسجيل الدخول
                    </a>
                </p>
            </div>

            <!-- رسالة توضيحية -->
            <div class="mb-4 text-sm text-gray-600 bg-blue-50 p-4 rounded-lg border border-blue-100">
                <i class="fas fa-info-circle text-blue-500 ml-2"></i>
                نسيت كلمة المرور؟ لا مشكلة. أخبرنا بريدك الإلكتروني وسنرسل لك رابطًا لإنشاء كلمة مرور جديدة.
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 p-4 bg-green-50 text-green-700 rounded-lg border border-green-100" :status="session('status')" />

            <div class="auth-card bg-white py-8 px-6 shadow rounded-lg">
                <form method="POST" action="{{ route('password.email') }}" class="mt-8 space-y-6">
                    @csrf

                    <!-- البريد الإلكتروني -->
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">البريد الإلكتروني</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input id="email" name="email" type="email" required 
                                       class="appearance-none relative block w-full px-3 py-3 pr-10 border border-gray-300 
                                              placeholder-gray-500 text-gray-900 rounded-md input-focus
                                              focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
                                       placeholder="example@example.com" value="{{ old('email') }}">
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 text-sm" />
                        </div>
                    </div>

                    <!-- زر إرسال رابط الاستعادة -->
                    <div class="mt-6">
                        <button type="submit" 
                                class="group relative w-full flex justify-center py-3 px-4 border border-transparent 
                                       text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 
                                       focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500
                                       transition duration-300 shadow-lg">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <i class="fas fa-paper-plane text-orange-300 group-hover:text-orange-200"></i>
                            </span>
                            إرسال رابط الاستعادة
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- رسالة مساعدة -->
            <div class="mt-6 text-center text-sm text-gray-500">
                <p>إذا واجهتك مشكلة في استعادة كلمة المرور، يرجى <a href="#" class="text-orange-600 hover:text-orange-500">الاتصال بنا</a></p>
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