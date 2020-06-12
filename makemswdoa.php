<?php 

session_start();
include "db.php";
include "functions.php";
ensuresignin();

$id = $_SESSION['sac_id'];

checkaccessrights();

    // check user if admin

    

    $allowed = array("MSWDOAdmin", "Admin");

    if(!in_array($_SESSION['rights'], $allowed)) {
        echo "You are not authorized to access this page. Please click Back on your browser.";
        return;
    }

    if(!isset($_GET['newid'])){
        echo "You are accessing this page without complete parameters. Click <a href='index.php'>here</a> to go to the homepage.";
        return;
    }
    $newid = $_GET['newid'];

    // Update the status of the user

    $updateuser = "UPDATE `user` SET `rights`='MSWDOAdmin' WHERE id = $newid";
    $process = $db->query($updateuser);

    $registersignin = "INSERT INTO systemrecord (user, object, record) values ($id, $newid, 'Assign MSWDO Admin access')";
    $process = $db->query($registersignin);
    header("Location: /sac2/manageusers");