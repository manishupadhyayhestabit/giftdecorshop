<?php

namespace App\Http\Livewire\Admin;

use App\Models\GlobalSetting;
use Livewire\Component;
use Illuminate\Support\Str;

class EditGlobalSettingComponent extends Component
{
    public $label;
    public $identifire;
    public $value;
    public $global_setting_id;

    public function mount($global_setting_id)
    {
        $globalSetting = GlobalSetting::find($global_setting_id);
        $this->label =  $globalSetting->label;
        $this->value =  $globalSetting->value;
        $this->identifire =  $globalSetting->identifire;
        $this->global_setting_id =  $globalSetting->id;
    }

    public function generateSlug()
    {
        $this->identifire = Str::slug($this->label, '-');
    }

    public function editGlobalSetting()
    {
        $this->validate([
            'label' => 'required',
            'identifire' => 'required',
            'value' => 'required',
        ]);
        $globalSetting =  GlobalSetting::find($this->global_setting_id);
        $globalSetting->label = $this->label;
        $globalSetting->identifire = $this->identifire;
        $globalSetting->value = $this->value;
        $globalSetting->save();
        session()->flash('success', 'Global Setting has been updated successfully');
        return redirect()->to('/admin/global-settings');
    }

    public function render()
    {
        return view('livewire.admin.edit-global-setting-component')->layout('layouts.admin');
    }
}
