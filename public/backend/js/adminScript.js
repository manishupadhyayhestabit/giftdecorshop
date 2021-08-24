// Configure for summernote
$(document).ready(function () {
	$('.summernote').summernote({
		height: 200,
	});
});
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
$(document).ready(function () {
	var image_row = $('#images').length;
	$(".add-more-images").click(function () {
		html = '<br><div class="hdtuto" id="image_row' + image_row + '">';
		html += '  <div class="input-group control-group">';
		html += '  	<input type="file" id="file' + image_row + '" name="images[]" class="form-control"><div class="input-group-btn"><button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button></div>';
		html += '  </div>';
		html += '<div class="col-sm-10 images-preview" id="images-preview' + image_row + '"></div>';
		html += '  </div>';
		$('#images').append(html);
		image_row++;
	});
	$("body").on("click", ".btn-danger", function () {
		$(this).parents(".hdtuto").remove();
	});
});
var discount_row = $('#discount tbody tr').length;
function addDiscount() {
	html = '<tr id="discount-row' + discount_row + '">';
	html += '  <td class="text-left"><input type="text" autocomplete="off" name="product_discount[' + discount_row + '][qty]" value="" placeholder="Quantity" class="form-control" /></td>';
	html += '  <td class="text-left"><input type="text" autocomplete="off" name="product_discount[' + discount_row + '][priority]" value="" placeholder="Priority" class="form-control" /></td>';
	html += '  <td class="text-left"><input type="text" autocomplete="off" name="product_discount[' + discount_row + '][discount]" value="" placeholder="Discount" class="form-control" /></td>';
	html += '  <td class="text-left" style="width: 15%;"><select autocomplete="off" name="product_discount[' + discount_row + '][discount_type]" class="form-control"><option value="percent">Percent</option><option value="flat">Flat</option></td>';
	html += '  <td class="text-left" style="width: 20%;"><div class="input-group"><input autocomplete="off" type="text" name="product_discount[' + discount_row + '][starting_date]" value="" placeholder="Date Start" class="form-control date" /></div></td>';
	html += '  <td class="text-left" style="width: 20%;"><div class="input-group"><input autocomplete="off" type="text" name="product_discount[' + discount_row + '][ending_date]" value="" placeholder="Date End" class="form-control date" /></div></td>';
	html += '  <td class="text-left"><button type="button" onclick="$(\'#discount-row' + discount_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
	html += '</tr>';
	$('#discount tbody').append(html);
	discount_row++;
}
function addAttribute() {
	var attribute_row = $('#attribute tbody tr').length;
	html = '<tr id="attribute-row' + attribute_row + '">';
	html += '<td class="text-left" style="width: 20%;"><input type="text" name="product_attribute[' + attribute_row + '][name]" value="" placeholder="Attribute" class="form-control" /><input type="hidden" name="product_attribute[' + attribute_row + '][attribute_id]" value="" /></td>';
	html += '<td class="text-left">';
	html += '<div class="input-group"><textarea style="width: 775px;" name="product_attribute[' + attribute_row + '][text]" rows="5" placeholder="Text" class="form-control"></textarea></div>';
	html += '</td>';
	html += '<td class="text-left"><button type="button" onclick="$(\'#attribute-row' + attribute_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
	html += '</tr>';
	$('#attribute tbody').append(html);
	attribute_row++;
}
