<?php

namespace App\Http\Livewire\Admin;

use App\Models\GroupByPincode;
use App\Models\PincodeGroup;
use Livewire\Component;

class EditGroupByPincodeComponent extends Component
{
    public $group_by_pincode_id;
    public $pincode_group_id;
    public $pincode;
    public $additional_price;
    public $city;
    public $district;
    public $state;
    public $country;
    public $standard_delivery;
    public $free_shipping;
    public $fixed_time_delivery;
    public $mid_night_delivery;
    public $same_day_delivery;

    public function mount($group_by_pincode_id)
    {
        $groupByPincode = GroupByPincode::find($group_by_pincode_id);
        $this->pincode_group_id = $groupByPincode->pincode_group_id;
        $this->pincode = $groupByPincode->pincode;
        $this->additional_price = $groupByPincode->additional_price;
        $this->city = $groupByPincode->city;
        $this->district = $groupByPincode->district;
        $this->state = $groupByPincode->state;
        $this->country = $groupByPincode->country;
        $this->standard_delivery = $groupByPincode->standard_delivery;
        $this->free_shipping = $groupByPincode->free_shipping;
        $this->fixed_time_delivery = $groupByPincode->fixed_time_delivery;
        $this->mid_night_delivery = $groupByPincode->mid_night_delivery;
        $this->same_day_delivery = $groupByPincode->same_day_delivery;
    }

    public function editGroupByPincode()
    {
        $this->validate([
            'pincode' => 'required',
            'pincode_group_id' => 'required',
            'city' => 'required',
            'district' => 'required',
            'state' => 'required',
            'country' => 'required',
            'standard_delivery' => 'required',
            'free_shipping' => 'required',
            'fixed_time_delivery' => 'required',
            'mid_night_delivery' => 'required',
            'same_day_delivery' => 'required',
        ]);
        $groupByPincode = GroupByPincode::find($this->group_by_pincode_id);
        $groupByPincode->pincode = $this->pincode;
        $groupByPincode->pincode_group_id = $this->pincode_group_id;
        $groupByPincode->city = $this->city;
        $groupByPincode->district = $this->district;
        $groupByPincode->state = $this->state;
        $groupByPincode->country = $this->country;
        $groupByPincode->standard_delivery = $this->standard_delivery;
        $groupByPincode->free_shipping = $this->free_shipping;
        $groupByPincode->fixed_time_delivery = $this->fixed_time_delivery;
        $groupByPincode->mid_night_delivery = $this->mid_night_delivery;
        $groupByPincode->same_day_delivery = $this->same_day_delivery;
        $groupByPincode->additional_price = $this->additional_price;
        $groupByPincode->save();
        session()->flash('message', 'Group by pincode has been updated successfully');
        return redirect()->to('/admin/group-by-pincodes');
    }

    public function render()
    {
        $pincodeGroups = PincodeGroup::all();
        return view('livewire.admin.edit-group-by-pincode-component', ['pincodeGroups' => $pincodeGroups])->layout('layouts.admin');
    }
}
