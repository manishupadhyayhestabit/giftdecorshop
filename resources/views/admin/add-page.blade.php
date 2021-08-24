@extends('layouts.master')
@section('content')
<div>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3> {{ __('Add Page') }}</h3>
       {{ Breadcrumbs::render('addPage') }}
      </div>
    </div>
  </div>
</div>
<div id="main-wrapper" class="container">
  <div class="row">
  <div class="col-md-12"> 
  @if (Session::has('error'))
    <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>    
  @endif   
  </div>
    <div class="col-md-12">
      <div class="panel panel-white">
        <div class="panel-body">
        <form enctype="multipart/form-data" action="{{ route('admin.addpagesubmit') }}" class="form-horizontal" method="post">
            @csrf
            <div class="form-group">
              <label for="post_title" class="col-sm-2 control-label required">Page Title</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Page Title" class="form-control" name="post_title" />
              @error('post_title') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>  
         <div class="form-group">
          <label for="meta_title" class="col-sm-2 control-label required">Meta Title</label>
          <div class="col-sm-10">
            <input type="text" name="meta_title" id="meta_title" value="" autocomplete="off" placeholder="Meta Title" class="form-control">
            @error('meta_title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        </div>
        <div class="form-group">
          <label for="meta_description" class="col-sm-2 control-label optional">Meta Description</label>
          <div class="col-sm-10">
            <textarea name="meta_description" id="meta_description" autocomplete="off" placeholder="Meta Description" class="form-control" rows="2" cols="5"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="meta_keyword" class="col-sm-2 control-label optional">Meta Keyword</label>
          <div class="col-sm-10">
            <textarea name="meta_keyword" id="meta_keyword" autocomplete="off" placeholder="Meta Keyword" class="form-control" rows="2" cols="5"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="parent_post" class="col-sm-2 control-label optional">Parent Page</label>
          <div class="col-sm-10">
            <select name="parent_post" id="parent_post" class="form-control">
                <option value="0">----None----</option>
                @foreach ($parentPages as $parentPage)
                <option value="{{ $parentPage->id }}">{{ $parentPage->post_title }}</option>    
                @endforeach
            </select>
          </div>
        </div> 
        <div class="form-group">
          <label for="layout_slug" class="col-sm-2 control-label optional">Layout Slug</label>
          <div class="col-sm-10">
            <select name="layout_slug" id="layout_slug" class="form-control">
                @foreach ($layouts as $layout)
                <option value="{{ $layout->slug }}">{{ $layout->name }}</option>    
                @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="post_content" class="col-sm-2 control-label optional">Content</label>
          <div class="col-sm-10">
            <textarea name="post_content" id="post_content" autocomplete="off" placeholder="This is your first post. Edit or delete it, then start writing!" class="form-control summernote" rows="5" cols="5"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="post_excerpt" class="col-sm-2 control-label optional">Page Excerpt</label>
          <div class="col-sm-10">
            <textarea name="post_excerpt" id="post_excerpt" autocomplete="off" class="form-control" rows="5" cols="5"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="feature_image" class="col-sm-2 control-label optional">Feature Image</label>
          <div class="col-sm-10"><input type="file" name="feature_image" id="feature_image" value=""></div>
        </div>
        <div class="form-group">
          <label for="sort_order" class="col-sm-2 control-label optional">Sort Order</label>
          <div class="col-sm-10">
            <input type="text" name="sort_order" id="sort_order" value="0" autocomplete="off" placeholder="Sort Order" class="form-control">
          </div>
        </div>
        <div class="form-group" id="custom-option">
          <input type="hidden" id="custom-count" value="1" name="custom-count">
            <div id="custom-value">
            <div class="row" id="add-Custom-option1">
              <div style="float: left; width: 10%; text-align: center; margin-top: 50px;"><img onclick="customOption('1');" src="{{ asset('backend/images/add.png') }}" alt="Add" style="cursor:pointer;"></div>
              <table style="width:80%;" class="table table-bordered">
                <tbody class="section1">
                  <tr>
                    <th width="30%" class="text-left"><input class="form-control" id="title1" placeholder="Title" name="customOption[1][title]" value="" type="text"></th>
                    <th width="40%" class="text-left"><textarea name="customOption[1][content]" id="content1" rows="2" placeholder="Content" class="form-control"></textarea></th>
                    <th width="20%" class="text-left"><input name="customOption[1][image]" id="customFieldImage1" value="" type="file">
                    <span style="padding:5px;">Or</span><br><input id="fontIcon1" placeholder="Font Icons" name="customOption[1][fontIcon]" value="" type="text" style="width:185px;"></th>
                    <th width="10%" class="text-center"><img onclick="addCustomOptions('1','1');" id="addAttri11" src="{{ asset('backend/images/add.png') }}" alt="Add" style="cursor:pointer;"></th>
                  </tr>
                  <tr id="input_11">
                    <td class="text-left"><input class="form-control" name="customOption[1][subcustomOption][1][customName]" value="" autocomplete="off" placeholder="Custom Name" type="text"></td>
                    <td class="text-left"><textarea name="customOption[1][subcustomOption][1][customValue]" rows="2" placeholder="Custom Value" class="form-control"></textarea></td>
                    <td class="text-left"><input name="customOption[1][subcustomOption][1][customImage]" id="customFieldOptionsImage11" value="" type="file">
                    <span style="padding:5px;">Or</span><br><input name="customOption[1][subcustomOption][1][customFontIcon]" value="" autocomplete="off" placeholder="Font Icons" type="text" style="width:185px;"></td>
                    <td class="text-center"><img onclick="removeAddCustomOptions('1','1');" src="{{ asset('backend/images/close.png') }}" alt="Remove" style="cursor:pointer;"></td>
                  </tr>
                </tbody>
              </table>
            </div>
         </div>
        <div class="form-group">
            <div class="col-sm-11 col-md-offset-1">
                <input type="submit" name="submit" value="Switch to draft" class="btn btn-default">
                <input type="submit" name="submit" value="Publish" class="btn btn-success">
            </div>
        </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
function customOption(){
	var customCount = $('#custom-count').val();
	var customValue = $.trim($('#custom-value').html());
	if(customValue!='' && customCount>=1){
		customCount = $.trim(1+parseInt(customCount));
		}
	var html = '<div class="row" id="add-Custom-option'+customCount+'"><div style="float: left; width: 10%; text-align: center; margin-top: 50px;"><img onClick="removeCustomOption('+customCount+');" style="cursor:pointer;" src="{{ asset('backend/images/close.png') }}" alt="Close"></div><table bgcolor="#CCCCCC" style="width:80%;" class="table table-bordered"> <tbody class="section'+customCount+'"><tr><th width="30%" class="text-left"><input class="form-control" placeholder="Title" id="title'+customCount+'" name="customOption['+customCount+'][title]" value="" onFocus="hideError(this)" type="text"></th><th width="40%" class="text-left"><textarea name="customOption['+customCount+'][content]" id="content'+customCount+'" rows="2" placeholder="Content" class="form-control"></textarea></th><th width="20%" class="text-left"><input name="customOption['+customCount+'][image]" id="customFieldImage'+customCount+'" value="" type="file"><span style="padding:5px;">Or</span><br><input id="fontIcon'+customCount+'" placeholder="Font Icons" name="customOption['+customCount+'][fontIcon]" value="" type="text" style="width:185px;"></th><th width="10%" class="text-center"><img onclick="addCustomOptions('+customCount+',1);" id="addAttri'+customCount+'1" class="add right" style="cursor: pointer;" src="{{ asset('backend/images/add.png') }}" alt="Add"></td></tr><tr id="input_'+customCount+'1"><td class="text-left"><input class="form-control" name="customOption['+customCount+'][subcustomOption][1][customName]" value="" placeholder="Custom Name" type="text"></td><td class="text-left"><textarea name="customOption['+customCount+'][subcustomOption][1][customValue]" rows="2" placeholder="Custom Value" class="form-control"></textarea></td><td class="text-left"><input name="customOption['+customCount+'][subcustomOption][1][customImage]" id="customFieldOptionsImage'+customCount+'1" value="" type="file"><span style="padding:5px;">Or</span><br><input name="customOption['+customCount+'][subcustomOption][1][customFontIcon]" value="" autocomplete="off" placeholder="Font Icons" type="text" style="width:185px;"></td><td class="text-center"><img onClick="removeAddCustomOptions('+customCount+', 1);" style="cursor: pointer;" src="{{ asset('backend/images/close.png') }}" alt="Remove"></td></tr></tbody></table></div>';
	$('body #custom-value').append(html);
	$('#custom-count').val(customCount);
	}
	
function removeCustomOption(divId){
	 $("#add-Custom-option"+divId).remove();
	}
	
function addCustomOptions(field,divId){
	var id=1+parseInt(divId),txt_box;
	txt_box='<tr id="input_'+field+id+'"><td class="text-left"><input class="form-control" name="customOption['+field+'][subcustomOption]['+id+'][customName]" value="" autocomplete="off" placeholder="Custom Name"  type="text"></td><td class="text-left"><textarea name="customOption['+field+'][subcustomOption]['+id+'][customValue]" rows="2" placeholder="Custom Value" class="form-control"></textarea></td><td class="text-left"><input name="customOption['+field+'][subcustomOption]['+id+'][customImage]" id="customFieldOptionsImage'+field+id+'" value="" type="file"><span style="padding:5px;">Or</span><br><input name="customOption['+field+'][subcustomOption]['+id+'][customFontIcon]" value="" autocomplete="off" placeholder="Font Icons" type="text" style="width:185px;"></td><td class="text-center"><img onClick="removeAddCustomOptions('+field+','+id+');" style="cursor: pointer;" src="{{ asset('backend/images/close.png') }}" alt="Remove"></td></tr>';
	  $(".section"+field).append(txt_box);
	  $("#addAttri"+field+'1').attr('onClick',"addCustomOptions('"+field+"','"+id+"')");
	}
function removeAddCustomOptions(field,divId){
	$("#input_"+field+divId).remove();
	}
</script>
@endsection