<?php

namespace App\Http\Livewire\Admin;

use App\Models\CustomField;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsComponent extends Component
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
        CustomField::where('term_id', $id)->where('post_type', 'post')->delete();
        session()->flash('success', 'Post has been  Deleted Successfully.');
    }
    public function render()
    {
        $posts = Post::where('post_title', 'like', '%' . $this->search . '%')->orderBy('id', 'Desc')->paginate($this->paginate);
        $totalPosts = Post::all();
        return view('livewire.admin.posts-component', ['posts' => $posts, 'totalPosts' => $totalPosts])->layout('layouts.admin');
    }
}
