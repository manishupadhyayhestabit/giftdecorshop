<?php

namespace App\Http\Livewire\Admin;

use App\Models\PincodeGroup;
use Livewire\Component;

class EditPincodeGroupComponent extends Component
{
    public $name;
    public $pincode_group_id;

    public function mount($pincode_group_id)
    {
        $pincodeGroup = PincodeGroup::find($pincode_group_id);
        $this->name = $pincodeGroup->name;
        $this->pincode_group_id = $pincodeGroup->id;
    }

    public function editPincodeGroup()
    {
        $this->validate(['name' => 'required']);
        $pincodeGroup = PincodeGroup::find($this->pincode_group_id);
        $pincodeGroup->name = $this->name;
        $pincodeGroup->save();
        session()->flash('success', 'Pincode Group has been updated successfully');
        return redirect()->to('/admin/pincode-groups');
    }

    public function render()
    {
        return view('livewire.admin.edit-pincode-group-component')->layout('layouts.admin');
    }
}
