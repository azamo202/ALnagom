<!-- قسم المنتجات -->
<section class="container mx-auto px-4 py-12">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800">المطبوعات</h2>
        <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">عرض الكل</a>
    </div>
    
    <!-- شبكة المنتجات -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($mtProducts as $product)
        <div class="product-card bg-white rounded-lg overflow-hidden shadow-md">
            <a href="{{ route('products', ['id' => $product->id]) }}" class="block">
                <!-- صورة المنتج -->
                <div class="h-48 overflow-hidden">
                    <img src="{{ $product->image ? asset('storage/'.$product->image) : asset('images/default-product.jpg') }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-full object-cover">
                </div>
                
                <!-- تفاصيل المنتج -->
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2 text-gray-800 truncate">{{ $product->name }}</h3>
                    
                    <!-- التقييم -->
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
                    
                    <!-- السعر -->
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-lg font-bold text-blue-600">{{ number_format($product->price, 2) }} ر.س</span>
                        <a href="{{ route('booking.form', ['productId' => $product->id]) }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm inline-block text-center">
                            <i class="fas fa-calendar-check mr-1"></i> احجز الآن
                        </a>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</section>