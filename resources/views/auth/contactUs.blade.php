<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Page</title>

     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</head>

<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Us') }}
        </h2>
    </x-slot>


    <div class="container mt-5">
        <div class = "row justify-content-center">
            <div class = "col-lg-10">
                <div class ="wrapper img" style = "background-color:lightcoral">
                    <div class = "row">
                        <div class = "col-md-12 col-lg-7">
                            <div class = "contact-wrap w-100 p-md-5 p-4">
                                <h3 class = "mb-4 text-dark text-xl font-semibold">Get in touch with us</h3>
                                     <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                    <form action="" method="post" action="{{ route('contactUs') }}">
                                    @csrf

                                    <div class="row">
                                        <div class = "col-md-6">
                                        <div class = "form-group">
                                            <label class = "label" for = "name">Full Name</label>
                                            <input type = "text" class = "form-control" name = "name" id = "name" placeholder="Name">

                                        </div>
                                        </div>

                                        <div class = "col-md-6">
                                        <div class = "form-group">
                                            <label class = "label" for = "email">Email</label>
                                            <input type = "email" class = "form-control" name = "email" id = "email" placeholder="Email">

                                        </div>
                                        </div>

                                        <div class = "col-md-6">
                                        <div class = "form-group">
                                            <label class = "label" for = "phone">Contact Number</label>
                                            <input type = "tel" class = "form-control" name = "phone" id = "phone" placeholder="Contact Number">

                                        </div>
                                        </div>

                                        <div class = "col-md-12">
                                        <div class = "form-group">
                                            <label class = "label" for = "subject">Subject</label>
                                            <input type = "text" class = "form-control" name = "subject" id = "subject" placeholder="Subject">

                                        </div>
                                        </div>

                                        <div class = "col-md-12">
                                        <div class = "form-group">
                                            <label class = "label" for = "message">Message</label>
                                            <textarea type = "text" class = "form-control" name = "message" id = "message" placeholder="Message"></textarea>

                                        </div>
                                        </div>

                                        <div class = "col-md-12">
                                        <div class = "form-group">
                                            <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">

                                        </div>
                                        </div>

                                    </div>


                            </div>


                        </div>

                    </div>

                </div>

            </div>
        </div>


    </form>
    </div>

    <br/><br/>
</x-app-layout> 

@include('layouts.footer')  
</body>
</html>