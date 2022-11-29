<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Add Donor Page</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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

<body>
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

                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::guard('Admin')->user()->adminName }}
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

        <h2>Admin Approve/ Reject Hospitals Blood Request </h2>

        <br />
        <hr /><br />


        <!-- Row start -->
        <div class="row align-items-center">
            <div class="py-12 w-100">

            <a href="{{ url()->previous() }}" class="btn btn-secondary ">Back</a>
                <br />

                <!-- Success Message -->
                <x-auth-success-status class="mb-4" :status="session('message')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" class="mt-4 border border-dark"
                    action="{{ route('Admin.bloodRequest.update', $bloodRequest->id) }}">
                    @method('PUT')
                    @csrf

                    <!-- Hospital Name -->
                    <div class="form-group mt-4 mx-2">
                        <label for="hospitalName" :value="__('Hospital Name')">Hospital Name:</label>
                        <input type="text" class="form-control" id="hospitalName" name="hospitalId"
                            value="{{ $bloodRequest->hospital->hospitalName }}" required autofocus readonly>
                    </div>

                    <!-- Blood Type -->
                    <div class="form-group mt-4 mx-2">
                        <label for="bloodTypes" :value="__('BloodType')">BloodType:</label>
                        <input type="text" class="form-control" id="bloodTypes" name="bloodTypes"
                            value="{{ $bloodRequest->bloodTypes->bloodType }}" required readonly>
                    </div>

                    <div class="form-group mt-4 mx-2">
                        <label for="bloodQuantity" :value="__('email')">BloodQuantity:</label>
                        <input type="bloodQuantity" class="form-control" id="email" name="bloodQuantity"
                            value="{{ $bloodRequest->bloodQuantity }}" required readonly>
                    </div>

                    <!-- Select Blood Request Status -->
                    <div class="form-group mt-4 mx-2">
                        <label for="bloodRequestStatus" :value="__('age')">Status:</label>
                        <select id="bloodRequestStatus" class="form-control" name="bloodRequestStatus" required>
                            <option value=""> Select Blood Request Status</option>
                            
                            <option value="1" {{ $bloodRequest->bloodRequestStatus == 1 ? 'selected' : '' }}>
                                Success
                            </option>
                            <option value="2" {{ $bloodRequest->bloodRequestStatus == 2 ? 'selected' : '' }}>Fail
                            </option>
                        </select>
                    </div>


                    <div class="form-group mt-4 mx-2">
                        <x-input-label for="reason" :value="__('Reason')" />
                        <textarea name="reason" class="form-control" id="" cols="30" rows="10">{{ $bloodRequest->reason }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 mx-2 my-4 ">Update Blood Request Status from Hospital</button>
                </form>

            </div>
            <br />


        </div>
    </div>

</body>

</html>
