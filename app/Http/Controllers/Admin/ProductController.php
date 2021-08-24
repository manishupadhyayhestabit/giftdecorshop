<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use App\Models\Layout;
use App\Models\OptionalProductGroup;
use App\Models\PincodeGroup;
use App\Models\Product;
use App\Models\ProductDiscount;
use App\Models\ProductOption;
use App\Models\ProductOptionValue;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function addProduct()
    {
        $attributeGroups = AttributeGroup::all();
        $productTypes = Type::all();
        $optionalProductGroups = OptionalProductGroup::all();
        $pincodeGroups = PincodeGroup::all();
        $layouts = Layout::where('post_type', 'product')->get();
        return view('admin.add-product', ['attributeGroups' => $attributeGroups, 'productTypes' => $productTypes, 'layouts' => $layouts, 'pincodeGroups' => $pincodeGroups, 'optionalProductGroups' => $optionalProductGroups]);
    }

    public function addProductSubmit(Request $request)
    {
        dd($request->images);
        $validatedData = $request->validate([
            'name' => 'required|unique:products,name',
            'meta_title' => 'required|unique:products,meta_title',
            'layout_id' => 'required',
            'meta_description' => 'required',
            'product_categories' => 'required',
            'description' => 'required',
            'sort_description' => 'required',
            'regular_price' => 'required|numeric|between:0,9999.99',
            'sale_price' => 'required|numeric|between:0,9999.99',
            'gst' => 'required|numeric|between:0,99.99',
            'sku' => 'required',
            'model' => 'required',
            'order_subtrack' => 'required',
            'qty' => 'required|numeric',
            'minimum_order' => 'required|numeric',
            'maximum_order' => 'required|numeric',
            'images' => 'required',
            'images.*' => 'image'
        ]);
        $product = new Product();
        $product->user_id = Auth::user()->id;
        $product->optional_product_group_id = $request->optional_product_group_id;
        $product->pincode_group_id = $request->pincode_group_id;
        $product->attribute_group_id = $request->attribute_group_id;
        $product->name = $request->name;
        $productSlug = Str::slug($request->name);
        $product->slug = $productSlug;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keyword = $request->meta_keyword;
        $product->layout_id = $request->layout_id;
        $product->description = $request->description;
        $product->sort_description = $request->sort_description;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->gst = $request->gst;
        $product->sku = $request->sku;
        $product->model = $request->model;
        $product->order_subtrack = $request->order_subtrack;
        $product->qty = $request->qty;
        $product->minimum_order = $request->minimum_order;
        $product->maximum_order = $request->maximum_order;
        $product->product_views = 1;
        $product->status = ($request->submit == 'Publish') ? 'publish' : 'draft';
        // $files = [];
        // if ($request->hasfile('images')) {
        //     foreach ($request->file('images') as $file) {
        //         $filenamewithextension = $file->getClientOriginalName();
        //         $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        //         $extension = $file->getClientOriginalExtension();
        //         $imageNames = $filename . '_' . time() . '.' . $extension;
        //         $large = Image::make($file)->resize(1000, 1000)->encode($extension);
        //         $medium = Image::make($file)->resize(420, 420)->encode($extension);
        //         $small = Image::make($file)->resize(116, 116)->encode($extension);
        //         Storage::disk('s3')->put('/product/' . $productSlug . '/large/' . $imageNames, (string)$large, 'public');
        //         Storage::disk('s3')->put('/product/' . $productSlug . '/medium/' . $imageNames, (string)$medium, 'public');
        //         Storage::disk('s3')->put('/product/' . $productSlug . '/small/' . $imageNames, (string)$small, 'public');
        //         $files[] = $imageNames;
        //     }
        // }
        $files[] = 'purple_roses_vanilla_cake_1583389229.jpg';
        $product->images = $files;
        $product->related_products = $request->related_products;
        $attributes = [];
        if ($request->product_attribute) {
            foreach ($request->product_attribute as $attribute) {
                $attributes[] = array('name' => $attribute['name'], 'value' => $attribute['text']);
            }
        }
        $product->attributes = $attributes;
        $product->save();
        if (isset($request->product_categories)) {
            $product->categories()->attach($request->product_categories);
        }
        if (isset($request->product_type)) {
            $product->productTypes()->attach($request->product_type);
        }
        if (isset($request->product_discount)) {
            foreach ($request->product_discount as $productDiscount) {
                $productDiscounts = new ProductDiscount();
                $productDiscounts->qty = $productDiscount['qty'];
                $productDiscounts->priority = $productDiscount['priority'];
                $productDiscounts->discount = $productDiscount['discount'];
                $productDiscounts->discount_type = $productDiscount['discount_type'];
                $productDiscounts->starting_date = $productDiscount['starting_date'];
                $productDiscounts->ending_date = $productDiscount['ending_date'];
                $product->productDiscounts()->save($productDiscounts);
            }
        }
        if ($request->product_option) {
            foreach ($request->product_option as $productOption) {
                $productOptions = new ProductOption();
                $productOptions->product_id = $product->id;
                $productOptions->option_id = $productOption['option_id'];
                if (isset($productOption['option_value'])) {
                    $productOptions->option_value = $productOption['option_value'];
                }
                $productOptions->require = $productOption['required'];
                $productOptions->save();
                if (isset($productOption['product_option_value'])) {
                    foreach ($productOption['product_option_value'] as $productOptionValue) {
                        $productOptionValues = new ProductOptionValue();
                        $productOptionValues->product_option_id = $productOptions->id;
                        $productOptionValues->option_value_id = $productOptionValue['option_value_id'];
                        $productOptionValues->qty = ($productOptionValue['quantity']) ? $productOptionValue['quantity'] : 1;
                        $productOptionValues->default_option_select = $productOptionValue['default_option_select'];
                        $productOptionValues->subtract_order = $productOptionValue['subtract_order'];
                        $productOptionValues->price_prefix = $productOptionValue['price_prefix'];
                        $productOptionValues->price = $productOptionValue['price'] ? $productOptionValue['price'] : 0;
                        $productOptionValues->save();
                    }
                }
            }
        }
        session()->flash('success', 'Product has been created successfully');
        return redirect()->to('/admin/products');
    }

    public function editProduct($productId)
    {
        $attributeGroups = AttributeGroup::all();
        $productTypes = Type::all();
        $optionalProductGroups = OptionalProductGroup::all();
        $pincodeGroups = PincodeGroup::all();
        $layouts = Layout::where('post_type', 'product')->get();
        $product = Product::where('id', $productId)->with(['categories'])->first();
        $productTypeIds = [];
        if ($product->productTypes) {
            $productTypeIds = collect($product->productTypes)->map(function ($item, $key) {
                return $item->id;
            });
        }
        $related_products = [];
        if ($product->related_products) {
            $related_products = collect($product->related_products)->map(function ($item, $key) {
                $productrelated = Product::find($item);
                if ($productrelated) {
                    $relatedProducts['id'] = $productrelated->id;
                    $relatedProducts['name'] = $productrelated->name;
                }
                return $relatedProducts;
            });
        }
        return view('admin.edit-product', ['related_products' => $related_products, 'productTypeIds' => $productTypeIds->toArray(), 'product' => $product, 'attributeGroups' => $attributeGroups, 'productTypes' => $productTypes, 'layouts' => $layouts, 'pincodeGroups' => $pincodeGroups, 'optionalProductGroups' => $optionalProductGroups]);
    }

    public function editProductUpdate(Request $request, $productId)
    {
        //dd($request->product_option);
        $validatedData = $request->validate([
            'name' => 'required',
            'meta_title' => 'required',
            'layout_id' => 'required',
            'meta_description' => 'required',
            'product_categories' => 'required',
            'description' => 'required',
            'sort_description' => 'required',
            'regular_price' => 'required|numeric|between:0,9999.99',
            'sale_price' => 'required|numeric|between:0,9999.99',
            'gst' => 'required|numeric|between:0,99.99',
            'sku' => 'required',
            'model' => 'required',
            'order_subtrack' => 'required',
            'qty' => 'required|numeric',
            'minimum_order' => 'required|numeric',
            'maximum_order' => 'required|numeric',
            //'images' => 'required',
            //'images.*' => 'image'
        ]);
        $product = Product::find($productId);
        $product->user_id = Auth::user()->id;
        $product->optional_product_group_id = $request->optional_product_group_id;
        $product->pincode_group_id = $request->pincode_group_id;
        $product->attribute_group_id = $request->attribute_group_id;
        $product->name = $request->name;
        $productSlug = Str::slug($request->name);
        $product->slug = $productSlug;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keyword = $request->meta_keyword;
        $product->layout_id = $request->layout_id;
        $product->description = $request->description;
        $product->sort_description = $request->sort_description;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->gst = $request->gst;
        $product->sku = $request->sku;
        $product->model = $request->model;
        $product->order_subtrack = $request->order_subtrack;
        $product->qty = $request->qty;
        $product->minimum_order = $request->minimum_order;
        $product->maximum_order = $request->maximum_order;
        $product->product_views = 1;
        $product->status = ($request->submit == 'Publish') ? 'publish' : 'draft';
        $files = [];
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $file) {
                $filenamewithextension = $file->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $imageNames = $filename . '_' . time() . '.' . $extension;
                $large = Image::make($file)->resize(1000, 1000)->encode($extension);
                $medium = Image::make($file)->resize(420, 420)->encode($extension);
                $small = Image::make($file)->resize(116, 116)->encode($extension);
                Storage::disk('s3')->put('/product/' . $productSlug . '/large/' . $imageNames, (string)$large, 'public');
                Storage::disk('s3')->put('/product/' . $productSlug . '/medium/' . $imageNames, (string)$medium, 'public');
                Storage::disk('s3')->put('/product/' . $productSlug . '/small/' . $imageNames, (string)$small, 'public');
                $files[] = $imageNames;
            }
        }
        $product->images = $files;
        $product->related_products = $request->related_products;
        $attributes = [];
        if ($request->product_attribute) {
            foreach ($request->product_attribute as $attribute) {
                $attributes[] = array('name' => $attribute['name'], 'value' => $attribute['text']);
            }
        }
        $product->attributes = $attributes;
        $product->save();
        if (isset($request->product_categories)) {
            $product->categories()->sync($request->product_categories);
        }
        if (isset($request->product_type)) {
            $product->productTypes()->sync($request->product_type);
        }
        if (isset($request->product_discount)) {
            $product->productDiscounts()->delete();
            foreach ($request->product_discount as $productDiscount) {
                $productDiscounts = new ProductDiscount();
                $productDiscounts->qty = $productDiscount['qty'];
                $productDiscounts->priority = $productDiscount['priority'];
                $productDiscounts->discount = $productDiscount['discount'];
                $productDiscounts->discount_type = $productDiscount['discount_type'];
                $productDiscounts->starting_date = $productDiscount['starting_date'];
                $productDiscounts->ending_date = $productDiscount['ending_date'];
                $product->productDiscounts()->save($productDiscounts);
            }
        }
        if ($request->product_option) {
            $productOptionIds = [];
            foreach ($request->product_option as $productOption) {
                $productOptionIds[] = $productOption['product_option_id'];
                if (isset($productOption['product_option_id'])) {
                    $productOptions = ProductOption::find($productOption['product_option_id']);
                } else {
                    $productOptions = new ProductOption();
                }
                $productOptions->product_id = $product->id;
                $productOptions->option_id = $productOption['option_id'];
                if (isset($productOption['option_value'])) {
                    $productOptions->option_value = $productOption['option_value'];
                }
                $productOptions->require = $productOption['required'];
                $productOptions->save();
                if (isset($productOption['product_option_value'])) {
                    foreach ($productOption['product_option_value'] as $productOptionValue) {
                        if (isset($productOptionValue['product_option_value_id'])) {
                            $productOptionValues = ProductOptionValue::find($productOptionValue['product_option_value_id']);
                        } else {
                            $productOptionValues = new ProductOptionValue();
                        }
                        $productOptionValues->product_option_id = $productOptions->id;
                        $productOptionValues->option_value_id = $productOptionValue['option_value_id'];
                        $productOptionValues->qty = ($productOptionValue['quantity']) ? $productOptionValue['quantity'] : 1;
                        $productOptionValues->default_option_select = $productOptionValue['default_option_select'];
                        $productOptionValues->subtract_order = $productOptionValue['subtract_order'];
                        $productOptionValues->price_prefix = $productOptionValue['price_prefix'];
                        $productOptionValues->price = $productOptionValue['price'];
                        $productOptionValues->save();
                    }
                }
            }
            ProductOption::whereNotIn('id', $productOptionIds)->delete();
        }
        session()->flash('success', 'Product has been updated successfully');
        return redirect()->to('/admin/products');
    }
}
