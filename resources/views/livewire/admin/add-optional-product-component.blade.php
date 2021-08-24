<div>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3> Add Optional Product</h3>
       {{ Breadcrumbs::render('addOptionalProduct') }}
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
        <form enctype="multipart/form-data" class="form-horizontal" method="post" wire:submit.prevent="addOptionalProduct">
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label required">Optional Product Name</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Optional Product Name" class="form-control" wire:model="name"/>
              @error('name') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
           
            <div class="form-group">
              <label for="optional_product_group_id" class="col-sm-2 control-label required">Optional Product Group</label>
              <div class="col-sm-10">
                <select class="form-control" wire:model="optional_product_group_id">
                  <option value="">----None----</option>
                  @foreach ($optionalProductGroups as $optionalProductGroup)
                    <option value="{{ $optionalProductGroup->id }}">{{ $optionalProductGroup->name }}</option>
                  @endforeach
                  </select>
                  @error('optional_product_group_id') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="price" class="col-sm-2 control-label required">Price</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Price" class="form-control" wire:model="price"/>
                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
           
            <div class="form-group">
              <label for="image" class="col-sm-2 control-label required">Feature Image</label>
              <div class="col-sm-10 add-feature-image">
                <input type="file" class="input-file" wire:model="image"/>
               @if ($image)
                  <img src="{{ $image->temporaryUrl() }}" width="100" /><br>
                @endif
                 @error('image') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-12 col-md-offset-2">
                <button type="submit" class="btn btn-primary">Save Optional Product</button>
              </div>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>