<?php 


session_start();

include "db.php";
include "functions.php";

if(isset($_POST['submit'])){
    include "db.php";

    $lastname = strip_tags($_POST['lastname']);
    $firstname = strip_tags($_POST['firstname']);
    $middlename = strip_tags($_POST['middlename']);     
    $extension = strip_tags($_POST['extension']);     
    $reltohh = strip_tags($_POST['reltohh']);     
    $sex = strip_tags($_POST['sex']);
    $sectorid = strip_tags($_POST['sectorid']);
    $dob = strip_tags($_POST['dob']);
    $healthconditionid = strip_tags($_POST['healthconditionid']);
    $work = strip_tags($_POST['work']);
    $memberprimary = strip_tags($_POST['memberprimary']);

    $lastname = mysqli_real_escape_string($db, $lastname);
    $firstname = mysqli_real_escape_string($db, $firstname);
    $middlename = mysqli_real_escape_string($db, $middlename);        
    $extension = mysqli_real_escape_string($db, $extension);        
    $reltohh = mysqli_real_escape_string($db, $reltohh);
    $sex = mysqli_real_escape_string($db, $sex);
    $sectorid = mysqli_real_escape_string($db, $sectorid);
    $dob = mysqli_real_escape_string($db, $dob);
    $healthconditionid = mysqli_real_escape_string($db, $healthconditionid);
    $work = mysqli_real_escape_string($db, $work);
    $memberprimary = mysqli_real_escape_string($db, $memberprimary);

    $enteredby = $_SESSION['sac_id'];

    $sql2 = "INSERT INTO `member`(`lastname`, `firstname`, `middlename`, `extension`, `reltohh`, `sex`, `dob`, `work`, `sectorid`, `healthconditionid`, `memberprimary`, `enteredby`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            // $process = $db->query($checkbarcode);

            // Create a prepared statement
            $stmt = mysqli_stmt_init($db);
            // Prepare the statement
            if(!mysqli_stmt_prepare($stmt, $sql2)){
                echo "SQL Statement Failed.";
                return;
            } else {
                // Bind parameters to the placeholders
                mysqli_stmt_bind_param($stmt, "ssssisssssii", $lastname, $firstname, $middlename, $extension, $reltohh, $sex, $dob, $work, $sectorid, $healthconditionid, $memberprimary, $enteredby);        // Run parameters inside database 
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                $updatemembership = "update beneficiary SET memberadded='Yes' where id = '$memberprimary'";
                // $processupdatemembership = mysqli_query($db, $updatemembership);
                $processupdatemembership = $db->query($updatemembership);
                header("Location: viewbeneficiary/$memberprimary");
                
            }

}
