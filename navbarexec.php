<?php 


?>


    <?php 

        $navbarcontent = array("Home" => "/sac2",    
        "View Progress" => "/sac2/viewprogress/sacdistribution1",
        "View SAC Beneficiaries" => "/sac2/viewsacbybrgy",  
        "View Summary by Sex" => "/sac2/viewsumbysex", 

        "Sign out" => "/sac2/signout");

        foreach ($navbarcontent as $x => $y) {
            echo "<li class='nav-item active'>";
            echo "<a class='nav-link' href='";
            echo $y;
            echo "'>";
            echo $x;
            echo " <span class='sr-only'>(current)</span></a>";
            echo "</li>";
        }        
    ?>
   
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
      <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
    </form>
  </div>
</nav>