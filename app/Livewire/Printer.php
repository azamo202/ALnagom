<?php

namespace App\Livewire;
use App\Models\Product;
use Livewire\Component;

class Printer extends Component
{
public function render()
{
    $mtProducts = Product::whereHas('category', function ($query) {
        $query->where('name', 'المطبوعات');
    })->latest()->take(50)->get();

    return view('livewire.printer', [
        'mtProducts' => $mtProducts,
    ]);
}
}