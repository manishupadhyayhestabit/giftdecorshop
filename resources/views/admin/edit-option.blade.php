@extends('layouts.master')
@section('content')
<div>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3> {{ __('Edit Option') }}</h3>
       {{ Breadcrumbs::render('editOption',$opti_id) }}
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
        <form enctype="multipart/form-data" action="{{ route('admin.editoptionupdate',$opti_id) }}" class="form-horizontal" method="post">
            @csrf
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label required">Option Name</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Option Name" value="{{ $option->name }}" class="form-control" name="name" />
              @error('name') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>            
            <div class="form-group">
              <label for="option_group_id" class="col-sm-2 control-label required">Option Group</label>
              <div class="col-sm-10">
                <select class="form-control" name="option_group_id">
                  <option value="">----None----</option>
                  @foreach ($optionGroups as $optionGroup)
                    <option value="{{ $optionGroup->id }}" {{ ($optionGroup->id==$option->option_group_id)?'selected':'' }}>{{ $optionGroup->name }}</option>
                  @endforeach
                  </select>
                  @error('option_group_id') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="form-group"> 
                <label for="type" class="col-sm-2 control-label required">Option Type</label> 
                <div class="col-sm-10"> 
                    <select class="form-control" name="type"> 
                        <optgroup label="Choose"> 
                            <option value="select" {{ ('select'==$option->type)?'selected':'' }}>Select</option> 
                            <option value="radio" {{ ('radio'==$option->type)?'selected':'' }}>Radio</option> 
                            <option value="checkbox" {{ ('checkbox'==$option->type)?'selected':'' }}>Checkbox</option> 
                        </optgroup> 
                        <optgroup label="Input"> 
                            <option value="text" {{ ('text'==$option->type)?'selected':'' }}>Text</option> 
                            <option value="textarea" {{ ('textarea'==$option->type)?'selected':'' }}>Textarea</option> 
                        </optgroup> 
                        <optgroup label="File"> 
                            <option value="file" {{ ('file'==$option->type)?'selected':'' }}>File</option> 
                        </optgroup> 
                        <optgroup label="Date"> 
                            <option value="date" {{ ('date'==$option->type)?'selected':'' }}>Date</option> 
                            <option value="time" {{ ('time'==$option->type)?'selected':'' }}>Time</option> 
                            <option value="datetime" {{ ('datetime'==$option->type)?'selected':'' }}>Date &amp; Time</option> 
                        </optgroup> 
                    </select> 
                </div> 
            </div>           
            <div class="form-group">
              <label for="sortOrder" class="col-sm-2 control-label optional">Sort Order</label>
              <div class="col-sm-10">
                <input type="number" placeholder="Sort Order" value="{{ $option->sort_order }}" class="form-control" name="sort_order"/>
              </div>
            </div> 
            <table id="option-value" class="table table-striped table-bordered table-hover">
            <thead>  
                <tr>
                <th class="text-left required">Option Value Name</th>
                <th class="text-left">Image</th>
                <th class="text-left">Sort Order</th>
                <th class="text-right"><button type="button" class="btn text-white btn-info btn-sm" onclick="addOptionValue();"><i class="fa fa-plus-circle"></i></button></th>
                </tr>
            </thead>
            <tbody>
             @php $sn=0; @endphp
              @foreach ($optionValues as $optionValue)
                <input type="hidden" name="option_value[{{ $sn }}][optionValueId]" value="{{ $optionValue->id }}" >  
                <input type="hidden" name="option_value[{{ $sn }}][imageName]" value="{{ $optionValue->image }}" >
                 <tr id="option-value-row{{ $sn }}">  
                <td class="text-left">     
                <input type="text" name="option_value[{{ $sn }}][name]" value="{{ $optionValue->name }}" placeholder="Option Value Name" class="form-control">  
                </td>  
                <td class="text-left">
                <div class="preview-image"> </div>
                <input type="file" name="option_value[{{ $sn }}][image]" value="">
                @if ($optionValue->image)
                  <img width="50px" src="{{ config('AWS_URL','http://gds-image.s3-ap-south-1.amazonaws.com') }}/option/{{ $optionValue->image }}" />
                @endif
                </td>  
                <td class="text-left">
                <input type="text" name="option_value[{{ $sn }}][sort_order]" value="{{ $optionValue->sort_order }}" placeholder="Sort Order" class="form-control">
                </td>  
                <td class="text-right">
                <button type="button" onclick="$('#option-value-row0').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
                </td>
                </tr>
              @php $sn++; @endphp
              @endforeach
            
            </tbody> 
            </table>  
            
            <div class="form-group">
              <div class="col-sm-12 col-md-offset-2">
                <button type="submit" class="btn btn-primary">Save Option</button>
              </div>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
$('select[name="type"]').on('change', function() { 
	if (this.value == 'select' || this.value == 'radio' || this.value == 'checkbox' || this.value == 'image') {
		$('#option-value').show();
		} else {
			$('#option-value').hide();
			}
	});
$('select[name="type"]').trigger('change');

var option_value_row = {{ $sn }};

function addOptionValue() {
	html  = '<tr id="option-value-row' + option_value_row + '">';	
    html += '  <td class="text-left">';
	html += '     <input type="text" name="option_value[' + option_value_row + '][name]" value="" placeholder="Option Value Name" class="form-control" />';
	html += '  </td>';
    html += '  <td class="text-left"><div class="preview-image"> </div><input type="file" name="option_value[' + option_value_row + '][image]" value="" /></td>';
	html += '  <td class="text-left"><input type="text" name="option_value[' + option_value_row + '][sort_order]" value="" placeholder="Sort Order" class="form-control" /></td>';
	html += '  <td class="text-right"><button type="button" onclick="$(\'#option-value-row' + option_value_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
	html += '</tr>';	
	$('#option-value tbody').append(html);
	option_value_row++;
	}
</script> 
@endsection
