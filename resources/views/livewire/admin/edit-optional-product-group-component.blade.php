<div>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3> {{ __('Edit Optional Product Group') }}</h3>
       {{ Breadcrumbs::render('editOptionalProductGroup',$optional_product_group_id) }}
      </div>
    </div>
  </div>
</div>
<div id="main-wrapper" class="container">
  <div class="row">
  <div class="col-md-12"> 
  @if (Session::has('message'))
    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>    
  @endif  
  </div>
    <div class="col-md-12">
      <div class="panel panel-white">
        <div class="panel-body">
        <form enctype="multipart/form-data" class="form-horizontal" method="post" wire:submit.prevent="editOptionalProductGroup">
        <div class="form-group">
          <label for="name" class="col-sm-2 control-label required"> Name</label>
          <div class="col-sm-10">
            <input type="text" placeholder="Optional Product Group Name" class="form-control" wire:model="name" />
          @error('name') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>        
        <div class="form-group">
          <div class="col-sm-10 col-md-offset-2">
            <button type="submit" class="btn btn-primary">Update Optional Product Group</button>
          </div>
        </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>