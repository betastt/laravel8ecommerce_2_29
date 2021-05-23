<?php

namespace App\Http\Livewire\Admin;

use App\Models\PersonalizacionCafe;
use Livewire\Component;
use Illuminate\Support\Str; 

class AdminEditPersonalizacionCafeComponent extends Component
{
    public $cafepersonalizacion_slug;
    public $cafe_id;
    public $sabor;
    public $slug;
 
    public function mount($cafepersonalizacion_slug)
    {
        $this->$cafepersonalizacion_slug = $cafepersonalizacion_slug;
        $cafeper = PersonalizacionCafe::where('slug', $cafepersonalizacion_slug)->first();
        $this->cafe_id = $cafeper->id; 
        $this->sabor = $cafeper->sabor;
        $this->slug = $cafeper->slug;
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->sabor);
    }

    
    public function updateCafePersonalizacion()
    {
        $cafeper = PersonalizacionCafe::find($this->cafe_id);
        $cafeper->sabor = $this->sabor;
        $cafeper->slug = $this->slug;
        $cafeper->save();
        session()->flash('message', 'Coffee customization has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-personalizacion-cafe-component')->layout('layouts.base'); 
    }
}
