<?php

namespace App\Http\Livewire\Admin;

use App\Models\PresentacionProducto;
use Livewire\WithPagination;
use Livewire\Component;

class AdminPresentacionProducto extends Component
{
    use WithPagination;

    public function deletePresentacionProducto($id)
    {
        $productpresentation = PresentacionProducto::find($id);
        $productpresentation->delete();
        session()->flash('message', 'Product Presentation has been deleted succesfully!');
    }

    public function render()
    {
        $presentacion_producto = PresentacionProducto::paginate(5);
        return view('livewire.admin.admin-presentacion-producto', ['presentacion_producto'=>$presentacion_producto])->layout('layouts.base');
    }
}
