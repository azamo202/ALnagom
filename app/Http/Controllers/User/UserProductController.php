<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
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
     * عرض تفاصيل منتج معين
     */
    public function show(Product $product): JsonResponse
    {
        return response()->json([
            'success' => true,
            'product' => $product->load('category'),
        ]);
    }

    /**
     * عرض المنتجات للصفحة الرئيسية
     */
    public function homepage()
    {
        $products = Product::with('category')
                          ->where('stock', '>', 0)
                          ->latest()
                          ->take(8)
                          ->get();

        return view('home', compact('products'));
    }

    /**
     * عرض منتجات زينة السيارات
     */
 
}