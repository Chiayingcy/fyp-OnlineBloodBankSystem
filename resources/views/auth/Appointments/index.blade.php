<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Appointments</title>

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
                My @if ($status == 'pending')
                    Pending
                @elseif($status == 'success')
                    Succeeded
                @elseif($status == 'fail')
                    Failed
                @endif
                Appointments
            </h2>
        </x-slot>

        <!-- Page Content -->
        <div class="container">
            <br />
            <hr />
            
            <!-- Row start -->
            <x-auth-success-status class="mb-4" :status="session('message')" />

            <div class="row">
                <div class="col-lg-8">
                    <!--Display all hospitals from database in table format -->
                    <table class="table table-hover table-bordered mx-auto">
                        <thead>
                            <tr>
                                <th colspan="3" class="align-center bg-dark text-light">@sortablelink('appointmentDate', 'Appointment Date')</th>
                                <th colspan="3" class="align-center bg-dark text-light">@sortablelink('appointmenttime', 'Appointment Time')</th>
                                <th colspan="3" class="align-center bg-dark text-light">Appointment Status</th>
                                <th colspan="6" class="align-center text-center bg-dark text-light">Edit Appointment
                                </th>

                            </tr>
                        </thead>

                        <tbody>
                            @if ($appointments->count() == '0')
                                <td colspan="4" class="align-center text-dark">No Records Found</td>
                            @endif

                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td colspan="3" class="align-center text-dark">
                                        {{ $appointment->appointmentDate }}
                                    </td>

                                    <td colspan="3" class="align-center text-dark">
                                        {{ $appointment->appointmentTime }}
                                    </td>

                                    <td colspan="3" class="align-center text-dark">
                                        @if ($appointment->appointmentStatus == 0)
                                            Pending

                                        @elseif($appointment->appointmentStatus == 1)
                                            Success

                                        @elseif($appointment->appointmentStatus == 2)
                                            Fail <br>{{ $appointment->reason }}
                                        @endif
                                    </td>

                                    <td colspan="3" class="align-center text-dark">

                                    @php

                                        $today = date("Y-m-d");

                                    @endphp

                                    @if($today > $appointment->appointmentDate && $appointment->appointmentStatus == 0)
                                        <button class='btn btn-danger'>Appointment Expired</button>

                                    @elseif($appointment->appointmentStatus == 1)
                                        <button class='btn btn-success'>Appointment Success</button>

                                    @else
                                        <button type='button align-center' class='btn btn-primary'><a
                                                href="{{ route('appointment.edit', $appointment->id) }}">Edit</a></button>

                                        <button type='button align-center' onclick="return confirm('Are you sure want to delete this appointment?')"
                                            class='btn btn-danger'><a
                                                href="{{ route('appointment.delete', $appointment->id) }}">Delete</a></button>

                                    @endif    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4 mx-auto">
                    <div class="wrapper img" style="background-color:lightcoral">

                        <div class="row">
                            <div class="col-12">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <h3 class="full-width mb-4 text-dark text-xl font-semibold">Create a New Appointment
                                    </h3>
                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                    <form method="POST" action=" {{ route('appointment.store') }} ">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="appointmentDate"
                                                        class="block text-sm font-medium text-gray-700"> Appointment
                                                        Date
                                                    </label>
                                                    <span class="text-xs">Please choose a Date 2 days after . </span>
                                                    <div class="mt-1">
                                                        <input type="date" id="appointmentDate"
                                                            name="appointmentDate" min="{{ $min_date }}"
                                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                                    </div>
                                                    @error('res_date')
                                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="appointmentTime"
                                                        class="block text-sm font-medium text-gray-700"> Appointment
                                                        Time
                                                    </label>
                                                    <span class="text-xs">Please choose time in betweeen working hours
                                                        8am - 8pm .</span>
                                                    <div class="mt-1">
                                                        <input type="time" id="appointmentTime"
                                                            name="appointmentTime" min="{{ $openingTime }}"
                                                            max="{{ $closingTime }}" value=""
                                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                                    </div>
                                                    @error('res_time')
                                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="appointmentTime"
                                                        class="block text-sm font-medium text-gray-700"> Selcet Hospital
                                                    </label>

                                                    <div class="mt-1">
                                                        <select name="hospitalId" id="" class="from-select">
                                                            @foreach ($hospital as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->hospitalName }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="submit" name="send" value="Create Appointment"
                                                        class="btn btn-dark btn-block">

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </div>

                        </div>

                    </div>

                </div>


            </div>
            <br />


    </x-app-layout>

    @include('layouts.footer')
    <script></script>
</body>

</html>
