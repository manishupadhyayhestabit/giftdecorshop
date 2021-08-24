<nav id="main-nav">
  <ul class="second-nav">
    <li data-nav-custom-content>
      <div class="d-flex">
        <div class="mr-2"> <i class="icofont-user"></i> </div>
        <div class="font-weight-bold"> 
          <span>Hi 
            @auth()
                <span> {{ Auth()->user()->name }} </span>
              @else
              <span>{{ __('Guest') }} </span>
            @endauth
          </span> </div>
      </div>
    </li>
    @foreach ($categories as $category)
      <li><a href="{{ route($category->layout_slug, ['slug'=>$category->slug]) }}"> {{ $category->name }}</a>
        @if (count($category->children)>0)
        <ul>
          @foreach($category->children as $subcategory)
            <li> <a href="{{ route($subcategory->layout_slug, ['slug'=>$subcategory->slug]) }}">{{ $subcategory->name }}</a>
            @if (count($subcategory->children)>0)
              <ul>
                @foreach($subcategory->children as $subsubcategory)
                <li> <a href="{{ route($subsubcategory->layout_slug, ['slug'=>$subsubcategory->slug]) }}">{{ $subsubcategory->name }}</a></li>
                @endforeach
              </ul>
            @endif
            </li>
          @endforeach
        </ul>
        @endif
      </li>
    @endforeach
  </ul>
  <ul class="bottom-nav">
    <li class="email"> <a class="text-success" href="{{ route('home') }}">
      <p class="h5 m-0"><i class="icofont-home text-success"></i></p>
      Home </a> </li>
    <li class="github"> <a class="text-success" href="cart.html">
      <p class="h5 m-0"><i class="icofont-cart"></i></p>
      CART </a> </li>
    <li class="ko-fi"> <a class="text-success" href="help_ticket.html">
      <p class="h5 m-0"><i class="icofont-headphone"></i></p>
      Help </a> </li>
    <li class="email"> <a class="text-success" href="{{ route('login') }}">
      <p class="h5 m-0"><i class="icofont-user"></i></p>
      Login </a> </li>
  </ul>
</nav>