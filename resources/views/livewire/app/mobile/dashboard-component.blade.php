<div>
<div class="osahan-account">
  <div class="p-3 border-bottom">
    <div class="d-flex align-items-center">
      <h5 class="font-weight-bold m-0">My Account</h5>
      <a class="toggle ml-auto" href="#"><i class="icofont-navigation-menu"></i></a> </div>
  </div>
  <div class="p-4 profile text-center border-bottom"> <img style="width: 65px;" src="{{ asset('frontend/mobile/img/avatar.png') }}" class="img-fluid rounded-pill">
    <h6 class="font-weight-bold m-0 mt-2">{{ $user->name }}</h6>
    <p class="small text-muted">{{ $user->email }}</p>
    <a href="{{ route('profile.show') }}" class="btn btn-success btn-sm"><i class="icofont-pencil-alt-5"></i> Edit Profile</a> </div>
  <div class="account-sections">
    <ul class="list-group">
      <a href="promos.html" class="text-decoration-none text-dark">
      <li class="border-bottom bg-white d-flex align-items-center p-3"> <i class="icofont-sale-discount osahan-icofont bg-success"></i>Promos <span class="badge badge-success p-1 badge-pill ml-auto"><i class="icofont-simple-right"></i></span> </li>
      </a> <a href="my_address.html" class="text-decoration-none text-dark">
      <li class="border-bottom bg-white d-flex align-items-center p-3"> <i class="icofont-address-book osahan-icofont bg-dark"></i>My Address <span class="badge badge-success p-1 badge-pill ml-auto"><i class="icofont-simple-right"></i></span> </li>
      </a> <a href="terms_conditions.html" class="text-decoration-none text-dark">
      <li class="border-bottom bg-white d-flex align-items-center p-3"> <i class="icofont-info-circle osahan-icofont bg-primary"></i>Terms, Privacy & Policy <span class="badge badge-success p-1 badge-pill ml-auto"><i class="icofont-simple-right"></i></span> </li>
      </a> <a href="help_support.html" class="text-decoration-none text-dark">
      <li class="border-bottom bg-white d-flex align-items-center p-3"> <i class="icofont-phone osahan-icofont bg-warning"></i>Help & Support <span class="badge badge-success p-1 badge-pill ml-auto"><i class="icofont-simple-right"></i></span> </li>
      </a> <a href="signin.html" class="text-decoration-none text-dark">
      <li class="border-bottom bg-white d-flex  align-items-center p-3"> <i class="icofont-lock osahan-icofont bg-danger"></i> Logout </li>
      </a>
    </ul>
  </div>
</div>
 @livewire('app.mobile.footer-component')
</div>