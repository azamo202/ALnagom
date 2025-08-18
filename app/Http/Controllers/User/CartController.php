<?php
namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    // عرض محتويات السلة
    public function index()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        
        return response()->json([
            'success' => true,
            'cart' => $cartItems
        ]);
         $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
    
    // حساب الإجمالي
    $total = $cartItems->sum(function ($item) {
        return $item->product->price * $item->quantity;
    });

    return response()->json([
        'success' => true,
        'cart' => $cartItems,
        'total' => $total // إضافة الإجمالي هنا
    ]);
    }

    // إضافة منتج للسلة
    public function store(Request $request, Product $product)
    {
        $request->validate(['quantity' => 'sometimes|integer|min:1']);

        $cartItem = Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $product->id],
            ['quantity' => $request->quantity ?? 1]
        );

        return response()->json([
            'success' => true,
            'message' => 'تمت إضافة المنتج إلى السلة',
            'cart_item' => $cartItem
        ], 201);
    }

    // حذف منتج من السلة
    public function destroy(Cart $cartItem)
    {
        $cartItem->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'تم حذف المنتج من السلة'
        ]);
    }
}