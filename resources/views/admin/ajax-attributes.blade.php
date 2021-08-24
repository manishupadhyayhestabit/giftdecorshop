<?php $sn =0;?>
@foreach ($attributes as $attribute)
<tr id="attribute-row{{ $sn }}">
    <td class="text-left" style="width: 20%;">
        <input type="text" name="product_attribute[{{ $sn }}][name]" value="{{$attribute->name}}" placeholder="Attribute" class="form-control" autocomplete="off">
    </td>  
    <td class="text-left">
        <div class="input-group">
            <textarea style="width: 775px;" name="product_attribute[{{ $sn }}][text]" rows="5" placeholder="Text" class="form-control"></textarea>
        </div>  
    </td>  
    <td class="text-left">
        <button type="button" onclick="$('#attribute-row{{ $sn }}').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
    </td>
</tr>
<?php $sn++;?>
@endforeach