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

if(!isset($_GET['barangayid'])){
    echo "You are accessing this page with incomplete parameters. Click Back on your browser and click a valid link.";
    return;
} 

$barangayid = $_GET['barangayid'];

$searchbarangayname = "select barangay from barangay where id = $barangayid";
$result2 = $db->query($searchbarangayname);
$row2 = $result2->fetch_assoc();
$barangayname = $row2['barangay'];


if(!isset($_GET['actiontype'])){
    echo "You are accessing this page with incomplete parameters. Click Back on your browser and click a valid link.";
    return;
} 

$actiontype = $_GET['actiontype'];

include "header.php";

navigationbar();

?>        
        <div class="container-fluid">

            <?php 
            
            $registerview = "INSERT INTO systemrecord (user, object, record) VALUES ($id, $id, 'View page for generating payroll of Barangay $barangayname')";
            $process = mysqli_query($db, $registerview);
            
            generatepayroll($barangayid, $actiontype); 
            
            ?> 
          
        </div>  
    
    </body>
</html>