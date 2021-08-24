
<div>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <h3> {{ __('Group By Pincodes') }}</h3>
       {{ Breadcrumbs::render('groupByPincodes') }}
      </div>
      <div class="col-md-2">
        <h5>Total {{ count($totalGroupByPincodes) }}(s) records found!</h5>
      </div>
      <div class="col-md-5"> <a class="btn btn-success btn-addon pull-right " href="{{ route('admin.addgroupbypincode') }}"> <i class="fa fa-plus"></i> {{ __('Add Group By Pincodes') }} </a> </div>
    </div>
  </div>
</div>
<div id="main-wrapper" class="container">
  <div class="row">
    <div class="col-md-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
        </div>
        @endif
      </div>
    <div class="col-md-12">
      <div class="panel panel-white">
        <div class="panel-body">
          <div class="table-responsive">
            <div id="example_wrapper" class="dataTables_wrapper">
              <div class="dataTables_length">
                  <label>Show
                    <select wire:model="paginate">
                      <option value="10" selected>10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                      <option value="250">250</option>
                      <option value="500">500</option>
                      <option value="1000">1000</option>
                    </select>
                    entries</label>
              </div>
              <div class="dataTables_filter">
               <input type="text" placeholder="Search by Pincode or City" wire:model="search">
              </div>
              <table id="example" class="display table dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
                <thead>
                  <tr role="row">
                    <th class="text-left"> Pincodes</th>
                    <th class="text-left"> Group Name</th>
                    <th class="text-left"> Additional Price</th>  
                    <th class="text-left">City</th> 
                    <th class="text-left">State</th>                  
                    <th class="text-left">SD</th>
                    <th class="text-left">FS</th>
                    <th class="text-left">FTD</th>
                    <th class="text-left">MND</th>
                    <th class="text-left">SDD</th>
                    <th class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($groupByPincodes) > 0)
                    @foreach ($groupByPincodes as $groupByPincode)                 
                      <tr role="row" class="odd">
                        <td class="text-left">{{ $groupByPincode->pincode }}</td>
                         <td class="text-left"><h5>{{ $groupByPincode->pincodeGroup->name }}</h5></td>
                          <td class="text-left">{{ $groupByPincode->additional_price }}</td>                          
                          <td class="text-left">{{ $groupByPincode->city_slug }}</td>
                          <td class="text-left">{{ $groupByPincode->state_slug }}</td>
                          <td class="text-left">{{ $groupByPincode->standard_delivery }}</td>
                          <td class="text-left">{{ $groupByPincode->free_shipping }}</td>
                          <td class="text-left">{{ $groupByPincode->fixed_time_delivery }}</td>
                          <td class="text-left">{{ $groupByPincode->mid_night_delivery }}</td>
                          <td class="text-left">{{ $groupByPincode->same_day_delivery }}</td>
                          <td class="text-right"><a href="{{ route('admin.editgroupbypincode', ['group_by_pincode_id'=>$groupByPincode->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                          <div class="btn btn-danger" wire:click="delete({{ $groupByPincode->id }})" wire:loading.attr="disabled"><i class="fa fa-trash"></i></div></td>
                      </tr>
                    @endforeach
                  @else
                  <tr class="odd">
                    <td align="center" colspan="10" style="font-size:16px;" class="dataTables_empty" valign="top">No data available in table</td>
                  </tr>
                  @endif
                  </tbody>
              </table>
             {{ $groupByPincodes->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>