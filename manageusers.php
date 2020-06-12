<?php 
session_start();
require_once("db.php");
require_once("functions.php");
ensuresignin();

$id = $_SESSION['sac_id'];

// check admin rights

// checkadminpage($id);

checkaccessrights();

$allowed = array("Admin", "MSWDOAdmin");

if(!in_array($_SESSION['rights'], $allowed)) {
    echo "You are not authorized to access this page.";
    return;
}

include "header.php";

navigationbar();            
                
?>
        <div class="container-fluid">            
            
            <?php 

            pagetitle("User Management Page"); 
            
            usermanagementtable();

            ?>

            
        </div>           
    
    </body>
</html>
