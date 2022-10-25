<title>Hospital Login</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<!-- CSS for toggle eye icon -->
<style>
    .fa-eye{
  position: absolute;
  margin-top: 3%;
  margin-left: 73%;;
  cursor: pointer;
  color: lightgray;
}
</style>

<x-guest-layout>
<section class="bg-image" style="background-image: url('/Images/background1.png');">
   
<div class ="col-4 justify-content-center ">
    <x-auth-card>
        <x-slot name="logo">
            <h3 class = "text-center">Hospital Login</h3>
            <a href="/">
                 <img src="{{ asset('Images/logo.gif') }}" style="width: 150px" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('Hospitals.login') }}">
            @csrf

            <!-- Hospital ID 
            <div class="mt-4">
                <x-input-label for="hospitalID" :value="__('Hospital ID')" />

                <x-text-input id="hospitalID" class="block mt-1 w-full" type="text" name="hospitalID" :value="old('hospitalID')" required autofocus />
            </div>-->

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                    <span><i class="fa-solid fa-eye" id="eye"></i></span> 
            
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
                @if (Route::has('Hospitals.auth.password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('Hospitals.auth.password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('Hospitals.register') }}">
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

<!-- Password Visibility -->
<script> 
    const passwordField = document.querySelector("#password");
    const eyeIcon= document.querySelector("#eye");

    eye.addEventListener("click", function(){
    // toggle the eye slash icon
    this.classList.toggle("fa-eye-slash");

    // toggle the type attribute
    const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
    passwordField.setAttribute("type", type);
    })
</script>