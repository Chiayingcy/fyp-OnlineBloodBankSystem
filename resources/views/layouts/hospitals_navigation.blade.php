<style>
@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";


body {
    font-family: 'Helvetica Neue', sans-serif;
    background: #fafafa;
}

p {
    font-family: 'Helvetica Neue', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}

a, a:hover, a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

.navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

.navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
}

.line {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed #ddd;
    margin: 40px 0;
}

/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */
.wrapper {
    display: flex;
    align-items: stretch;
    perspective: 1500px;
}

#sidebar {
    min-width: 250px;
    max-width: 250px;
    background: black;
    color: #fff;
    transition: all 0.6s cubic-bezier(0.945, 0.020, 0.270, 0.665);
    transform-origin: bottom left;
}

#sidebar.active {
    margin-left: -250px;
    transform: rotateY(100deg);
}

#sidebar .sidebar-header {
    padding: 20px;
    background: darkgray;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}
#sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
}

#sidebar ul li.active > a, a[aria-expanded="true"] {
    color: #fff;
    background: black;
}


a[data-toggle="collapse"] {
    position: relative;
}

a[aria-expanded="false"]::before, a[aria-expanded="true"]::before {
    content: '\e259';
    display: block;
    position: absolute;
    right: 20px;
    font-family: 'Glyphicons Halflings';
    font-size: 0.6em;
}
a[aria-expanded="true"]::before {
    content: '\e260';
}


ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: black;
}

ul.CTAs {
    padding: 20px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}

a.download {
    background: #fff;
    color: #7386D5;
}

a.article, a.article:hover {
    background: #6d7fcc !important;
    color: #fff !important;
}



/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */
#content {
    padding: 30px;
    min-height: 100vh;
    transition: all 0.3s;
    flex: 1;
}

#sidebarCollapse {
    width: 40px;
    height: 40px;
    background: #f5f5f5;
}

#sidebarCollapse span {
    width: 80%;
    height: 2px;
    margin: 0 auto;
    display: block;
    background: #555;
    transition: all 0.8s cubic-bezier(0.810, -0.330, 0.345, 1.375);
    transition-delay: 0.2s;
}

#sidebarCollapse span:first-of-type {
    transform: rotate(45deg) translate(2px, 2px);
}
#sidebarCollapse span:nth-of-type(2) {
    opacity: 0;
}
#sidebarCollapse span:last-of-type {
    transform: rotate(-45deg) translate(1px, -1px);
}


#sidebarCollapse.active span {
    transform: none;
    opacity: 1;
    margin: 5px auto;
}


/* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */
@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
        transform: rotateY(90deg);
    }
    #sidebar.active {
        margin-left: 0;
        transform: none;
    }
    #sidebarCollapse span:first-of-type,
    #sidebarCollapse span:nth-of-type(2),
    #sidebarCollapse span:last-of-type {
        transform: none;
        opacity: 1;
        margin: 5px auto;
    }
    #sidebarCollapse.active span {
        margin: 0 auto;
    }
    #sidebarCollapse.active span:first-of-type {
        transform: rotate(45deg) translate(2px, 2px);
    }
    #sidebarCollapse.active span:nth-of-type(2) {
        opacity: 0;
    }
    #sidebarCollapse.active span:last-of-type {
        transform: rotate(-45deg) translate(1px, -1px);
    }

}
</style>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4>Hospital Sidebar</h4>
            </div>

            <ul class="list-unstyled components">
                <p>Hospital Navigation</p>
                <li>
                    <a href="{{ route('Hospitals.dashboard') }}">Dashboard</a>
                </li>

                <li>
                    <a href="#h" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Request Blood</a>
                    <ul class="collapse list-unstyled" id="h">
                        <li>
                            <a href="{{ route('Hospitals.bloodRequest.index') }}">View Blood Request Status</a>
                        </li>

                        <li>
                            <a href="{{ route('Hospitals.bloodRequest') }}">Request Blood</a>
                        </li>

                    </ul>

                </li>

                <li>
                    <a href="#hi" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Blood Bank Inventory</a>
                    <ul class="collapse list-unstyled" id="hi">
                        <li>
                            <a href="{{ route ('Hospitals.viewBloodBankInventory')}}">View Blood Bank Inventory</a>
                        </li>

                        <li>
                            <a href="{{ route ('Hospitals.addBloodBankInventory.create')}}">Add Blood Bank Inventory</a>
                        </li>

                    </ul>

                </li>

                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">View Donors Details</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{ route ('Hospitals.viewDonorList')}}">Donor List</a>
                        </li>

                        <li>
                            <a href="{{ route ('Hospitals.addDonor') }}">Add Donor</a>
                        </li>

                        <li>
                            <a href="{{ route ('Hospitals.viewDonorAppointment') }}">View Donor's Appointment</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Event Details</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        
                        <li>
                            <a href="{{ route ('Hospitals.event') }}">View Events List</a>
                        </li>

                        <li>
                            <a href="{{ route ('Hospitals.event.create') }}">Add Event</a>
                        </li>                      
                    </ul>
                </li>

                <li>
                    <a href="{{ route('Hospitals.hprofile') }}">Update Profile</a>
                </li>

            </ul>

        </nav>


<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });
</script>