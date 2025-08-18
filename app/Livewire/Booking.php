<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking as BookingModel;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Carbon\Carbon;

class Booking extends Component
{
    public $product_id;
    public $start_date;
    public $end_date;
    public $total_price;
    public $payment_method = 'cash';
    public $status = 'pending';

    public Product $product;

    public function mount($productId)
    {
        $this->product_id = $productId;
        $this->product = Product::findOrFail($productId);
        $this->total_price = $this->product->price;

        $today = Carbon::today()->toDateString();
        $this->start_date = $today;
        $this->end_date = $today;
    }

    public function save()
    {
        BookingModel::create([
            'user_id' => Auth::id(),
            'product_id' => $this->product_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'total_price' => $this->total_price,
            'payment_method' => $this->payment_method,
            'status' => $this->status,
        ]);

        session()->flash('message', 'تم تأكيد الحجز بنجاح!');
    }

    public function render()
    {
        return view('livewire.booking');
    }
}
