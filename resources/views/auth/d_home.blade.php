<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Blood Bank System</title>

     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</head>

<body>

@include('layouts.navigation')
@include('layouts.slider')

<!-- Page Content -->
<div class="container">
    <h1 class="display-4">Welcome to Online Blood Bank System</h1>
    <hr/><br/>

    <!-- Row start -->
    <div class="row">
        <h2 class = "align-center text-danger mx-auto my-auto display-4">Emergency Request Blood Type from Hospitals</h2>
            <table class="table table-hover table-bordered mx-auto my-auto mt-4">
                <thead>
                    <tr>
                        <th class="align-center bg-danger text-light">Hospital Name</th>
                        <th class="align-center bg-danger text-light">Blood Types</th>
                        <th class="align-center bg-danger text-light">Blood Quantity</th>
                        <th class="align-center bg-danger text-light">Status</th>
                        
                    </tr>
                </thead>

                <tbody>
                @foreach($bloodRequests as $bloodRequest)
                <tr>
                    <td class="align-center text-dark">{{ $bloodRequest->hospitalName }}</td>
                    <td class="align-center text-dark">{{ $bloodRequest->bloodType }}</td>
                    <td class="align-center text-dark">{{ $bloodRequest->bloodQuantity }}</td>
                    <td class="align-center text-dark">Emergency</td>
                </tr>

                @endforeach
                </tbody>
            </table>
    </div>

    <br/><hr/><br/><br/>

    <!-- Row start -->
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card">
                <h4 class="card-header font-weight-bold" >The important of Blood</h4>

                    <p class="card-text" style="padding-left:2%">Humans can't live without blood. Without blood, the body's organs couldn't get the oxygen and nutrients they need to survive, we couldn't keep warm or cool off, fight infections, or get rid of our own waste products. Without enough blood, we'd weaken and die. </p><br/>
                    <a href="https://kidshealth.org/en/teens/blood.html#:~:text=Humans%20can't%20live%20without,we'd%20weaken%20and%20die." class="btn btn-primary">Read More</a>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card">
                <h4 class="card-header font-weight-bold">Why Blood Donation is important?</h4>

                    <p class="card-text" style="padding-left:2%">Blood donation has the power to save up to three lives at once. Blood is necessary for patients when they undergo life-saving surgeries and treatments, especially for trauma patients or those living with chronic conditions such as cancer. </p><br/>
                    <a href="https://www.homage.com.my/resources/blood-donor-privileges-malaysia/" class="btn btn-primary">Read More</a>
            
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card">
                <h4 class="card-header font-weight-bold">Who can you Help?</h4>

                    <p class="card-text" style="padding-left:2%">Every day, blood donors help patients of all ages: accident and burn victims, heart surgery and organ transplant patients, and those battling cancer. In fact, every two seconds, someone in the world needs blood. Here are just a few of their stories. </p><br/>
                    <a href="https://www.redcrossblood.org/donate-blood/how-to-donate/how-blood-donations-help.html#:~:text=Who%20Can%20You%20Help%20by,a%20few%20of%20their%20stories." class="btn btn-primary">Read More</a>
            </div>
        </div>
    </div>
    <!-- end of row -->

    <br/><br/><hr/>
    <div class="row justify-content-between">
        <div class="col-4 mx-auto my-auto">
            <h4 class =  "display-4 font-weight-bold text-danger text-md-center"> Learn About Blood Donation! </h4>
        </div>
    
        <div class="col-md-6 text-center">
            <img src="{{ asset('Images/bd.jpg') }}">
            <p>One blood donation has the power to saves up to 3 lives at once. </p><br/>
            <button type="button align-center" class="btn btn-info"><a href="{{ route ('register') }}">Become a Donor</a></button> 
        </div>
    </div>

    <br/><br/><hr/><br/><br/>
    <div class="row justify-content-between">
        <div class="col-md-6 text-center">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th colspan="3" class="align-center bg-danger text-light">Compatible Blood Type Donors</th>
                </tr>

                <tr>
                    <th scope="col">Blood Type</th>
                    <th scope="col">Donate Blood To</th>
                    <th scope="col">Receive Blood From</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                <th scope="row">A+</th>
                <td>A+ AB+</td>
                <td>A+ A- O+ O-</td>
                </tr>

                <tr>
                <th scope="row">A-</th>
                <td>A+ A- AB+ AB-</td>
                <td>A- O-</td>
                </tr>

                <tr>
                <th scope="row">B+</th>
                <td>B+ AB+</td>
                <td>B+ B- O+ O-</td>
                </tr>

                <tr>
                <th scope="row">B-</th>
                <td>B+ B- AB+ AB-</td>
                <td>B- O-</td>
                </tr>

                <tr>
                <th scope="row">AB+</th>
                <td>AB+</td>
                <td>Everyone</td>
                </tr>

                <tr>
                <th scope="row">AB-</th>
                <td>AB+ AB-</td>
                <td>AB- A- B- O-</td>
                </tr>

                <tr>
                <th scope="row">O+</th>
                <td>O+ A+ B+ AB+</td>
                <td>O+ O-</td>
                </tr>

                <tr>
                <th scope="row">O-</th>
                <td>Everyone</td>
                <td>O-</td>
                </tr>

            </tbody>
        </table> 
        </div>

        <div class="col-4 mx-auto my-auto">
            <h4 class =  "display-4 font-weight-bold text-danger text-md-center"> Blood Types </h4>
        </div>
    </div>


</div>

<br/><br/>

@include('layouts.footer')   
</body>
</html>