<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomField;
use App\Models\CustomFieldOption;
use App\Models\Layout;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class CmsController extends Controller
{
    public function addPost()
    {
        $layouts = Layout::where('post_type', 'post')->get();
        return view('admin.add-post', ['layouts' => $layouts]);
    }

    public function addPostSubmit(Request $request)
    {
        $filenameFeatureImage = '';
        $filenameCustomImage = '';
        $filenameSubCustomImage = '';
        $validatedData = $request->validate([
            'post_title' => 'required|unique:posts,post_title',
            'meta_title' => 'required|unique:posts,meta_title',
        ]);
        $post = new Post;
        $post->post_title = $request->post_title;
        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;
        $post->meta_keyword = $request->meta_keyword;
        $post->layout_slug = $request->layout_slug;
        $post->post_content = $request->post_content;
        $post->post_excerpt = $request->post_excerpt;
        $post->sort_order = $request->sort_order;
        $post->slug = Str::slug($request->post_title);
        if (isset($request->feature_image)) {
            $image = $request->feature_image;
            $filenamewithextension = $image->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $filenameFeatureImage = $filename . '_' . time() . '.' . $extension;
            $resizeImage = Image::make($image)->resize(160, 160)->encode($extension);
            Storage::disk('s3')->put('/posts/' . $filenameFeatureImage, (string)$resizeImage, 'public');
        }
        $post->featured_image = ($filenameFeatureImage) ? $filenameFeatureImage : '';
        $post->post_type = 'post';
        $post->parent_post_id = 0;
        $post->user_id = Auth::user()->id;
        $post->status = ($request->submit == 'Publish') ? 'publish' : 'draft';
        if ($post->save()) {
            if (isset($request->post_category)) {
                foreach ($request->post_category as $postCategory) {
                    $post->categories()->attach($postCategory);
                }
                if (isset($request->customOption)) {
                    foreach ($request->customOption as $customOption) {
                        if (isset($customOption['image'])) {
                            $image = $customOption['image'];
                            $filenamewithextension = $image->getClientOriginalName();
                            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                            $extension = $image->getClientOriginalExtension();
                            $filenameCustomImage = $filename . '_' . time() . '.' . $extension;
                            $resizeImage = Image::make($image)->resize(160, 160)->encode($extension);
                            Storage::disk('s3')->put('/posts/custom-images/' . $filenameCustomImage, (string)$resizeImage, 'public');
                        }
                        $customImage = ($filenameCustomImage) ? $filenameCustomImage : '';
                        if (isset($customOption['title'])) {
                            $customFieldId = CustomField::insertGetId(['term_id' => $post->id, 'post_type' => 'post', 'title' => $customOption['title'], 'content' => $customOption['content'], 'image' => $customImage, 'font_icon' => $customOption['fontIcon']]);
                        }
                        foreach ($customOption['subcustomOption'] as $subcustomOption) {
                            if (isset($subcustomOption['customImage'])) {
                                $image = $subcustomOption['customImage'];
                                $filenamewithextension = $image->getClientOriginalName();
                                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                                $extension = $image->getClientOriginalExtension();
                                $filenameSubCustomImage = $filename . '_' . time() . '.' . $extension;
                                $resizeImage = Image::make($image)->resize(160, 160)->encode($extension);
                                Storage::disk('s3')->put('/posts/custom-images/custom-sub-images/' . $filenameSubCustomImage, (string)$resizeImage, 'public');
                            }
                            $subCustomImage = ($filenameSubCustomImage) ? $filenameSubCustomImage : '';
                            if (isset($subcustomOption['customName'])) {
                                CustomFieldOption::create(['custom_field_id' => $customFieldId, 'custom_name' => $subcustomOption['customName'], 'custom_value' => $subcustomOption['customValue'], 'custom_image' => $subCustomImage, 'custom_font_icon' => $subcustomOption['customFontIcon']]);
                            }
                        }
                    }
                }
            }
            session()->flash('success', 'Post has been created successfully');
            return redirect()->to('/admin/posts');
        } else {
            session()->flash('error', 'Data is not inserted. Something wrong Plz try again!');
            return redirect()->to('/admin/post/add');
        }
    }

    public function editPost($post_id)
    {
        $post = Post::find($post_id);
        $layouts = Layout::where('post_type', 'post')->get();
        $postCategories = $post->categories;
        $customOptions = CustomField::where('term_id', $post_id)->where('post_type', 'post')->get();
        $totalCustomOptions = CustomField::where('term_id', $post_id)->where('post_type', 'post')->get()->count();
        //dd($postCategories);
        return view('admin.edit-post', compact('post', 'layouts', 'postCategories', 'customOptions', 'totalCustomOptions'));
    }

    public function editPostUpdate(Request $request, $post_id)
    {
        $filenameFeatureImage = '';
        $filenameCustomImage = '';
        $filenameSubCustomImage = '';
        $validatedData = $request->validate([
            'post_title' => 'required',
            'meta_title' => 'required',
        ]);
        $post = Post::find($post_id);
        $post->post_title = $request->post_title;
        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;
        $post->meta_keyword = $request->meta_keyword;
        $post->layout_slug = $request->layout_slug;
        $post->post_content = $request->post_content;
        $post->post_excerpt = $request->post_excerpt;
        $post->sort_order = $request->sort_order;
        $post->slug = Str::slug($request->post_title);
        if (isset($request->feature_image)) {
            if ($post->featured_image) {
                Storage::disk('s3')->delete('http://gds-image.s3-ap-south-1.amazonaws.com/posts/' . $post->featured_image);
            }
            $image = $request->feature_image;
            $filenamewithextension = $image->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $filenameFeatureImage = $filename . '_' . time() . '.' . $extension;
            $resizeImage = Image::make($image)->resize(160, 160)->encode($extension);
            Storage::disk('s3')->put('/posts/' . $filenameFeatureImage, (string)$resizeImage, 'public');
        }
        $post->featured_image = ($filenameFeatureImage) ? $filenameFeatureImage : $post->featured_image;
        $post->post_type = 'post';
        $post->parent_post_id = 0;
        $post->user_id = Auth::user()->id;
        $post->status = ($request->submit == 'Update') ? 'publish' : 'draft';
        if ($post->save()) {
            if (isset($request->post_category)) {
                $post->categories()->sync($request->post_category);
                if (isset($request->customOption)) {
                    foreach ($request->customOption as $customOption) {
                        $filenameCustomImage = '';
                        if (isset($customOption['id'])) {
                            $customFieldData = CustomField::find($customOption['id']);
                            $customFieldData->title = $customOption['title'];
                            $customFieldData->content = $customOption['content'];
                            $customFieldData->font_icon = $customOption['fontIcon'];
                            if (isset($customOption['image'])) {
                                if ($customFieldData->image) {
                                    Storage::disk('s3')->delete('http://gds-image.s3-ap-south-1.amazonaws.com/posts/custom-images/' . $customFieldData->image);
                                }
                                $image = $customOption['image'];
                                $filenamewithextension = $image->getClientOriginalName();
                                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                                $extension = $image->getClientOriginalExtension();
                                $filenameCustomImage = $filename . '_' . time() . '.' . $extension;
                                $resizeImage = Image::make($image)->resize(160, 160)->encode($extension);
                                Storage::disk('s3')->put('/posts/custom-images/' . $filenameCustomImage, (string)$resizeImage, 'public');
                            }
                            $customFieldData->image = ($filenameCustomImage) ? $filenameCustomImage : $customFieldData->image;
                            $customFieldData->save();
                            $customFieldId = $customOption['id'];
                            foreach ($customOption['subcustomOption'] as $subcustomOption) {
                                $filenameSubCustomImage = '';
                                if (isset($subcustomOption['id'])) {
                                    $customFieldOptionData = CustomFieldOption::find($subcustomOption['id']);
                                    $customFieldOptionData->custom_name = $subcustomOption['customName'];
                                    $customFieldOptionData->custom_value = $subcustomOption['customValue'];
                                    $customFieldOptionData->custom_font_icon = $subcustomOption['customFontIcon'];
                                    if (isset($subcustomOption['customImage'])) {
                                        if ($customFieldOptionData->custom_image) {
                                            Storage::disk('s3')->delete('http://gds-image.s3-ap-south-1.amazonaws.com/posts/custom-images/custom-sub-images/' . $customFieldOptionData->custom_image);
                                        }
                                        $image = $subcustomOption['customImage'];
                                        $filenamewithextension = $image->getClientOriginalName();
                                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                                        $extension = $image->getClientOriginalExtension();
                                        $filenameSubCustomImage = $filename . '_' . time() . '.' . $extension;
                                        $resizeImage = Image::make($image)->resize(160, 160)->encode($extension);
                                        Storage::disk('s3')->put('/posts/custom-images/custom-sub-images/' . $filenameSubCustomImage, (string)$resizeImage, 'public');
                                    }
                                    $customFieldOptionData->custom_image = ($filenameSubCustomImage) ? $filenameSubCustomImage : $customFieldOptionData->custom_image;
                                    $customFieldOptionData->save();
                                } else {
                                    if (isset($subcustomOption['customImage'])) {
                                        $image = $subcustomOption['customImage'];
                                        $filenamewithextension = $image->getClientOriginalName();
                                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                                        $extension = $image->getClientOriginalExtension();
                                        $filenameSubCustomImage = $filename . '_' . time() . '.' . $extension;
                                        $resizeImage = Image::make($image)->resize(160, 160)->encode($extension);
                                        Storage::disk('s3')->put('/posts/custom-images/custom-sub-images/' . $filenameSubCustomImage, (string)$resizeImage, 'public');
                                    }
                                    $subCustomImage = ($filenameSubCustomImage) ? $filenameSubCustomImage : '';
                                    CustomFieldOption::create(['custom_field_id' => $customFieldId, 'custom_name' => $subcustomOption['customName'], 'custom_value' => $subcustomOption['customValue'], 'custom_image' => $subCustomImage, 'custom_font_icon' => $subcustomOption['customFontIcon']]);
                                }
                            }
                        } else {
                            if (isset($customOption['image'])) {
                                $image = $customOption['image'];
                                $filenamewithextension = $image->getClientOriginalName();
                                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                                $extension = $image->getClientOriginalExtension();
                                $filenameCustomImage = $filename . '_' . time() . '.' . $extension;
                                $resizeImage = Image::make($image)->resize(160, 160)->encode($extension);
                                Storage::disk('s3')->put('/posts/custom-images/' . $filenameCustomImage, (string)$resizeImage, 'public');
                            }
                            $customImage = ($filenameCustomImage) ? $filenameCustomImage : '';
                            $customFieldId = CustomField::insertGetId(['term_id' => $post->id, 'post_type' => 'post', 'title' => $customOption['title'], 'content' => $customOption['content'], 'image' => $customImage, 'font_icon' => $customOption['fontIcon']]);
                            foreach ($customOption['subcustomOption'] as $subcustomOption) {
                                $filenameSubCustomImage = '';
                                if (isset($subcustomOption['customImage'])) {
                                    $image = $subcustomOption['customImage'];
                                    $filenamewithextension = $image->getClientOriginalName();
                                    $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                                    $extension = $image->getClientOriginalExtension();
                                    $filenameSubCustomImage = $filename . '_' . time() . '.' . $extension;
                                    $resizeImage = Image::make($image)->resize(160, 160)->encode($extension);
                                    Storage::disk('s3')->put('/posts/custom-images/custom-sub-images/' . $filenameSubCustomImage, (string)$resizeImage, 'public');
                                }
                                $subCustomImage = ($filenameSubCustomImage) ? $filenameSubCustomImage : '';
                                CustomFieldOption::create(['custom_field_id' => $customFieldId, 'custom_name' => $subcustomOption['customName'], 'custom_value' => $subcustomOption['customValue'], 'custom_image' => $subCustomImage, 'custom_font_icon' => $subcustomOption['customFontIcon']]);
                            }
                        }
                    }
                }
            }
            session()->flash('success', 'Post has been created successfully');
            return redirect()->to('/admin/posts');
        } else {
            session()->flash('error', 'Data is not inserted. Something wrong Plz try again!');
            return redirect()->to('/admin/post/add');
        }
    }

    public function addPage()
    {
        $parentPages = Post::where('post_type', 'page')->get();
        $layouts = Layout::where('post_type', 'page')->get();
        return view('admin.add-page', ['layouts' => $layouts, 'parentPages' => $parentPages]);
    }

    public function addPageSubmit(Request $request)
    {
        $filenameFeatureImage = '';
        $filenameCustomImage = '';
        $filenameSubCustomImage = '';
        $validatedData = $request->validate([
            'post_title' => 'required|unique:posts,post_title',
            'meta_title' => 'required|unique:posts,meta_title',
        ]);
        $post = new Post;
        $post->post_title = $request->post_title;
        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;
        $post->meta_keyword = $request->meta_keyword;
        $post->layout_slug = $request->layout_slug;
        $post->post_content = $request->post_content;
        $post->post_excerpt = $request->post_excerpt;
        $post->sort_order = $request->sort_order;
        $post->slug = Str::slug($request->post_title);
        if (isset($request->feature_image)) {
            $image = $request->feature_image;
            $filenamewithextension = $image->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $filenameFeatureImage = $filename . '_' . time() . '.' . $extension;
            $resizeImage = Image::make($image)->resize(160, 160)->encode($extension);
            Storage::disk('s3')->put('/pages/' . $filenameFeatureImage, (string)$resizeImage, 'public');
        }
        $post->featured_image = ($filenameFeatureImage) ? $filenameFeatureImage : '';
        $post->post_type = 'page';
        $post->parent_post_id = $request->parent_post;
        $post->user_id = Auth::user()->id;
        $post->status = ($request->submit == 'Publish') ? 'publish' : 'draft';
        if ($post->save()) {
            if (isset($request->customOption)) {
                foreach ($request->customOption as $customOption) {
                    if (isset($customOption['image'])) {
                        $image = $customOption['image'];
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                        $extension = $image->getClientOriginalExtension();
                        $filenameCustomImage = $filename . '_' . time() . '.' . $extension;
                        $resizeImage = Image::make($image)->resize(160, 160)->encode($extension);
                        Storage::disk('s3')->put('/pages/custom-images/' . $filenameCustomImage, (string)$resizeImage, 'public');
                    }
                    $customImage = ($filenameCustomImage) ? $filenameCustomImage : '';
                    if (isset($customOption['title'])) {
                        $customFieldId = CustomField::insertGetId(['term_id' => $post->id, 'post_type' => 'page', 'title' => $customOption['title'], 'content' => $customOption['content'], 'image' => $customImage, 'font_icon' => $customOption['fontIcon']]);
                    }
                    foreach ($customOption['subcustomOption'] as $subcustomOption) {
                        if (isset($subcustomOption['customImage'])) {
                            $image = $subcustomOption['customImage'];
                            $filenamewithextension = $image->getClientOriginalName();
                            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                            $extension = $image->getClientOriginalExtension();
                            $filenameSubCustomImage = $filename . '_' . time() . '.' . $extension;
                            $resizeImage = Image::make($image)->resize(160, 160)->encode($extension);
                            Storage::disk('s3')->put('/pages/custom-images/custom-sub-images/' . $filenameSubCustomImage, (string)$resizeImage, 'public');
                        }
                        $subCustomImage = ($filenameSubCustomImage) ? $filenameSubCustomImage : '';
                        if (isset($subcustomOption['customName'])) {
                            CustomFieldOption::create(['custom_field_id' => $customFieldId, 'custom_name' => $subcustomOption['customName'], 'custom_value' => $subcustomOption['customValue'], 'custom_image' => $subCustomImage, 'custom_font_icon' => $subcustomOption['customFontIcon']]);
                        }
                    }
                }
            }
            session()->flash('success', 'Page has been created successfully');
            return redirect()->to('/admin/pages');
        } else {
            session()->flash('error', 'Data is not inserted. Something wrong Plz try again!');
            return redirect()->to('/admin/page/add');
        }
    }

    public function editPage($page_id)
    {
        $page = Post::find($page_id);
        $layouts = Layout::where('post_type', 'page')->get();
        $customOptions = CustomField::where('term_id', $page_id)->where('post_type', 'page')->get();
        $totalCustomOptions = CustomField::where('term_id', $page_id)->where('post_type', 'page')->get()->count();
        $parentPages = Post::where('post_type', 'page')->get();
        return view('admin.edit-page', compact('page', 'parentPages', 'layouts', 'customOptions', 'totalCustomOptions'));
    }

    public function editPageUpdate(Request $request, $page_id)
    {
        $filenameFeatureImage = '';
        $filenameCustomImage = '';
        $filenameSubCustomImage = '';
        $validatedData = $request->validate([
            'post_title' => 'required',
            'meta_title' => 'required',
        ]);
        $post = Post::find($page_id);
        $post->post_title = $request->post_title;
        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;
        $post->meta_keyword = $request->meta_keyword;
        $post->layout_slug = $request->layout_slug;
        $post->post_content = $request->post_content;
        $post->post_excerpt = $request->post_excerpt;
        $post->sort_order = $request->sort_order;
        $post->slug = Str::slug($request->post_title);
        if (isset($request->feature_image)) {
            if ($post->featured_image) {
                Storage::disk('s3')->delete('http://gds-image.s3-ap-south-1.amazonaws.com/pages/' . $post->featured_image);
            }
            $image = $request->feature_image;
            $filenamewithextension = $image->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $filenameFeatureImage = $filename . '_' . time() . '.' . $extension;
            $resizeImage = Image::make($image)->resize(160, 160)->encode($extension);
            Storage::disk('s3')->put('/pages/' . $filenameFeatureImage, (string)$resizeImage, 'public');
        }
        $post->featured_image = ($filenameFeatureImage) ? $filenameFeatureImage : $post->featured_image;
        $post->post_type = 'page';
        $post->parent_post_id = $request->parent_post;
        $post->user_id = Auth::user()->id;
        $post->status = ($request->submit == 'Update') ? 'publish' : 'draft';
        if ($post->save()) {
            if (isset($request->customOption)) {
                foreach ($request->customOption as $customOption) {
                    $filenameCustomImage = '';
                    if (isset($customOption['id'])) {
                        $customFieldData = CustomField::find($customOption['id']);
                        $customFieldData->title = $customOption['title'];
                        $customFieldData->content = $customOption['content'];
                        $customFieldData->font_icon = $customOption['fontIcon'];
                        if (isset($customOption['image'])) {
                            if ($customFieldData->image) {
                                Storage::disk('s3')->delete('http://gds-image.s3-ap-south-1.amazonaws.com/pages/custom-images/' . $customFieldData->image);
                            }
                            $image = $customOption['image'];
                            $filenamewithextension = $image->getClientOriginalName();
                            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                            $extension = $image->getClientOriginalExtension();
                            $filenameCustomImage = $filename . '_' . time() . '.' . $extension;
                            $resizeImage = Image::make($image)->resize(160, 160)->encode($extension);
                            Storage::disk('s3')->put('/pages/custom-images/' . $filenameCustomImage, (string)$resizeImage, 'public');
                        }
                        $customFieldData->image = ($filenameCustomImage) ? $filenameCustomImage : $customFieldData->image;
                        $customFieldData->save();
                        $customFieldId = $customOption['id'];
                        foreach ($customOption['subcustomOption'] as $subcustomOption) {
                            $filenameSubCustomImage = '';
                            if (isset($subcustomOption['id'])) {
                                $customFieldOptionData = CustomFieldOption::find($subcustomOption['id']);
                                $customFieldOptionData->custom_name = $subcustomOption['customName'];
                                $customFieldOptionData->custom_value = $subcustomOption['customValue'];
                                $customFieldOptionData->custom_font_icon = $subcustomOption['customFontIcon'];
                                if (isset($subcustomOption['customImage'])) {
                                    if ($customFieldOptionData->custom_image) {
                                        Storage::disk('s3')->delete('http://gds-image.s3-ap-south-1.amazonaws.com/pages/custom-images/custom-sub-images/' . $customFieldOptionData->custom_image);
                                    }
                                    $image = $subcustomOption['customImage'];
                                    $filenamewithextension = $image->getClientOriginalName();
                                    $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                                    $extension = $image->getClientOriginalExtension();
                                    $filenameSubCustomImage = $filename . '_' . time() . '.' . $extension;
                                    $resizeImage = Image::make($image)->resize(160, 160)->encode($extension);
                                    Storage::disk('s3')->put('/pages/custom-images/custom-sub-images/' . $filenameSubCustomImage, (string)$resizeImage, 'public');
                                }
                                $customFieldOptionData->custom_image = ($filenameSubCustomImage) ? $filenameSubCustomImage : $customFieldOptionData->custom_image;
                                $customFieldOptionData->save();
                            } else {
                                if (isset($subcustomOption['customImage'])) {
                                    $image = $subcustomOption['customImage'];
                                    $filenamewithextension = $image->getClientOriginalName();
                                    $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                                    $extension = $image->getClientOriginalExtension();
                                    $filenameSubCustomImage = $filename . '_' . time() . '.' . $extension;
                                    $resizeImage = Image::make($image)->resize(160, 160)->encode($extension);
                                    Storage::disk('s3')->put('/pages/custom-images/custom-sub-images/' . $filenameSubCustomImage, (string)$resizeImage, 'public');
                                }
                                $subCustomImage = ($filenameSubCustomImage) ? $filenameSubCustomImage : '';
                                CustomFieldOption::create(['custom_field_id' => $customFieldId, 'custom_name' => $subcustomOption['customName'], 'custom_value' => $subcustomOption['customValue'], 'custom_image' => $subCustomImage, 'custom_font_icon' => $subcustomOption['customFontIcon']]);
                            }
                        }
                    } else {
                        if (isset($customOption['image'])) {
                            $image = $customOption['image'];
                            $filenamewithextension = $image->getClientOriginalName();
                            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                            $extension = $image->getClientOriginalExtension();
                            $filenameCustomImage = $filename . '_' . time() . '.' . $extension;
                            $resizeImage = Image::make($image)->resize(160, 160)->encode($extension);
                            Storage::disk('s3')->put('/pages/custom-images/' . $filenameCustomImage, (string)$resizeImage, 'public');
                        }
                        $customImage = ($filenameCustomImage) ? $filenameCustomImage : '';
                        $customFieldId = CustomField::insertGetId(['term_id' => $post->id, 'post_type' => 'page', 'title' => $customOption['title'], 'content' => $customOption['content'], 'image' => $customImage, 'font_icon' => $customOption['fontIcon']]);
                        foreach ($customOption['subcustomOption'] as $subcustomOption) {
                            $filenameSubCustomImage = '';
                            if (isset($subcustomOption['customImage'])) {
                                $image = $subcustomOption['customImage'];
                                $filenamewithextension = $image->getClientOriginalName();
                                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                                $extension = $image->getClientOriginalExtension();
                                $filenameSubCustomImage = $filename . '_' . time() . '.' . $extension;
                                $resizeImage = Image::make($image)->resize(160, 160)->encode($extension);
                                Storage::disk('s3')->put('/pages/custom-images/custom-sub-images/' . $filenameSubCustomImage, (string)$resizeImage, 'public');
                            }
                            $subCustomImage = ($filenameSubCustomImage) ? $filenameSubCustomImage : '';
                            CustomFieldOption::create(['custom_field_id' => $customFieldId, 'custom_name' => $subcustomOption['customName'], 'custom_value' => $subcustomOption['customValue'], 'custom_image' => $subCustomImage, 'custom_font_icon' => $subcustomOption['customFontIcon']]);
                        }
                    }
                }
            }
            session()->flash('success', 'Page has been created successfully');
            return redirect()->to('/admin/pages');
        } else {
            session()->flash('error', 'Data is not inserted. Something wrong Plz try again!');
            return redirect()->to('/admin/page/add');
        }
    }
}
