<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التحقق من البريد الإلكتروني | محلات النجوم</title>
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
        .auth-card {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-radius: 0.75rem;
        }
        .verification-badge {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
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
            <div class="flex space-x-4 space-x-reverse">
                <a href="{{ route('home') }}" class="text-gray-300 hover:text-white">
                    <i class="fas fa-home ml-2"></i> الرئيسية
                </a>
                <a href="{{ route('login') }}" class="text-gray-300 hover:text-white">
                    <i class="fas fa-sign-in-alt ml-2"></i> تسجيل الدخول
                </a>
            </div>
        </div>
    </nav>

    <!-- قسم التحقق من البريد الإلكتروني -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <div class="verification-badge inline-flex items-center px-4 py-2 rounded-full text-white mb-4">
                    <i class="fas fa-envelope-open-text ml-2"></i>
                    <span>التحقق من البريد</span>
                </div>
                <h2 class="text-3xl font-extrabold text-gray-900">
                    التحقق من بريدك الإلكتروني
                </h2>
            </div>

            <div class="auth-card bg-white py-8 px-6 shadow rounded-lg">
                <!-- الرسالة الرئيسية -->
                <div class="mb-6 text-sm text-gray-600 bg-blue-50 p-4 rounded-lg border border-blue-100">
                    <i class="fas fa-info-circle text-blue-500 ml-2"></i>
                    شكراً لتسجيلك! قبل البدء، يرجى التحقق من بريدك الإلكتروني بالنقر على الرابط الذي أرسلناه لك.
                </div>

                <!-- حالة إعادة الإرسال -->
                @if (session('status') == 'verification-link-sent')
                    <div class="mb-6 text-sm text-green-600 bg-green-50 p-4 rounded-lg border border-green-100">
                        <i class="fas fa-check-circle text-green-500 ml-2"></i>
                        تم إرسال رابط تحقق جديد إلى عنوان البريد الإلكتروني الذي قدمته أثناء التسجيل.
                    </div>
                @endif

                <!-- زر إعادة الإرسال -->
                <form method="POST" action="{{ route('verification.send') }}" class="mb-6">
                    @csrf
                    <button type="submit" 
                            class="w-full flex justify-center py-3 px-4 border border-transparent 
                                   text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 
                                   focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500
                                   transition duration-300 shadow-lg">
                        <i class="fas fa-paper-plane ml-2"></i>
                        إعادة إرسال بريد التحقق
                    </button>
                </form>

                <!-- زر تسجيل الخروج -->
                <form method="POST" action="{{ route('logout') }}" class="text-center">
                    @csrf
                    <button type="submit" 
                            class="text-orange-600 hover:text-orange-500 font-medium 
                                   transition duration-300">
                        <i class="fas fa-sign-out-alt ml-2"></i>
                        تسجيل الخروج
                    </button>
                </form>

                <!-- نصائح إضافية -->
                <div class="mt-6 pt-6 border-t border-gray-200 text-sm text-gray-500">
                    <p class="mb-2"><i class="fas fa-lightbulb text-yellow-500 ml-2"></i> لم تصلك الرسالة؟</p>
                    <ul class="list-disc pr-5 space-y-1">
                        <li>تحقق من مجلد الرسائل غير المرغوب فيها (Spam)</li>
                        <li>تأكد من صحة عنوان البريد الإلكتروني</li>
                        <li>انتظر بضع دقائق فقد تتأخر الرسالة أحياناً</li>
                    </ul>
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