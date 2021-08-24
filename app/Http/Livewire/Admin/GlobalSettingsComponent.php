<?php

namespace App\Http\Livewire\Admin;

use App\Models\GlobalSetting;
use Livewire\Component;
use Livewire\WithPagination;

class GlobalSettingsComponent extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search = '';

    public function delete($id)
    {
        GlobalSetting::find($id)->delete();
        session()->flash('success', 'Global Setting has been  Deleted Successfully.');
    }

    public function render()
    {
        $globalSettings = GlobalSetting::where('label', 'like', '%' . $this->search . '%')->orwhere('identifire', 'like', '%' . $this->search . '%')->orderBy('id', 'Desc')->paginate($this->paginate);
        $totalGlobalSettings = GlobalSetting::all();
        return view('livewire.admin.global-settings-component', ['totalGlobalSettings' => $totalGlobalSettings, 'globalSettings' => $globalSettings])->layout('layouts.admin');
    }
}
