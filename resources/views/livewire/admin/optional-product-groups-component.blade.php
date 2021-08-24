<div>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <h3> {{ __('Optional Product Groups') }}</h3>
       {{ Breadcrumbs::render('optionalProductGroups') }}
      </div>
      <div class="col-md-2">
        <h5>Total {{ $totalOptionalProductGroups }}(s) records found!</h5>
      </div>
      <div class="col-md-5"> <a class="btn btn-success btn-addon pull-right " href="{{ route('admin.addoptionalproductgroup') }}"> <i class="fa fa-plus"></i> {{ __('Add Optional Product Group') }} </a> </div>
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
               <input type="text" placeholder="search name" wire:model="search">
              </div>
              <table id="example" class="display table dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
                <thead>
                  <tr role="row">
                    <th class="text-left"> Name</th>       
                    <th class="text-left">Optional Product Count</th>
                    <th class="text-left">Created Date</th>
                    <th class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($optionalProductGroups) > 0)
                    @foreach ($optionalProductGroups as $optionalProductGroup)                 
                      <tr role="row" class="odd">                        
                        <td class="text-left"><b>{{ $optionalProductGroup->name }}</b></td>
                        <td class="text-left">{{ $optionalProductGroup->optionalProducts()->count() }}</td>
                        <td class="text-left">{{ $optionalProductGroup->created_at->format('j F, Y') }}</td>
                        <td class="text-right"><a href="{{ route('admin.editoptionalproductgroup',['optional_product_group_id'=>$optionalProductGroup->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <div class="btn btn-danger" wire:click="delete({{ $optionalProductGroup->id }})" wire:loading.attr="disabled"><i class="fa fa-trash"></i></div></td>
                      </tr>
                    @endforeach
                  @else
                  <tr class="odd">
                    <td align="center" colspan="6" style="font-size:16px;" class="dataTables_empty" valign="top">No data available in table</td>
                  </tr>
                  @endif
                  </tbody>
              </table>
             @if (count($optionalProductGroups) > 0)
                 {{ $optionalProductGroups->links() }}
             @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
