<?php

namespace App\Http\Livewire\Admin;

use App\Models\Type;
use Livewire\Component;
use Livewire\WithPagination;

class ProductTypeComponent extends Component
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
        Type::find($id)->delete();
        session()->flash('success', 'Product Type has been  Deleted Successfully.');
    }

    public function render()
    {
        $productTypes = Type::where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate);
        $totalProductTypes = Type::all();
        return view('livewire.admin.product-type-component', ['productTypes' => $productTypes, 'totalProductTypes' => $totalProductTypes])->layout('layouts.admin');
    }
}
