<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

        // 1. إنشاء الطلب
        $order = Order::create([
            'user_id' => $user->id,
            'total' => $this->calculateTotal($cartItems),
            'payment_method' => $request->payment_method,
            'status' => 'pending'
        ]);

        // 2. نقل العناصر من السلة إلى الطلب
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price
            ]);
        }

        // 3. تفريغ السلة
        Cart::where('user_id', $user->id)->delete();

        return response()->json([
            'success' => true,
            'order' => $order->load('items')
        ], 201);
    }

    private function calculateTotal($cartItems)
    {
        return $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
    }
}
