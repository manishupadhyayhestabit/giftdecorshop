<x-app-layout>
    <div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
             {{ Breadcrumbs::render('login') }}
        </div>
    </div>
</div>
<div class="login-register-area pt-50 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                   @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <input type="email" name="email" :value="old('email')" required autofocus placeholder="Email">
                                        <input type="password" name="password" required autocomplete="current-password" placeholder="Password">
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox" id="remember_me" name="remember">
                                                <label>{{ __('Remember me') }}</label>
                                                <a href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
                                            </div>
                                            <button type="submit"><span>Log in</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
