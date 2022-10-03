<title>Admin Login</title>
<x-guest-layout>
<section class="bg-image" style="background-image: url('/Images/background1.png');">
   
<div class ="col-4 justify-content-center ">
    <x-auth-card>
        <x-slot name="logo">
            <h3 class = "text-center">Admin Login</h3>
            <a href="/">
                 <img src="{{ asset('Images/logo.gif') }}" style="width: 150px" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('Admin.login') }}">
            @csrf

            <!-- Admin ID -->
            <div class="mt-4">
                <x-input-label for="adminID" :value="__('Admin ID')" />

                <x-text-input id="adminID" class="block mt-1 w-full" type="text" name="adminID" :value="old('adminID')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('Admin.auth.password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('Admin.register') }}">
                    {{ __('Dont have account? Register Here!') }}
                </a>

                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
        
    </x-auth-card>
</div>
</section>
</x-guest-layout>

