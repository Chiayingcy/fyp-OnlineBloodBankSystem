<title>Admin Registration</title>
<x-guest-layout>
<section class="bg-image" style="background-image: url('/Images/background1.png');">

    <div class ="col-4 justify-content-center ">
    <x-auth-card>
    <div class = "card">
        <div class = "card-body">
        <x-slot name="logo">
        <h3>Admin Registration</h3>
            <a href="/">
                <br/><img src="{{ asset('Images/logo.gif') }}" style="width: 150px" />
            </a>
        </x-slot>

       <!-- Validation Errors -->
       <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('Admin.register') }}">
            @csrf

            <!-- Admin Name -->
            <div>
                <x-input-label for="adminName" :value="__('Admin Name')" />

                <x-text-input id="adminName" class="block mt-1 w-full" type="text" name="adminName" :value="old('adminName')" required autofocus />
            </div>

            <!-- Admin ID -->
            <div class="mt-4">
                <x-input-label for="adminID" :value="__('Admin ID')" />

                <x-text-input id="adminID" class="block mt-1 w-full" type="text" name="adminID" :value="old('adminID')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <small id="passwordHelpInline" class= "text-danger">
                    Password must be :
                    <ul>
                        <li class= "text-danger">- Minimum 8 characters long</li>
                        <li class= "text-danger">- Contains at least 1 Uppercase</li>
                        <li class= "text-danger">- Contains at least 1  Lowercase</li>
                        <li class= "text-danger">- Contains at least 1  Special Character</li>
                        <li class= "text-danger">- Contains at least 1 Numeric</li>
                    </ul>
                </small>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

            <div class="justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('Admin.login') }}">
                    {{ __('Already registered? Login Here!') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
    </div></div>    
    </x-auth-card>

    <br/><br/>
    </div>

</x-guest-layout>
