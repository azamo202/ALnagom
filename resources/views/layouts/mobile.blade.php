<!-- القائمة المنسدلة للجوال -->
<div id="mobileMenu" class="mobile-menu fixed inset-0 w-72 bg-[#111828] shadow-2xl z-40 top-0 right-0 overflow-y-auto">
    <div class="p-6">
        <div class="flex justify-between items-center mb-8">
            <img src="{{ asset('images/logo_NA.png') }}" style="height:50px;" alt="شعار المحل">
            <button id="closeMenu" class="text-white text-2xl">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <ul class="space-y-4">
            <li class="menu-item" style="--i: 1;">
                <a href="{{ route('home') }}" class="flex items-center text-white hover:text-orange-400 text-lg py-3 px-4 rounded-lg transition-all duration-300">
                    <i class="fas fa-home ml-3"></i>
                    الرئيسية
                </a>
            </li>
            <li class="menu-item" style="--i: 2;">
                <a href="{{ route('zain') }}" class="flex items-center text-white hover:text-orange-400 text-lg py-3 px-4 rounded-lg transition-all duration-300">
                    <i class="fas fa-car ml-3"></i>
                    زينة السيارات
                </a>
            </li>
            <li class="menu-item" style="--i: 3;">
                <a href="{{ route('wedding') }}" class="flex items-center text-white hover:text-orange-400 text-lg py-3 px-4 rounded-lg transition-all duration-300">
                    <i class="fas fa-heart ml-3"></i>
                    كوش الأفراح
                </a>
            </li>
            <li class="menu-item" style="--i: 4;">
                <a href="{{ route('printers') }}" class="flex items-center text-white hover:text-orange-400 text-lg py-3 px-4 rounded-lg transition-all duration-300">
                    <i class="fas fa-print ml-3"></i>
                    المطبوعات
                </a>
            </li>
            <li class="menu-item" style="--i: 5;">
                <a href="{{ route('flower') }}" class="flex items-center text-white hover:text-orange-400 text-lg py-3 px-4 rounded-lg transition-all duration-300">
                    <i class="fas fa-spa ml-3"></i>
                    الورود والهدايا
                </a>
            </li>
            <li class="menu-item" style="--i: 6;">
                <a href="{{ route('profile.edit') }}" class="flex items-center text-white hover:text-orange-400 text-lg py-3 px-4 rounded-lg transition-all duration-300">
                    <i class="fas fa-user-circle ml-3"></i>
                    حسابي
                </a>
            </li>
        </ul>
        
        <div class="mt-8 pt-6 border-t border-gray-700">
            <div class="flex space-x-4 space-x-reverse justify-center">
                <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- طبقة التعتيم -->
<div id="menuOverlay" class="menu-overlay fixed inset-0 bg-black bg-opacity-70 z-30"></div>