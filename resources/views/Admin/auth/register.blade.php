<title>Admin Registration</title>
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
        <h3>Admin Registration</h3>
            <a href="/">
                <br/><img src="{{ asset('Images/logo.gif') }}" style="width: 150px" />
            </a>
        </x-slot>

       <!-- Validation Errors -->
       <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('Admin.register') }}">
            @csrf

            @if(Session::get('fail'))
                <div class=" alert alert-danger">
                    {{Session::get('fail')}}
                </div>
            @endif

            @if(Session::get('success'))
                <div class=" alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif

            <!-- Admin Name -->
            <div>
                <x-input-label for="adminName" :value="__('Admin Name')" />

                <x-text-input id="adminName" class="block mt-1 w-full" type="text" name="adminName" :value="old('adminName')" required autofocus />
            </div>

            <!-- Admin ID -->
            <div class="mt-4">
                <x-input-label for="adminID" :value="__('Admin ID')" />

                <x-text-input id="adminID" class="block mt-1 w-full" type="text" name="adminID" placeholder="Example: A0000" :value="old('adminID')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
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
            </div> -->

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
