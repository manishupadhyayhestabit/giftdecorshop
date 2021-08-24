@extends('layouts.master')
@section('content')
<div>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3> {{ __('Edit Post') }}</h3>
       {{ Breadcrumbs::render('editPost',$post->id) }}
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
        <form enctype="multipart/form-data" action="{{ route('admin.editpostupdate', $post->id) }}" class="form-horizontal" method="post">
            @csrf
            <div class="form-group">
              <label for="post_title" class="col-sm-2 control-label required">Post Title</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Post Title" value="{{ $post->post_title }}" class="form-control" name="post_title" />
              @error('post_title') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>  
         <div class="form-group">
          <label for="meta_title" class="col-sm-2 control-label required">Meta Title</label>
          <div class="col-sm-10">
            <input type="text" name="meta_title" id="meta_title" value="{{ $post->meta_title }}" autocomplete="off" placeholder="Meta Title" class="form-control">
            @error('meta_title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        </div>
        <div class="form-group">
          <label for="meta_description" class="col-sm-2 control-label optional">Meta Description</label>
          <div class="col-sm-10">
            <textarea name="meta_description" id="meta_description" autocomplete="off" placeholder="Meta Description" class="form-control" rows="2" cols="5">{{ $post->meta_description }}</textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="meta_keyword" class="col-sm-2 control-label optional">Meta Keyword</label>
          <div class="col-sm-10">
            <textarea name="meta_keyword" id="meta_keyword" autocomplete="off" placeholder="Meta Keyword" class="form-control" rows="2" cols="5">{{ $post->meta_keyword }}</textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label" for="input-category"><span data-toggle="tooltip" title="" data-original-title="(Autocomplete)">Categories</span></label>
          <div class="col-sm-10">
            <input name="category" value="" placeholder="Categories" id="input-category" class="form-control ui-autocomplete-input" autocomplete="off" type="text">
            <div id="post-category" class="well well-sm" style="height: 150px; overflow: auto;">
                @foreach ($postCategories as $postCategory)
                    <div id="post-category"><i class="fa fa-minus-circle"></i> {{ $postCategory->name }}
                        <input name="post_category[]" value="{{ $postCategory->id }}" type="hidden">
                    </div>
                @endforeach
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="layout_slug" class="col-sm-2 control-label optional">Layout Slug</label>
          <div class="col-sm-10">
            <select name="layout_slug" id="layout_slug" class="form-control">
                @foreach ($layouts as $layout)
                <option value="{{ $layout->slug }}" {{ ($layout->slug==$post->layout_slug)?'selected':'' }}>{{ $layout->name }}</option>    
                @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="post_content" class="col-sm-2 control-label optional">Content</label>
          <div class="col-sm-10">
            <textarea name="post_content" id="post_content" autocomplete="off" placeholder="This is your first post. Edit or delete it, then start writing!" class="form-control summernote" rows="5" cols="5">{{ $post->post_content }}</textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="post_excerpt" class="col-sm-2 control-label optional">Post Excerpt</label>
          <div class="col-sm-10">
            <textarea name="post_excerpt" id="post_excerpt" autocomplete="off" class="form-control" rows="5" cols="5">{{ $post->post_excerpt }}</textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="feature_image" class="col-sm-2 control-label optional">Feature Image</label>
            <div class="col-sm-10"><input type="file" name="feature_image" id="feature_image" value=""></div>
            @if ($post->featured_image)
                <img src="{{ config('AWS_URL','http://gds-image.s3-ap-south-1.amazonaws.com') }}/posts/{{ $post->featured_image }}" width="50px" />
            @endif
        </div>
        <div class="form-group">
          <label for="sort_order" class="col-sm-2 control-label optional">Sort Order</label>
          <div class="col-sm-10">
            <input type="text" name="sort_order" id="sort_order" value="{{ $post->sort_order }}" autocomplete="off" placeholder="Sort Order" class="form-control">
          </div>
        </div>
        <div class="form-group" id="custom-option">
          <input type="hidden" id="custom-count" value="{{ $totalCustomOptions }}" name="custom-count">
            <div id="custom-value">
            @php  $sn=1;  @endphp
            @foreach ($customOptions as $customOption)
                <div class="row" id="add-Custom-option{{ $sn }}">
                @if ($sn > 1)
                    <div style="float: left; width: 10%; text-align: center; margin-top: 50px;"><img onclick="removeCustomOption({{ $sn }},{{ $customOption->id }});" style="cursor:pointer;" src="{{ asset('backend/images/close.png') }}" alt="Close"></div>
                @else
                    <div style="float: left; width: 10%; text-align: center; margin-top: 50px;"><img onclick="customOption('{{ $sn }}');" style="cursor:pointer;" src="{{ asset('backend/images/add.png') }}" alt="Add"></div>
                @endif
                <input name="customOption[{{ $sn }}][id]" value="{{ $customOption->id }}" type="hidden">
                <table style="width:80%;" class="table table-bordered">
                    <tbody class="section{{ $sn }}">
                        <tr>
                            <th width="30%" class="text-left"><input class="form-control" placeholder="Title" name="customOption[{{ $sn }}][title]" value="{{ $customOption->title }}" type="text"></th>
                            <th width="40%" class="text-left"><textarea name="customOption[{{ $sn }}][content]" rows="2" placeholder="Content" class="form-control">{{ $customOption->content }}</textarea></th>
                            <th width="20%" class="text-left"><input name="customOption[{{ $sn }}][image]" value="" type="file">
                            @if ($customOption->image)
                                <img src="{{ config('AWS_URL','http://gds-image.s3-ap-south-1.amazonaws.com') }}/posts/custom-images/{{ $customOption->image }}" width="50px" />
                            @endif
                            <span style="padding:5px;">Or</span><br><input placeholder="Font Icons" name="customOption[{{ $sn }}][fontIcon]" value="{{ $customOption->font_icon }}" type="text" style="width:185px;"></th>
                            <th width="10%" class="text-center"><img onclick="addCustomOptions('{{ $sn }}','{{ $totalCustomOptions }}');" id="addAttri{{ $sn }}1" src="{{ asset('backend/images/add.png') }}" alt="Add" style="cursor:pointer;"></th>
                        </tr>
                        @php $sno=1; @endphp
                        @foreach ($customOption->customFieldOptions as $customSubOption)
                            <tr id="input_{{ $sn }}{{ $sno }}">
                            <input name="customOption[{{ $sn }}][subcustomOption][{{ $sno }}][id]" value="{{ $customSubOption->id }}" type="hidden">
                            <td class="text-left"><input class="form-control" name="customOption[{{ $sn }}][subcustomOption][{{ $sno }}][customName]" value="{{ $customSubOption->custom_name }}" autocomplete="off" placeholder="Custom Name" type="text"></td>
                            <td class="text-left"><textarea name="customOption[{{ $sn }}][subcustomOption][{{ $sno }}][customValue]" rows="2" placeholder="Custom Value" class="form-control">{{ $customSubOption->custom_value }}</textarea></td>
                            <td class="text-left"><input name="customOption[{{ $sn }}][subcustomOption][{{ $sno }}][customImage]" value="" type="file">
                            @if ($customSubOption->custom_image)
                                <img src="{{ config('AWS_URL','http://gds-image.s3-ap-south-1.amazonaws.com') }}/posts/custom-images/custom-sub-images/{{ $customSubOption->custom_image }}" width="50px" />
                            @endif
                            <span style="padding:5px;">Or</span><br><input name="customOption[{{ $sn }}][subcustomOption][{{ $sno }}][customFontIcon]" value="{{ $customSubOption->custom_font_icon }}" autocomplete="off" placeholder="Font Icons" type="text" style="width:185px;"></td>
                            <td class="text-center"><img onclick="removeAddCustomOptions('{{ $sn }}','{{ $sno }}',{{ $customSubOption->id }});" src="{{ asset('backend/images/close.png') }}" alt="Remove" style="cursor:pointer;"></td>
                        </tr>
                        @php $sno++;  @endphp
                        @endforeach
                      </tbody>
                    </table>
                    </div>
                @php  $sn++; @endphp
            @endforeach
         </div>
        <div class="form-group">
            <div class="col-sm-11 col-md-offset-1">
                <input type="submit" name="submit" value="Switch to draft" class="btn btn-default">
                <input type="submit" name="submit" value="Update" class="btn btn-success">
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
	
function removeCustomOption(divId, id){
    if (typeof id !== 'undefined') {
        var result = confirm('Are you sure you want to Delete this Custom Option ?');
        if (result == true) {
          $.post("{{ route('admin.removecustomoption') }}",{"_token": "{{ csrf_token() }}",'custom_field_id':id}, function(response){
            if(response.msg == 'success'){
                $("#add-Custom-option"+divId).remove();
            }else{
                alert('Error occur Something Worng');
            }
          },"json");  
        }
    }else{
        $("#add-Custom-option"+divId).remove();
    }
}
	
function addCustomOptions(field,divId){
	var id=1+parseInt(divId),txt_box;
	txt_box='<tr id="input_'+field+id+'"><td class="text-left"><input class="form-control" name="customOption['+field+'][subcustomOption]['+id+'][customName]" value="" autocomplete="off" placeholder="Custom Name"  type="text"></td><td class="text-left"><textarea name="customOption['+field+'][subcustomOption]['+id+'][customValue]" rows="2" placeholder="Custom Value" class="form-control"></textarea></td><td class="text-left"><input name="customOption['+field+'][subcustomOption]['+id+'][customImage]" id="customFieldOptionsImage'+field+id+'" value="" type="file"><span style="padding:5px;">Or</span><br><input name="customOption['+field+'][subcustomOption]['+id+'][customFontIcon]" value="" autocomplete="off" placeholder="Font Icons" type="text" style="width:185px;"></td><td class="text-center"><img onClick="removeAddCustomOptions('+field+','+id+');" style="cursor: pointer;" src="{{ asset('backend/images/close.png') }}" alt="Remove"></td></tr>';
	  $(".section"+field).append(txt_box);
	  $("#addAttri"+field+'1').attr('onClick',"addCustomOptions('"+field+"','"+id+"')");
	}
function removeAddCustomOptions(field,divId,id){
     if (typeof id !== 'undefined') {
        var result = confirm('Are you sure you want to Delete this Custom Sub Option ?');
        if (result == true) {
          $.post("{{ route('admin.removecustomsuboption') }}",{"_token": "{{ csrf_token() }}",'custom_sub_field_id':id}, function(response){
            if(response.msg == 'success'){
                $("#input_"+field+divId).remove();
            }else{
                alert('Error occur Something Worng');
            }
          },"json");  
        }
    }else{
        $("#input_"+field+divId).remove();
    }

	
	}
</script>
<script type="text/javascript">
// Category
$('input[name=\'category\']').autocomplete({
	'source': function(request, response) {
		var name = $('input[name=\'category\']').val();
		$.ajax({
			url: "{{ route('admin.searchcategories') }}",
            data:{'search':name},
            type:"GET",
			dataType: 'json',
			success: function(json) {
				response($.map(json, function(item) {
					return {
						label: item['name'],
						value: item['category_id']
					}
				}));
			}
		});
	},
	'select': function(event, ui) { 
		$('input[name=\'category\']').val('');
		$('#post-category' + ui.item.value).remove();
		$('#post-category').append('<div id="post-category' + ui.item.value + '"><i class="fa fa-minus-circle"></i> ' + ui.item.label + '<input type="hidden" name="post_category[]" value="' + ui.item.value + '" /></div>');
		event.preventDefault();
		},
	'focus': function (event, ui) {
    	this.value = ui.item.label;
      	event.preventDefault();
      	}
});
$('#post-category').delegate('.fa-minus-circle', 'click', function() {
	$(this).parent().remove();
	});
</script> 
@endsection