<title>My Profile</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<!-- CSS for toggle eye icon -->
<style>
    .fa-eye{
  position: absolute;
  margin-top: 2.8%;
  margin-left: 70%;
  cursor: pointer;
  color: lightgray;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Update Profile</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</head>

@include('layouts.admin_navigation')

<!-- Page Content Holder -->
<div id="content">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="navbar-btn">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::guard('Admin')->user()->adminName}}
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('Admin.profile') }} ">Update Profile</a>
                    <form method="POST" action="{{ route('Admin.logout') }}">
                            @csrf
                    <a class="dropdown-item" href="route('Admin.logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">Logout</a>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <h2>Admin Profile </h2>
    
    <br/><hr/><br/>
   
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="row align-items-center">
    <div class="py-12 w-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Success Message -->
                    <x-auth-success-status class="mb-4" :status="session('message')" />
                    
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method = "POST" action="{{ route ('Admin.profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class = "grid grid-cols-2 gap-6">
                            <div class = "grid grid-rows-2 gap-6">
                                <div class = "form-group mt-4 mx-2">
                                    <x-input-label for="id" :value="__('Admin ID')" />
                                    <x-text-input id="id" class="form-control" type="text" name="id" value="{{Auth::guard('Admin')->user()->adminID}}" autofocus readonly />
                                </div>

                                <div class = "form-group mt-4 mx-2">
                                    <x-input-label for="adminName" :value="__('Admin Name')" />
                                    <x-text-input id="adminName" class="form-control" type="text" name="adminName" value="{{Auth::guard('Admin')->user()->adminName}}" autofocus readonly />
                                </div>

                                <!-- Email -->
                                <div class = "form-group mt-4 mx-2">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="form-control" type="text" name="email" value="{{Auth::guard('Admin')->user()->email}}" autofocus />
                                </div>


                            <div class = "grid grid-rows-2 gap-6">
                                <!-- Password -->
                                <div class="form-group mt-4 mx-2">
                                    <x-input-label for="password" :value="__('Password')" />
                                        <span><i class="fa-solid fa-eye" id="eye"></i></span> 

                                    <x-text-input id="password" class="form-control"
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
                                <div class="form-group mt-4 mx-2">
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                        <span><i class="fa-solid fa-eye" name ="eye_confirmation" id="eye_confirmation"></i></span>

                                    <x-text-input id="password_confirmation" class="form-control"
                                                    type="password"
                                                    name="password_confirmation" />


                                </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="btn btn-primary mt-4 mx-2 my-4 ">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</div>
</div>

</body>    
</html>















   



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