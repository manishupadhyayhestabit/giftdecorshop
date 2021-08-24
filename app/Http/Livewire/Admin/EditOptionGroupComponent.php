<?php

namespace App\Http\Livewire\Admin;

use App\Models\OptionGroup;
use Livewire\Component;

class EditOptionGroupComponent extends Component
{
    public $name;
    public $sort_order = 1;
    public $opti_group_id;

    public function mount($opti_group_id)
    {
        $optionGroup = OptionGroup::find($opti_group_id);
        $this->name = $optionGroup->name;
        $this->sort_order = $optionGroup->sort_order;
        $this->opti_group_id = $optionGroup->id;
    }
    public function updateOptionGroup()
    {
        $this->validate(['name' => 'required']);
        $optionGroup = OptionGroup::find($this->opti_group_id);
        $optionGroup->sort_order = $this->sort_order;
        $optionGroup->name = $this->name;
        $optionGroup->save();
        session()->flash('success', 'Option Group has been updated successfully');
        return redirect()->to('/admin/option-groups');
    }

    public function render()
    {
        return view('livewire.admin.edit-option-group-component')->layout('layouts.admin');
    }
}
