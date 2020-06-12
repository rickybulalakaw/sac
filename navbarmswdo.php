<?php 


?>

 
      <li class='nav-item active'>
                <a class='nav-link' href='/sac2'>Home<span class='sr-only'>(current)</span></a>
                </li>    
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Beneficiary 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/sac2/addbeneficiary">Add Beneficiary</a>
          <a class="dropdown-item" href="/sac2/viewmasterlist">View Masterlist</a>
          <a class="dropdown-item" href="/sac2/generatedswddb/1/100">Generate Database for DSWD</a>
          <a class="dropdown-item" href="/sac2/viewsacbybrgy">SAC Beneficiaries</a>
          <a class="dropdown-item" href="/sac2/viewnonsacbybrgy">Non-SAC Beneficiaries</a>
          <a class="dropdown-item" href="/sac2/search">Search by Barcode</a>
        </div>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Barangay
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/sac2/editbarangays">Edit Barangay Details</a>
          <a class="dropdown-item" href="/sac2/genpayroll">Generate Payroll</a>
          <a class="dropdown-item" href="/sac2/viewprogress/sacdistribution1">Monitor Progress</a>        
        </div>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/sac2/manageusers">Manage Users</a>
          <a class="dropdown-item" href="/sac2/systemrecord">View System Activities</a> 
        </div> -->
      <li class='nav-item active'>
            <a class='nav-link' href='/sac2/signout'>Sign out<span class='sr-only'>(current)</span></a>
            </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
      <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
    </form>
  </div>
</nav>