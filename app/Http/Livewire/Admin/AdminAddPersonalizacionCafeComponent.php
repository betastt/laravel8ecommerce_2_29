<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Str;
use App\Models\PersonalizacionCafe;
use Livewire\Component;

class AdminAddPersonalizacionCafeComponent extends Component
{
    public $sabor;
    public $slug;

    public function generateslug()
    {
        $this->slug = Str::slug($this->sabor);
    }

    public function storePersonalizacionCafe()
    {
        $cafepersonalizacion = new PersonalizacionCafe();
        $cafepersonalizacion->sabor = $this->sabor;
        $cafepersonalizacion->slug = $this->slug;
        $cafepersonalizacion->save();
        session()->flash('message', 'Coffee customization has been created successfully!');

    } 

    public function render()
    {
        return view('livewire.admin.admin-add-personalizacion-cafe-component')->layout('layouts.base');
    }
}
