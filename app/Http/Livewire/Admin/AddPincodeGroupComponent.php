<?php

namespace App\Http\Livewire\Admin;

use App\Models\PincodeGroup;
use Livewire\Component;

class AddPincodeGroupComponent extends Component
{
    public $name;

    public function addPincodeGroup()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $pincodeGroup = new PincodeGroup();
        $pincodeGroup->name = $this->name;
        $pincodeGroup->save();
        session()->flash('success', 'Pincode Group has been created successfully');
        return redirect()->to('admin/pincode-groups');
    }
    public function render()
    {
        return view('livewire.admin.add-pincode-group-component')->layout('layouts.admin');
    }
}
