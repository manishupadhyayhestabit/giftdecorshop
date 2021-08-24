<?php

namespace App\Http\Livewire\Admin;

use App\Models\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class LayoutsComponent extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteLayout($id)
    {
        Layout::find($id)->delete();
        session()->flash('success', 'Layout has been  Deleted Successfully.');
    }
    public function render()
    {
        $layouts = Layout::where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate);
        $totalLayouts = Layout::all();
        return view('livewire.admin.layouts-component', ['layouts' => $layouts, 'totalLayouts' => $totalLayouts])->layout('layouts.admin');
    }
}
