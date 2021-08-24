<?php

namespace App\Http\Livewire\Admin;

use App\Models\OptionalProduct;
use Livewire\Component;
use Livewire\WithPagination;

class OptionalProductsComponent extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search = '';

    public function delete($id)
    {
        OptionalProduct::find($id)->delete();
        session()->flash('success', 'Optional Product has been  Deleted Successfully.');
    }

    public function render()
    {
        $optionalProducts = OptionalProduct::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'Desc')->paginate($this->paginate);
        $totalOptionalProducts = OptionalProduct::all()->count();
        return view('livewire.admin.optional-products-component', ['totalOptionalProducts' => $totalOptionalProducts, 'optionalProducts' => $optionalProducts])->layout('layouts.admin');
    }
}
