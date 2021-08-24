<?php

namespace App\Http\Livewire\Admin;

use App\Models\GlobalSetting;
use Illuminate\Support\Str;
use Livewire\Component;

class AddGlobalSettingComponent extends Component
{
    public $label;
    public $identifire;
    public $value;

    public function generateSlug()
    {
        if ($this->label) {
            $this->identifire = Str::slug($this->label, '-');
        }
    }

    public function addGlobalSetting()
    {
        $this->validate([
            'label' => 'required',
            'identifire' => 'required',
            'value' => 'required',
        ]);
        $globalSetting = new GlobalSetting();
        $globalSetting->label = $this->label;
        $globalSetting->identifire = $this->identifire;
        $globalSetting->value = $this->value;
        $globalSetting->save();
        session()->flash('success', 'Global Setting has been created successfully');
        return redirect()->to('/admin/global-settings');
    }

    public function render()
    {
        return view('livewire.admin.add-global-setting-component')->layout('layouts.admin');
    }
}
