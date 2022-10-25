<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View Appointment List</title>

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

        <h2>View All Appoiment Donor List </h2>

        <br />
        <hr /><br />

        <!-- Row start -->
        <div class="row align-items-center">
            <div class="py-12 w-100">

                <!-- Success Message -->
                <x-auth-success-status class="mb-4" :status="session('message')" />

                <!--Display all hospitals from database in table format -->
                @php
                    // dd($appointment);
                @endphp
                <table class="table table-hover table-bordered mx-auto mt-4">
                    <thead>
                        <tr>
                            <th colspan="3" class="align-center bg-dark text-light">Id</th>
                            <th colspan="3" class="align-center bg-dark text-light">@sortablelink('hospitalName', 'Hospital Name')</th>
                            <th colspan="3" class="align-center bg-dark text-light">@sortablelink('donor', 'Donor')</th>
                            <th colspan="3" class="align-center bg-dark text-light">@sortablelink('appointmentStatus', 'Status')</th>
                            <th colspan="3" class="align-center bg-dark text-light">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($appointment as $appo)
                            <tr>
                                <td colspan="3" class="align-center text-dark">
                                    {{ $appo->id }}
                                </td>

                                <td colspan="3" class="align-center text-dark">
                                    {{ $appo->hospital->hospitalName }}
                                </td>

                                <td colspan="3" class="align-center text-dark">
                                    {{ $appo->donor->name }}
                                </td>

                                <td colspan="3" class="align-center text-dark">
                                    @if ($appo->appointmentStatus == 0)
                                        <span class="badge badge-warning">Pending</span>

                                    @elseif($appo->appointmentStatus == 1)
                                        <span class="badge badge-success">Success</span>

                                    @elseif($appo->appointmentStatus == 2)
                                        <span class="badge badge-danger">Fail</span>
                                    @endif

                                </td>

                                <td colspan="3" class="align-center text-dark">
                                    <a href="{{ route('Admin.AppointmentsDonorDetail', $appo->id) }}"
                                        class="btn btn-primary">
                                        Approve / Reject</a>
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $appointment->links() }}
            </div>
            <br />


        </div>
    </div>

</body>

</html>
