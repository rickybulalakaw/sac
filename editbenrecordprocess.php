<?php

session_start();
include "db.php";
include "functions.php";
ensuresignin();

$id = $_SESSION['sac_id'];

checkaccessrights();

$rights = $_SESSION['rights'];

$allowed = array("MSWDOAdmin", "MSWDO");

if(!in_array($_SESSION['rights'], $allowed)) {
    echo "You are not authorized to access this page.";
    return;

}

// echo "Success";

if(isset($_POST['Revise'])) {
    include "db.php";
    
    $recordid = strip_tags($_POST['id']);
    $lastname = strip_tags($_POST['lastname']);
    $firstname = strip_tags($_POST['firstname']);
    $middlename = strip_tags($_POST['middlename']);    
    $extension = strip_tags($_POST['extension']);
    $work = strip_tags($_POST['work']);
    $sectorid = strip_tags($_POST['sectorid']);
    $healthconditionid = strip_tags($_POST['healthconditionid']);
    $typeofid = strip_tags($_POST['typeofid']);
    $idnumber = strip_tags($_POST['idnumber']);
    $monthlywage = strip_tags($_POST['monthlywage']);
    $indigenouspeople = strip_tags($_POST['indigenouspeople']);
    $indigenouspeopletype = strip_tags($_POST['indigenouspeopletype']);
    $placeofwork = strip_tags($_POST['placeofwork']);
    $sex = strip_tags($_POST['sex']);
    $civilstatus = strip_tags($_POST['civilstatus']);
    $dob = strip_tags($_POST['dob']);
    $homeaddress = strip_tags($_POST['homeaddress']);
    $barangay = strip_tags($_POST['barangay']);
    $address = strip_tags($_POST['address']);
    $barcode = strip_tags($_POST['barcode']);
    $cellphone = strip_tags($_POST['cellphone']);
    
    $recordid = mysqli_real_escape_string($db, $recordid);
    $lastname = mysqli_real_escape_string($db, $lastname);
    $firstname = mysqli_real_escape_string($db, $firstname);
    $middlename = mysqli_real_escape_string($db, $middlename);  
    $extension = mysqli_real_escape_string($db, $extension);
    $work = mysqli_real_escape_string($db, $work);
    $sectorid = mysqli_real_escape_string($db, $sectorid);
    $healthconditionid = mysqli_real_escape_string($db, $healthconditionid);
    $typeofid = mysqli_real_escape_string($db, $typeofid);
    $idnumber = mysqli_real_escape_string($db, $idnumber);
    $monthlywage = mysqli_real_escape_string($db, $monthlywage);
    $indigenouspeople = mysqli_real_escape_string($db, $indigenouspeople);
    $indigenouspeopletype = mysqli_real_escape_string($db, $indigenouspeopletype);
    $placeofwork = mysqli_real_escape_string($db, $placeofwork);    
    $sex = mysqli_real_escape_string($db, $sex);
    $civilstatus = mysqli_real_escape_string($db, $civilstatus);
    $dob = mysqli_real_escape_string($db, $dob);
    $homeaddress = mysqli_real_escape_string($db, $homeaddress);
    $barangay = mysqli_real_escape_string($db, $barangay);
    $address = mysqli_real_escape_string($db, $address);
    $barcode = mysqli_real_escape_string($db, $barcode);
    $cellphone = mysqli_real_escape_string($db, $cellphone);

    $revisedby = $_SESSION['sac_id'];

    $sql = "UPDATE `beneficiary` SET `lastname`=?,`firstname`=?,`middlename`=?,`extension`=?,`work`=?,`sectorid`=?,`healthconditionid`=?,`typeofid`=?,`idnumber`=?,`monthlywage`=?,`indigenouspeople`=?,`indigenouspeopletype`=?,`placeofwork`=?,`sex`=?,`civilstatus`=?,`dob`=?,`homeaddress`=?,`barangay`=?,`address`=?,`barcode`=?,`cellphone`=?,`revised`=? WHERE id = ?";
    
    

//    $resultquerystore = $db->query($sql_store);       

    // Create a prepared statement
    $stmt = mysqli_stmt_init($db);
    if(!mysqli_stmt_init($db)){
        echo "stage 1 failed";
        return;
    }

    // Prepare the statement
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL Statement preparation failed.";
        
        return;
    } else {
        // Bind parameters to the placeholders
        mysqli_stmt_bind_param($stmt, "ssssssssssssssssissssii", $lastname, $firstname, $middlename, $extension, $work, $sectorid, $healthconditionid, $typeofid, $idnumber, $monthlywage, $indigenouspeople, $indigenouspeopletype, $placeofwork, $sex, $civilstatus, $dob, $homeaddress, $barangay, $address, $barcode, $cellphone, $revisedby, $recordid);        // Run parameters inside database 
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        // Record revision to system record table

        $recordrevision = "INSERT INTO systemrecord (`user`, `object`, `record`) VALUES ($revisedby, $recordid, 'Revised record of beneficiary to $lastname, $firstname, $middlename / Sex=$sex / DOB=$dob / CivilStatus = $civilstatus / Address = $address / BarangayID = $barangay / BarCode = $barcode')";
        $process2 = $db->query($recordrevision);
    }
   
   header("Location:/sac2/viewbeneficiary/$recordid");      
   
} else {
    echo "You are accessing this page with incomplete parameters.";
    return;
}