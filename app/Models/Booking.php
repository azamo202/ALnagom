<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Booking extends Model
{
    protected $fillable = ['user_id', 'product_id', 'start_date', 'end_date', 'total_price', 'payment_method', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

