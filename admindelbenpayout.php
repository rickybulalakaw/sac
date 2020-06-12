<?php

session_start();
include "db.php";
include "functions.php";
ensuresignin();

$id = $_SESSION['sac_id'];
ensureaccountactive();
checkaccessrights();

// check admin rights

$rights = $_SESSION['rights'];

if($rights != "MSWDOAdmin") {
    header("Location: /sac2/notsufficientrights.php");
    return;
}


if(!isset($_GET['barangayid'])){
    echo "You are accesing the page without sufficient parameters. Please click back on your browser and click a valid link from the website. The link lacks barangay id";
    return;
}

$barangayid = $_GET['barangayid'];

if(!isset($_GET['imagerecid'])){
    echo "You are accesing the page without sufficient parameters. Please click back on your browser and click a valid link from the website. The link lacks beneficiary id";
    return;
}

$imagerecid = $_GET['imagerecid'];

if(!isset($_GET['beneficiaryid'])){
    echo "You are accesing the page without sufficient parameters. Please click back on your browser and click a valid link from the website. The link lacks barangay id";
    return;
}

$beneficiaryid = $_GET['beneficiaryid'];

$registerpreparedelete = "INSERT INTO systemrecord (user, object, record) VALUES ($id, $imagerecid, 'Prepare to delete payout record of Beneficiary ID $beneficiaryid')";
$processregregisterpreparedelete = mysqli_query($db, $registerpreparedelete);


// code to delete the payout record in imagerec table 

echo "Payout ID: $imagerecid ||  BarangayID: $barangayid || Beneficiary ID: $beneficiaryid";

$sqldelete = "DELETE FROM imagerec WHERE id =  $imagerecid";
$processsql = mysqli_query($db, $sqldelete);

$registerdelete = "INSERT INTO systemrecord (user, object, record) VALUES ($id, $imagerecid, 'Delete payout record of Beneficiary ID $beneficiaryid')";
$processreg = mysqli_query($db, $registerdelete);

header("Location: /sac2/admindelbenrecord/$barangayid/$beneficiaryid");