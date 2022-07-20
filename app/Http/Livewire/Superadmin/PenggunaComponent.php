<?php

namespace App\Http\Livewire\Superadmin;

use App\Models\User;
use Livewire\Component;
use Symfony\Contracts\Service\Attribute\Required;

class PenggunaComponent extends Component
{

    public function create_pengguna()
    {
        try{
            $this->validate([
                'nama_pengguna_create'=>'required|min:3|max:50',
                'email_pengguna_create'=>'required|email|unique:users,email',
                'password_pengguna_create'=>'min:6|required_with:konfirmasi_password_pengguna_create|same:konfirmasi_pasword_pengguna_create',
                'konfirmasi_password_pengguna_create'=>'min:6',
                'utype_pengguna_create'=>'required|min:3|max:50',

            ]);
        }
    }

    public function render()
    {

        $pengguna = User::paginate(5);
        return view('livewire.superadmin.pengguna-component',compact('pengguna'))->layout('layouts.default');
    }
}
