<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Layout;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EditCategoryComponent extends Component
{
    use WithFileUploads;
    public $parent_id = 0;
    public $slug;
    public $layout_slug = 'single';
    public $name;
    public $meta_title;
    public $meta_keywords;
    public $meta_description;
    public $price;
    public $description;
    public $sort_description;
    public $feature_image;
    public $banner_image;
    public $sort_order;
    public $status;
    public $newFeatureImage;
    public $newBannerImage;
    public $category_id;
    public $category_slug;
    public $isFeatureImageUploaded = false;
    public $isBannerImageUploaded = false;

    public function mount($category_id)
    {
        $category = Category::find($category_id);
        $this->parent_id =  $category->parent_id;
        $this->slug =  $category->slug;
        $this->layout_slug =  $category->layout_slug;
        $this->name =  $category->name;
        $this->meta_title =  $category->meta_title;
        $this->meta_keywords =  $category->meta_keywords;
        $this->meta_description =  $category->meta_description;
        $this->price =  $category->price;
        $this->description =  $category->description;
        $this->sort_description =  $category->sort_description;
        $this->feature_image =  $category->feature_image;
        $this->banner_image =  $category->banner_image;
        $this->sort_order =  $category->sort_order;
        $this->status =  $category->status;
        $this->category_id =  $category->id;
    }

    public function updatedFeatureImage()
    {
        $this->isFeatureImageUploaded = true;
    }

    public function updatedBannerImage()
    {
        $this->isBannerImageUploaded = true;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'layout_slug' => 'required',
            'meta_description' => 'required',
            'meta_title' => 'required',
            'price' => 'required',
        ]);
        $category = Category::find($this->category_id);
        $category->parent_id = $this->parent_id;
        $category->slug = $this->slug;
        $category->layout_slug = $this->layout_slug;
        $category->name = $this->name;
        $category->meta_title = $this->meta_title;
        $category->meta_keywords = $this->meta_keywords;
        $category->meta_description = $this->meta_description;
        $category->price = $this->price;
        $category->description = $this->description;
        $category->sort_description = $this->sort_description;
        if (is_file($this->feature_image)) {
            $filenamewithextension = $this->feature_image->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $this->feature_image->getClientOriginalExtension();
            $filenameFeatureImage = $filename . '_' . time() . '.' . $extension;
            $large = Image::make($this->feature_image)->resize(160, 160)->encode($extension);
            $medium = Image::make($this->feature_image)->resize(80, 80)->encode($extension);
            $small = Image::make($this->feature_image)->resize(40, 40)->encode($extension);
            Storage::disk('s3')->put('/category/' . $this->slug . '/large/' . $filenameFeatureImage, (string)$large, 'public');
            Storage::disk('s3')->put('/category/' . $this->slug . '/medium/' . $filenameFeatureImage, (string)$medium, 'public');
            Storage::disk('s3')->put('/category/' . $this->slug . '/small/' . $filenameFeatureImage, (string)$small, 'public');
            $category->feature_image = $filenameFeatureImage;
        }
        if (is_file($this->banner_image)) {
            $filenamewithextension = $this->banner_image->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $this->banner_image->getClientOriginalExtension();
            $filenameBannerImage = $filename . '_' . time() . '.' . $extension;
            $large = Image::make($this->banner_image)->resize(160, 160)->encode($extension);
            $medium = Image::make($this->banner_image)->resize(80, 80)->encode($extension);
            $small = Image::make($this->banner_image)->resize(40, 40)->encode($extension);
            Storage::disk('s3')->put('/category-banner/' . $this->slug . '/large/' . $filenameBannerImage, (string)$large, 'public');
            Storage::disk('s3')->put('/category-banner/' . $this->slug . '/medium/' . $filenameBannerImage, (string)$medium, 'public');
            Storage::disk('s3')->put('/category-banner/' . $this->slug . '/small/' . $filenameBannerImage, (string)$small, 'public');
            $category->banner_image = $filenameBannerImage;
        }
        $category->sort_order = $this->sort_order;
        $category->status = $this->status;
        $category->save();
        session()->flash('message', 'Category has been updated successfully');
        return redirect()->to('/admin/categories');
    }

    public function render()
    {
        $categories = Category::where('id', '!=', $this->category_id)->get();
        $layouts = Layout::where('post_type', 'category')->orderBy('name')->get();
        return view('livewire.admin.edit-category-component', ['layouts' => $layouts, 'categories' => $categories])->layout('layouts.admin');
    }
}
