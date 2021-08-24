<div>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3> {{ __('Edit Layout') }}</h3>
       {{ Breadcrumbs::render('editLayout', $this->layout_slug) }}
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
        <form enctype="multipart/form-data" class="form-horizontal" method="post" wire:submit.prevent="updateLayout">
            <div class="form-group">
            <label for="post_type" class="col-sm-2 control-label required">Post type</label>
            <div class="col-sm-10">
                <select class="form-control" wire:model="post_type">
                <option value="">Please Select Post Type</option>
                <option value="category">Category</option>
                <option value="page">Page</option>
                <option value="post">Post</option>
                <option value="product">Product</option>
                </select>
                @error('post_type') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            </div>
            <div class="form-group">
            <label for="name" class="col-sm-2 control-label required">Layout Name</label>
            <div class="col-sm-10">
                <input type="text" placeholder="Layout Name" class="form-control" wire:model="name" wire:keyup="generateSlug"/>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            </div>
            <div class="form-group">
            <label for="slug" class="col-sm-2 control-label required">Slug</label>
            <div class="col-sm-10">
                <input type="text" placeholder="Slug" class="form-control" wire:model="slug" disabled/>
            @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            </div>
            <div class="form-group">
            <div class="col-sm-10 col-md-offset-2">
                <button type="submit" class="btn btn-primary">Update Layout</button>
            </div>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>