<div>
  <div class="osahan-home-page">
    <div class="border-bottom p-3">
      <div class="title d-flex align-items-center justify-content-between"> <a href="/" class="text-decoration-none text-dark d-flex align-items-center"> <img class="osahan-logo mr-2" src="{{ asset('frontend/img/logo/logo.png') }}"> </a> <a class="toggle ml-3" href="#"><i class="icofont-navigation-menu"></i></a> </div>
      <a href="{{ route('search') }}" class="text-decoration-none">
      <div class="input-group mt-3 rounded shadow-sm overflow-hidden bg-white">
        <div class="input-group-prepend">
          <button class="border-0 btn btn-outline-secondary text-success bg-white"><i class="icofont-search"></i></button>
        </div>
        <input type="text" class="shadow-none border-0 form-control pl-0" placeholder="Search for Products or Categories.." aria-label="" aria-describedby="basic-addon1">
      </div>
      </a> </div>
    <div class="osahan-body">
      <div class="p-3 osahan-categories">
        <h6 class="mb-2">What do you looking for?</h6>
        <div class="row m-0">
          <div class="col pl-0 pr-1 py-1">
            <div class="bg-white shadow-sm rounded text-center  px-2 py-3 c-it"> <a href=""> <img src="{{ asset('frontend/mobile/img/categorie/1.svg') }}" class="img-fluid px-2">
              <p class="m-0 pt-2 text-muted text-center">Vegetables</p>
              </a> </div>
          </div>
          <div class="col p-1">
            <div class="bg-white shadow-sm rounded text-center  px-2 py-3 c-it"> <a href=""> <img src="{{ asset('frontend/mobile/img/categorie/2.svg') }}" class="img-fluid px-2">
              <p class="m-0 pt-2 text-muted text-center">Fruits</p>
              </a> </div>
          </div>
          <div class="col p-1">
            <div class="bg-white shadow-sm rounded text-center  px-2 py-3 c-it"> <a href=""> <img src="{{ asset('frontend/mobile/img/categorie/3.svg') }}" class="img-fluid px-2">
              <p class="m-0 pt-2 text-muted text-center">Meat</p>
              </a> </div>
          </div>
          <div class="col pr-0 pl-1 py-1">
            <div class="bg-white shadow-sm rounded text-center  px-2 py-3 c-it"> <a href=""> <img src="{{ asset('frontend/mobile/img/categorie/4.svg') }}" class="img-fluid px-2">
              <p class="m-0 pt-2 text-muted text-center">Seafood</p>
              </a> </div>
          </div>
        </div>
        <div class="row m-0">
          <div class="col pl-0 pr-1 py-1">
            <div class="bg-white shadow-sm rounded text-center  px-2 py-3 c-it"> <a href=""> <img src="{{ asset('frontend/mobile/img/categorie/5.svg') }}" class="img-fluid px-2">
              <p class="m-0 pt-2 text-muted text-center">Milk-Egg</p>
              </a> </div>
          </div>
          <div class="col p-1">
            <div class="bg-white shadow-sm rounded text-center  px-2 py-3 c-it"> <a href=""> <img src="{{ asset('frontend/mobile/img/categorie/6.svg') }}" class="img-fluid px-2">
              <p class="m-0 pt-2 text-muted text-center">Bread</p>
              </a> </div>
          </div>
          <div class="col p-1">
            <div class="bg-white shadow-sm rounded text-center  px-2 py-3 c-it"> <a href=""> <img src="{{ asset('frontend/mobile/img/categorie/7.svg') }}" class="img-fluid px-2">
              <p class="m-0 pt-2 text-muted text-center">Frozen</p>
              </a> </div>
          </div>
          <div class="col pr-0 pl-1 py-1">
            <div class="bg-white shadow-sm rounded text-center  px-2 py-3 c-it"> <a href=""> <img src="{{ asset('frontend/mobile/img/categorie/8.svg') }}" class="img-fluid px-2">
              <p class="m-0 pt-2 text-muted text-center">Organic</p>
              </a> </div>
          </div>
        </div>
      </div>
      <div class="bg-white osahan-promos shadow-sm">
        <div class="promo-slider">
          <div class="osahan-slider-item m-2"> <a href="/"><img src="{{ asset('frontend/mobile/img/promo1.jpg') }}" class="img-fluid mx-auto rounded" alt="Responsive image"></a> </div>
          <div class="osahan-slider-item m-2"> <a href="/"><img src="{{ asset('frontend/mobile/img/promo2.jpg') }}" class="img-fluid mx-auto rounded" alt="Responsive image"></a> </div>
          <div class="osahan-slider-item m-2"> <a href="/"><img src="{{ asset('frontend/mobile/img/promo3.jpg') }}" class="img-fluid mx-auto rounded" alt="Responsive image"></a> </div>
        </div>
      </div>
      <div class="fresh-vegan pb-2">
        <div class="d-flex align-items-center mt-3 mb-2 px-3">
          <h6 class="m-0 font-weight-normal">Online Cake</h6>
          <a href="" class="ml-auto btn btn-success btn-sm">See more</a> </div>
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
        <div class="category-section">
          <div class="category-items"> <a href="#"> <span class="aspect_ration cat-1-3-banner progressive" style="background-image: url(&quot;https://m-i1.fnp.com/assets/images/custom/new-mobile-home/top-banners/Birthday-1-june-2021.jpg&quot;); filter: blur(0px);" data-img-src="https://m-i1.fnp.com/assets/images/custom/new-mobile-home/top-banners/Birthday-1-june-2021.jpg">
            <div class="overlay" style="background-image: url(&quot;https://m-i1.fnp.com/assets/images/custom/new-mobile-home/top-banners/Birthday-1-june-2021.jpg&quot;); opacity: 1;"></div>
            </span> <span class="category-name">Birthday</span> </a> </div>
          <div class="category-items"> <a href="#"> <span class="aspect_ration cat-1-3-banner progressive" style="background-image: url(&quot;https://m-i1.fnp.com/assets/images/custom/new-mobile-home/top-banners/Birthday-1-june-2021.jpg&quot;); filter: blur(0px);" data-img-src="https://m-i1.fnp.com/assets/images/custom/new-mobile-home/top-banners/Birthday-1-june-2021.jpg">
            <div class="overlay" style="background-image: url(&quot;https://m-i1.fnp.com/assets/images/custom/new-mobile-home/top-banners/Birthday-1-june-2021.jpg&quot;); opacity: 1;"></div>
            </span> <span class="category-name">Birthday</span> </a> </div>
          <div class="category-items"> <a href="#"> <span class="aspect_ration cat-1-3-banner progressive" style="background-image: url(&quot;https://m-i1.fnp.com/assets/images/custom/new-mobile-home/top-banners/Birthday-1-june-2021.jpg&quot;); filter: blur(0px);" data-img-src="https://m-i1.fnp.com/assets/images/custom/new-mobile-home/top-banners/Birthday-1-june-2021.jpg">
            <div class="overlay" style="background-image: url(&quot;https://m-i1.fnp.com/assets/images/custom/new-mobile-home/top-banners/Birthday-1-june-2021.jpg&quot;); opacity: 1;"></div>
            </span> <span class="category-name">Birthday</span> </a> </div>
          <div class="category-items"> <a href="#"> <span class="aspect_ration cat-1-3-banner progressive" style="background-image: url(&quot;https://m-i1.fnp.com/assets/images/custom/new-mobile-home/top-banners/Birthday-1-june-2021.jpg&quot;); filter: blur(0px);" data-img-src="https://m-i1.fnp.com/assets/images/custom/new-mobile-home/top-banners/Birthday-1-june-2021.jpg">
            <div class="overlay" style="background-image: url(&quot;https://m-i1.fnp.com/assets/images/custom/new-mobile-home/top-banners/Birthday-1-june-2021.jpg&quot;); opacity: 1;"></div>
            </span> <span class="category-name">Birthday</span> </a> </div>
          <div class="category-items"> <a href="#"> <span class="aspect_ration cat-1-3-banner progressive" style="background-image: url(&quot;https://m-i1.fnp.com/assets/images/custom/new-mobile-home/top-banners/Birthday-1-june-2021.jpg&quot;); filter: blur(0px);" data-img-src="https://m-i1.fnp.com/assets/images/custom/new-mobile-home/top-banners/Birthday-1-june-2021.jpg">
            <div class="overlay" style="background-image: url(&quot;https://m-i1.fnp.com/assets/images/custom/new-mobile-home/top-banners/Birthday-1-june-2021.jpg&quot;); opacity: 1;"></div>
            </span> <span class="category-name">Birthday</span> </a> </div>
          <div class="category-items"> <a href="#"> <span class="aspect_ration cat-1-3-banner progressive" style="background-image: url(&quot;https://m-i1.fnp.com/assets/images/custom/new-mobile-home/top-banners/Birthday-1-june-2021.jpg&quot;); filter: blur(0px);" data-img-src="https://m-i1.fnp.com/assets/images/custom/new-mobile-home/top-banners/Birthday-1-june-2021.jpg">
            <div class="overlay" style="background-image: url(&quot;https://m-i1.fnp.com/assets/images/custom/new-mobile-home/top-banners/Birthday-1-june-2021.jpg&quot;); opacity: 1;"></div>
            </span> <span class="category-name">Birthday</span> </a> </div>
        </div>
        {{--
        <div class="d-flex align-items-center mt-3 mb-2 px-3">
          <h6 class="m-0 font-weight-normal">Birthday Bestsellers</h6>
          <a href="" class="ml-auto btn btn-success btn-sm">View All</a> </div>
        <section class="category-section">
          <div class="product full-width"> <a data-wdgt="~~1~cakes bestsellers~" href="/cakes-bestsellers/birthday?promo=mob_HP_Row2_pos_1">
            <figure class="aspect_ration cat-big-banner"> <img src="https://m-i1.fnp.com/assets/images/custom/new-mobile-home/birthday-bestseller/birthday-bestseller-big-banner.jpg" alt="Birthday Bestsellers Cakes" style=""> </figure>
            </a> </div>
        </section>
        --}}
        <div class="d-flex align-items-center mt-3 mb-2 px-3">
          <h6 class="m-0 font-weight-normal">Online Flowers</h6>
          <a href="" class="ml-auto btn btn-success btn-sm">See more</a> </div>
        <div class="autoplay">
          <div class="osahan-slider-item m-2">
            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
              <div class="list-card-osahan-2 p-3">
                <div class="member-plan position-absolute"><span class="badge badge-success">10%</span></div>
                <a href="/" class="text-decoration-none text-dark"> <img src="{{ asset('frontend/mobile/img/green/f1.jpg') }}" class="img">
                <h5 class="text-success">Onion</h5>
                <h6 class="mb-1 font-weight-bold">$0.14 <del class="small">$0.22</del></h6>
                <p class="text-gray mb-0 small">Fresh Onion Prem from Thailand.</p>
                <p class="small text-muted m-0 text-success">200 grm.</p>
                </a> </div>
            </div>
          </div>
          <div class="osahan-slider-item m-2">
            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
              <div class="list-card-osahan-2 p-3">
                <div class="member-plan position-absolute"><span class="badge badge-dark">10%</span></div>
                <a href="/" class="text-decoration-none text-dark"> <img src="{{ asset('frontend/mobile/img/green/f2.jpg') }}" class="img">
                <h5 class="text-success">Tomato</h5>
                <h6 class="mb-1 font-weight-bold">$0.32</h6>
                <p class="text-gray mb-0 small">Fresh Tomato item from Korea.</p>
                <p class="small text-muted m-0 text-success">200 grm.</p>
                </a> </div>
            </div>
          </div>
          <div class="osahan-slider-item m-2">
            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
              <div class="list-card-osahan-2 p-3">
                <div class="member-plan position-absolute"><span class="badge badge-dark">10%</span></div>
                <a href="/" class="text-decoration-none text-dark"> <img src="{{ asset('frontend/mobile/img/green/f3.jpg') }}" class="img">
                <h5 class="text-success">Carrot</h5>
                <h6 class="mb-1 font-weight-bold">$0.8 <del class="small">$0.22</del></h6>
                <p class="text-gray mb-0 small">Fresh Premium item from India.</p>
                <p class="small text-muted m-0 text-success">200 grm.</p>
                </a> </div>
            </div>
          </div>
        </div>
        <div class="d-flex align-items-center mt-3 mb-2 px-3">
          <h6 class="m-0 font-weight-normal">Online Gifts</h6>
          <a href="" class="ml-auto btn btn-success btn-sm">See more</a> </div>
        <div class="trending-slider">
          <div class="osahan-slider-item m-2">
            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
              <div class="list-card-osahan-2 p-3">
                <div class="member-plan position-absolute"><span class="badge badge-dark">10%</span></div>
                <a href="/" class="text-decoration-none text-dark"> <img src="{{ asset('frontend/mobile/img/green/gift1.jpg') }}" class="img">
                <h5 class="text-success">Chilli</h5>
                <h6 class="mb-1 font-weight-bold">$0.14 <del class="small">$0.22</del></h6>
                <p class="text-gray mb-0 small">Fresh Premium item from India.</p>
                <p class="small text-muted m-0 text-success">200 grm.</p>
                </a> </div>
            </div>
          </div>
          <div class="osahan-slider-item m-2">
            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
              <div class="list-card-osahan-2 p-3">
                <div class="member-plan position-absolute"><span class="badge badge-dark">10%</span></div>
                <a href="/" class="text-decoration-none text-dark"> <img src="{{ asset('frontend/mobile/img/green/gift2.jpg') }}" class="img">
                <h5 class="text-success">Cabbage</h5>
                <h6 class="mb-1 font-weight-bold">$0.32</h6>
                <p class="text-gray mb-0 small">Fresh Premium item from India.</p>
                <p class="small text-muted m-0 text-success">200 grm.</p>
                </a> </div>
            </div>
          </div>
          <div class="osahan-slider-item m-2">
            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
              <div class="list-card-osahan-2 p-3">
                <div class="member-plan position-absolute"><span class="badge badge-dark">10%</span></div>
                <a href="/" class="text-decoration-none text-dark"> <img src="{{ asset('frontend/mobile/img/green/gift3.jpg') }}" class="img">
                <h5 class="text-success">Cauliflower</h5>
                <h6 class="mb-1 font-weight-bold">$0.8 <del class="small">$0.22</del></h6>
                <p class="text-gray mb-0 small">Fresh Premium item from India.</p>
                <p class="small text-muted m-0 text-success">200 grm.</p>
                </a> </div>
            </div>
          </div>
        </div>
      </div>
      <div class="title d-flex align-items-center p-3">
        <h6 class="m-0">Recommend for You</h6>
        <a class="ml-auto btn btn-success btn-sm" href="">26 more</a> </div>
      <div class="osahan-recommend px-3">
        <div class="row">
          <div class="col-12 mb-3"> <a href="/" class="text-dark text-decoration-none">
            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
              <div class="recommend-slider rounded pt-2">
                <div class="osahan-slider-item m-2 rounded"> <img src="{{ asset('frontend/mobile/img/recommend/r1.jpg') }}" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image"> </div>
                <div class="osahan-slider-item m-2 rounded"> <img src="{{ asset('frontend/mobile/img/recommend/r2.jpg') }}" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image"> </div>
                <div class="osahan-slider-item m-2 rounded"> <img src="{{ asset('frontend/mobile/img/recommend/r3.jpg') }}" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image"> </div>
              </div>
              <div class="p-3 position-relative">
                <h6 class="mb-1 font-weight-bold text-success">Fresh Orange </h6>
                <p class="text-muted">Orange Great Quality item from Jamaica.</p>
                <div class="d-flex align-items-center">
                  <h6 class="m-0">$8.8/kg</h6>
                  <a class="ml-auto" href="cart.html">
                  <div class="input-group input-spinner ml-auto cart-items-number">
                    <div class="input-group-prepend">
                      <button class="btn btn-success btn-sm" type="button" id="button-plus"> + </button>
                    </div>
                    <input type="text" class="form-control" value="1">
                    <div class="input-group-append">
                      <button class="btn btn-success btn-sm" type="button" id="button-minus"> − </button>
                    </div>
                  </div>
                  </a> </div>
              </div>
            </div>
            </a> </div>
          <div class="col-12 mb-3"> <a href="/" class="text-dark text-decoration-none">
            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
              <div class="recommend-slider rounded pt-2">
                <div class="osahan-slider-item m-2"> <img src="{{ asset('frontend/mobile/img/recommend/f1.jpg') }}" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image"> </div>
                <div class="osahan-slider-item m-2"> <img src="{{ asset('frontend/mobile/img/recommend/f2.jpg') }}" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image"> </div>
                <div class="osahan-slider-item m-2"> <img src="{{ asset('frontend/mobile/img/recommend/f3.jpg') }}" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image"> </div>
              </div>
              <div class="p-3 position-relative">
                <h6 class="mb-1 font-weight-bold text-success">Green Apple</h6>
                <p class="text-muted">Green Apple Premium item from Vietnam.</p>
                <div class="d-flex align-items-center">
                  <h6 class="m-0">$10.8/kg</h6>
                  <a class="btn btn-success btn-sm ml-auto" href="cart.html"> <i class="icofont-cart"></i> To Cart </a> </div>
              </div>
            </div>
            </a> </div>
          <div class="col-12 mb-3"> <a href="/" class="text-dark text-decoration-none">
            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
              <div class="recommend-slider rounded pt-2">
                <div class="osahan-slider-item m-2"> <img src="{{ asset('frontend/mobile/img/recommend/gift1.jpg') }}" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image"> </div>
                <div class="osahan-slider-item m-2"> <img src="{{ asset('frontend/mobile/img/recommend/gift2.jpg') }}" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image"> </div>
                <div class="osahan-slider-item m-2"> <img src="{{ asset('frontend/mobile/img/recommend/gift3.jpg') }}" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image"> </div>
              </div>
              <div class="p-3 position-relative">
                <h6 class="mb-1 font-weight-bold text-success">Fresh Apple </h6>
                <p class="text-muted">Fresh Apple Premium item from Thailand.</p>
                <div class="d-flex align-items-center">
                  <h6 class="m-0">$12.8/kg</h6>
                  <a class="ml-auto" href="cart.html">
                  <div class="input-group input-spinner ml-auto cart-items-number">
                    <div class="input-group-prepend">
                      <button class="btn btn-success btn-sm" type="button" id="button-plus"> + </button>
                    </div>
                    <input type="text" class="form-control" value="1">
                    <div class="input-group-append">
                      <button class="btn btn-success btn-sm" type="button" id="button-minus"> − </button>
                    </div>
                  </div>
                  </a> 
                </div>
              </div>
            </div>
            </a> 
          </div>
        </div>
      </div>
    </div>
  </div>
 @livewire('app.mobile.footer-component')
</div>
