<x-app-layout>
    <div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
        <div class="container">
            <div class="breadcrumb-content text-center">
                {{ Breadcrumbs::render('register') }}
            </div>
        </div>
    </div>
    <div class="login-register-area pt-50 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper text-center">
                    @if ($errors->any())
                        <div class="text-danger">{{ __('Whoops! Something went wrong.') }}</div>
                        <ul class="text-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="login-form-container">
                        <div class="login-register-form">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name"/>
                                <input id="email" type="email" name="email" :value="old('email')" required placeholder="Email" />
                                <input id="mobile" type="number" name="mobile" :value="old('mobile')" required placeholder="Mobile" />
                                <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Password"/>
                                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmation Password"/>
                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <div class="form-check">
                                        <input type="checkbox" name="terms" id="terms">
                                        <label class="form-check-label" for="terms">{!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}</label>
                                    </div>
                                @endif
                                <div class="float-right mt-4 mt-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">{{ __('Already registered?') }}</a>
                                    <x-jet-button class="ml-4"> {{ __('Register') }}</x-jet-button>
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