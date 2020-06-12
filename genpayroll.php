<?php

session_start();
include "db.php";
include "functions.php";
ensuresignin();
ensureaccountactive();

$id = $_SESSION['sac_id'];

// ensuremswdo();

// ITSupport


$allowed = array("ITSupport", "MSWDOAdmin", "MSWDO");

if(!in_array($_SESSION['rights'], $allowed)) {
    echo "You are not authorized to access this page. Please click Back on your browser.";
    return;
}

include "header.php";

navigationbar();

?>        
        <div class="container-fluid">
            <div class="row">
                <!-- <div class="col-md-2 col-xs-12"></div> -->
                <div class="col-md-12 col-xs-12">
                

                <?php 
                            
                genpayroll(); 
                
                ?> 
                </div>
                <!-- <div class="col-md-2 col-xs-12"></div> -->
            </div>
          
        </div>  
    
    </body>
</html>