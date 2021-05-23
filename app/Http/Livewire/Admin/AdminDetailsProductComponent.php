<?php

namespace App\Http\Livewire\Admin;

use App\Models\Impuesto;
use App\Models\PresentacionProducto;
use App\Models\PersonalizacionCafe;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class AdminDetailsProductComponent extends Component
{
    public $product_details_slug;

    public function mount($product_details_slug)
    {
        $this->product_details_slug = $product_details_slug;
    }   

    public function render()
    {
        $product = Product::find($this->product_details_slug);
        return view('livewire.admin.admin-details-product-component',['product'=>$product])->layout('layouts.base');
    }
}
