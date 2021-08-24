<?php

namespace App\Http\Livewire\Admin;

use App\Models\OptionGroup;
use Livewire\Component;

class AddOptionGroupComponent extends Component
{
    public $name;
    public $sort_order = 1;

    public function addOptionGroup()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $OptionGroup = new OptionGroup();
        $OptionGroup->name = $this->name;
        $OptionGroup->sort_order = $this->sort_order;
        $OptionGroup->save();
        session()->flash('success', 'Option Group has been created successfully');
        return redirect()->to('/admin/option-groups');
    }

    public function render()
    {
        return view('livewire.admin.add-option-group-component')->layout('layouts.admin');
    }
}
