<style>
    .pie-chart {
        width: 100%;
        height: 400px;
        margin: 0 auto;
        float: right;
    }

    .text-center {
        text-align: center;
    }

    @media (max-width: 991px) {
        .pie-chart {
            width: 100%;
        }
    }
</style>
<script src="{{ asset('vendor/loader.js') }}"></script>
<script src="{{ asset('vendor/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/chart.min.js') }}"></script>
<script>
    window.onload = function() {
        google.load("visualization", "1.1", {
            packages: ["corechart"],
            callback: 'drawAllChart'
        });
    };

    function drawAllChart() {
        drawChart();
    }
</script>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospitals Dashboard</title>

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

        <h2>Hospital Dashboard </h2>

        <br />
        <hr /><br />

        <div class="col-md-12" id="chart_div">
            
            <div class="row">

                <div class="col-lg-12  mb-3">
                    <div id="chartDiv" class="pie-chart"></div>
                </div>

                <!--<div class="col-lg-12  mb-3">
                    <div id="chartDivs" class="pie-chart"></div>
                </div>-->

                

            </div>
        </div>


        <h4>Emergency Blood Request Status</h4>
        <hr /><br />
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Emergency Blood Request Pending Status</div>
                    <h3 class="display-4" style="padding-left:42%">
                        {{ $EmergencyBloodPending }}
                    </h3>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"
                            href="{{ route('Hospitals.bloodRequest.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Emergency Request Success Status</div>
                    <h3 class="display-4" style="padding-left:42%">
                        {{ $EmergencyBloodSuccess }}
                    </h3>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"
                            href="{{ route('Hospitals.bloodRequest.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Emergency Request Fail Status</div>
                    <h3 class="display-4" style="padding-left:42%">
                        {{ $EmergencyBloodFail }}
                    </h3>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"
                            href="{{ route('Hospitals.bloodRequest.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

        </div>

        <br />


        <h4>Blood Request Status</h4>
        <hr /><br />
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Blood Request Pending Status</div>
                    <h3 class="display-4" style="padding-left:42%">
                        {{ $RequestBloodPending }}
                    </h3>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"
                            href="{{ route('Hospitals.bloodRequest.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Blood Request Success Status</div>
                    <h3 class="display-4" style="padding-left:42%">
                        {{ $RequestBloodSuccess }}
                    </h3>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"
                            href="{{ route('Hospitals.bloodRequest.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Blood Request Fail Status</div>
                    <h3 class="display-4" style="padding-left:42%">
                        {{ $RequestBloodFail }}
                    </h3>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"
                            href="{{ route('Hospitals.bloodRequest.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

        </div>

        <br />

        <h4>Donor Appointment</h4>
        <hr /><br />
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Total Donors Appointment</div>
                    <h3 class="display-4" style="padding-left:42%">
                        {{ $donorAppointment }}
                        <!--{{ $totalDonorAppoiment }}-->
                    </h3>

                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"
                            href="{{ route('Hospitals.viewDonorAppointment') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>



    <br/><br/>
    


</body>

</html>


<script type="text/javascript">
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Pizza');
        data.addColumn('number', 'Populartiy');
        data.addRows([
            @foreach ($bloodInventory as $label => $count)
                ['{{ $label }}', {{ $count }}],
            @endforeach
        ]);
        var options = {
            title: "Total available Bloods according to blood groups in Blood Inventory",
            sliceVisibilityThreshold: .0,
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chartDiv'));
        chart.draw(data, options);

        var chart = new google.visualization.ColumnChart(document.getElementById('chartDivs'));
        chart.draw(data, options);
    }
</script>