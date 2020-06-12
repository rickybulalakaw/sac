<?php

session_start();
include "db.php";
include "functions.php";
ensuresignin();

$id = $_SESSION['sac_id'];
ensureaccountactive($id);
checkaccessrights();

if(!isset($_GET['id'])){
    echo "You are accesing the page without sufficient parameters. Please click back on your browser and click a valid link from the website. The link lacks beneficiary id";
    return;
}

$recordid = $_GET['id'];

if(!isset($_GET['bid'])){
    echo "You are accesing the page without sufficient parameters. Please click back on your browser and click a valid link from the website. The link lacks barangay id";
    return;
}

$bid = $_GET['bid'];

// check admin rights

$rights = $_SESSION['rights'];

ensuremswdo();

$getbeneficiarydetails = "select lastname, firstname, middlename, sex, civilstatus, dob, barangay from beneficiary where id = $recordid";
$process = mysqli_query($db, $getbeneficiarydetails);
$row = mysqli_fetch_assoc($process);
$lname = $row['lastname'];
$fname = $row['firstname'];
$mname = $row['middlename'];
$dbsex = $row['sex'];
$dbcivilstatus = $row['civilstatus'];
$dbdob = $row['dob'];
$dbbarangayid = $row['barangay'];
// $db->query($getbeneficiarydetails);



$deletebeneficiary = "DELETE FROM beneficiary where id = $recordid";
$process = mysqli_query($db, $deletebeneficiary);

$recorddelete = "INSERT INTO systemrecord (`user`, `object`, `record`) VALUES ($id, $recordid, 'Delete beneficiary record id $recordid, with details Name: $fname $mname $lname / $dbsex / $dbcivilstatus / Barangay ID $dbbarangayid')";
$process2 = $db->query($recorddelete);

header("Location: /sac2/getbenbrgy/$bid");

// header("Location:/sac2/beneficiaryupdated.php?bar=$barcode"); 