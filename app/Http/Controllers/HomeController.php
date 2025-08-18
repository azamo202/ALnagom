<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Offer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // المنتجات المميزة من تصنيف "زينة السيارات"
        $featuredProducts = Product::whereHas('category', function ($query) {
            $query->where('name', 'زينة سيارات');  
        })->latest()->take(10)->get();

        // أحدث المنتجات من تصنيف "كوش الأفراح"
        $latestProducts = Product::whereHas('category', function ($query) {
            $query->where('name', 'كوش الأفراح');
        })->latest()->take(10)->get();

        // منتجات "المطبوعات"
        $mtProducts = Product::whereHas('category', function ($query) {
            $query->where('name', 'المطبوعات');
        })->latest()->take(10)->get();

        // منتجات "الورود والهدايا" مع صفحة 50 لكل صفحة
        $flowerProducts = Product::whereHas('category', function ($query) {
            $query->where('name', 'الورود والهدايا');
        })->latest()->paginate(50);

        // عروض الصفحة الرئيسية
        $offers = Offer::latest()->get();

        // تمرير البيانات إلى الواجهة
        return view('home', [
            'featuredProducts' => $featuredProducts,
            'latestProducts' => $latestProducts,
            'mtProducts' => $mtProducts,
            'flowerProducts' => $flowerProducts,
            'offers' => $offers,
        ]);
    }
}
