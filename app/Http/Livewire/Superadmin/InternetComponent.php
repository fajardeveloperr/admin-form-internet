<?php

namespace App\Http\Livewire\Superadmin;

use App\Models\Customer;

use Livewire\WithPagination;

use Livewire\Component;

class InternetComponent extends Component

{
    public $id_approved;

    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public function delete_personal($id)
    {

        $delete_personal = Customer::find($id);
        $delete_personal->delete();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Feedback Saved',
            'timer'=>3000,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right'
        ]);
        
        

    }

    public function approved($approved)
    {

        $approved = Customer::where('id',$this->id_approved)->first();
        $approved->status = 'approved';
        dd($approved);
        $approved->save();
    }


    public function render()

    {
        $customers = Customer::where('id_pelanggan', 'like', '%'.$this->search.'%')
        ->orwhere('name', 'like', '%'.$this->search.'%')
        ->orwhere('class', 'like', '%'.$this->search.'%')
        ->paginate(5);

        return view('livewire.superadmin.internet-component',compact('customers'))->layout('layouts.default');
    }
}
