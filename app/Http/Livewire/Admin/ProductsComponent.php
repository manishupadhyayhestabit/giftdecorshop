<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class ProductsComponent extends Component
{
    public $paginate = 10;
    public $search = '';

    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('success', 'Product has been  Deleted Successfully.');
    }
    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'Desc')->paginate($this->paginate);
        $totalProducts = Product::all();
        return view('livewire.admin.products-component', ['products' => $products, 'totalProducts' => $totalProducts])->layout('layouts.admin');
    }
}
