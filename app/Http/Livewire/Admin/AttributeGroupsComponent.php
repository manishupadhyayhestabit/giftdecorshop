<?php

namespace App\Http\Livewire\Admin;

use App\Models\AttributeGroup;
use Livewire\Component;
use Livewire\WithPagination;

class AttributeGroupsComponent extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        AttributeGroup::find($id)->delete();
        session()->flash('success', 'Attribute Group has been  Deleted Successfully.');
    }

    public function render()
    {
        $attributeGroups = AttributeGroup::where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate);
        $totalAttributeGroups = AttributeGroup::all();
        return view('livewire.admin.attribute-groups-component', ['attributeGroups' => $attributeGroups, 'totalAttributeGroups' => $totalAttributeGroups])->layout('layouts.admin');
    }
}
