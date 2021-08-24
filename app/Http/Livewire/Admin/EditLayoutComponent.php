<?php

namespace App\Http\Livewire\Admin;

use App\Models\Layout;
use Livewire\Component;
use Illuminate\Support\Str;

class EditLayoutComponent extends Component
{
    public $layout_id;
    public $name;
    public $slug;
    public $post_type;
    public $layout_slug;

    public function mount($layout_slug)
    {

        $this->layout_slug = $layout_slug;
        $layout = Layout::where('slug', $layout_slug)->first();
        $this->layout_id = $layout->id;
        $this->name = $layout->name;
        $this->slug = $layout->slug;
        $this->post_type = $layout->post_type;
    }

    public function generateSlug()
    {
        if ($this->post_type && $this->name) {
            $postTypeSlug = Str::slug($this->post_type, '-');
            $nameSlug = Str::slug($this->name, '-');
            $this->slug = $postTypeSlug . '.' . $nameSlug;
        }
    }

    public function updateLayout()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'post_type' => 'required',
        ]);
        $layout = Layout::find($this->layout_id);
        $layout->slug = $this->slug;
        $layout->name = $this->name;
        $layout->post_type = $this->post_type;
        $layout->save();
        session()->flash('success', 'Layout has been updated successfully');
        return redirect()->to('/admin/layouts');
    }

    public function render()
    {
        return view('livewire.admin.edit-layout-component')->layout('layouts.admin');
    }
}
