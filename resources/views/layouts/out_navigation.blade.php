<!--navigation links-->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#ff5c5c;">
	<a class="navbar-brand" href="/"><img src="{{ asset('Images/logo.gif') }}" style="width: 100px" /></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto mx-auto">
			<li class="nav-item active">
				<a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
			</li>

			<li class="nav-item">
	            <a class="nav-link" href="{{ route ('hospitals_list') }}">Hospitals</a>
			</li>

		    <li class="nav-item">
                <a class="nav-link" href="#">Events</a>
	        </li>

			<li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
	        </li>

			<li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
	        </li>
        </ul>

		<!--Login links -->
		<div class="btn-group dropdown">
			<button class="btn btn-primary dropdown-toggle mr-1" type="button" id="dropdownMenu1" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
				OBBS Login
			</button>
			<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				<li><a class="dropdown-item" href="{{ route ('login') }}"> Donor Login </a></li>
                <li><a class="dropdown-item" href="{{ route ('Hospitals.login') }}"> Hosptial Login </a></li>
                <li><a class="dropdown-item" href="{{ route ('Admin.login') }}"> Admin Login </a></li>
			</ul>
		</div>

		<!--Register links -->
		<div class="btn-group dropdown">
			<button class="btn btn-primary dropdown-toggle mr-1" type="button" id="dropdownMenu1" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
				OBBS Register
			</button>
			<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				<li><a class="dropdown-item" href="{{ route ('register') }}"> Donor Register </a></li>
                <li><a class="dropdown-item" href="{{ route ('Hospitals.register') }}"> Hospital Register </a></li>
                <li><a class="dropdown-item" href="{{ route ('Admin.register') }}"> Admin Register </a></li>
			</ul>
		</div>

		<!--<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
					<div class="btn-group dropdown">
						<button class="btn btn-primary dropdown-toggle mr-1" type="button" id="dropdownMenu1" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
							OBBS Login
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a class="dropdown-item" href="{{ route ('login') }}"> Donor Login </a></li>
							<li><a class="dropdown-item" href="{{ route ('Hospitals.login') }}"> Hosptial Login </a></li>
							<li><a class="dropdown-item" href="{{ route ('Admin.login') }}"> Admin Login </a></li>
						</ul>
					</div>

                        @if (Route::has('register'))
						<div class="btn-group dropdown">
							<button class="btn btn-primary dropdown-toggle mr-1" type="button" id="dropdownMenu1" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
								OBBS Register
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								<li><a class="dropdown-item" href="{{ route ('register') }}"> Donor Register </a></li>
								<li><a class="dropdown-item" href="{{ route ('Hospitals.register') }}"> Hospital Register </a></li>
								<li><a class="dropdown-item" href="{{ route ('Admin.register') }}"> Admin Register </a></li>
							</ul>
						</div>
                        @endif
                    @endauth
                </div>
            @endif	-->

	</div>
</nav>

<script>
 /*---------------------------------------*/
 /*	NAVIGATION AND NAVIGATION VISIBLE ON SCROLL
 /*---------------------------------------*/
$( window ).on( "load", function() {
    mainNav();
    $(window).scroll(function() {
        mainNav();
    });
    function mainNav() {
        var top = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
        if (top > 40) $('.fixed-top').stop().animate({
            "opacity": '1',
            "top": '0'
        });
        else $('.fixed-top').stop().animate({
            "top": '-70',
            "opacity": '0'
        });

	}
     });
</script>