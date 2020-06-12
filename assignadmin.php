<?php 
    session_start();
    require_once("db.php");
    require_once("functions.php");
    ensuresignin();
    
    $id = $_SESSION['sac_id'];
    
    // check user if admin

    checkadminpage($id);


    if(!isset($_GET['newid'])){
        echo "You are accessing this page without complete parameters. Click <a href='index.php'>here</a> to go to the homepage.";
        return;
    }
    $newid = $_GET['newid'];

    // Update the status of the user

    $updateuser = "UPDATE `user` SET `rights`='Admin' WHERE id = $newid";
    $process = $db->query($updateuser);

    $registersignin = "INSERT INTO systemrecord (user, object, record) values ($id, $newid, 'Assign Admin access')";
    $process = $db->query($registersignin);

    header("Location: /sac2/manageusers");