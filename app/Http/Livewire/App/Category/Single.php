<?php

namespace App\Http\Livewire\App\Category;

use Livewire\Component;
use App\Models\Category;
use Jenssegers\Agent\Agent;

class Single extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $category = Category::where('slug', $this->slug)->first();
        $agent = new Agent();
        if ($agent->isDesktop()) {
            return view('livewire.app.category.single', ['category' => $category]);
        }
        return view('livewire.app.mobile.category.single', ['category' => $category])->layout('layouts.mobile');
    }
}
