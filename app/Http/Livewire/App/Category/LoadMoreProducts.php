<?php

namespace App\Http\Livewire\App\Category;

use Livewire\Component;
use App\Models\Category;

class LoadMoreProducts extends Component
{
    public $page;
    public $perPage;
    public $categoryId;
    public $isLoadMore = false;
    public $sort;

    public function mount($page = null, $perPage = null, $categoryId, $sort)
    {
        $this->page = $page ?? 1;
        $this->perPage = $perPage ?? 6;
        $this->categoryId = $categoryId;
        $this->sort = $sort;
    }

    public function loadMore()
    {
        $this->page++;
        $this->isLoadMore = true;
        $this->dispatchBrowserEvent('closeModal');
    }
    public function render()
    {
        if ($this->isLoadMore) {

            $explodeArr = explode("|", $this->sort);
            $products = Category::find($this->categoryId)->products()->orderBy($explodeArr[0], $explodeArr[1])->paginate($this->perPage, ['*'], null, $this->page);

            return view('livewire.app.category.load-products', ['products' => $products]);
        }
        return view('livewire.app.category.load-more-products');
    }
}
