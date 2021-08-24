<div>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3> {{ __('Edit Attribute') }}</h3>
       {{ Breadcrumbs::render('editAttribute',$this->attri_id) }}
      </div>
    </div>
  </div>
</div>
<div id="main-wrapper" class="container">
  <div class="row">
  <div class="col-md-12"> 
  @if (Session::has('message'))
    <div class="alert alert-danger" role="alert">{{ Session::get('message') }}</div>    
  @endif   
  </div>
    <div class="col-md-12">
      <div class="panel panel-white">
        <div class="panel-body">
        <form enctype="multipart/form-data" class="form-horizontal" method="post" wire:submit.prevent="updateAttribute">
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label required">Attribute Name</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Attribute Name" class="form-control" wire:model="name" />
              @error('name') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>            
            <div class="form-group">
              <label for="attribute_group_id" class="col-sm-2 control-label required">Attribute Group</label>
              <div class="col-sm-10">
                <select class="form-control" wire:model="attribute_group_id">
                  <option value="">----None----</option>
                  @foreach ($attributeGroups as $attributeGroup)
                    <option value="{{ $attributeGroup->id }}">{{ $attributeGroup->name }}</option>
                  @endforeach
                  </select>
                  @error('attribute_group_id') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>           
            <div class="form-group">
              <label for="sortOrder" class="col-sm-2 control-label optional">Sort Order</label>
              <div class="col-sm-10">
                <input type="number" placeholder="Sort Order" class="form-control" wire:model="sort_order"/>
              </div>
            </div>            
            <div class="form-group">
              <div class="col-sm-12 col-md-offset-2">
                <button type="submit" class="btn btn-primary">Update Attribute</button>
              </div>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>