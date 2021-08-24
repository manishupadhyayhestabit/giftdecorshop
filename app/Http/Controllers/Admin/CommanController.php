<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\CustomField;
use App\Models\CustomFieldOption;
use App\Models\Option;
use App\Models\OptionalProductGroup;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CommanController extends Controller
{
    public function searchCategories(Request $request)
    {
        if ($request->ajax()) {
            $cat_name = $request->search;
            $categoryData = Category::select('id as category_id', 'name')->where('name', 'like', '%' . $cat_name . '%')->limit(10)->get();
            // dd($categoryData);
            return response()->json($categoryData);
        }
    }

    public function searchOptionalProductGroups(Request $request)
    {
        if ($request->ajax()) {
            $name = $request->search;
            $optionalProductGroupsData = OptionalProductGroup::select('id as optional_product_group_id', 'name')->where('name', 'like', '%' . $name . '%')->limit(10)->get();
            // dd($optionalProductGroupsData);
            return response()->json($optionalProductGroupsData);
        }
    }

    public function searchRelatedProducts(Request $request)
    {
        if ($request->ajax()) {
            $name = $request->search;
            $currentProductName = $request->currentProductName;
            $relatedProductData = Product::select('id as related_product_id', 'name')->where('name', 'like', '%' . $name . '%')->orWhere('name', '!=', $currentProductName)->limit(10)->get();
            //dd($currentProductName);
            return response()->json($relatedProductData);
        }
    }

    public function searchAttributes(Request $request)
    {
        if ($request->ajax()) {
            $attributeGroupId = $request->attributeGroupId;
            $attributes = Attribute::where('attribute_group_id', $attributeGroupId)->get();
            // dd($attributeGroupId);
            $view = view("admin.ajax-attributes", compact('attributes'))->render();
            return response()->json(['html' => $view]);
        }
    }

    public function searchOptions(Request $request)
    {
        if ($request->ajax()) {
            $name = $request->search;
            $options = Option::where('name', 'like', '%' . $name . '%')->limit(5)->get();
            foreach ($options as $option) {
                $option_value_data = array();
                if ($option->type == 'select' || $option->type == 'radio' || $option->type == 'checkbox' || $option->type == 'image') {
                    $option_values = $option->optionValues;
                    foreach ($option_values as $option_value) {
                        $image = '';
                        if ($option_value->image) {
                            $image = asset($option_value->image);
                        }
                        $option_value_data[] = array(
                            'option_value_id' => $option_value->id,
                            'name'            => $option_value->name,
                            'image'           => $image
                        );
                    }
                }
                $type = '';
                if ($option->type == 'select' || $option->type == 'radio' || $option->type == 'checkbox') {
                    $type = 'Choose';
                }
                if ($option->type == 'text' || $option->type == 'textarea') {
                    $type = 'Input';
                }
                if ($option->type == 'file') {
                    $type = 'File';
                }
                if ($option->type == 'date' || $option->type == 'datetime' || $option->type == 'time') {
                    $type = 'Date';
                }
                $arr[] = array(
                    'option_id'    => $option->id,
                    'name'         => $option->name,
                    'category'     => $type,
                    'type'         => $option->type,
                    'option_value' => $option_value_data
                );
            }
            return response()->json($arr);
        }
    }

    public function removeCustomOption(Request $request)
    {
        if ($request->ajax()) {
            $customFieldId = $request->custom_field_id;
            $customFieldData = CustomField::find($customFieldId);
            if ($customFieldData->image) {
                $customImagePath = "http://gds-image.s3.ap-south-1.amazonaws.com/posts/custom-images/" . $customFieldData->image;
                if (Storage::disk('s3')->exists($customImagePath)) {
                    $s3 = Storage::disk('s3');
                    $s3->delete($customImagePath);
                }
            }
            $customSubOptions = CustomFieldOption::where('custom_field_id', $customFieldId)->get();
            foreach ($customSubOptions as $customSubOption) {
                if ($customSubOption->custom_image) {
                    $imagePath = "http://gds-image.s3.ap-south-1.amazonaws.com/posts/custom-images/custom-sub-images/" . $customSubOption->custom_image;
                    if (Storage::disk('s3')->exists($imagePath)) {
                        $s3 = Storage::disk('s3');
                        $s3->delete($imagePath);
                    }
                }
            }
            CustomField::find($customFieldId)->delete();
            return response()->json(['msg' => 'success']);
        }
    }

    public function removeCustomSubOption(Request $request)
    {
        if ($request->ajax()) {
            $customSubFieldId = $request->custom_sub_field_id;
            $customSubFieldData = CustomFieldOption::find($customSubFieldId);
            if ($customSubFieldData->custom_image) {
                $imagePath = "http://gds-image.s3.ap-south-1.amazonaws.com/posts/custom-images/custom-sub-images/" . $customSubFieldData->custom_image;
                //dd($imagePath);
                if (Storage::disk('s3')->exists($imagePath)) {
                    $s3 = Storage::disk('s3');
                    $s3->delete($imagePath);
                }
            }
            CustomFieldOption::find($customSubFieldId)->delete();
            return response()->json(['msg' => 'success']);
        }
    }
}
