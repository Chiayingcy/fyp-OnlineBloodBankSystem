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
@include('layouts.out_navigation')

<!-- Page Content -->
<div class="container mt-5">

    <!-- Row start -->
    <div class="row justify-content-between">
        <div class="col-4 mx-auto my-auto">
            <h4 class =  "display-4 font-weight-bold text-dark text-md-center"> About Us </h4>
        </div>
    
        <div class="col-md-4 text-center">
            <img src="{{ asset('Images/logo.gif') }}" style= "width:200px">
        </div>
    </div>

    <br/><br/><hr/>
    <div class="contanier mt-5">
        <div class="card">
            <h4 class="card-header font-weight-bold" >Online Blood Bank System (OBBS) is a centralized system for donors, hospitals and admin</h4>
                <p class="card-text mt-2 mx-4" >- OBBS system currently is only launched for users which are its' donors, hospitals and admin in Penang, Malaysia! </p>
                <p class="card-text mt-2 mx-4" >- OBBS system is work for identifying and tracking the donors, blood inventory and more. </p>
                <p class="card-text mt-2 mx-4" >- Donor can make blood donation appointment in the system by choosing the hospitals which had registered in the system.  </p>
                <p class="card-text mt-2 mx-4" >- Donor can view the hospitals list which means all the hospital which had registered in the system. </p>
                <p class="card-text mt-2 mx-4" >- Donor also is able to view and register the events which had proposed by the hospitals in the event page! </p>
                <p class="card-text mt-2 mx-4" >- Hospital which had registered in the system can update their blood bank inventory in the system so admin will get alert if certain blood type of the blood inventory is low! </p>
                <p class="card-text mt-2 mx-4" >- Hospital can make emergency request for certain blood type of blood if there is an emergency situation happens. </p>
                <p class="card-text mt-2 mx-4" >- Admin make an important role in the system! </p>
                <br/>
        </div>
    </div>


</div>

<br/><br/>

@include('layouts.footer')   
</body>
</html>