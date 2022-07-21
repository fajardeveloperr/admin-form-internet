<?php

namespace App\Http\Livewire\Superadmin;

use App\Models\Customer;

use Livewire\WithPagination;

use Livewire\Component;

use Excel;

use App\Exports\CustomersExport;

class InternetComponent extends Component

{
    public $id_approved;

    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;


    public function exportexcel()
    {
        return Excel::download(new CustomersExport, 'excels.xlsx');
        session()->flash('message_success','Export Data Berhasil di Download');
    }

    public function delete_personal($id)
    {

        $delete_personal = Customer::find($id);
        $delete_personal->delete();
        session()->flash('message_failed', 'Data User berhasil dihapus!');
    }

    public function render()

    {

        $customers = Customer::where('customer_id', 'like', '%'.$this->search.'%')
        ->orwhere('name', 'like', '%'.$this->search.'%')
        ->orwhere('class', 'like', '%'.$this->search.'%')
        ->paginate(5);

        return view('livewire.superadmin.internet-component',compact('customers'))->layout('layouts.default');
    }
}
