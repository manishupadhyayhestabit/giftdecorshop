<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesComponent extends Component
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
        Category::find($id)->delete();
        session()->flash('success', 'Category has been  Deleted Successfully.');
    }

    public function render()
    {
        $categories = Category::where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate);
        $totalCategories = Category::all();
        return view('livewire.admin.categories-component', ['categories' => $categories, 'totalCategories' => $totalCategories])->layout('layouts.admin');
    }
}
