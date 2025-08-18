<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    public $product; // property عامة للاستخدام في Blade

    public function mount($id) // هنا Livewire يربط الـ parameter اللي جاي من Blade
    {
        $this->product = Product::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.products');
    }
}
