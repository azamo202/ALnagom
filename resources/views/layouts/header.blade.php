<header class="bg-[#111828] py-4">
    <div class="container mx-auto px-4">
        <!-- الجزء العلوي مع الشعار والقوائم -->
        <div class="flex justify-between items-center">
            <div class="logo">
                <img src="{{ asset('images/logo_NA.png') }}" style="height:60px;" alt="شعار المحل">
            </div>
            
            <nav class="hidden md:block">
                <ul class="flex space-x-8 space-x-reverse">
                    <li><a href="{{ route('home') }}" class="text-white hover:text-orange-400">الرئيسية</a></li>
                    <li><a href="{{ route('zain') }}" class="text-white hover:text-orange-400">زينة السيارات</a></li>
                    <li><a href="{{ route('wedding') }}" class="text-white hover:text-orange-400">كوش الأفراح</a></li>
                    <li><a href="{{ route('printers') }}" class="text-white hover:text-orange-400">المطبوعات</a></li>
                    <li><a href="{{ route('flower') }}" class="text-white hover:text-orange-400">الورود والهدايا</a></li>
                </ul>
            </nav>
            
            <div class="flex items-center space-x-4 space-x-reverse">
                <button id="hamburger" class="hamburger w-8 h-8 md:hidden text-white focus:outline-none">
                    <span class="block w-6 h-0.5 bg-white mb-1.5"></span>
                    <span class="block w-6 h-0.5 bg-white mb-1.5"></span>
                    <span class="block w-6 h-0.5 bg-white"></span>
                </button>
                <a href="{{ route('profile.edit') }}" class="hidden md:flex bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-md font-medium transition duration-300 items-center space-x-2">
                    <i class="fas fa-user-circle text-xl"></i>
                </a>
            </div>
        </div>


    </div>
</header>