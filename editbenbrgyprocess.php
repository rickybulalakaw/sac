<?php

session_start();
include "db.php";
include "functions.php";

ensuresignin();

$id = $_SESSION['sac_id'];
ensureaccountactive($id);

ensuremswdo();

// process

if(isset($_POST['update'])) {
        require_once("db.php");
        
        $sacbeneficiaries = strip_tags($_POST['sacbeneficiaries']);
        $barangay = strip_tags($_POST['barangay']);
        $district = strip_tags($_POST['district']);
        $psgc = strip_tags($_POST['psgc']);
        $bid = strip_tags($_POST['id']);
        $punongbarangay = strip_tags($_POST['punongbarangay']);
        
        $sacbeneficiaries = stripslashes($sacbeneficiaries);
        $barangay = stripslashes($barangay); 
        $district = stripslashes($district); 
        $psgc = stripslashes($psgc); 
        $bid = stripslashes($bid); 
        $punongbarangay = stripslashes($punongbarangay); 
        
        $sacbeneficiaries = mysqli_real_escape_string($db, $sacbeneficiaries);
        $barangay = mysqli_real_escape_string($db, $barangay);
        $district = mysqli_real_escape_string($db, $district);
        $psgc = mysqli_real_escape_string($db, $psgc);
        $bid = mysqli_real_escape_string($db, $bid);
        $punongbarangay = mysqli_real_escape_string($db, $punongbarangay);

        $revisedby = $id;


       
        $sql = "UPDATE `barangay` SET `barangay`=?,`sacbeneficiaries`=?,`district`=?,`psgc`=?,`punongbarangay`=? WHERE  id=?";

        
           
    //    $resultquerystore = $db->query($sql_store); 
    
    // Create a prepared statement
    $stmt = mysqli_stmt_init($db);

    // Prepare the statement
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL Statement Failed.";
        return;
    } else {
        // Bind parameters to the placeholders
        mysqli_stmt_bind_param($stmt, "siissi", $barangay, $sacbeneficiaries, $district, $psgc, $punongbarangay, $bid);        
        
        // Run parameters inside database 
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

    }

    $sqlinsert = "INSERT INTO systemrecord (user, object, record) VALUES ($revisedby, $barangayid, 'Updated Barangay details into:SAC Beneficiaries: $sacbeneficiaries // PSGC Code: $psgc // Punong Barangay: $punongbarangay')";
    $process2 = mysqli_query($db, $sqlinsert);
      
    header("Location:/sac2/viewbarangay/$bid");      
       
    }



// record in system 