<?php

namespace App\Http\Livewire\Admin;

use App\Models\Impuesto;
use Illuminate\Support\Str; 
use Livewire\Component;

class AdminEditImpuestoComponent extends Component
{
    public $impuesto_slug;
    public $tax_id;
    public $nombre;
    public $slug; 
    public $tasa;

    public function mount($impuesto_slug)
    {
        $this->$impuesto_slug = $impuesto_slug;
        $impuesto = Impuesto::where('slug', $impuesto_slug)->first();
        $this->tax_id = $impuesto->id; 
        $this->nombre = $impuesto->nombre;
        $this->slug = $impuesto->slug;
        $this->tasa = $impuesto->tasa;
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->nombre);
    }

    public function updateImpuesto()
    {
        $impuesto = Impuesto::find($this->tax_id);
        $impuesto->nombre = $this->nombre;
        $impuesto->slug = $this->slug;
        $impuesto->tasa = $this->tasa;
        $impuesto->save();
        session()->flash('message', 'Tax has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-impuesto-component')->layout('layouts.base');
    }
} 
