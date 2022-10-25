<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Blood Request Page </title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>

</head>

@include('layouts.hospitals_navigation')

<!-- Page Content Holder -->
<div id="content">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="navbar-btn">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::guard('Hospitals')->user()->hospitalName }}
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('Hospitals.hprofile') }} ">Update Profile</a>
                    <form method="POST" action="{{ route('Hospitals.logout') }}">
                        @csrf
                        <a class="dropdown-item" href="route('Hospitals.logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();">Logout</a>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <h2>Hospital Request Blood</h2>

    <br />
    <hr /><br />

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hospital Request Blood') }}
        </h2>
    </x-slot>

    <div class="row align-items-center">
        <div class="py-12 w-100">
            
            <a href="{{ url()->previous() }}" class="btn btn-secondary ">Back</a>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Success Message -->
                        <x-auth-success-status class="mb-4" :status="session('message')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="m-2 text-danger" :errors="$errors" />

                        <form method="POST" action="{{ route('Hospitals.bloodRequest.store') }}">
                            @csrf


                            <div class="grid grid-cols-2 gap-6">
                                <div class="grid grid-rows-2 gap-6">
                                    <div class="form-group mt-4 mx-2">
                                        <input type="hidden" name="hospitalID"
                                            value="{{ Auth::guard('Hospitals')->user()->id }}">
                                        
                                        <br/>
                                        <x-input-label for="bloodType" :value="__('Blood Type')" />
                                        <select id="bloodType" class="form-control" name="bloodType">
                                            <option value="">Select Blood Type</option>
                                            @foreach ($bloodTypes as $bloodType)
                                                <option value="{{ $bloodType->id }}">{{ $bloodType->bloodType }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group mt-4 mx-2">
                                        <x-input-label for="bloodQuantity" :value="__('Blood Quantity')" />
                                        <x-text-input id="bloodQuantity" class="form-control" type="number"
                                            name="bloodQuantity" autofocus value="{{ old('bloodQuantity') }}" />
                                    </div>


                                    <div class="form-group mt-4 mx-2">
                                        <x-input-label for="bloodRequirement" :value="__('Blood Requirement')" />
                                        <select id="bloodRequirement" class="form-control" name="bloodRequirement">
                                            <option value="">Select Blood Request</option>
                                            <option value="0">Blood Request</option>
                                            <option value="1">Emergency Blood Request </option>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="btn btn-primary mt-4 mx-2 my-4 ">Request Blood</button>
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
