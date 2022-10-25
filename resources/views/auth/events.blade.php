<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Events Page</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>


</head>

<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('List of All Events in Penang, Malaysia') }}
            </h2>
        </x-slot>

        <!-- Page Content -->
        <div class="container">
            <br />
            <hr />
            <x-auth-success-status class="mb-4" :status="session('message')" />

            <!-- Row start -->
            <div class="row">
                <div class="py-12">
                    <!--Display all hospitals from database in table format -->
                    <table class="table table-hover table-bordered mx-auto">
                        <thead>
                            <tr>
                                <th colspan="3" class="align-center bg-dark text-light">@sortablelink('hospitalName', 'Hospital Name')</th>
                                <th colspan="3" class="align-center bg-dark text-light">@sortablelink('eventName', 'Event Name')</th>
                                <th colspan="3" class="align-center bg-dark text-light">@sortablelink('eventDate', 'Event Date')</th>
                                <th colspan="3" class="align-center bg-dark text-light">Event Time</th>
                                <th colspan="3" class="align-center bg-dark text-light">Image</th>
                                <th colspan="3" class="align-center bg-dark text-light">Description</th>
                                <th colspan="3" class="align-center bg-dark text-light">Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td colspan="3" class="align-center text-dark">
                                        {{ $event->hospital->hospitalName }}</td>
                                    <td colspan="3" class="align-center text-dark">{{ $event->eventName }}</td>
                                    <td colspan="3" class="align-center text-dark">{{ $event->eventDate }}</td>
                                    <td colspan="3" class="align-center text-dark">{{ $event->eventTime }}</td>
                                    <td colspan="3" class="align-center text-dark">
                                        <img src="{{ asset('eventImage') }}/{{ $event->image }}" alt="Image"
                                            height="250" width="250" />

                                    </td>
                                    <td colspan="3" class="align-center text-dark">{{ $event->eventDescription }}
                                    </td>
                                    <td colspan="3" class="align-center text-dark">
                                        @php
                                            // dd($register_event, $event->id);
                                        @endphp

                                        @if (in_array($event->id, $register_event))
                                            <button type='button align-center' class='btn btn-success'>Already
                                                Registered</button>
                                        @else
                                            <button type='button align-center' class='btn btn-primary'><a
                                                    href="{{ route('eventregister', $event->id) }}">Register
                                                    Events</a></button>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $events->appends(\Request::except('page'))->render() !!}
                </div>
            </div>
            <br />


    </x-app-layout>

    @include('layouts.footer')
</body>

</html>
