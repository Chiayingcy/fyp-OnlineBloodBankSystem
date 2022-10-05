<title>Donor Registration</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<!-- CSS for toggle eye icon -->
<style>
    .fa-eye{
  position: absolute;
  margin-top: 3%;
  margin-left: 83%;
  cursor: pointer;
  color: lightgray;
}
</style>



<x-guest-layout>
<section class="bg-image" style="background-image: url('/Images/background1.png');">

    <div class ="col-4 justify-content-center ">
    <x-auth-card>
    <div class = "card">
        <div class = "card-body">
        <x-slot name="logo">
        <h3>Donor Registration</h3>
            <a href="/">
                <br/><img src="{{ asset('Images/logo.gif') }}" style="width: 150px" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Identifiaction Number -->
            <div class="mt-4">
                <x-input-label for="ic" :value="__('Identification Number')" />

                <x-text-input id="ic" class="block mt-1 w-full" type="number" name="ic" placeholder="I.C. Format: 010101010101 without any symbol" :value="old('ic')" required />
            </div>
            
             <!-- Age -->
             <div class="mt-4">
                <x-input-label for="age" :value="__('Age')" />
                <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" min="18" max="65" :value="old('age')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Blood Type -->
            <!--<div class="mt-4">
                <x-input-label for="bloodType" :value="__('Blood Type')" />
                <select id="bloodType" class="block mt-1 w-full" name="bloodType" required>
                <option selected>Select Blood Type</option>
                
                <option value="A+" name="bloodType">
                    A+
                </option>

                <option value="A-" name="bloodType">
                    A-
                </option>

                <option value="B+" name="bloodType">
                    B+
                </option>

                <option value="B-" name="bloodType">
                    B-
                </option>

                <option value="AB+" name="bloodType">
                    AB+
                </option>

                <option value="AB-" name="bloodType">
                    AB-
                </option>

                <option value="O+" name="bloodType">
                    O+
                </option>

                <option value="O-" name="bloodType">
                    O-
                </option>

            </select>
            </div>-->

             <!-- Blood Type -->
             <div class="mt-4">
            <x-input-label for="bloodType" :value="__('Blood Type')" />
                <select id="bloodType" class="block mt-1 w-full" name="bloodType" required>
                <option selected>Select Blood Type</option>
                    @foreach($bloodType as $bloodType)
                        <option value="{{ $bloodType->bloodType }}" class="text-dark">{{ $bloodType->bloodType }}</option>

                    @endforeach

                </select>
            </div>

            <!-- Gender -->
            <div class="mt-4">
                <x-input-label for="gender" :value="__('Gender')" />
                <select id="gender" class="block mt-1 w-full" name="gender" required>
                <option selected>Select Gender</option>

                <option value="male" name="gender" id="1">
                    Male
                </option>

                <option value="female" name="gender"  id="2">
                    Female
                </option>
                </select>

                
            </div>

            <!-- Contact Number -->
            <div class="mt-4">
                <x-input-label for="phoneNo" :value="__('Contact Number')" />
                <x-text-input id="phoneNo" class="block mt-1 w-full" type="tel" name="phoneNo" placeholder="Example: 0123456789 without any symbol" :value="old('phoneNo')" required />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            </div>

            <!-- Zip Code -->
            <div class="mt-4">
                <x-input-label for="zipCode" :value="__('Zip Code')" />
                <x-text-input id="zipCode" class="block mt-1 w-full" type="number" name="zipCode" min="10000" max="100000" :value="old('zipCode')" required />
            </div>


            <!-- State -->
            <div class="mt-4">
            <x-input-label for="stateID" :value="__('State')" />
                <select id="stateID" class="block mt-1 w-full" name="stateID" required>
                <option selected>Select Your State</option>
                    @foreach($States as $state)
                        <option value="{{ $state->stateID }}" class="text-dark">{{ $state->stateName }}</option>

                    @endforeach

                </select>
            </div>

            <!-- Role -->
            <div class="mt-4">
                <x-input-label for="role" :value="__('Role')" />
                <select id="role" class="block mt-1 w-full" name="role" required>
                <option selected>Select Your Role</option>

                <option value="1" name="role" id="donor">
                    Donor
                </option>

                <option value="2" name="role"  id="hospital">
                    Hospital
                </option>

                <option value="3" name="role"  id="admin">
                    Admin
                </option>

                </select>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                    <span><i class="fa-solid fa-eye" id="eye"></i></span> 

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
                    <span><i class="fa-solid fa-eye" name ="eye_confirmation" id="eye_confirmation"></i></span>

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                                

        <div class="mt-4">
            <div class="form-check">
                <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
                <a href="{{ __('/auth/t&c') }}"><label class="form-check-label" for="invalidCheck3 ">
                    Agree to terms and conditions
                </label></a>

                <span class="text-danger">@error("invalidCheck3"){{$message}}@enderror</span>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>

            <div class="justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
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



<!-- Password Visibility -->
<script> 
    const passwordField = document.querySelector("#password");
    const eyeIcon= document.querySelector("#eye");

    eye.addEventListener("click", function()
    {
        // toggle the eye slash icon
        this.classList.toggle("fa-eye-slash");

        // toggle the type attribute
        const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
        passwordField.setAttribute("type", type);
    })

    
    const password_confirmationField = document.querySelector("#password_confirmation");
    const eyeIconConfirmation= document.querySelector("#eye_confirmation");
    
    eyeIconConfirmation.addEventListener("click", function()
    {
        // toggle the eye slash icon
        this.classList.toggle("fa-eye-slash");

        // toggle the type attribute
        const type = password_confirmationField.getAttribute("type") === "password" ? "text" : "password";
        password_confirmationField.setAttribute("type", type);
    })
</script>
