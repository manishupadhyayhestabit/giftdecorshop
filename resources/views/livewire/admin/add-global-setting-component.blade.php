<div>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3> Add Global Setting</h3>
       {{ Breadcrumbs::render('addGlobalSetting') }}
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
        <form enctype="multipart/form-data" class="form-horizontal" method="post" wire:submit.prevent="addGlobalSetting">
            <div class="form-group">
              <label for="label" class="col-sm-2 control-label required">Label</label>
              <div class="col-sm-10">
                <input type="text" placeholder="label Name" class="form-control" wire:model="label" wire:keyup="generateSlug"/>
              @error('label') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="identifire" class="col-sm-2 control-label required">Identifire</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Identifire" class="form-control" wire:model="identifire" disabled/>
              @error('identifire') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="value" class="col-sm-2 control-label required">Value</label>
              <div class="col-sm-10">
                <textarea placeholder="Value" class="form-control" rows="2" cols="2" wire:model="value"></textarea>
                @error('value') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
           
            <div class="form-group">
              <div class="col-sm-12 col-md-offset-2">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>