<?php

use App\Models\Product;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create(Product $product)
    {
        return view('bookings.create', compact('product'));
    }

        public function store(Request $request, Product $product)
        {
            if (!Auth::check()) {
                return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً');
            }

            $validated = $request->validate([
                'start_date' => 'required|date|after_or_equal:today',
                'end_date' => 'required|date|after:start_date',
                'payment_method' => 'required|in:credit_card,paypal,bank_transfer,cash',
            ]);

            $days = Carbon::parse($request->end_date)->diffInDays(Carbon::parse($request->start_date)) + 1;
            $totalPrice = $days * $product->daily_price;

            $booking = Booking::create([
                'user_id' => Auth::id(), // أو Auth::id()
                'product_id' => $product->id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'total_price' => $totalPrice,
                'payment_method' => $request->payment_method,
                'status' => 'pending',
            ]);

            return redirect()->route('bookings.show', $booking)->with('success', 'تم الحجز بنجاح!');
        }

    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }
}