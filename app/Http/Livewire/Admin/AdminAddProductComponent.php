<?php

namespace App\Http\Livewire\Admin;

use App\Models\Impuesto;
use App\Models\PresentacionProducto;
use App\Models\PersonalizacionCafe;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $personalizacioncafe_id;
    public $presentacionproducto_id;
    public $impuesto_id;

    public $pais;
    public $finca;
    public $tamanio;

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required:numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png',
            'category_id' => 'required'
        ]);
    }

    public function addProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required:numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png',
            'category_id' => 'required'
        ]);
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image = $imageName;
        $product->category_id = $this->category_id;
        $product->personalizacioncafe_id = $this->personalizacioncafe_id;
        $product->presentacionproducto_id = $this->presentacionproducto_id;
        $product->impuesto_id = $this->impuesto_id;
        $product->pais = $this->pais;
        $product->finca = $this->finca;
        $product->tamanio = $this->tamanio;
        $product->save();
        session()->flash('message', 'Product has been created sucesfully!');
      
    }

    public function render()
    {
        $impuestos_tax = Impuesto::all();
        $presentacion_productos = PresentacionProducto::all();
        $cafe_personalizaciones = PersonalizacionCafe::all();
        $categories = Category::all();
        return view('livewire.admin.admin-add-product-component', ['categories'=>$categories, 'cafe_personalizaciones'=>$cafe_personalizaciones, 'presentacion_productos'=>$presentacion_productos, 'impuestos_tax'=>$impuestos_tax])->layout('layouts.base'); 
    }
}
