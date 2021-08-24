<?php

namespace App\Http\Livewire\Admin;

use App\Models\OptionalProduct;
use App\Models\OptionalProductGroup;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class EditOptionalProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $price;
    public $optional_product_group_id;
    public $image;
    public $optional_product_id;

    public function mount($optional_product_id)
    {
        $optionalProduct = OptionalProduct::find($optional_product_id);
        //dd($optionalProduct);
        $this->name =  $optionalProduct->name;
        $this->price =  $optionalProduct->price;
        $this->image =  $optionalProduct->image;
        $this->optional_product_group_id =  $optionalProduct->optional_product_group_id;
        $this->optional_product_id =  $optionalProduct->id;
    }

    public function editOptionalProduct()
    {
        $this->validate([
            'name' => 'required',
            'optional_product_group_id' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $optionalProduct = OptionalProduct::find($this->optional_product_id);
        $optionalProduct->optional_product_group_id = $this->optional_product_group_id;
        $optionalProduct->price = $this->price;
        $optionalProduct->name = $this->name;
        if (isset($this->image)) {
            if ($optionalProduct->image) {
                Storage::disk('s3')->delete('http://gds-image.s3-ap-south-1.amazonaws.com/optional-product/' . $optionalProduct->image);
            }
            $image = $this->image;
            $filenamewithextension = $image->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $filenameImageName = $filename . '_' . time() . '.' . $extension;
            $resizeImage = Image::make($image)->resize(77, 77)->encode($extension);
            Storage::disk('s3')->put('/optional-product/' . $filenameImageName, (string)$resizeImage, 'public');
        }
        $optionalProduct->image = ($filenameImageName) ? $filenameImageName : $optionalProduct->image;
        $optionalProduct->save();
        session()->flash('message', 'Optional Product has been updated successfully');
        return redirect()->to('/admin/optional-products');
    }

    public function render()
    {
        $optionalProductGroups = OptionalProductGroup::all();

        return view('livewire.admin.edit-optional-product-component', ['optionalProductGroups' => $optionalProductGroups])->layout('layouts.admin');
    }
}
