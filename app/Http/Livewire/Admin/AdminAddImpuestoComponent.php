<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Str;
use App\Models\Impuesto;
use Livewire\Component;

class AdminAddImpuestoComponent extends Component
{
    public $nombre;
    public $slug;
    public $tasa;

    public function generateslug()
    {
        $this->slug = Str::slug($this->nombre);
    }

    public function storeImpuesto()
    {
        $impuesto = new Impuesto();
        $impuesto->nombre = $this->nombre;
        $impuesto->slug = $this->slug;
        $impuesto->tasa = $this->tasa;
        $impuesto->save();
        session()->flash('message', 'Tax has been created successfully!');

    } 

    public function render()
    {
        return view('livewire.admin.admin-add-impuesto-component')->layout('layouts.base');
    }
}
