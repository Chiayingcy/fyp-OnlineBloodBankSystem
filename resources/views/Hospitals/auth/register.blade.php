<title>Hospitals Registration</title>
<x-guest-layout>
<section class="bg-image" style="background-image: url('/Images/background1.png');">

    <div class ="col-4 justify-content-center ">
    <x-auth-card>
    <div class = "card">
        <div class = "card-body">
        <x-slot name="logo">
        <h3>Hospitals Registration</h3>
            <a href="/">
                <br/><img src="{{ asset('Images/logo.gif') }}" style="width: 150px" />
            </a>
        </x-slot>

       <!-- Validation Errors -->
       <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('Hospitals.register') }}">
            @csrf

            <!-- Hospital Name -->
            <div>
                <x-input-label for="hospitalName" :value="__('Hospital Name')" />

                <x-text-input id="hospitalName" class="block mt-1 w-full" type="text" name="hospitalName" :value="old('hospitalName')" required autofocus />
            </div>

            <!-- Hospital ID -->
            <div class="mt-4">
                <x-input-label for="hospitalID" :value="__('Hospital ID')" />

                <x-text-input id="hospitalID" class="block mt-1 w-full" type="text" name="hospitalID" :value="old('hospitalID')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Contact Number -->
            <div class="mt-4">
                <x-input-label for="phoneNo" :value="__('Contact Number')" />
                <x-text-input id="phoneNo" class="block mt-1 w-full" type="tel" name="phoneNo" :value="old('phoneNo')" required />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            </div>

            <!-- Zip Code -->
            <div class="mt-4">
                <x-input-label for="zipCode" :value="__('Zip Code')" />
                <x-text-input id="zipCode" class="block mt-1 w-full" type="number" name="zipCode" :value="old('zipCode')" required />
            </div>

            <!-- State -->
            <div class="mt-4">
                <x-input-label for="state" :value="__('State')" />
                <x-text-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required />
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
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('Hospitals.login') }}">
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
