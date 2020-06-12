<?php 

session_start();
include "db.php";
include "functions.php";
ensuresignin();

$id = $_SESSION['sac_id'];

if(!isset($_GET['barangayid'])){
    echo "You are accessing this page without complete parameters. Click <a href='index.php'>here</a> to go to the homepage.";
    return;
}
$barangayid = $_GET['barangayid'];

if(!isset($_GET['actiontype'])){
    echo "You are accessing this page without complete parameters. Click <a href='index.php'>here</a> to go to the homepage.";
    return;
}
$actiontype = $_GET['actiontype'];

if(!isset($_GET['beneficiaryid'])){
    echo "You are accessing this page without complete parameters. Click <a href='index.php'>here</a> to go to the homepage.";
    return;
}
$beneficiaryid = $_GET['beneficiaryid'];

    // check user if allowed    

    $allowed = array("MSWDOAdmin", "MSWDO", "Admin");

    if(!in_array($_SESSION['rights'], $allowed)) {
        echo "You are not authorized to access this page. Please click Back on your browser.";
        return;
    }

    // Insert 
   
    $insertbenefit = "INSERT INTO `imagerec`(`entitytype`, `entityid`, `actiontype`, `enteredby`) VALUES ('beneficiary',$beneficiaryid,'$actiontype',$id)";
    $process = $db->query($insertbenefit);

    $registersignin = "INSERT INTO systemrecord (user, object, record) values ($id, $entityid, 'Reported receipt of benefit for $actiontype')";
    $process = $db->query($registersignin);
    header("Location: /sac2/getbenbrgy/$barangayid");