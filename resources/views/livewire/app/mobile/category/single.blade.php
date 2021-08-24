<div>
  <div class="osahan-listing">
    <div class="p-3">
      <div class="d-flex align-items-center"> <a class="font-weight-bold text-success text-decoration-none" onclick="window.history.go(-1); return false;" href="javascript:void(0)"><i class="icofont-rounded-left back-page"></i></a><span class="font-weight-bold ml-3 h6 mb-0">{{ $category->name }}</span> <a class="toggle ml-auto" href="javascript:void(0)"><i class="icofont-navigation-menu"></i></a> </div>
    </div>
    <div class="osahan-listing px-3 bg-white">
      <div class="row border-bottom border-top">
        @livewire('app.category.load-products', ['categoryId' => $category->id])
      </div>
    </div>
  </div>
  <div class="row m-0 text-center border-bottom border-top fixed-bottom bg-white">
    <div class="col-6 p-0 border-right"> <a href="#" class="btn text-muted"><i class="icofont-cart icofont-2x mr-2"></i> Cart</a> </div>
    <div class="col-6 p-0"> <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal" class="btn text-muted"><i class="icofont-signal  icofont-2x mr-2"></i> Sort</a> </div>
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