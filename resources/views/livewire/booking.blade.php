<div>
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
        
        <!-- إضافة مكتبة Flatpickr للتقويم -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://npmcdn.com/flatpickr/dist/l10n/ar.js"></script>
        
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
            .flatpickr-input {
                background-color: white;
                padding: 0.75rem 1rem;
                border-radius: 0.5rem;
                border: 1px solid #e2e8f0;
                width: 100%;
            }
            .flatpickr-calendar {
                font-family: 'Tajawal', sans-serif;
            }
            /* أنماط النافذة المنبثقة */
            .modal {
                transition: all 0.3s ease;
            }
            .modal-box {
                max-width: 32rem;
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

        <!-- ========== محتوى صفحة الحجز ========== -->
        <div class="container mx-auto px-4 py-12">
            <div class="max-w-3xl mx-auto">
                <!-- بطاقة حجز المنتج -->
                <div class="booking-card bg-white rounded-xl p-8 mb-8">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">
                        <i class="fas fa-calendar-check text-orange-500 mr-2"></i>
                        حجز المنتج
                    </h2>
                    
                    <div class="flex flex-col md:flex-row items-center justify-between mb-8 bg-gray-50 p-4 rounded-lg">
                        <div class="text-center md:text-right mb-4 md:mb-0">
                            <h3 class="text-xl font-semibold text-gray-800">{{ $product->name }}</h3>
                            <p class="text-orange-600 font-bold text-lg">{{ $product->price }} ريال</p>
                        </div>
                        <div class="text-center md:text-left">
                            <p class="text-gray-600">المستخدم: <span class="font-medium">{{ auth()->user()->name }}</span></p>
                        </div>
                    </div>

                    <form wire:submit.prevent="save" class="space-y-6">
                        <!-- تاريخ البداية -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">تاريخ البداية</label>
                            <div class="relative">
                                <input type="text" wire:model="start_date" 
                                    id="start_date"
                                    class="flatpickr-input w-full px-4 py-3 rounded-lg bg-white text-gray-700 focus:outline-none"
                                    placeholder="اختر تاريخ البداية">
                            </div>
                            @error('start_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- تاريخ النهاية -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">تاريخ النهاية</label>
                            <div class="relative">
                                <input type="text" wire:model="end_date" 
                                    id="end_date"
                                    class="flatpickr-input w-full px-4 py-3 rounded-lg bg-white text-gray-700 focus:outline-none"
                                    placeholder="اختر تاريخ النهاية">
                            </div>
                            @error('end_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- طريقة الدفع -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">طريقة الدفع</label>
                            <div class="relative">
                                <select wire:model="payment_method"
                                        class="input-field w-full px-4 py-3 rounded-lg bg-white text-gray-700 focus:outline-none appearance-none">
                                    <option value="cash">نقدًا</option>
                                </select>
                                <i class="fas fa-chevron-down absolute left-4 top-4 text-gray-400"></i>
                            </div>
                            @error('payment_method') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- زر التأكيد -->
                       <!-- بدلاً من زر التأكيد الحالي -->
                        <div class="pt-4">
                            <a href="#" id="whatsappBooking" 
                            class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-4 px-6 rounded-lg transition duration-300 flex items-center justify-center">
                                <i class="fab fa-whatsapp ml-2"></i>
                                تأكيد الحجز عبر واتساب
                            </a>
                        </div>
                    </form>
                </div>
                
                <!-- زر العودة -->
                <div class="text-center">
                    <a href="{{ route('home') }}" 
                    class="inline-flex items-center text-orange-500 hover:text-orange-600 font-medium">
                        <i class="fas fa-arrow-right ml-2"></i>
                        العودة الى الرئيسية
                    </a>
                </div>
            </div>
        </div>

        <!-- نافذة منبثقة لتأكيد الحجز -->
        @if (session()->has('message'))
        <div x-data="{ showModal: true }" x-init="setTimeout(() => showModal = false, 3000)">
            <!-- الخلفية الشفافة -->
            <div x-show="showModal" 
                 class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 modal"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0">
                
                <!-- محتوى النافذة المنبثقة -->
                <div x-show="showModal"
                     class="bg-white rounded-xl shadow-xl p-6 w-full max-w-md modal-box"
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95">
                    
                    <div class="text-center">
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                            <i class="fas fa-check text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mt-3">تم تأكيد الحجز بنجاح!</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">{{ session('message') }}</p>
                        </div>
                        <div class="mt-4">
                            <button @click="showModal = false" type="button"
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-500 border border-transparent rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                موافق
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

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

        <!-- إضافة Alpine.js لإدارة النافذة المنبثقة -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // تهيئة التقويم لتاريخ البداية
                flatpickr("#start_date", {
                    locale: "ar",
                    minDate: "today",
                    dateFormat: "Y-m-d",
                    onChange: function(selectedDates, dateStr, instance) {
                        // عند تغيير تاريخ البداية، نقوم بتحديث الحد الأدنى لتاريخ النهاية
                        const endDatePicker = document.querySelector("#end_date")._flatpickr;
                        if (selectedDates.length > 0) {
                            const nextDay = new Date(selectedDates[0]);
                            nextDay.setDate(nextDay.getDate() + 1);
                            endDatePicker.set("minDate", nextDay);
                        }
                    }
                });

                // تهيئة التقويم لتاريخ النهاية
                flatpickr("#end_date", {
                    locale: "ar",
                    minDate: new Date().fp_incr(1), // غداً كحد أدنى
                    dateFormat: "Y-m-d",
                    onChange: function(selectedDates, dateStr, instance) {
                        // التحقق من أن تاريخ النهاية ليس قبل تاريخ البداية
                        const startDatePicker = document.querySelector("#start_date")._flatpickr;
                        const startDate = startDatePicker.selectedDates[0];
                        
                        if (startDate && selectedDates[0] && selectedDates[0] <= startDate) {
                            alert("تاريخ النهاية يجب أن يكون بعد تاريخ البداية");
                            instance.clear();
                        }
                    }
                });
            });

            // معالجة إكمال الحجز
            window.addEventListener('bookingCompleted', event => {
                // توجيه المستخدم إلى صفحة زينة السيارات بعد الحجز
                setTimeout(() => {
                    window.location.href = "{{ route('zain') }}";
                }, 3000); // الانتظار 3 ثواني قبل التوجيه
            });
        </script>
       <script>
    document.addEventListener('DOMContentLoaded', function() {
        const whatsappBtn = document.getElementById('whatsappBooking');
        
        whatsappBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // جمع بيانات الحجز
            const productName = "{{ $product->name }}";
            const productPrice = "{{ $product->price }}";
            const userName = "{{ auth()->user()->name }}";
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;
            const paymentMethod = document.querySelector('[wire\\:model="payment_method"]').value;
            const productLink = "{{ route('products', ['id' => $product->id]) }}"; // رابط المنتج
            
            // التحقق من البيانات المطلوبة
            if (!startDate || !endDate || !paymentMethod) {
                alert('الرجاء إدخال جميع بيانات الحجز المطلوبة');
                return;
            }
            
            // تنسيق الرسالة
            const message = `*طلب حجز جديد*\n\n`
                         + `📌 المنتج: ${productName}\n`
                         + `🔗 رابط المنتج: ${productLink}\n`
                         + `💰 السعر: ${productPrice} ر.س\n`
                         + `👤 اسم العميل: ${userName}\n`
                         + `📅 تاريخ البداية: ${startDate}\n`
                         + `📅 تاريخ النهاية: ${endDate}\n`
                         + `💳 طريقة الدفع: ${paymentMethod}\n\n`
                         + `شكراً لخدمتكم`;
            
            // ترميز الرسالة للرابط
            const encodedMessage = encodeURIComponent(message);
            
            // رقم واتساب الخاص بك
            const whatsappNumber = '+967771818880';
            
            // إنشاء رابط واتساب
            const whatsappUrl = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;
            
            // فتح الرابط في نافذة جديدة
            window.open(whatsappUrl, '_blank');
        });
    });
</script>
    </body>
    </html>
</div>