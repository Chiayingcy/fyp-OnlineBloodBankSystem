<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Appointment</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
    @include('layouts.navigation')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointments') }}
        </h2>
    </x-slot>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="wrapper img" style="background-color:lightcoral">

                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4 text-dark text-xl font-semibold">Edit a date and time for an
                                    Appointment</h3>

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <x-auth-success-status class="mb-4" :status="session('message')" />
                                
                                <form method="post" action="{{ route('appointment.update', $Appointment->id) }}">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="appointmentDate"
                                                    class="block text-sm font-medium text-gray-700"> Appointment Date
                                                </label>
                                                <div class="mt-1">
                                                    {{-- <input type="hidden" name="appointment_id" value="{{}}" --}}
                                                    <input type="date" id="appointmentDate" name="appointmentDate"
                                                        min="{{ $min_date }}" max=""
                                                        value="{{ $Appointment->appointmentDate }}"
                                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                                </div>
                                                <span class="text-xs">Please choose the Date 2 days after . </span>
                                                @error('res_date')
                                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="appointmentTime"
                                                    class="block text-sm font-medium text-gray-700"> Appointment Time
                                                </label>
                                                <div class="mt-1">
                                                    <input type="time" id="appointmentTime" name="appointmentTime"
                                                        min="{{ $openingTime }}" max="{{ $closingTime }}"
                                                        value="{{ $Appointment->appointmentTime }}"
                                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                                </div>
                                                <span class="text-xs">Please choose time in betweeen working hours 8am - 8pm .</span>
                                                @error('res_time')
                                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="appointmentTime"
                                                    class="block text-sm font-medium text-gray-700"> Selcet Hospital
                                                </label>

                                                <div class="mt-1">
                                                    <select name="hospitalId" id="" class="from-select">
                                                        @foreach ($hospital as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ $Appointment->hospitalId == $item->id ? 'selected' : '' }}>
                                                                {{ $item->hospitalName }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" name="send" value="Update"
                                                    class="btn btn-dark btn-block">
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

    <br /><br />


    
</body>

</html>