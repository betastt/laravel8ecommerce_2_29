<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class BarCodeController extends Component
{

    public function render()
    {
        $products = Product::all();
        return view('livewire.bar-code-controller', ['products'=>$products])->layout('layouts.base');
    }
}
