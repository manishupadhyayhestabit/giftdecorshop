<?php

namespace App\Http\Livewire\Admin;

use App\Models\Option;
use Livewire\Component;
use Livewire\WithPagination;

class OptionsComponent extends Component
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
        Option::find($id)->delete();
        session()->flash('success', 'Option has been  Deleted Successfully.');
    }

    public function render()
    {
        $options = Option::where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate);
        $totalOptions = Option::all();
        return view('livewire.admin.options-component', ['totalOptions' => $totalOptions, 'options' => $options])->layout('layouts.admin');
    }
}
