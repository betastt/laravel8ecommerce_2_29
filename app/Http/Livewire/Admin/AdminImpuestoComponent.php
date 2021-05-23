<?php

namespace App\Http\Livewire\Admin;

use App\Models\Impuesto;
use Livewire\WithPagination;
use Livewire\Component;

class AdminImpuestoComponent extends Component
{
    use WithPagination;

    public function deleteImpuesto($id)
    {
        $impuesto = Impuesto::find($id);
        $impuesto->delete();
        session()->flash('message', 'Tax has been deleted succesfully!');
    }

    public function render()
    {
        $impuestos = Impuesto::paginate(5);
        return view('livewire.admin.admin-impuesto-component',['impuestos'=>$impuestos])->layout('layouts.base');
    }
} 
