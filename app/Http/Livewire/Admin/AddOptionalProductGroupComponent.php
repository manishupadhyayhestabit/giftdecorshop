<?php

namespace App\Http\Livewire\Admin;

use App\Models\OptionalProductGroup;
use Livewire\Component;

class AddOptionalProductGroupComponent extends Component
{
    public $name;

    public function addOptionalProductGroup()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $optionalProductGroup = new OptionalProductGroup();
        $optionalProductGroup->name = $this->name;
        $optionalProductGroup->save();
        session()->flash('success', 'Optional Product Group has been created successfully');
        return redirect()->to('admin/optional-product-groups');
    }

    public function render()
    {
        return view('livewire.admin.add-optional-product-group-component')->layout('layouts.admin');
    }
}
