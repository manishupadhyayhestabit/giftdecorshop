<?php

namespace App\Http\Livewire\Admin;

use App\Models\Attribute;
use Livewire\Component;
use Livewire\WithPagination;

class AttributesComponent extends Component
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
        Attribute::find($id)->delete();
        session()->flash('success', 'Attribute has been  Deleted Successfully.');
    }

    public function render()
    {
        $attributes = Attribute::where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate);
        $totalAttributes = Attribute::all();
        return view('livewire.admin.attributes-component', ['attributes' => $attributes, 'totalAttributes' => $totalAttributes])->layout('layouts.admin');
    }
}
