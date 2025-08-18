<?php

namespace App\Livewire;
use App\Models\Product;
use Livewire\Component;

class Flower extends Component
{
   public function render()
{
    $flowerProducts = Product::whereHas('category', function ($query) {
        $query->where('name', 'الورود والهدايا');
    })->latest()->paginate(50);

    return view('livewire.flower', [
        'flowerProducts' => $flowerProducts,
    ]);
}

}