<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\OptionGroup;
use App\Models\OptionValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class AttributeController extends Controller
{
    public function addOption()
    {
        $optionGroups = OptionGroup::all();
        return view('admin.add-option', compact('optionGroups'));
    }

    public function addOptionSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'option_group_id' => 'required',
            'type' => 'required',
        ]);
        $option = new Option();
        $option->name = $request->name;
        $option->option_group_id = $request->option_group_id;
        $option->type = $request->type;
        $option->sort_order = $request->sort_order;
        if ($option->save()) {
            if ($request->option_value) {
                foreach ($request->option_value as  $value) {
                    if ($value['image']) {
                        $image = $value['image'];
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                        $extension = $image->getClientOriginalExtension();
                        $filenameOptionImage = $filename . '_' . time() . '.' . $extension;
                        $resizeImage = Image::make($image)->resize(160, 160)->encode($extension);
                        Storage::disk('s3')->put('/option/' . $filenameOptionImage, (string)$resizeImage, 'public');
                    }
                    OptionValue::create(['option_id' => $option->id, 'name' => $value['name'], 'image' => $filenameOptionImage, 'sort_order' => $value['sort_order']]);
                }
            }
            session()->flash('success', 'Option has been created successfully');
            return redirect()->to('/admin/options');
        } else {
            session()->flash('error', 'Data is not inserted. Something wrong Plz try again!');
            return redirect()->to('/admin/option/add');
        }
        // dd($request->all());
    }

    public function editOption($opti_id)
    {
        $option = Option::find($opti_id);
        $optionValues = OptionValue::where("option_id", $option->id)->get();
        //dd($optionValues);
        $optionGroups = OptionGroup::all();
        return view('admin.edit-option', compact('optionGroups', 'option', 'opti_id', 'optionValues'));
    }

    public function addOptionUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'option_group_id' => 'required',
            'type' => 'required',
        ]);
        $option = Option::find($id);
        $option->name = $request->name;
        $option->option_group_id = $request->option_group_id;
        $option->type = $request->type;
        $option->sort_order = $request->sort_order;
        if ($option->save()) {
            if ($request->option_value) {
                foreach ($request->option_value as  $value) {
                    if (isset($value['image'])) {
                        $image = $value['image'];
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                        $extension = $image->getClientOriginalExtension();
                        $filenameOptionImage = $filename . '_' . time() . '.' . $extension;
                        $resizeImage = Image::make($image)->resize(160, 160)->encode($extension);
                        Storage::disk('s3')->put('/option/' . $filenameOptionImage, (string)$resizeImage, 'public');
                    } else {
                        $filenameOptionImage = $value['imageName'];
                    }
                    if (isset($value['optionValueId'])) {
                        $optionValue = OptionValue::find($value['optionValueId']);
                        $optionValue->name = $value['name'];
                        $optionValue->option_id = $option->id;
                        $optionValue->image = $filenameOptionImage;
                        $optionValue->sort_order = $value['sort_order'];
                        $optionValue->save();
                    } else {
                        OptionValue::create(['option_id' => $option->id, 'name' => $value['name'], 'image' => $filenameOptionImage, 'sort_order' => $value['sort_order']]);
                    }
                }
            }
            session()->flash('success', 'Option has been created successfully');
            return redirect()->to('/admin/options');
        } else {
            session()->flash('error', 'Data is not inserted. Something wrong Plz try again!');
            return redirect()->to('/admin/option/add');
        }
    }
}
