<div>
    <ul class="dropdown-menu dropdown-list" role="menu">
                <form id="logoutForm" method="post" action="{{ route('logout') }}">
                @csrf
                </form>
                <li role="presentation"><a href="{{ route('logout') }}" onclick="event.preventDefault(); getElementById('logoutForm').submit();"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
              </ul>
</div>