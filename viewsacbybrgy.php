<?php

session_start();
require_once("db.php");
require_once("functions.php");
ensuresignin();

$id = $_SESSION['sac_id'];
ensureaccountactive($id);

$allowed = array("MSWDOAdmin", "Admin", "MSWDO");

if(!in_array($_SESSION['rights'], $allowed)) {
    // echo "You are not authorized to access this page. Please click Back on your browser.";
    header("Location: /sac2/notsufficientrights.php");
    return;
}

include "header.php";

navigationbar();

?>

        <div class="container-fluid">

            <?php 

            pagetitle("Monitor of SAC Beneficiaries Recording by Barangay");
            
            viewsacbybrgy(); 

            ?>

          
        </div>  
    
    </body>
</html>






