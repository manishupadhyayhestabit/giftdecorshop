<?php

namespace App\Http\Livewire\Admin;

use App\Models\OptionGroup;
use Livewire\Component;
use Livewire\WithPagination;

class OptionGroupsComponent extends Component
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
        OptionGroup::find($id)->delete();
        session()->flash('success', 'Option Group has been  Deleted Successfully.');
    }

    public function render()
    {
        $optionGroups = OptionGroup::where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate);
        $totalOptionGroups = OptionGroup::all();
        return view('livewire.admin.option-groups-component', ['optionGroups' => $optionGroups, 'totalOptionGroups' => $totalOptionGroups])->layout('layouts.admin');
    }
}
