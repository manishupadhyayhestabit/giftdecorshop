<?php

namespace App\Http\Livewire\Admin;

use App\Models\GroupByPincode;
use Livewire\Component;
use Livewire\WithPagination;

class GroupByPincodesComponent extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search = '';

    public function delete($id)
    {
        GroupByPincode::find($id)->delete();
        session()->flash('success', 'Group By Pincode has been  Deleted Successfully.');
    }

    public function render()
    {
        $groupByPincodes = GroupByPincode::where('pincode', 'like', '%' . $this->search . '%')->orWhere('city_slug', 'like', '%' . $this->search . '%')->orderBy('id', 'Desc')->paginate($this->paginate);
        $totalGroupByPincodes = GroupByPincode::all();
        return view('livewire.admin.group-by-pincodes-component', ['groupByPincodes' => $groupByPincodes, 'totalGroupByPincodes' => $totalGroupByPincodes])->layout('layouts.admin');
    }
}
