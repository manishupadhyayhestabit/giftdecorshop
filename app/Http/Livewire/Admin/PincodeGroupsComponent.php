<?php

namespace App\Http\Livewire\Admin;

use App\Models\PincodeGroup;
use Livewire\Component;
use Livewire\WithPagination;

class PincodeGroupsComponent extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search = '';

    public function delete($id)
    {
        PincodeGroup::find($id)->delete();
        session()->flash('success', 'Pincode Group has been  Deleted Successfully.');
    }

    public function render()
    {
        $pincodeGroups = PincodeGroup::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'Desc')->paginate($this->paginate);
        $totalPincodeGroups = PincodeGroup::all()->count();
        return view('livewire.admin.pincode-groups-component', ['pincodeGroups' => $pincodeGroups, 'totalPincodeGroups' => $totalPincodeGroups])->layout('layouts.admin');
    }
}
