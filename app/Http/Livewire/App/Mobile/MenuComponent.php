<?php

namespace App\Http\Livewire\App\Mobile;

use App\Models\Category;
use Livewire\Component;

class MenuComponent extends Component
{
    public function render()
    {
        $categories = Category::where('parent_id', 0 && 'status', 'active')->with('children')->get();
        //dd($categories);
        return view('livewire.app.mobile.menu-component', ['categories' => $categories]);
    }
}
