<?php

namespace App\Http\Livewire\Admin;

use App\Models\Impuesto;
use App\Models\PresentacionProducto;
use App\Models\PersonalizacionCafe;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
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
    public $newimage;
    public $product_id;
    public $personalizacioncafe_id;
    public $presentacionproducto_id;
    public $impuesto_id;

    public $pais;
    public $finca;
    public $tamanio;

    public function mount($product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->category_id = $product->category_id;
        $this->personalizacioncafe_id = $product->personalizacioncafe_id;
        $this->presentacionproducto_id = $product->presentacionproducto_id;
        $this->impuesto_id = $product->impuesto_id;
        $this->product_id = $product->id;
        $this->pais = $product->pais;
        $this->finca = $product->finca;
        $this->tamanio = $product->tamanio;
    }   

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
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
            'category_id' => 'required'
        ]);
    }

    public function updateProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'category_id' => 'required'
        ]);
        $product = Product::find($this->product_id);
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
        if($this->newimage)
        {
            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('products', $imageName);
            $product->image = $imageName;
        }
        
        $product->category_id = $this->category_id;
        $product->personalizacioncafe_id = $this->personalizacioncafe_id;
        $product->presentacionproducto_id = $this->presentacionproducto_id;
        $product->impuesto_id = $this->impuesto_id;
        $product->pais = $this->pais;
        $product->finca = $this->finca;
        $product->tamanio = $this->tamanio;
        $product->save();
        session()->flash('message', 'Product has been updated sucesfully!');
    }

    public function render()
    {
        $impuestos_tax = Impuesto::all();
        $presentacion_productos = PresentacionProducto::all();
        $cafe_personalizaciones = PersonalizacionCafe::all();
        $categories = Category::all();
        return view('livewire.admin.admin-edit-product-component', ['categories' => $categories, 'cafe_personalizaciones'=>$cafe_personalizaciones, 'presentacion_productos'=>$presentacion_productos, 'impuestos_tax'=>$impuestos_tax])->layout('layouts.base');
    } 
}
