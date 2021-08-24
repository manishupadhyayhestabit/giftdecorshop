<div>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3> Categories</h3>
       {{ Breadcrumbs::render('addCategory') }}
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
        <form enctype="multipart/form-data" class="form-horizontal" method="post" wire:submit.prevent="addCategory">
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label required">Category Name</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Categry Name" class="form-control" wire:model="name" wire:keyup="generateSlug"/>
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
              <label for="parentId" class="col-sm-2 control-label optional">Parent</label>
              <div class="col-sm-10">
                <select class="form-control" wire:model="parent_id">
                  <option value="0">----None----</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="layoutSlug" class="col-sm-2 control-label">Layout Slug</label>
              <div class="col-sm-10">
                <select class="form-control" wire:model="layout_slug">
                  <option value="">----None----</option>
                  @foreach ($layouts as $layout)
                    <option value="{{ $layout->slug }}">{{ $layout->name }}</option>
                  @endforeach
                  </select>
              </div>
            </div>
            <div class="form-group">
              <label for="metaTitle" class="col-sm-2 control-label required">Meta Title</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Meta Title" class="form-control" wire:model="meta_title"/>
                @error('meta_title') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="metaDescription" class="col-sm-2 control-label required">Meta Description</label>
              <div class="col-sm-10">
                <textarea placeholder="Meta Description" class="form-control" rows="2" cols="5" wire:model="meta_description"></textarea>
                @error('meta_description') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="metaKeyword" class="col-sm-2 control-label">Meta Keyword</label>
              <div class="col-sm-10">
                <textarea placeholder="Meta Keyword" class="form-control" rows="2" cols="5" wire:model="meta_keywords"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="price" class="col-sm-2 control-label">Price</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Price" class="form-control" wire:model="price"/>
              </div>
            </div>
            <div class="form-group">
              <label for="description" class="col-sm-2 control-label optional">Description</label>
              <div class="col-sm-10">
                <textarea placeholder="Description" class="form-control summernote" rows="5" cols="5" wire:model="description"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="sortDescription" class="col-sm-2 control-label optional">Sort Description</label>
              <div class="col-sm-10">
                <textarea placeholder="Sort Description" class="form-control summernote" rows="5" cols="5" wire:model="sort_description"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="image" class="col-sm-2 control-label">Feature Image</label>
              <div class="col-sm-10 add-feature-image">
                <input type="file" class="input-file" wire:model="feature_image"/>
                @if ($feature_image)
                  <img src="{{ $feature_image->temporaryUrl() }}" width="100" />
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="bannerImage" class="col-sm-2 control-label optional">Banner Image</label>
              <div class="col-sm-10 add-banner-image">
                <input type="file" class="input-file" wire:model="banner_image"/>
                @if ($banner_image)
                  <img src="{{ $banner_image->temporaryUrl() }}" width="100" />
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="sortOrder" class="col-sm-2 control-label optional">Sort Order</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Sort Order" class="form-control" wire:model="sort_order"/>
              </div>
            </div>
            <div class="form-group">
              <label for="status" class="col-sm-2 control-label required">Status</label>
              <div class="col-sm-10">
                <select class="form-control" wire:model="status">
                  <option value="">Please Select Status</option>
                  <option value="active">Active</option>
                  <option value="inactive">Inactive</option>
                </select>
                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12 col-md-offset-2">
                <button type="submit" class="btn btn-primary">Save Category</button>
              </div>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>