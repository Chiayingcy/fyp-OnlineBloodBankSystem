 <!-- Fixed navbar -->
 <nav class="navbar navbar-inverse navbar-expand-lg navbar-fixed-top navbar-light" style="background-color:#ff5c5c;">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/auth/dashboard"><img src="/Images/logo.gif" width="100px" height="100px" class="rounded float-left"></img></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </div>

          <ul class="nav navbar-nav navbar-right">
             <li class="nav-item active">
                <a class="nav-link text-white" href="/auth/dashboard">Home <span class="sr-only">(current)</span></a>
            </li>
           
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Blood Campaigns/ Events</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="#">View Annoucement Details</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="#">Donation</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="#">About Us</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="#">Contact Us</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="#">Personal Information</a>
            </li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
        
            <li class="nav-item p-2">
               <button class="btn btn-success"><a class="nav-link text-white" href="#">{{$data->name}}</a></button>
            </li>

            <li class="nav-item p-2">
            <button class="btn btn-danger"><a class="nav-link text-white" href="/auth/logout">Logout</a></button>
            </li>
      </ul>


      </div>
    </nav>
	</br></br>