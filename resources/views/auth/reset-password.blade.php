<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إعادة تعيين كلمة المرور | محلات النجوم</title>
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
        .input-focus:focus {
            border-color: #f97316;
            box-shadow: 0 0 0 2px rgba(249, 115, 22, 0.2);
        }
        .password-strength {
            height: 4px;
            transition: all 0.3s ease;
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
            <a href="{{ route('login') }}" class="text-gray-300 hover:text-white">
                <i class="fas fa-sign-in-alt ml-2"></i> تسجيل الدخول
            </a>
        </div>
    </nav>

    <!-- قسم إعادة تعيين كلمة المرور -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">
                    تعيين كلمة مرور جديدة
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    أدخل كلمة المرور الجديدة لحسابك
                </p>
            </div>

            <div class="auth-card bg-white py-8 px-6 shadow rounded-lg">
                <form method="POST" action="{{ route('password.store') }}" class="mt-8 space-y-6" id="resetForm">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- البريد الإلكتروني -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">البريد الإلكتروني</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input id="email" name="email" type="email" 
                                   class="input-focus appearance-none relative block w-full px-3 py-3 pr-10 border border-gray-300 
                                          placeholder-gray-500 text-gray-900 rounded-md focus:outline-none 
                                          focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
                                   placeholder="example@example.com" 
                                   value="{{ old('email', $request->email) }}" 
                                   required autofocus>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-600 text-sm" />
                    </div>

                    <!-- كلمة المرور الجديدة -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-gray-700">كلمة المرور الجديدة</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password" name="password" type="password" 
                                   class="input-focus appearance-none relative block w-full px-3 py-3 pr-10 border border-gray-300 
                                          placeholder-gray-500 text-gray-900 rounded-md focus:outline-none 
                                          focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
                                   placeholder="كلمة المرور الجديدة" 
                                   required
                                   oninput="checkPasswordStrength(this.value)">
                        </div>
                        <div class="flex mt-1 space-x-1">
                            <div id="strength-1" class="password-strength w-1/4 bg-gray-200 rounded"></div>
                            <div id="strength-2" class="password-strength w-1/4 bg-gray-200 rounded"></div>
                            <div id="strength-3" class="password-strength w-1/4 bg-gray-200 rounded"></div>
                            <div id="strength-4" class="password-strength w-1/4 bg-gray-200 rounded"></div>
                        </div>
                        <p id="password-help" class="text-xs text-gray-500 mt-1">
                            يجب أن تحتوي كلمة المرور على 8 أحرف على الأقل
                        </p>
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-600 text-sm" />
                    </div>

                    <!-- تأكيد كلمة المرور -->
                    <div class="space-y-2">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">تأكيد كلمة المرور</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password_confirmation" name="password_confirmation" type="password" 
                                   class="input-focus appearance-none relative block w-full px-3 py-3 pr-10 border border-gray-300 
                                          placeholder-gray-500 text-gray-900 rounded-md focus:outline-none 
                                          focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
                                   placeholder="تأكيد كلمة المرور الجديدة" 
                                   required>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-600 text-sm" />
                    </div>

                    <!-- زر إعادة التعيين -->
                    <div class="mt-6">
                        <button type="submit" 
                                class="group relative w-full flex justify-center py-3 px-4 border border-transparent 
                                       text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 
                                       focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500
                                       transition duration-300 shadow-lg">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <i class="fas fa-sync-alt text-orange-300 group-hover:text-orange-200"></i>
                            </span>
                            تعيين كلمة المرور
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

    <script>
        function checkPasswordStrength(password) {
            const strengthBars = [
                document.getElementById('strength-1'),
                document.getElementById('strength-2'),
                document.getElementById('strength-3'),
                document.getElementById('strength-4')
            ];
            
            // Reset all bars
            strengthBars.forEach(bar => {
                bar.style.backgroundColor = '#e5e7eb';
            });
            
            // Check password strength
            let strength = 0;
            if (password.length > 0) strength++;
            if (password.length >= 8) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/\d/.test(password) || /[^A-Za-z0-9]/.test(password)) strength++;
            
            // Update bars
            const colors = ['#ef4444', '#f97316', '#f59e0b', '#10b981'];
            for (let i = 0; i < strength; i++) {
                strengthBars[i].style.backgroundColor = colors[i];
            }
            
            // Update help text
            const helpText = document.getElementById('password-help');
            if (password.length > 0 && password.length < 8) {
                helpText.textContent = 'كلمة المرور قصيرة جداً (8 أحرف على الأقل)';
                helpText.className = 'text-xs text-red-500 mt-1';
            } else if (password.length >= 8 && strength < 3) {
                helpText.textContent = 'كلمة المرور مقبولة ولكن يمكن تحسينها بإضافة أحرف كبيرة أو أرقام';
                helpText.className = 'text-xs text-yellow-500 mt-1';
            } else if (strength >= 3) {
                helpText.textContent = 'كلمة المرور قوية';
                helpText.className = 'text-xs text-green-500 mt-1';
            } else {
                helpText.textContent = 'يجب أن تحتوي كلمة المرور على 8 أحرف على الأقل';
                helpText.className = 'text-xs text-gray-500 mt-1';
            }
        }
    </script>
</body>
</html>