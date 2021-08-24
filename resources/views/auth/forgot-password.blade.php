

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
                        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
                                <div class="login-register-form">
                                   <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <input type="email" name="email" :value="old('email')" required autofocus id="email" placeholder="Email">
                                        <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
                                    </form>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
