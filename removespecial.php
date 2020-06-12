<?php 
    session_start();
    if(!isset($_SESSION['sac_id'])) {
        header("Location: signin.php");
    }
    include "db.php";
    include "functions.php";

    
    $id = $_SESSION['sac_id'];

    // check user if admin

    // $checkuserid = "SELECT id from user where id = $id and rights = 'Admin'";
    // $process = $db->query($checkuserid);
    // if(mysqli_num_rows($process) < 1){
    //     echo "Sorry, this account does not have sufficient rights to process this transaction. Click back on your browser or click <a href='index.php'>here</a> to go to the Homepage.";
    //     return;
    // }

    checkadminpage($id);


    if(!isset($_GET['newid'])){
        echo "You are accessing this page without complete parameters. Click <a href='index.php'>here</a> to go to the homepage.";
        return;
    }
    $newid = $_GET['newid'];

    // Update the status of the user

    $updateuser = "UPDATE `user` SET `rights`='DEFAULT' WHERE id = $newid";
    $process = $db->query($updateuser);

    $registersignin = "INSERT INTO systemrecord (user, object, record) values ($id, $newid, 'Remove privilege access')";
    $process = $db->query($registersignin);

    header("Location: /sac2/manageusers");