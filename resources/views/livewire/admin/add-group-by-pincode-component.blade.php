<div>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3> Add Group By Pincode</h3>
       {{ Breadcrumbs::render('addGroupByPincodes') }}
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
        <form enctype="multipart/form-data" class="form-horizontal" method="post" wire:submit.prevent="addGroupByPincode">
            <div class="form-group">
              <label for="pincode" class="col-sm-2 control-label required">Pincode</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Pincode" class="form-control" wire:model="pincode" />
              @error('pincode') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="pincode_group_id" class="col-sm-2 control-label required">Pincode Group</label>
              <div class="col-sm-10">
                <select class="form-control" wire:model="pincode_group_id">
                  <option value="0">----None----</option>
                  @foreach ($pincodeGroups as $pincodeGroup)
                    <option value="{{ $pincodeGroup->id }}">{{ $pincodeGroup->name }}</option>
                  @endforeach
                </select>
                 @error('pincode_group_id') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
             <div class="form-group">
              <label for="additional_price" class="col-sm-2 control-label">Additional Price</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Additional Price" class="form-control" wire:model="additional_price"/>
              </div>
            </div>
            <div class="form-group">
              <label for="city" class="col-sm-2 control-label required">City</label>
              <div class="col-sm-10">
                <input type="text" placeholder="City" class="form-control" wire:model="city" />
              @error('city') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="district" class="col-sm-2 control-label required">District</label>
              <div class="col-sm-10">
                <input type="text" placeholder="District" class="form-control" wire:model="district"/>
                @error('district') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="state" class="col-sm-2 control-label required">State</label>
              <div class="col-sm-10">
                <input type="text" placeholder="State" class="form-control" wire:model="state"/>
                @error('state') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
           <div class="form-group">
              <label for="country" class="col-sm-2 control-label required">Country</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Country" class="form-control" wire:model="country"/>
                @error('country') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
           <div class="form-group">
              <label for="standard_delivery" class="col-sm-2 control-label required">Standard Delivery</label>
              <div class="col-sm-10">
                <select class="form-control" wire:model="standard_delivery">
                    <option value="">----None----</option>
                    <option value="y">Yes</option>
                    <option value="n">No</option>
                </select>
                @error('standard_delivery') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="free_shipping" class="col-sm-2 control-label required">Free Shipping</label>
              <div class="col-sm-10">
                <select class="form-control" wire:model="free_shipping">
                    <option value="">----None----</option>
                  <option value="y">Yes</option>
                  <option value="n">No</option>
                </select>
                @error('free_shipping') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="fixed_time_delivery" class="col-sm-2 control-label required">Fixed Time Delivery</label>
              <div class="col-sm-10">
                <select class="form-control" wire:model="fixed_time_delivery">
                    <option value="">----None----</option>
                  <option value="y">Yes</option>
                  <option value="n">No</option>
                </select>
                @error('fixed_time_delivery') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="mid_night_delivery" class="col-sm-2 control-label required">Mid Night Delivery</label>
              <div class="col-sm-10">
                <select class="form-control" wire:model="mid_night_delivery">
                    <option value="">----None----</option>
                  <option value="y">Yes</option>
                  <option value="n">No</option>
                </select>
                @error('mid_night_delivery') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="same_day_delivery" class="col-sm-2 control-label required">Same Day Delivery</label>
              <div class="col-sm-10">
                <select class="form-control" wire:model="same_day_delivery">
                    <option value="">----None----</option>
                  <option value="y">Yes</option>
                  <option value="n">No</option>
                </select>
                @error('same_day_delivery') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12 col-md-offset-2">
                <button type="submit" class="btn btn-primary">Save </button>
              </div>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>