<div style="display: contents;">
    @php  $number = 1; @endphp
    @foreach ($products as $product)
        <div class="col-6 p-0 {{ ($number % 2 == 0)?'':'border-right' }}">
            <div class="list-card-image"> 
            <a href="{{  route($product->layout->slug,['slug'=>$product->slug]) }}" class="text-dark">
                <div class="member-plan position-absolute"><span class="badge mt-1 badge-danger">save ₹{{ $product->regular_price-$product->sale_price }}</span></div>
                <div class="p-3"> <img src="{{ asset('frontend/mobile/img/listing/v1.jpg') }}" class="img-fluid item-img w-100 mb-3">
                <div class="panel-title">{{ $product->name }}</div>
                <div class="d-flex align-items-center">
                    <div class="price"> <span class="mr-1 text-success">₹{{ $product->sale_price }}</span> <del class="text-muted text-sm">₹{{ $product->regular_price }}</del></div>
                </div>
                </div>
            </a> 
            </div>
        </div>
        @php $number++; @endphp
    @endforeach
    @if ($products->hasMorePages())
        @livewire('app.category.load-more-products',['page'=>$page, 'perPage'=>$perPage, 'categoryId'=>$categoryId,'sort'=>$sort])
    @endif
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        </div>
        <div class="modal-body p-0">
          <div class="osahan-filter">
            <div class="filter">
              <div class="p-3 bg-light border-bottom">
                <h6 class="m-0">SORT BY</h6>
              </div>
              <div class="custom-control border-bottom px-0  custom-radio">
                <input type="radio" wire:model='sort' id="recommended" name="sort" value="product_views|DESC" class="custom-control-input" checked>
                <label class="custom-control-label py-3 w-100 px-3" for="recommended">Recommended</label>
              </div>
              <div class="custom-control border-bottom px-0  custom-radio">
                <input type="radio" wire:model='sort' id="lowToHigh" name="sort" value="sale_price|ASC" class="custom-control-input">
                <label class="custom-control-label py-3 w-100 px-3" for="lowToHigh">Price: Low to High</label>
              </div>
              <div class="custom-control border-bottom px-0  custom-radio">
                <input type="radio" wire:model='sort' id="highToLow" name="sort" value="sale_price|DESC" class="custom-control-input">
                <label class="custom-control-label py-3 w-100 px-3" for="highToLow">Price: High to Low</label>
              </div>
              <div class="custom-control border-bottom px-0  custom-radio">
                <input type="radio" wire:model='sort' id="new" name="sort" value="created_at|DESC" class="custom-control-input">
                <label class="custom-control-label py-3 w-100 px-3" for="new">New</label>
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
  </div>
</div>
@push('scripts')
<script>
  window.addEventListener('closeModal', event => {
    $('.modal').modal('hide').data('bs.modal', null);
    $('.modal-backdrop').remove();           
  });
</script>
@endpush