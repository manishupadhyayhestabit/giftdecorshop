<?php

namespace App\Http\Livewire\Admin;

use App\Models\Layout;
use Livewire\Component;
use Illuminate\Support\Str;

class AddLayoutComponent extends Component
{
    public $name;
    public $slug;
    public $post_type;

    public function generateSlug()
    {
        if ($this->post_type && $this->name) {
            $postTypeSlug = Str::slug($this->post_type, '-');
            $nameSlug = Str::slug($this->name, '-');
            $this->slug = $postTypeSlug . '.' . $nameSlug;
        }
    }

    public function addLayout()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'post_type' => 'required',
        ]);
        $category = new Layout();
        $category->slug = $this->slug;
        $category->name = $this->name;
        $category->post_type = $this->post_type;
        $category->save();
        session()->flash('success', 'Layout has been created successfully');
        return redirect()->to('/admin/layouts');
    }

    public function render()
    {
        return view('livewire.admin.add-layout-component')->layout('layouts.admin');
    }
}
