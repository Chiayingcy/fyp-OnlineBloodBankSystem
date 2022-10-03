<!--Display all hospitals from database in table format -->
<table class="table table-hover table-bordered mx-auto">
                <thead>
                    <tr>
                        <th colspan="3" class="align-center bg-dark text-light">Hospital Name</th>
                        <th colspan="3" class="align-center bg-dark text-light">Hospital Email</th>
                        <th colspan="3" class="align-center bg-dark text-light">Hospital Contact Number</th>
                        <th colspan="3" class="align-center bg-dark text-light">Hospital Address</th>
                        <th colspan="3" class="align-center bg-dark text-light">Hospital Zip Code</th>
                        <th colspan="3" class="align-center bg-dark text-light">See Details</th>
                        <th colspan="3" class="align-center bg-dark text-light">Make Appointment</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($Hospitals as $hospital)
                <tr>
                    <td colspan="3" class="align-center text-dark">{{ $hospital->hospitalName }}</td>
                    <td colspan="3" class="align-center text-dark">{{ $hospital->email }}</td>
                    <td colspan="3" class="align-center text-dark">{{ $hospital->phoneNo }}</td>
                    <td colspan="3" class="align-center text-dark">{{ $hospital->address }}</td>
                    <td colspan="3" class="align-center text-dark">{{ $hospital->zipCode }}</td>
                    <td colspan="3" class="align-center text-dark"><button type='button align-center' class='btn btn-primary'><a href="{{ $hospital->hospitalLink }}">See Details</a></button> </td>
                    <td colspan="3" class="align-center text-dark"><button type='button align-center' class='btn btn-primary'><a href="{{ route ('register') }}">Make Appointment</a></button> </td>
                    </tr>


                 @endforeach
                </tbody>
            </table>    