<?php

namespace App\Http\Livewire\Admin;

use App\Models\OptionalProductGroup;
use Livewire\Component;
use Livewire\WithPagination;

class OptionalProductGroupsComponent extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search = '';

    public function delete($id)
    {
        OptionalProductGroup::find($id)->delete();
        session()->flash('success', 'Optional Product Group has been  Deleted Successfully.');
    }

    public function render()
    {
        $optionalProductGroups = OptionalProductGroup::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'Desc')->paginate($this->paginate);
        $totalOptionalProductGroups = OptionalProductGroup::all()->count();
        return view('livewire.admin.optional-product-groups-component', ['optionalProductGroups' => $optionalProductGroups, 'totalOptionalProductGroups' => $totalOptionalProductGroups])->layout('layouts.admin');
    }
}
