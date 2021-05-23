<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str; 
use App\Models\PresentacionProducto;

class AdminEditPresentacionProducto extends Component
{
    public $presentacionproducto_slug;
    public $producto_id;
    public $presentacion;
    public $slug;

    public function mount($presentacionproducto_slug)
    {
        $this->$presentacionproducto_slug = $presentacionproducto_slug;
        $cafeper = PresentacionProducto::where('slug', $presentacionproducto_slug)->first();
        $this->producto_id = $cafeper->id; 
        $this->presentacion = $cafeper->presentacion;
        $this->slug = $cafeper->slug;
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->presentacion);
    }

    public function updatePresentacionProducto()
    {
        $cafeper = PresentacionProducto::find($this->producto_id);
        $cafeper->presentacion = $this->presentacion;
        $cafeper->slug = $this->slug;
        $cafeper->save();
        session()->flash('message', 'Product Presentation has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-presentacion-producto')->layout('layouts.base');
    }
} 
