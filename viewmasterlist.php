<?php

session_start();
include "db.php";
include "functions.php";
ensuresignin();

$id = $_SESSION['sac_id'];

// ensuremswdo();

// ITSupport


$allowed = array("ITSupport", "MSWDOAdmin", "MSWDO");

if(!in_array($_SESSION['rights'], $allowed)) {
    echo "You are not authorized to access this page. Please click Back on your browser.";
    return;
}

if(!isset($_GET['page'])){
    $page = 1;
} else {
    $page = $_GET['page'];

}

include "header.php";

navigationbar();

?>        
        <div class="container-fluid">

            <?php 
            
            $registerview = "INSERT INTO systemrecord (user, object, record) VALUES ($id, $id, 'View masterlist')";
            $process = mysqli_query($db, $registerview);
            
            
            viewmasterlist($page); ?> 
          
        </div>  
    
    </body>
</html>