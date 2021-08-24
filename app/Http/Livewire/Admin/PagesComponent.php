<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use App\Models\CustomField;
use Livewire\WithPagination;

class PagesComponent extends Component
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
        Post::find($id)->delete();
        CustomField::where('term_id', $id)->where('post_type', 'page')->delete();
        session()->flash('success', 'Page has been  Deleted Successfully.');
    }

    public function render()
    {
        $pages = Post::where('post_title', 'like', '%' . $this->search . '%')->where('post_type', 'page')->orderBy('id', 'Desc')->paginate($this->paginate);
        $totalPages = Post::all();
        return view('livewire.admin.pages-component', ['pages' => $pages, 'totalPages' => $totalPages])->layout('layouts.admin');
    }
}
