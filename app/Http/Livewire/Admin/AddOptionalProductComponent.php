<?php

namespace App\Http\Livewire\Admin;

use App\Models\OptionalProduct;
use App\Models\OptionalProductGroup;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class AddOptionalProductComponent extends Component
{
    use WithFileUploads;
    public $name, $price, $optional_product_group_id, $image;

    public function addOptionalProduct()
    {
        $this->validate([
            'name' => 'required',
            'optional_product_group_id' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $optionalProduct = new OptionalProduct();
        $optionalProduct->name = $this->name;
        $optionalProduct->optional_product_group_id = $this->optional_product_group_id;
        $optionalProduct->price = $this->price;
        if ($this->image) {
            $filenamewithextension = $this->image->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $this->image->getClientOriginalExtension();
            $imageName = $filename . '_' . time() . '.' . $extension;
            $resizeImage = Image::make($this->image)->resize(77, 77)->encode($extension);
            Storage::disk('s3')->put('/optional-product/' . $imageName, (string)$resizeImage, 'public');
        }
        $optionalProduct->image = ($imageName) ? $imageName : '';
        $optionalProduct->save();
        session()->flash('success', 'Optional Product has been created successfully');
        return redirect()->to('admin/optional-products');
    }

    public function render()
    {
        $optionalProductGroups = OptionalProductGroup::all();
        return view('livewire.admin.add-optional-product-component', ['optionalProductGroups' => $optionalProductGroups])->layout('layouts.admin');
    }
}
