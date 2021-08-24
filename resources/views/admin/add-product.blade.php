@extends('layouts.master')
@section('content')
<div>
  <div class="page-title">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3> {{ __('Add Product') }}</h3>
          {{ Breadcrumbs::render('addProduct') }} </div>
      </div>
    </div>
  </div>
  <div id="main-wrapper" class="container">
    <div class="row">
      <div class="col-md-12"> @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
        @endif </div>
      <div class="col-md-12">
        <div class="panel panel-white">
          <div class="panel-body">
            <form enctype="multipart/form-data" action="{{ route('admin.addproductsubmit') }}" class="form-horizontal" method="post">
              @csrf
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
                <li><a href="#tab-discount" data-toggle="tab">Discount</a></li>
                <li><a href="#tab-attribute" data-toggle="tab">Attributes</a></li>
                <li><a href="#tab-option" data-toggle="tab">Options</a></li>
                <li><a href="#tab-image" data-toggle="tab">Images @error('images') (<span class="text-danger">{{ $message }}</span>) @enderror</a></li>
                <li class="pull-right">
                  <input type="submit" name="submit" value="Switch to draft" class="btn btn-default">
                  <input type="submit" name="submit" value="Publish" class="btn btn-success">
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab-general">
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label required">Product Name</label>
                    <div class="col-sm-10">
                      <input type="text" placeholder="Product Name" class="form-control" name="name" />
                      @error('name') <span class="text-danger">{{ $message }}</span> @enderror 
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="layout_id" class="col-sm-2 control-label required">Layout</label>
                    <div class="col-sm-10">
                      <select name="layout_id" id="layout_id" class="form-control">
                        <option value="">Please select Layout </option>
                        @foreach ($layouts as $layout)
                        <option value="{{ $layout->id }}">{{ $layout->name }}</option>
                        @endforeach
                      </select>
                      @error('layout_id') <span class="text-danger">{{ $message }}</span> @enderror 
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
                    <label for="meta_description" class="col-sm-2 control-label required">Meta Description</label>
                    <div class="col-sm-10">
                      <textarea name="meta_description" id="meta_description" autocomplete="off" placeholder="Meta Description" class="form-control" rows="2" cols="5"></textarea>
                      @error('meta_description') <span class="text-danger">{{ $message }}</span> @enderror 
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="meta_keyword" class="col-sm-2 control-label optional">Meta Keyword</label>
                    <div class="col-sm-10">
                      <textarea name="meta_keyword" id="meta_keyword" autocomplete="off" placeholder="Meta Keyword" class="form-control" rows="2" cols="5"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="category" class="col-sm-2 control-label required">Categories</label>
                    <div class="col-sm-10">
                      <input name="category" value="" placeholder="Categories" id="category" class="form-control ui-autocomplete-input" autocomplete="off" type="text">
                      <div id="product-categories" class="well well-sm" style="height: 150px; overflow: auto;"> </div>
                      @error('product_categories') <span class="text-danger">{{ $message }}</span> @enderror 
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-related">Related Products</label>
                    <div class="col-sm-10">
                      <input name="related" value="" placeholder="Related Products" id="input-related" class="form-control ui-autocomplete-input" autocomplete="off" type="text">
                      <div id="product-related" class="well well-sm" style="height: 150px; overflow: auto;"> </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description" class="col-sm-2 control-label required">Content</label>
                    <div class="col-sm-10">
                      <textarea name="description" id="description" autocomplete="off" class="form-control summernote" rows="5" cols="5"></textarea>
                      @error('description') <span class="text-danger">{{ $message }}</span> @enderror 
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="sort_description" class="col-sm-2 control-label required"> Excerpt</label>
                    <div class="col-sm-10">
                      <textarea name="sort_description" id="sort_description" autocomplete="off" class="form-control" rows="5" cols="5"></textarea>
                      @error('sort_description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="optional_product_group_id" class="col-sm-2 control-label optional">Optional Product Group</label>
                    <div class="col-sm-10">
                      <select name="optional_product_group_id" id="optional_product_group_id" class="form-control">
                        <option value="">Please select optional product group</option>
                        @foreach ($optionalProductGroups as $optionalProductGroup)
                        <option value="{{ $optionalProductGroup->id }}">{{ $optionalProductGroup->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pincode_group_id" class="col-sm-2 control-label optional">Pincode Group</label>
                    <div class="col-sm-10">
                      <select name="pincode_group_id" id="pincode_group_id" class="form-control">
                        <option value="0">Please select pincode group</option>
                        @foreach ($pincodeGroups as $pincodeGroup)
                        <option value="{{ $pincodeGroup->id }}">{{ $pincodeGroup->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="product_type">Product Type</label>
                    <div class="col-sm-10">
                      <select name="product_type[]" id="product_type" class="js-states form-control" multiple="multiple" style="width: 100%">
                        @foreach ($productTypes as $productType)
                        <option value="{{ $productType->id }}">{{ $productType->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="regular_price" class="col-sm-2 control-label required">Regular Price</label>
                    <div class="col-sm-10">
                      <input type="text" name="regular_price" id="regular_price" value="" autocomplete="off" placeholder="Regular Price" class="form-control">
                      @error('regular_price') <span class="text-danger">{{ $message }}</span> @enderror 
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="sale_price" class="col-sm-2 control-label required">Sale Price</label>
                    <div class="col-sm-10">
                      <input type="text" name="sale_price" id="sale_price" value="" autocomplete="off" placeholder="Sale Price" class="form-control">
                      @error('sale_price') <span class="text-danger">{{ $message }}</span> @enderror 
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label required" for="gst">Product Gst</label>
                    <div class="col-sm-10">
                      <input name="gst" value="0" placeholder="Product Gst in percent" id="gst" class="form-control" type="text">
                      @error('gst') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="sku" class="col-sm-2 control-label required">SKU</label>
                    <div class="col-sm-10">
                      <input type="text" name="sku" id="sku" value="" autocomplete="off" placeholder="SKU" class="form-control">
                      @error('sku') <span class="text-danger">{{ $message }}</span> @enderror 
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="model" class="col-sm-2 control-label required">Model</label>
                    <div class="col-sm-10">
                      <input type="text" name="model" id="model" value="" autocomplete="off" placeholder="Model Name" class="form-control">
                      @error('model') <span class="text-danger">{{ $message }}</span> @enderror 
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="order_subtrack" class="col-sm-2 control-label required">Order Subtrack</label>
                    <div class="col-sm-10">
                      <select name="order_subtrack" id="order_subtrack" class="form-control">
                        <option value="">Please select order substraction</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                      </select>
                      @error('order_subtrack') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="qty" class="col-sm-2 control-label required">Qty</label>
                    <div class="col-sm-10">
                      <input type="text" name="qty" id="qty" value="10" autocomplete="off" placeholder="Qty" class="form-control">
                      @error('qty') <span class="text-danger">{{ $message }}</span> @enderror 
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="minimum_order" class="col-sm-2 control-label required">Minimum Order</label>
                    <div class="col-sm-10">
                      <input type="text" name="minimum_order" id="minimum_order" value="1" autocomplete="off" placeholder="Minimum Order" class="form-control">
                      @error('minimum_order') <span class="text-danger">{{ $message }}</span> @enderror 
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="maximum_order" class="col-sm-2 control-label required">Maximum Order</label>
                    <div class="col-sm-10">
                      <input type="text" name="maximum_order" id="maximum_order" value="4" autocomplete="off" placeholder="Maximum Order" class="form-control">
                      @error('maximum_order') <span class="text-danger">{{ $message }}</span> @enderror 
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab-discount">
                  <div class="table-responsive">
                    <table id="discount" class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th class="text-left">Quantity</th>
                          <th class="text-left">Priority</th>
                          <th class="text-left">Discount</th>
                          <th class="text-left">Discount Type</th>
                          <th class="text-left" width="25%">Date Start</th>
                          <th class="text-left" width="25%">Date End</th>
                          <th class="text-left"><button type="button" onClick="addDiscount();" data-toggle="tooltip" title="" class="btn btn-success" data-original-title="Add Discount"><i class="fa fa-plus-circle"></i></button></th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane" id="tab-attribute">
                  <div class="table-responsive">
                    <table id="attribute" class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th colspan="3"> <select name="attribute_group_id" id="attribute_group_id" class="form-control" onchange="setAttributes(this)">
                              <option value="0">Please select attribute group</option>
                              @foreach ($attributeGroups as $attributeGroup)
                              <option value="{{ $attributeGroup->id }}">{{ $attributeGroup->name }}</option>
                              @endforeach
                            </select>
                          </th>
                        </tr>
                        <tr>
                          <th class="text-left" width="30%">Attribute</th>
                          <th class="text-left" width="60%">Text</th>
                          <th class="text-left" width="10%"><button type="button" onClick="addAttribute();" data-toggle="tooltip" title="" class="btn btn-success" data-original-title="Add Attribute"><i class="fa fa-plus-circle"></i></button></th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane" id="tab-option">
                  <div class="row">
                    <div class="col-sm-2">
                      <ul class="nav nav-pills nav-stacked" id="option">
                        <li>
                          <input type="text" name="option" value="" placeholder="Option" id="input-option" class="form-control ui-autocomplete-input" autocomplete="off">
                        </li>
                      </ul>
                    </div>
                    <div class="col-sm-10">
                      <div class="tab-content"> </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab-image">
                  <div class="form-group">
                    <label for="images" class="col-sm-2 control-label required">Images</label>
                  <div class="col-sm-10">
                    <div class="input-group control-group">
                     <input type="file" name="images[]" id="images" placeholder="Choose images" multiple >
                    </div>
                    <div class="mt-1 text-center">
                      <div class="images-preview-div"> </div>
                  </div>
                  </div>
                </div>  
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
.images-preview img{
padding: 10px;
max-width: 100px;
}
</style>
<script >
$(function() {
// Multiple images preview with JavaScript
var previewImages = function(input, imgPreviewPlaceholder) { 
if (input.files) { 
var filesAmount = input.files.length;
for (i = 0; i < filesAmount; i++) {
var reader = new FileReader();
reader.onload = function(event) {
$($.parseHTML('<img>')).attr('src', event.target.result).attr('width',100).appendTo(imgPreviewPlaceholder);
}
reader.readAsDataURL(input.files[i]);
}
}
};
$('#images').on('change', function() { 
previewImages(this, 'div.images-preview-div');
});
});
</script>
<script>
//product types
$(document).ready(function () {
	$('#product_type').select2({
		placeholder: "Please select product type",
		allowClear: true
	});
});
// setAttributes
function setAttributes(obj){
  var attributGroupId = obj.value;
  $.ajax({
    url: "{{ route('admin.searchattributes') }}",
    data:{'attributeGroupId':attributGroupId},
    type: 'GET',
    }).done( function(data) {
      $('#attribute tbody').html(data.html);
    });
}
// Category
$('input[name=\'category\']').autocomplete({
	'source': function (request, response) {
		var name = $('input[name=\'category\']').val();
		$.ajax({
			url: "{{ route('admin.searchcategories') }}",
			data: { 'search': name },
			type: "GET",
			dataType: 'json',
			success: function (json) {
				response($.map(json, function (item) {
					return {
						label: item['name'],
						value: item['category_id']
					}
				}));
			}
		});
	},
	'select': function (event, ui) {
		$('input[name=\'category\']').val('');
		$('#product-categories' + ui.item.value).remove();
		$('#product-categories').append('<div id="product-categories' + ui.item.value + '"><i class="fa fa-minus-circle"></i> ' + ui.item.label + '<input type="hidden" name="product_categories[]" value="' + ui.item.value + '" /></div>');
		event.preventDefault();
	},
	'focus': function (event, ui) {
		this.value = ui.item.label;
		event.preventDefault();
	}
});
$('#product-categories').delegate('.fa-minus-circle', 'click', function () {
	$(this).parent().remove();
});
// Related Products
$('input[name=\'related\']').autocomplete({
	'source': function (request, response) {
		var name = $('input[name=\'related\']').val();
        var currentProductName = $('input[name=\'name\']').val();
		$.ajax({
			url: "{{ route('admin.searchrelatedproducts') }}",
			data: { 'search': name, 'currentProductName':currentProductName },
			type: "GET",
			dataType: 'json',
			success: function (json) {
				response($.map(json, function (item) {
					return {
						label: item['name'],
						value: item['related_product_id']
					}
				}));
			}
		});
	},
	'select': function (event, ui) {
		$('input[name=\'related\']').val('');
		$('#product-related' + ui.item.value).remove();
		$('#product-related').append('<div id="product-related' + ui.item.value + '"><i class="fa fa-minus-circle"></i> ' + ui.item.label + '<input type="hidden" name="related_products[]" value="' + ui.item.value + '" /></div>');
		event.preventDefault();
	},
	'focus': function (event, ui) {
		this.value = ui.item.label;
		event.preventDefault();
	}
});
$('#product-related').delegate('.fa-minus-circle', 'click', function () {
	$(this).parent().remove();
});
//option
var option_row = $('#option li').length;
$('input[name=\'option\']').autocomplete({
	'source': function(request, response) {
		var name = $('input[name=\'option\']').val();
		$.ajax({
			url: "{{ route('admin.searchoptions') }}",
      data:{'search':name},
      type:"GET",
			dataType: 'json',
			success: function(json) {
				response($.map(json, function(item) {
					return {
						category: item['category'],
						label: item['name'],
						value: item['option_id'],
						type: item['type'],
						option_value: item['option_value']
					}
				}));
			}
		});
	},
	'select': function(event, ui) { 
		html  = '<div class="tab-pane" id="tab-option' + option_row + '">';
		html += '	<input type="hidden" name="product_option[' + option_row + '][product_option_id]" value="" />';
		html += '	<input type="hidden" name="product_option[' + option_row + '][option_id]" value="' + ui.item.value + '" />';
		html += '	<div class="form-group">';
		html += '	  <label class="col-sm-2 control-label" for="input-required' + option_row + '">Required</label>';
		html += '	  <div class="col-sm-10"><select name="product_option[' + option_row + '][required]" id="input-required' + option_row + '" class="form-control">';
		html += '	      <option value="Yes">Yes</option>';
		html += '	      <option value="No">No</option>';
		html += '	  </select></div>';
		html += '	</div>';
		if (ui.item.type == 'text') {
			html += '	<div class="form-group">';
			html += '	  <label class="col-sm-2 control-label" for="input-value' + option_row + '">Option Value</label>';
			html += '	  <div class="col-sm-10"><input type="text" name="product_option[' + option_row + '][option_value]" value="" placeholder="Option Value" id="input-value' + option_row + '" class="form-control" /></div>';
			html += '	</div>';
			}
		if (ui.item.type == 'textarea') {
			html += '	<div class="form-group">';
			html += '	  <label class="col-sm-2 control-label" for="input-value' + option_row + '">Option Value</label>';
			html += '	  <div class="col-sm-10"><textarea name="product_option[' + option_row + '][option_value]" rows="5" placeholder="Option Value" id="input-value' + option_row + '" class="form-control"></textarea></div>';
			html += '	</div>';
			}
		if (ui.item.type == 'file') {
			html += '	<div class="form-group" style="display: none;">';
			html += '	  <label class="col-sm-2 control-label" for="input-value' + option_row + '">Option Value</label>';
			html += '	  <div class="col-sm-10"><input type="text" name="product_option[' + option_row + '][option_value]" value="" placeholder="Option Value" id="input-value' + option_row + '" class="form-control" /></div>';
			html += '	</div>';
			}
		if (ui.item.type == 'date') {
			html += '	<div class="form-group">';
			html += '	  <label class="col-sm-2 control-label" for="input-value' + option_row + '">Option Value</label>';
			html += '	  <div class="col-sm-5"><div class="input-group"><input type="text" autocomplete="off" name="product_option[' + option_row + '][option_value]" value="" placeholder="yy-mm-dd" id="input-value' + option_row + '" class="form-control date" /></div></div>';
			html += '	</div>';
			}
		if (ui.item.type == 'time') {
			html += '	<div class="form-group">';
			html += '	  <label class="col-sm-2 control-label" for="input-value' + option_row + '">Option Value</label>';
			html += '	  <div class="col-sm-5"><div class="input-group"><input type="text" name="product_option[' + option_row + '][option_value]" value="" placeholder="H:m:s" id="input-value' + option_row + '" class="form-control time" /></div></div>';
			html += '	</div>';
			}
		if (ui.item.type == 'datetime') {
			html += '	<div class="form-group">';
			html += '	  <label class="col-sm-2 control-label" for="input-value' + option_row + '">Option Value</label>';
			html += '	  <div class="col-sm-5"><div class="input-group"><input type="text" name="product_option[' + option_row + '][option_value]" value="" placeholder="yy-mm-dd H:m:s" id="input-value' + option_row + '" class="form-control datetime" /></div></div>';
			html += '	</div>';
			}
		if (ui.item.type == 'select' || ui.item.type == 'radio' || ui.item.type == 'checkbox' || ui.item.type == 'image') {
			html += '<div class="table-responsive">';
			html += '  <table id="option-value' + option_row + '" class="table table-striped table-bordered table-hover">';
			html += '  	 <thead>';
			html += '      <tr>';
			html += '        <td class="text-left">Option Value</td>';
			html += '        <td class="text-left">Default Select</td>';
			html += '        <td class="text-right">Quantity</td>';
			html += '        <td class="text-left">Subtract Stock</td>';
			html += '        <td class="text-right">Price</td>';
			html += '        <td class="text-left"><button type="button" onclick="addOptionValue(' + option_row + ');" data-toggle="tooltip" title="Add Option Value" class="btn btn-success"><i class="fa fa-plus-circle"></i></button></td>';
			html += '      </tr>';
			html += '  	 </thead>';
			html += '  	 <tbody>';
			html += '    </tbody>';
			html += '  </table>';
			html += '</div>';
			html += '  <select id="option-values' + option_row + '" style="display: none;">';
			for (i = 0; i < ui.item.option_value.length; i++) {
				html += '  <option value="' + ui.item.option_value[i]['option_value_id'] + '">' + ui.item.option_value[i]['name'] + '</option>';
            	}
			html += '  </select>';
			html += '</div>';
			}
	$('#tab-option .tab-content').append(html);
	$('#option > li:last-child').before('<li><a href="#tab-option' + option_row + '" data-toggle="tab"><i class="fa fa-minus-circle" onclick=" $(\'#option a:first\').tab(\'show\');$(\'a[href=\\\'#tab-option' + option_row + '\\\']\').parent().remove(); $(\'#tab-option' + option_row + '\').remove();"></i> ' +  ui.item.label  + '</li>');
	$('#option a[href=\'#tab-option' + option_row + '\']').tab('show');
	$('[data-toggle=\'tooltip\']').tooltip({
		container: 'body',
		html: true
	});
	$('input[name=\'option\']').val('');
	option_row++;
	event.preventDefault();
  $(document).ready(function () {
	$('.date').datepicker({
		showOn: 'both',
		buttonImage: "/backend/images/calender.png",
		buttonImageOnly: true,
		dateFormat: "yy-mm-dd",
		changeMonth: true,
		numberOfMonths: 1,
		showOtherMonths: true,
		selectOtherMonths: true
	});
});
$(document).ready(function () {
	$('.datetime').datetimepicker({
		showOn: 'both',
		buttonImage: "/backend/images/calender.png",
		buttonImageOnly: true,
		showOtherMonths: true,
		selectOtherMonths: true,
		dateFormat: "yy-mm-dd",
		timeFormat: "hh:mm:ss"
	});
});
$(document).ready(function () {
	$('.time').timepicker({
		showOn: 'both',
		buttonImage: "/backend/images/calender.png",
		buttonImageOnly: true,
		hourGrid: 4,
		minuteGrid: 10,
		timeFormat: 'hh:mm:ss'
	});
});
	},
	'focus': function (event, ui) {
    	event.preventDefault();
    }
});

var option_value_row = 0;
function addOptionValue(option_row) {
	html  = '<tr id="option-value-row' + option_value_row + '"><input type="hidden" name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][product_option_value_id]" value="" />';
	html += '  <td class="text-left"><select name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][option_value_id]" class="form-control">';
	html += $('#option-values' + option_row).html();
	html += '  </select><input type="hidden" name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][product_option_value_id]" value="" /></td>';
	html += '  <td class="text-left"><select name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][default_option_select]" class="form-control">';
	html += '    <option value="No">No</option>';
	html += '    <option value="Yes">Yes</option>';
	html += '  </select></td>';
	html += '  <td class="text-right"><input type="text" name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][quantity]" value="" placeholder="Quantity" class="form-control" /></td>';
	html += '  <td class="text-left"><select name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][subtract_order]" class="form-control">';
	html += '    <option value="Yes">Yes</option>';
	html += '    <option value="No">No</option>';
	html += '  </select></td>';
	html += '  <td class="text-right"><select name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][price_prefix]" class="form-control">';
	html += '    <option value="+">+</option>';
	html += '    <option value="-">-</option>';
	html += '  </select>';
	html += '  <input type="text" name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][price]" value="" placeholder="Price" class="form-control" /></td>';
	html += '  <td class="text-left"><button type="button" onclick="$(this).tooltip(\'destroy\');$(\'#option-value-row' + option_value_row + '\').remove();" data-toggle="tooltip" rel="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
	html += '</tr>';
	$('#option-value' + option_row + ' tbody').append(html);
	$('[rel=tooltip]').tooltip();
	option_value_row++;
	}
</script> 
@endsection