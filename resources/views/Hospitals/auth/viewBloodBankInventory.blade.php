<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospitals View Blood Bank Inventory</title>

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

<body>
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

            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::guard('Hospitals')->user()->hospitalName}}
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

    <h2>Hospital View Blood Bank Inventory </h2>
    
    <br/><hr/><br/>

    <!-- Row start -->
    <div class="row align-items-center">
        <div class="py-12 w-100">

        <a href="{{ route ('Hospitals.addBloodBankInventory.create') }}" class="btn btn-primary col-sm-2">Add New Blood</a>

            <!-- Success Message -->
            <x-auth-success-status class="mb-4" :status="session('message')" />

            <!--Display all hospitals from database in table format -->
            <table class="table table-hover table-bordered mx-auto mt-4">
                <thead>
                    <tr>
                        <th colspan="3" class="text-center bg-dark text-light">Blood Type</th>
                        <th colspan="3" class="text-center bg-dark text-light">Blood Quantity</th>
                        <th colspan="3" class="text-center bg-dark text-light">Action</th>
                        
                    </tr>
                </thead>

                <tbody>
                @forelse($hospitals as $hospital)
                <tr>
                    <td colspan="3" class="text-center text-dark">{{ $hospital->bloodType }}</td>

                    @if($hospital->bloodQuantity < 50)
                    <td colspan="3" class="text-center text-danger"><li class="list-group-item list-group-item-danger">{{ $hospital->bloodQuantity }}</li>
                
                        <br/><span class="badge badge-danger">Please submit blood request to admin to request additional stock for Blood Type {{ $hospital->bloodType }} inventory!</span>
                    </td>

                    @elseif($hospital->bloodQuantity >= 50)
                    <td colspan="3" class="text-center text-success"><li class="list-group-item list-group-item-success">{{ $hospital->bloodQuantity }}</li></td>

                    @endif

                    <td colspan="3" class="text-center text-dark"><a type='button align-center' class='btn btn-primary' href="editUpdateViewBloodBankInventory/{{ $hospital->id }}">Update Blood Bank Inventory</a> </td>
                    
                </tr>

                @empty
                    <li class="list-group-item list-group-item-danger">No Record Found! Please add your Blood Bank Inventory</li>


                 @endforelse
                </tbody>
            </table>   
    </div>
<br/>


</div>
</div>

</body>    
</html>

