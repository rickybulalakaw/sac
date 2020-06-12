<?php 
session_start();
require_once("db.php");
require_once("functions.php");
ensuresignin();

$id = $_SESSION['sac_id'];

// check admin rights

$allowed = array("ITSupport", "MSWDOAdmin", "Admin");

if(!in_array($_SESSION['rights'], $allowed)) {
        echo "You are not authorized to access this page. Please click Back on your browser.";
        return;
}

include "header.php";

navigationbar();  

?>


        <div class="container-fluid">
                <?php 

                pagetitle("System Records");          

                viewsystemactionrecords();

                ?>

            
            
        </div>           
    
    </body>
</html>
