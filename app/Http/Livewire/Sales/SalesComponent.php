<?php

namespace App\Http\Livewire\Sales;

use Livewire\Component;

class SalesComponent extends Component
{
    public function render()
    {
        return view('livewire.sales.sales-component')->layout('layouts.default');
    }
}
