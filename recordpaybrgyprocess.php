<?php

session_start();
include "db.php";
include "functions.php";
ensuresignin();

$id = $_SESSION['sac_id'];

ensureaccountactive();
checkaccessrights();

if(!isset($_GET['barangayid'])){
    echo "You are accesing the page without sufficient parameters. Please click back on your browser and click a valid link from the website. The link lacks beneficiary id";
    return;
}

$barangayid = $_GET['barangayid'];

// check admin rights

// $rights = $_SESSION['rights'];

// if($rights != "MSWDOAdmin") {
//     
//     return;
// }

$allowed = array("MSWDOAdmin", "Admin", "MSWDO");

if(!in_array($_SESSION['rights'], $allowed)) {
    header("Location: /sac2/notsufficientrights.php");
    return;
}

$entitytype = strip_tags($_POST['entitytype']); 
$actiontype = strip_tags($_POST['actiontype']);

$entitytype = stripslashes($entitytype);
$actiontype = stripslashes($actiontype);

$entitytype = mysqli_real_escape_string($db, $entitytype);
$actiontype = mysqli_real_escape_string($db, $actiontype);

foreach($_POST['beneficiaryid'] as $beneficiaryid){                                  
                    
    $sql = "INSERT INTO imagerec (entitytype, entityid, actiontype, enteredby) VALUES (?, ?, ?, ?)";

    // Create a prepared statement
    $stmt = mysqli_stmt_init($db);

    // Prepare the statement
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL Statement Failed.";
        return;
    } else {
        // Bind parameters to the placeholders
        mysqli_stmt_bind_param($stmt, "sisi", $entitytype, $beneficiaryid, $actiontype, $id);        
        
        // Run parameters inside database 
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt); 
        
        switch ($actiontype) {
            case "sacdistribution2":
                $recordtitle = "Payout 2";
            break;
            default: 
                $recordtitle = "Payout 1";
        }

        $register = "INSERT INTO systemrecord (user, object, record) values ($id, $beneficiaryid, 'Record payout for $recordtitle')";
        $process = mysqli_query($db, $register);

    }
                    
} 

header("Location: /sac2/getbenbrgy/$barangayid");


