<?php

namespace App\Http\Livewire\App\Category;

use Livewire\Component;
use App\Models\Category;

class LoadProducts extends Component
{
    public $page;
    public $perPage;
    public $categoryId;
    public $isFiltering = false;
    public $sort = "product_views|DESC";
    public $orderKey;
    public $orderValue;

    public function mount($categoryId)
    {
        $this->page = $page ?? 1;
        $this->perPage = $perPage ?? 6;
        $this->categoryId = $categoryId;
    }

    public function updatedSort()
    {
        $this->isFiltering = true;
        $explodeArr = explode("|", $this->sort);
        $this->orderKey = $explodeArr[0];
        $this->orderValue = $explodeArr[1];
        $this->dispatchBrowserEvent('closeModal');
    }

    public function render()
    {
        if ($this->isFiltering) {
            $products = Category::find($this->categoryId)->products()->orderBy($this->orderKey, $this->orderValue)->paginate(($this->perPage * $this->page));
        } else {
            $products = Category::find($this->categoryId)->products()->orderBy('product_views', 'Desc')->paginate($this->perPage, ['*'], null, $this->page);
        }

        //dd($products);
        return view('livewire.app.category.load-products', ['products' => $products]);
    }
}
