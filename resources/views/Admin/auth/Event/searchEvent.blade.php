<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View Event Page</title>

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

    <h2>Admin View All Event List which hosted by Hospitals </h2>
    
    <br/><hr/><br/>

    
    <!-- Row start -->
    <div class="row align-items-center">
        <div class="py-12 w-100">

            <!--Search function -->
            <div class="my-2 my-lg-0 float-right">
            <form action="{{ route('Admin.searchEvent') }}" method="GET" role="search">
            <x-text-input id="search" name="search" placeholder="Search Event" />
                <button class="btn btn-dark my-2 my-sm-0" type="submit" title="Search Event">
                        <span class="fas fa-search">
                </button>
            </form>
            </div>
            <br/>

        <!-- Success Message -->
        <x-auth-success-status class="mb-4" :status="session('message')" />
                    
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
        <div class="table">
        
            <table class="table table-hover table-bordered mx-auto">
                <thead>
                    <tr>
                        <th class="align-center bg-dark text-light">@sortablelink('id', 'No.')</th>
                        <th class="align-center bg-dark text-light">@sortablelink('hospitalName', 'Hosted By')</th>
                        <th class="align-center bg-dark text-light">@sortablelink('eventName', 'Event Name')</th>
                        <th class="align-center bg-dark text-light">@sortablelink('eventDate', 'Event Date')</th>
                        <th class="align-center bg-dark text-light">@sortablelink('eventTime', 'Event Time')</th>
                        <th class="align-center bg-dark text-light">{{ __('Event Poster') }}</th>
                        <th class="align-center bg-dark text-light">{{ __('Event Description') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($events as $event)

                    <tr>
                        <td>
                            @if (!empty($event['id']))
                            {{ $event['id'] }}
                            @endif
                        </td>

                        <td>
                            @if (!empty($event['hospitalName']))
                            {{ $event['hospitalName'] }}
                            @endif
                        </td>
                        
                        <td>
                            @if (!empty($event['eventName']))
                            {{ $event['eventName'] }}
                            @endif
                        </td>

                        <td>
                            @if (!empty($event['eventDate']))
                            {{ $event['eventDate'] }}
                            @endif
                        </td>

                        <td>
                            @if (!empty($event['eventTime']))
                            {{ $event['eventTime'] }}
                            @endif
                        </td>

                        <td>
                            @if(!empty($event['image']))
                            <img src="{{asset('eventImage')}}/{{$event->image}}" alt="Image" height="250" width="250"/>
                            
                            @endif
                        </td>

                        <td>
                            @if(!empty($event['eventDescription']))
                            {{ $event['eventDescription'] }}
                            @endif
                        </td>
                       
                    </tr>
                    @empty
                        <li class="list-group-item list-group-item-danger">Event Not Found.</li>
                    @endforelse

                </tbody>

            </table>

            <br/>

        </div>

    {{-- <span class="user-pagination" style="float: right;margin-right: 10%;">{{$client->links()}}</span> --}}
    
            
    </div>
<br/>


</div>
</div>

</body>    
</html>

