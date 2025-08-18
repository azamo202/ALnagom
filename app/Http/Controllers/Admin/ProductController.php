<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * عرض جميع المنتجات
     */
    public function index(): JsonResponse
    {
        $products = Product::with('category')->latest()->get();
        
        return response()->json([
            'success' => true,
            'products' => $products,
        ]);
    }

    /**
     * إنشاء منتج جديد
     */
    public function store(ProductStoreRequest $request): JsonResponse
    {
        $product = Product::create($request->validated());
        
        // رفع الصور هنا إذا كنت تدعمها
        return response()->json([
            'success' => true,
            'message' => 'تم إنشاء المنتج بنجاح.',
            'product' => $product,
        ], 201);
    }

    /**
     * تحديث المنتج
     */
    public function update( $request, Product $product): JsonResponse
    {
        $product->update($request->validated());
        
        return response()->json([
            'success' => true,
            'message' => 'تم تحديث المنتج بنجاح.',
        ]);
    }

    /**
     * حذف المنتج
     */
    public function destroy(Product $product): JsonResponse
    {
        $product->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'تم حذف المنتج بنجاح.',
        ]);
    }

    /**
     * عرض المنتجات بدون تسجيل دخول (لعرضها في التطبيق)
     */
    public function publicIndex(): JsonResponse
    {
        $products = Product::with('category')->latest()->get();

        return response()->json([
            'success' => true,
            'products' => $products->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'image' => asset('storage/' . $product->image), // تأكد أن حقل الصورة موجود
                    'category' => $product->category->name ?? null,
                    'rating' => $product->rating ?? 4.5,
                ];
            }),
        ]);
    }
}
