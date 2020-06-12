<?php 
    session_start();
    if(!isset($_SESSION['sac_id'])) {
        header("Location: signin.php");
    }
    include "db.php";
    include "functions.php";



    $id = $_SESSION['sac_id'];

    checkaccessrights();
    $rights = $_SESSION['rights'];

    $allowed = array("MSWDOAdmin", "Admin");

    if(!in_array($rights, $allowed)){
        echo "Sorry, this account does not have sufficient rights to process this transaction. Click back on your browser or click <a href='index.php'>here</a> to go to the Homepage.";
        return;

    }





    if(!isset($_GET['newid'])){
        echo "You are accessing this page without complete parameters. Click <a href='index.php'>here</a> to go to the homepage.";
        return;
    }
    $newid = $_GET['newid'];

    // Update the status of the user

    $updateuser = "UPDATE `user` SET `status`='Active' WHERE id = $newid";
    $process = $db->query($updateuser);

    $registeractivity = "INSERT INTO systemrecord (user, object, record) values ($id, $newid, 'Activate account')";
    $process = $db->query($registeractivity);
    header("Location: /sac2/manageusers");