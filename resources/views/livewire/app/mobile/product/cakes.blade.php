<div>
<div class="p-3 bg-white">
  <div class="d-flex align-items-center"> <a class="font-weight-bold text-success text-decoration-none" onclick="window.history.go(-1); return false;" href="javascript:void(0)"><i class="icofont-rounded-left back-page"></i> Back</a> <a class="ml-auto font-weight-bold text-white text-decoration-none" href="javascript:void(0)"><i class="icofont-heart p-2 bg-danger shadow-sm rounded-circle"></i></a> <a class="font-weight-bold text-white text-decoration-none ml-2" href="javascript:void(0)"><i class="icofont-share p-2 bg-success shadow-sm rounded-circle"></i></a> <a class="toggle ml-3" href="javascript:void(0)"><i class="icofont-navigation-menu"></i></a> </div>
</div>
<div class="osahan-product">
   <div class="autoplay">
      <div class="osahan-slider-item"> <img src="{{ asset('frontend/mobile/img/recommend/r1.jpg') }}" class="img-fluid mx-auto shadow-sm" alt="Responsive image"> </div>
      <div class="osahan-slider-item"> <img src="{{ asset('frontend/mobile/img/recommend/r2.jpg') }}" class="img-fluid mx-auto shadow-sm" alt="Responsive image"> </div>
      <div class="osahan-slider-item"> <img src="{{ asset('frontend/mobile/img/recommend/r3.jpg') }}" class="img-fluid mx-auto shadow-sm" alt="Responsive image"> </div>
    </div>
   <div class="product-description">
      <div class="product-title-meta-data bg-white">
         <div class="p-title-price">
            <h6 class="mb-1">{{ $productName }}</h6>
            <p class="sale-price mb-0">₹{{ $totalPrice }}<span> ₹{{ $regularPrice }}</span></p>
         </div>
      </div>
   </div>
   <div class="product-details">
      <div class="details">
         <div class="px-3 pb-3 bg-white">
            <div class="d-flex align-items-center">
               <a href="review.html">
                  <div class="rating-wrap d-flex align-items-center">
                     <ul class="rating-stars list-unstyled mb-0">
                        <li> <i class="icofont-star text-warning"></i> <i class="icofont-star text-warning"></i> <i class="icofont-star text-warning"></i> <i class="icofont-star text-warning"></i> <i class="icofont-star"></i> </li>
                     </ul>
                     <p class="label-rating text-muted ml-2 mb-0 small"> (245 Reviews)</p>
                  </div>
               </a>
               <div class="input-group input-spinner ml-auto cart-items-number">
                  <div class="input-group-prepend">
                     <button class="btn btn-success btn-sm" wire:click="increment" type="button" id="button-plus"> + </button>
                  </div>
                  <input type="text" class="form-control" wire:model="qty">
                  <div class="input-group-append">
                     <button class="btn btn-success btn-sm" wire:click="decrement" type="button" id="button-minus"> − </button>
                  </div>
               </div> 
            </div>
            <div class="input-group mt-3 shadow-sm overflow-hidden bg-white">
               <input type="text" id="pincode" class="border form-control form-control-lg" placeholder="Type your pincode (e.g 110011, 110012)">
               <div class="input-group-prepend">
                  <button class="border btn btn-outline-secondary text-success bg-white"><i class="icofont-search"></i></button>
               </div>
            </div>
         </div>
         <div class="p-3">
            
            <div class="row m-0 text-center">
               <ul class="nav nav-pills mb-3 justify-content-between" id="pills-tab" role="tablist">
                  <li class="col pb-2 border-success border-bottom" role="presentation">
                     <a class=" active  font-weight-bold text-decoration-none" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Description</a>
                  </li>
                  <li class="col pb-2 border-bottom" role="presentation">
                     <a class=" font-weight-bold text-decoration-none" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Delivery Info</a>
                  </li>
                  <li class="col pb-2 border-bottom" role="presentation">
                     <a class=" font-weight-bold text-decoration-none" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Care Info</a>
                  </li>
               </ul>
                  <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                     Est quis nulla laborum officia ad nisi ex nostrud culpa Lorem excepteur aliquip dolor aliqua irure ex. Nulla ut duis ipsum nisi elit fugiat commodo sunt reprehenderit laborum veniam eu veniam. Eiusmod minim exercitation fugiat irure ex labore incididunt do fugiat commodo aliquip sit id deserunt reprehenderit aliquip nostrud. Amet ex cupidatat excepteur aute veniam incididunt mollit cupidatat esse irure officia elit do ipsum ullamco Lorem. Ullamco ut ad minim do mollit labore ipsum laboris ipsum commodo sunt tempor enim incididunt. Commodo quis sunt dolore aliquip aute tempor irure magna enim minim reprehenderit. Ullamco consectetur culpa veniam sint cillum aliqua incididunt velit ullamco sunt ullamco quis quis commodo voluptate. Mollit nulla nostrud adipisicing aliqua cupidatat aliqua pariatur mollit voluptate voluptate consequat non.
                  </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                     Est quis nulla laborum officia ad nisi ex nostrud culpa Lorem excepteur aliquip dolor aliqua irure ex. Nulla ut duis ipsum nisi elit fugiat commodo sunt reprehenderit laborum veniam eu veniam. Eiusmod minim exercitation fugiat irure ex labore incididunt do fugiat commodo aliquip sit id deserunt reprehenderit aliquip nostrud. Amet ex cupidatat excepteur aute veniam incididunt mollit cupidatat esse irure officia elit do ipsum ullamco Lorem. Ullamco ut ad minim do mollit labore ipsum laboris ipsum commodo sunt tempor enim incididunt. Commodo quis sunt dolore aliquip aute tempor irure magna enim minim reprehenderit. Ullamco consectetur culpa veniam sint cillum aliqua incididunt velit ullamco sunt ullamco quis quis commodo voluptate. Mollit nulla nostrud adipisicing aliqua cupidatat aliqua pariatur mollit voluptate voluptate consequat non.
                  </div>
                  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                     Est quis nulla laborum officia ad nisi ex nostrud culpa Lorem excepteur aliquip dolor aliqua irure ex. Nulla ut duis ipsum nisi elit fugiat commodo sunt reprehenderit laborum veniam eu veniam. Eiusmod minim exercitation fugiat irure ex labore incididunt do fugiat commodo aliquip sit id deserunt reprehenderit aliquip nostrud. Amet ex cupidatat excepteur aute veniam incididunt mollit cupidatat esse irure officia elit do ipsum ullamco Lorem. Ullamco ut ad minim do mollit labore ipsum laboris ipsum commodo sunt tempor enim incididunt. Commodo quis sunt dolore aliquip aute tempor irure magna enim minim reprehenderit. Ullamco consectetur culpa veniam sint cillum aliqua incididunt velit ullamco sunt ullamco quis quis commodo voluptate. Mollit nulla nostrud adipisicing aliqua cupidatat aliqua pariatur mollit voluptate voluptate consequat non.
                  </div>
                  </div>


            </div>
            <div class="d-flex align-items-center mt-3 mb-2 px-3">
          <h6 class="m-0 font-weight-normal">Recommendations</h6>
          </div>
        <div class="trending-slider">
          <div class="osahan-slider-item m-2">
            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
              <div class="list-card-osahan-2 p-3">
                <div class="member-plan position-absolute"><span class="badge badge-danger">10%</span></div>
                <a href="/" class="text-decoration-none text-dark"> <img src="{{ asset('frontend/mobile/img/green/g1.jpg') }}" class="img">
                <h5 class="text-success">Broccoli</h5>
                <h6 class="mb-1 font-weight-bold">$0.14 <del class="small">$0.22</del></h6>
                <p class="text-gray mb-0 small">Fresh Broccoli item from Thailand.</p>
                <p class="small text-muted m-0 text-success">200 grm.</p>
                </a> </div>
            </div>
          </div>
          <div class="osahan-slider-item m-2">
            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
              <div class="list-card-osahan-2 p-3">
                <div class="member-plan position-absolute"><span class="badge badge-success">10%</span></div>
                <a href="/" class="text-decoration-none text-dark"> <img src="{{ asset('frontend/mobile/img/green/g2.jpg') }}" class="img">
                <h5 class="text-success">Spinach</h5>
                <h6 class="mb-1 font-weight-bold">$0.32</h6>
                <p class="text-gray mb-0 small">Fresh Broccoli item from Thailand.</p>
                <p class="small text-muted m-0 text-success">200 grm.</p>
                </a> </div>
            </div>
          </div>
          <div class="osahan-slider-item m-2">
            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
              <div class="list-card-osahan-2 p-3">
                <div class="member-plan position-absolute"><span class="badge badge-dark">10%</span></div>
                <a href="/" class="text-decoration-none text-dark"> <img src="{{ asset('frontend/mobile/img/green/g3.jpg') }}" class="img">
                <h5 class="text-success">Spring Onion</h5>
                <h6 class="mb-1 font-weight-bold">$0.8 <del class="small">$0.22</del></h6>
                <p class="text-gray mb-0 small">Fresh Broccoli item from Thailand.</p>
                <p class="small text-muted m-0 text-success">200 grm.</p>
                </a> </div>
            </div>
          </div>
        </div>
         </div>
      </div>
    <div class="fixed-bottom pd-f bg-white d-flex align-items-center border-top"> <a href="cart.html" class="btn-warning py-3 px-5 h4 m-0"><i class="icofont-cart"></i></a> <a href="cart.html" class="btn btn-success btn-block">Buy</a> </div>
  </div>
</div>
</div>

