@extends('layouts.app')

@section('title', 'الصفحة الرئيسية')

@section('content')
    <!-- الجزء السفلي مع العنوان والزر -->
    <div class="flex flex-col md:flex-row items-center justify-center mt-8 px-4 md:px-12">
        <div class="md:w-3/4 text-center">
            <h1 class="text-2xl md:text-4xl font-bold mb-6 leading-snug" style="color: #111828;">
                محلات النجوم لتعهد الحفلات وزينة سيارات الأفراح<br>احجز فرحتك الآن!
            </h1>

            <p class="mb-8 text-lg md:text-xl leading-relaxed" style="color: #111828;">
                محلات النجوم لتعهد الحفلات وزينة سيارات الأفراح هي وجهتك المثالية لكل ما يخص تجهيز مناسباتك بأناقة وتميّز.
            </p>

        </div>
    </div>

    <div class="flex justify-center mt-1 px-2 md:px-12 pb-8">
        <a href="#"
            class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-md text-lg font-semibold transition duration-300 inline-flex items-center">
            <i class="fas fa-arrow-right ml-2"></i> احجز الآن
        </a>
    </div>
    <!-- ========== قسم زينة السيارات ========== -->
    <section class="container mx-auto px-4 mt-12 mb-16 relative">
        <div class="flex items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800 flex-grow text-center">زينة السيارات</h2>
            <a href="{{ route('cars') }}" class="text-blue-600 hover:text-blue-700 font-medium flex items-center ml-4">
                عرض الكل
                <i class="fas fa-arrow-left mr-2"></i>
            </a>
        </div>

        <div class="relative">
            <div class="horizontal-scroll space-x-4 pb-6 space-x-reverse" id="cars-scroll">
                @forelse($featuredProducts as $product)
                    <a href="{{ route('products', $product->id) }}" class="block"> <!-- إضافة رابط حول البطاقة -->
                        <div
                            class="product-card w-64 flex-shrink-0 bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="w-full h-40 object-cover">
                            @else
                                <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-400">
                                    لا توجد صورة
                                </div>
                            @endif

                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $product->name }}</h3>

                                @if ($product->relationLoaded('category'))
                                    <p class="text-sm text-gray-500 mb-1">{{ $product->category->name }}</p>
                                @endif

                                <p class="text-blue-600 font-bold mb-2">ر.س {{ number_format($product->price, 2) }}</p>

                                <p class="text-sm text-gray-600 mb-4">{{ Str::limit($product->description, 60) }}</p>

                                <button
                                    class="w-full bg-blue-600 hover:bg-blue-900 text-white py-2 rounded-md transition duration-300 flex items-center justify-center">
                                    <i class="fas fa-calendar-check mr-1"></i> احجز الآن
                                </button>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="w-full text-center py-8 col-span-4">
                        <p class="text-gray-500">لا توجد منتجات متاحة حالياً</p>
                    </div>
                @endforelse

                <!-- بطاقة عرض المزيد -->
                <div class="w-64 flex-shrink-0 flex items-center justify-center bg-gray-50 rounded-xl">
                    <a href="{{ route('cars') }}" class="text-center p-6">
                        <div class="text-blue-600 mb-2">
                            <i class="fas fa-arrow-circle-left text-4xl"></i>
                        </div>
                        <h3 class="font-semibold text-lg">عرض المزيد</h3>
                        <p class="text-gray-500 text-sm">من منتجات زينة السيارات</p>
                    </a>
                </div>
            </div>

            <button onclick="scrollHorizontal('cars-scroll', 'left')" class="scroll-button left hidden md:flex">
                <i class="fas fa-chevron-left text-gray-600"></i>
            </button>

            <button onclick="scrollHorizontal('cars-scroll', 'right')" class="scroll-button right hidden md:flex">
                <i class="fas fa-chevron-right text-gray-600"></i>
            </button>
        </div>
    </section>
    <!-- ========== قسم كوش الأفراح ========== -->
    <section class="container mx-auto px-4 mt-12 mb-16 relative">
        <div class="flex items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800 flex-grow text-center">كوش الأفراح</h2>
            <a href="{{ route('wedding') }}" class="text-blue-600 hover:text-blue-700 font-medium flex items-center ml-4">
                عرض الكل
                <i class="fas fa-arrow-left mr-2"></i>
            </a>
        </div>

        <div class="relative">
            <div class="horizontal-scroll space-x-4 pb-6 space-x-reverse" id="wedding-scroll">
                @forelse($latestProducts as $product)
                    <a href="{{ route('products', ['id' => $product->id]) }}" class="block">
                        <!-- إضافة رابط حول البطاقة -->
                        <div
                            class="product-card w-64 flex-shrink-0 bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="w-full h-40 object-cover">
                            @else
                                <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-400">
                                    لا توجد صورة
                                </div>
                            @endif

                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $product->name }}</h3>

                                @if ($product->relationLoaded('category'))
                                    <p class="text-sm text-gray-500 mb-1">{{ $product->category->name }}</p>
                                @endif

                                <div class="flex text-yellow-400 mb-2 text-sm">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= ($product->rating ?? 0))
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>

                                <p class="text-orange-600 font-bold mb-2">ر.س {{ number_format($product->price, 2) }}</p>

                                <div
                                    class="w-full bg-orange-500 hover:bg-orange-600 text-white py-2 rounded-md transition duration-300 text-center">
                                    <i class="fas fa-cart-plus mr-1"></i> احجز الان
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="w-full text-center py-8 col-span-4">
                        <p class="text-gray-500">لا توجد منتجات متاحة حالياً</p>
                    </div>
                @endforelse

                <!-- بطاقة عرض المزيد -->
                <div class="w-64 flex-shrink-0 flex items-center justify-center bg-gray-50 rounded-xl">
                    <a href="{{ route('wedding') }}" class="text-center p-6">
                        <div class="text-orange-600 mb-2">
                            <i class="fas fa-arrow-circle-left text-4xl"></i>
                        </div>
                        <h3 class="font-semibold text-lg">عرض المزيد</h3>
                        <p class="text-gray-500 text-sm">من منتجات كوش الأفراح</p>
                    </a>
                </div>
            </div>

            <button onclick="scrollHorizontal('wedding-scroll', 'right')" class="scroll-button right hidden md:flex">
                <i class="fas fa-chevron-right text-gray-600"></i>
            </button>

            <button onclick="scrollHorizontal('wedding-scroll', 'left')" class="scroll-button left hidden md:flex">
                <i class="fas fa-chevron-left text-gray-600"></i>
            </button>
        </div>
    </section>
    <!--قسم المطبوعات -->
    <section class="container mx-auto px-4 mt-12 mb-16 relative">
        <div class="flex items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800 flex-grow text-center">المطبوعات</h2>
            <a href="{{ route('wedding') }}" class="text-blue-600 hover:text-blue-700 font-medium flex items-center ml-4">
                عرض الكل
                <i class="fas fa-arrow-left mr-2"></i>
            </a>
        </div>

        <div class="relative">
            <div class="horizontal-scroll space-x-4 pb-6 space-x-reverse" id="prints-scroll">
                @forelse($mtProducts as $product)
                    <a href="{{ route('products', ['id' => $product->id]) }}" class="block">
                        <!-- إضافة رابط حول البطاقة -->
                        <div
                            class="product-card w-64 flex-shrink-0 bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="w-full h-40 object-cover">
                            @else
                                <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-400">
                                    لا توجد صورة
                                </div>
                            @endif

                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $product->name }}</h3>

                                @if ($product->relationLoaded('category'))
                                    <p class="text-sm text-gray-500 mb-1">{{ $product->category->name }}</p>
                                @endif

                                <div class="flex text-yellow-400 mb-2 text-sm">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= ($product->rating ?? 0))
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>

                                <p class="text-blue-600 font-bold mb-2">ر.س {{ number_format($product->price, 2) }}</p>

                                <div
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-md transition duration-300 text-center">
                                    <i class="fas fa-cart-plus mr-1"></i> احجز الان
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="w-full text-center py-8 col-span-4">
                        <p class="text-gray-500">لا توجد منتجات متاحة حالياً</p>
                    </div>
                @endforelse

                <!-- بطاقة عرض المزيد -->
                <div class="w-64 flex-shrink-0 flex items-center justify-center bg-gray-50 rounded-xl">
                    <a href="{{ route('cars') }}" class="text-center p-6">
                        <div class="text-blue-600 mb-2">
                            <i class="fas fa-arrow-circle-left text-4xl"></i>
                        </div>
                        <h3 class="font-semibold text-lg">عرض المزيد</h3>
                        <p class="text-gray-500 text-sm">من منتجات المطبوعات</p>
                    </a>
                </div>
            </div>

            <button onclick="scrollHorizontal('prints-scroll', 'right')" class="scroll-button right hidden md:flex">
                <i class="fas fa-chevron-right text-gray-600"></i>
            </button>

            <button onclick="scrollHorizontal('prints-scroll', 'left')" class="scroll-button left hidden md:flex">
                <i class="fas fa-chevron-left text-gray-600"></i>
            </button>
        </div>
    </section>

    <!-- ==========قسم الورود والهدايا ========== -->
    <section class="container mx-auto px-4 mt-12 mb-16 relative">
        <div class="flex items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800 flex-grow text-center">قسم الورود والهدايا</h2>
            <a href="{{ route('flower') }}" class="text-pink-600 hover:text-pink-700 font-medium flex items-center ml-4">
                عرض الكل
                <i class="fas fa-arrow-left mr-2"></i>
            </a>
        </div>

        @if ($flowerProducts->count() > 0)
            <div class="relative">
                <div class="horizontal-scroll space-x-4 pb-6 space-x-reverse" id="flower-scroll">
                    @foreach ($flowerProducts as $product)
                        <a href="{{ route('products', ['id' => $product->id]) }}" class="block">
                            <div
                                class="product-card w-64 flex-shrink-0 bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="w-full h-40 object-cover hover:scale-105 transition-transform duration-300">
                                @else
                                    <div class="w-full h-40 bg-gray-100 flex items-center justify-center text-gray-400">
                                        <i class="fas fa-image text-3xl"></i>
                                    </div>
                                @endif

                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $product->name }}</h3>

                                    @if ($product->relationLoaded('category'))
                                        <p class="text-sm text-gray-500 mb-1">{{ $product->category->name }}</p>
                                    @endif

                                    <div class="flex items-center justify-between mt-2">
                                        <p class="text-pink-600 font-bold">ر.س {{ number_format($product->price, 2) }}</p>
                                        @if ($product->discount)
                                            <span class="text-xs bg-pink-100 text-pink-800 px-2 py-1 rounded-full">
                                                خصم {{ $product->discount }}%
                                            </span>
                                        @endif
                                    </div>

                                    <p class="text-sm text-gray-600 my-3 line-clamp-2">{{ $product->description }}</p>

                                    <button wire:click.prevent="addToCart({{ $product->id }})"
                                        class="w-full bg-pink-600 hover:bg-pink-700 text-white py-2 rounded-md transition duration-300 flex items-center justify-center">
                                        <i class="fas fa-cart-plus ml-2"></i>
                                        احجز الان
                                    </button>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- زر التمرير للجانبين -->
                <button onclick="scrollHorizontal('flower-scroll', 'right')" class="scroll-button right hidden md:flex">
                    <i class="fas fa-chevron-right text-gray-600"></i>
                </button>

                <button onclick="scrollHorizontal('flower-scroll', 'left')" class="scroll-button left hidden md:flex">
                    <i class="fas fa-chevron-left text-gray-600"></i>
                </button>
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $flowerProducts->links() }}
            </div>
        @else
            <div class="bg-gray-50 rounded-xl p-8 text-center">
                <i class="fas fa-gift text-4xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg">لا توجد منتجات متاحة في هذا القسم حالياً</p>
                <a href="{{ route('home') }}" class="text-pink-600 hover:text-pink-700 mt-4 inline-block">
                    العودة للرئيسية
                </a>
            </div>
        @endif
    </section>
    <!-- ========== قسم العروض ========== -->
    @foreach ($offers as $offer)
        <section class="offer-section mt-16 py-12">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row items-center md:flex-row-reverse gap-8">
                    <!-- قسم الصورة مع تحكم في الحجم -->
                    <div class="md:w-1/2 mb-8 md:mb-0 flex justify-center">
                        <img src="{{ asset('storage/' . $offer->image) }}" alt="{{ $offer->title }}"
                            class="w-full max-w-md h-auto object-cover rounded-lg shadow-lg" style="max-height: 400px;">
                    </div>

                    <!-- قسم المحتوى -->
                    <div class="md:w-1/2 text-center md:text-right space-y-4">
                        <p class="text-white text-lg md:text-xl mb-2">{{ $offer->title }}</p>
                        <h1 class="text-3xl md:text-4xl font-bold text-white mb-4 md:mb-6">{{ $offer->description }}</h1>
                        <p class="text-white text-lg md:text-xl mb-4 md:mb-6">السعر: {{ number_format($offer->price, 2) }}
                            ريال</p>
                        <a href="{{ route('products', ['id' => $offer->id]) }}"
                            class="bg-white text-orange-600 hover:bg-gray-100 px-6 py-3 rounded-md font-medium transition duration-300 inline-flex items-center">
                            <i class="fas fa-arrow-left mr-2"></i> اشتر الآن
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endsection
