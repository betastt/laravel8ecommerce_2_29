<?php

namespace App\Http\Livewire\Admin;

use App\Models\PersonalizacionCafe;
use Livewire\WithPagination;
use Livewire\Component;

class AdminPersonalizacionCafeComponent extends Component
{
    use WithPagination;

    public function deletePersonalizacionCafe($id)
    {
        $cafeper = PersonalizacionCafe::find($id);
        $cafeper->delete();
        session()->flash('message', 'Coffee Customization has been deleted succesfully!');
    }

    public function render()
    {
        $cafepersonalizaciones = PersonalizacionCafe::paginate(5);
        return view('livewire.admin.admin-personalizacion-cafe-component',['cafepersonalizaciones' => $cafepersonalizaciones])->layout('layouts.base');
    }
}
