<?php

namespace App\Http\Livewire\Superadmin;

use App\Models\User;
use Livewire\Component;

class PenggunaComponent extends Component
{
    public function render()
    {

        $pengguna = User::paginate(5);
        return view('livewire.superadmin.pengguna-component',compact('pengguna'))->layout('layouts.default');
    }
}
