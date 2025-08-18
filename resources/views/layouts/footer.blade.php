<footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <img src="{{ asset('images/logo_NA.png') }}" class="h-16 mb-4" alt="شعار المحل">
                <p class="text-gray-400">متخصصون في تجهيز حفلات الأفراح وزينة السيارات منذ عام 2020</p>
            </div>
            
            <div>
                <h3 class="text-xl font-bold mb-4">روابط سريعة</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home')}}" class="text-gray-400 hover:text-orange-400">الرئيسية</a></li>
                    <li><a href="{{ route('zain')}}" class="text-gray-400 hover:text-orange-400">منتجاتنا</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-orange-400">عروض خاصة</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-orange-400">اتصل بنا</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-xl font-bold mb-4">تواصل معنا</h3>
                <div class="flex space-x-4 space-x-reverse">
                    <a href="#" class="text-gray-400 hover:text-blue-400 text-xl"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-gray-400 hover:text-pink-500 text-xl"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 text-xl"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-red-500 text-xl"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        
        <hr class="border-gray-700 my-8">
        <p class="text-center text-gray-500">&copy; 2025 محلات النجوم. جميع الحقوق محفوظة</p>
    </div>
</footer>