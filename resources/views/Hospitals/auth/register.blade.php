
<title>Hospitals Registration</title>
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
<section class="bg-image w-100" style="background-image: url('/Images/background3.png');">

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

            <!-- Hospital ID 
            <div class="mt-4">
                <x-input-label for="hospitalID" :value="__('Hospital ID')" />
                <x-text-input id="hospitalID" class="block mt-1 w-full" type="text" name="hospitalID" :value="old('hospitalID')" required />
            </div>-->

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

             <!-- Hospital Website Link --> 
            <div class="mt-4">
                <x-input-label for="hospitalLink" :value="__('Hospital Website Link')" />

                <x-text-input id="hospitalLink" class="block mt-1 w-full" type="text" name="hospitalLink" placeholder="https://exampleHospitalLink.com" :value="old('hospitalLink')" required/>
            </div>

            <!-- Contact Number -->
            <div class="mt-4">
                <x-input-label for="phoneNo" :value="__('Contact Number')" />
                <x-text-input id="phoneNo" class="block mt-1 w-full" type="tel" name="phoneNo" placeholder="Example: 046565123 without any symbol"  :value="old('phoneNo')" required />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            </div>

            <!-- Zip Code -->
            <div class="mt-4">
                <x-input-label for="zipCode" :value="__('Zip Code')" />
                <x-text-input id="zipCode" class="block mt-1 w-full" type="number" name="zipCode" placeholder="Example: xxxxx" :value="old('zipCode')" required />
            </div>

           <!-- State -->
           <div class="mt-4">
            <x-input-label for="stateID" :value="__('State')" />
                <select id="stateID" class="block mt-1 w-full" name="stateID" required>
                <option value="">Select Your State</option>
                    <!--@foreach($States as $state)
                        <option value="{{ $state->stateID }}" class="text-dark">{{ $state->stateName }}</option>

                    @endforeach-->

                    <option value="7" name="stateID" id="stateID">
                        Penang
                    </option>

                </select>
            </div>

            <!-- Role 
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
            </div>-->

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                    <span><i class="fa-solid fa-eye" id="eye"></i></span> 


                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                    
                   
                <br/>
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