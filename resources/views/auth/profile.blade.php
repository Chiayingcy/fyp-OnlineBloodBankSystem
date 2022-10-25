<title>My Profile</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<!-- CSS for toggle eye icon -->
<style>
    .fa-eye{
  position: absolute;
  margin-top: 0.8%;
  margin-left: 75%;
  cursor: pointer;
  color: lightgray;
}
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-auth-success-status class="mb-4" :status="session('message')" />
                    
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method = "POST" action="{{ route ('profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class = "grid grid-cols-2 gap-6">
                            <div class = "grid grid-rows-2 gap-6">
                                <div class = "mt-4">
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ auth()->user()->name }}" autofocus readonly />
                                </div>

                                <!-- Identifiaction Number -->
                                <div class="mt-4">
                                    <x-input-label for="ic" :value="__('Identification Number')" />

                                    <x-text-input id="ic" class="block mt-1 w-full" type="number" name="ic" value="{{ auth()->user()->ic }}" autofocus readonly/>
                                </div>

                                <!-- Age -->
                                <div class="mt-4">
                                    <x-input-label for="age" :value="__('Age')" />
                                    <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" value="{{ auth()->user()->age }}" autofocus readonly/>
                                </div>

                                <!-- Email -->
                                <div class = "mt-4">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" value="{{ auth()->user()->email }}" autofocus />
                                </div>

                                <!-- Blood Type -->
                                <div class = "mt-4">
                                    <x-input-label for="bloodType" :value="__('Blood Type')" />
                                    <x-text-input id="bloodType" class="block mt-1 w-full" type="text" name="bloodType" value="{{ $bloodType->bloodType }}" autofocus readonly/>
                                </div>

                                <!-- Gender-->
                                <div class = "mt-4">
                                    <x-input-label for="gender" :value="__('Gender')" />
                                    <x-text-input id="gender" class="block mt-1 w-full" type="text" name="gender" value="{{ auth()->user()->gender }}" autofocus readonly/>
                                </div>

                                <!-- Contact Number -->
                                <div class = "mt-4">
                                    <x-input-label for="phoneNo" :value="__('Contact Number')" />
                                    <x-text-input id="phoneNo" class="block mt-1 w-full" type="text" name="phoneNo" value="{{ auth()->user()->phoneNo }}" autofocus />
                                </div>

                                <!-- Address -->
                                <div class = "mt-4">
                                    <x-input-label for="address" :value="__('Address')" />
                                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{ auth()->user()->address }}" autofocus />
                                </div>

                                <!-- Zip Code -->
                                <div class = "mt-4">
                                    <x-input-label for="zipCode" :value="__('Zip Code')" />
                                    <x-text-input id="zipCode" class="block mt-1 w-full" type="number" name="zipCode" value="{{ auth()->user()->zipCode }}" autofocus />
                                </div>

                                <!-- State -->
                                <div class = "mt-4">
                                    <x-input-label for="stateID" :value="__('State')" />
                                    <!--<x-text-input id="stateID" class="block mt-1 w-full" name="stateID" value="{{ auth()->user()->stateName }}" autofocus />-->
                                        <select id="stateID" class="block mt-1 w-full" name="stateID" required>
                                            <option selected value="{{ $stateName->stateID }}">{{ $stateName->stateName }}</option>
                                                -@foreach($States as $state)
                                                    <option value="{{ $state->stateID }}" class="text-dark">{{ $state->stateName }}</option>

                                                @endforeach

                                            </select>
                                </div>
                            </div>

                            <div class = "grid grid-rows-2 gap-6">
                                <!-- Password -->
                                <div class="mt-4">
                                    <x-input-label for="password" :value="__('Password')" />
                                        <span><i class="fa-solid fa-eye" id="eye"></i></span> 

                                    <x-text-input id="password" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password"
                                                    autocomplete="new-password" />

                                        

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
                                                    name="password_confirmation" />


                                </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-3">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>



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