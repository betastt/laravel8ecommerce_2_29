<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Str;
use App\Models\PresentacionProducto;
use Livewire\Component;

class AdminAddPresentacionProducto extends Component
{
    public $presentacion;
    public $slug;

    public function generateslug()
    {
        $this->slug = Str::slug($this->presentacion);
    }

    public function storePresentacionProducto()
    {
        $productopersonalizacion = new PresentacionProducto();
        $productopersonalizacion->presentacion = $this->presentacion;
        $productopersonalizacion->slug = $this->slug;
        $productopersonalizacion->save();
        session()->flash('message', 'Product Presentation has been created successfully!');

    } 

    public function render()
    {
        return view('livewire.admin.admin-add-presentacion-producto')->layout('layouts.base');
    } 
}
