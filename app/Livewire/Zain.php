<?php

namespace App\Livewire;
use App\Models\Product;
use Livewire\Component;

class Zain extends Component
{
    public function render()
    {
        $featuredProducts = Product::whereHas('category', function ($query) {
            $query->where('name', 'زينة سيارات');
        })->latest()->paginate(50);

        return view('livewire.zain', [
            'featuredProducts' => $featuredProducts,
        ]);
    }
}
