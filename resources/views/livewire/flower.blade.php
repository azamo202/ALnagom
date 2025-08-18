<!-- قسم المنتجات الرئيسي -->
<section class="container mx-auto px-4 py-12">
    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">الورود والهدايا</h2>
        <div class="flex items-center space-x-4 space-x-reverse">
            <a href="{{ route('home') }}" class="text-pink-600 hover:text-pink-700 font-medium flex items-center">
                <i class="fas fa-arrow-left ml-2"></i>
                العودة للرئيسية
            </a>
        </div>
    </div>

    @if($flowerProducts->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($flowerProducts as $product)
        <div class="product-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg">
            <a href="{{ route('products', ['id' => $product->id]) }}" class="block">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ $product->image ? asset('storage/'.$product->image) : asset('images/default-product.jpg') }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    @if($product->discount)
                    <span class="absolute top-2 left-2 bg-pink-600 text-white text-xs font-bold px-2 py-1 rounded-full">
                        خصم {{ $product->discount }}%
                    </span>
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2 text-gray-800 truncate">{{ $product->name }}</h3>
                    
                    @if($product->category)
                    <p class="text-sm text-gray-500 mb-2">{{ $product->category->name }}</p>
                    @endif

                    <div class="flex items-center mb-3">
                        <div class="flex text-yellow-400 text-sm">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= ($product->rating ?? 0))
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="text-gray-500 text-sm mr-2">({{ $product->reviews_count ?? 0 }})</span>
                    </div>

                    <div class="flex items-center justify-between mt-2">
                        <div>
                            @if($product->discount)
                            <span class="text-gray-400 line-through text-sm mr-2">{{ number_format($product->original_price, 2) }} ر.س</span>
                            @endif
                            <span class="text-lg font-bold text-pink-600">{{ number_format($product->price, 2) }} ر.س</span>
                        </div>
                        <a href="{{ route('booking.form', ['productId' => $product->id]) }}"
                           class="bg-pink-600 hover:bg-pink-700 text-white px-3 py-1 rounded text-sm flex items-center">
                            <i class="fas fa-calendar-check ml-1"></i>
                            <span>احجز الآن</span>
                        </a>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $flowerProducts->links() }}
    </div>
    @else
    <div class="bg-gray-50 rounded-xl p-12 text-center">
        <i class="fas fa-gift text-5xl text-gray-300 mb-6"></i>
        <h3 class="text-xl font-bold text-gray-600 mb-2">لا توجد منتجات متاحة حالياً</h3>
        <p class="text-gray-500 mb-6">نعتذر، لا توجد منتجات في قسم الورود والهدايا في الوقت الحالي</p>
        <a href="{{ route('home') }}" class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-2 rounded-md inline-flex items-center">
            <i class="fas fa-arrow-left ml-2"></i>
            العودة للرئيسية
        </a>
    </div>
    @endif
</section>