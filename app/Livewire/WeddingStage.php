<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class WeddingStage extends Component
{
    public function render()
    {
        $latestProducts = Product::whereHas('category', function ($query) {
            $query->where('name', 'كوش الأفراح');
        })->latest()->take(10)->get();
         $Products = Product::whereHas('category', function ($query) {
            $query->where('name', 'كوش الأعراس');
        })->latest()->take(10)->get();

        return view('livewire.wedding-stage', [
            'latestProducts' => $latestProducts,
            'Products' => $Products,
        ]);
    }
}
