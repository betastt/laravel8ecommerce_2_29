<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Livewire\Component;

class AdminGestionarUsuarioComponent extends Component
{

    public function updateUserStatus($user_id, $status)
    {
        $user = User::find($user_id);
        $user->status = $status;
        if($status == "activate")
        {
            $user->status = 1;
        }
        else if($status == "inactivate")
        {
            $user->status = 0;
        }
        $user->save();
        session()->flash('user_message','User status has been updated succesfully!');
    }

    public function render()
    {
        $users = User::paginate(5);
        return view('livewire.admin.admin-gestionar-usuario-component', ['users'=>$users])->layout('layouts.base');
    }
}
