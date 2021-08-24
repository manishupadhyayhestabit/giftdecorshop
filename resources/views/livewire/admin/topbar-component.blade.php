<div class="navbar">
    <div class="navbar-inner container">
      <div class="sidebar-pusher"> <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar"> <i class="fa fa-bars"></i> </a> </div>
      <div class="logo-box"> <a href="{{ url('/') }}" class="logo-text text-uppercase"> {{ config('app.name', 'Giftdecorshop.com') }} </a> </div>
      <div class="topmenu-outer">
        <div class="top-menu">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"> <span class="user-name">{{ Auth::user()->name }}<i class="fa fa-angle-down"></i></span> <img class="img-circle avatar" src="{{ asset('backend/images/avatar.png') }}" width="40" height="40" alt=""> </a>
              <ul class="dropdown-menu dropdown-list" role="menu">
                <li role="presentation"><a href="{{ route('admin.profile') }}" ><i class="fa fa-user m-r-xs"></i>Profile</a></li>
                <form id="logoutForm" method="post" action="{{ route('logout') }}">
                @csrf
                </form>
                <li role="presentation"><a href="{{ route('logout') }}" onclick="event.preventDefault(); getElementById('logoutForm').submit();"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>