<?php

session_start();
require_once("db.php");
require_once("functions.php");
ensuresignin();

// check admin rights

$id = $_SESSION['sac_id']; 
ensureaccountactive($id, $db);
checkaccessrights($id);

$rights = $_SESSION['rights'];
if($rights === "Default" ){
    echo "Sorry, you do not have access to this page. Please contact the MSWDO to give you additional access rights.";
    return;
}

include "header.php";

navigationbar();

?>

    <div class="container-fluid">   
        
        <?php 
        
        if(isset($_POST['search'])){

            require_once("db.php");
            $barcode = strip_tags($_POST['barcode']);       
            
            // $barcode = stripslashes($barcode);        
            
            $barcode = mysqli_real_escape_string($db, $barcode);
            
            $sql = "SELECT id, lastname, firstname, middlename, sex, civilstatus, dob, barangay, address, enteredby, timestamp, memberadded FROM beneficiary WHERE barcode=?";
            
            // Create prepared statement
        
            $stmt = mysqli_stmt_init($db);
        
            // Prepare the prepared statment 
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "SQL Statement Failed";
            } else {
                    // Bind parameters to placeholder
                    mysqli_stmt_bind_param($stmt, "s", $barcode);
                    // Run parameters inside database 
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
        
                    if(mysqli_num_rows($result) != NULL){
                        $row = mysqli_fetch_assoc($result);
                    
                        $dbid = $row['id'];
                        $lname = $row['lastname'];
                        $fname = $row['firstname'];
                        $mname = $row['middlename'];
                        $sex = $row['sex'];
                        $civilstatus = $row['civilstatus'];
                        $dob = $row['dob'];
                        $barangay = $row['barangay'];
                        $address = $row['address'];
                        $enteredby = $row['enteredby'];
                        $memberadded = $row['memberadded'];
                        $timestamp = $row['timestamp'];
                        // $lname = $row['id'];
        
                        $searchbarangayname = "select barangay from barangay where id = $barangay";
                        $result2 = $db->query($searchbarangayname);
                        $row2 = $result2->fetch_assoc();
                        $barangayname = $row2['barangay'];
                        $barcode = $barcode; 
                        
                        
                        $searchenteredbyname = "select fullname from user where id = $enteredby";
                        $result3 = $db->query($searchenteredbyname);
                        $row3 = $result3->fetch_assoc();
                        $enteredbyname = $row3['fullname'];
                        $barcode = $barcode; 

                        // header("Location:/sac2/viewbeneficiary/$dbid");

                        echo "<div class='row'>";
                        echo "<div class='col'><p>Search Result for Barcode No. $barcode </p></div>";
                        echo "</div>";
                        echo "<div class='row'>";
                        echo "<div class='col-9'>";
                        echo "<p>Last Name: $lname</p>";
                        echo "<p>First Name: $fname</p>";
                        echo "<p>Middle Name: $mname</p>";

                        if($sex == "") {
                            $sex = "<font color='red'>None recorded</font>";
                        }

                        echo "<p>Sex: $sex</p>";

                        if($civilstatus == "") {
                            $civilstatus = "<font color='red'>None recorded</font>";
                        }
                        echo "<p>Civil Status: $civilstatus</p>";
                        if($dob == "") {
                            $dob = "<font color='red'>None recorded</font>";
                        }
                        echo "<p>Date of Birth: $dob</p>";
                        echo "<p>Barangay: $barangayname</p>";
                        echo "<p>Address: $address</p>";
                        echo "<p>Barcode: $barcode</p>";
                        echo "<p>Entered by: $enteredbyname</p>";
                        echo "<p>Timestamp: $timestamp</p>";

                        echo "</div>";
                        echo "<div class='col'>";

                        $rights = $_SESSION['rights'];
                        if($rights === "DEFAULT" ){
                            echo "<a class='btn btn-primary btn-block' href='/sac2/search' role='button'>Search for another beneficiary</a> ";
                        } else {
                            echo "<a class='btn btn-primary btn-block' href='/sac2/search' role='button'>Search for another beneficiary</a> ";
                            echo "<a class='btn btn-primary btn-block' href='/sac2/viewbeneficiary/$dbid' role='button'>View Beneficiary Details</a> ";                            
                            echo "<a class='btn btn-primary btn-block' href='/sac2/editbenrecord/$dbid' role='button'>Edit Details</a> ";                            
                            echo '<a href="/sac2/addmember/'.$dbid.'" class="btn btn-primary btn-block">Add member</a>';
                            if($memberadded == "No"){
                                echo "<a class='btn btn-primary btn-block' href='/sac2/addmaintomember/$dbid' role='button'>Add details to household members</a> ";
                            } else {
                                echo "<a class='btn btn-primary btn-block' href='/sac2/addmaintomember/$dbid' role='button' disabled>Add details to household members</a> ";
                            }
                            
                            echo "</div>";                            
                        echo "</div>";

                        }

            
                    } else {
                        echo "Sorry, that barcode does not exist. Please make sure you enter the details correctly when you try again. Thank you.";
                        return;
                    }
        
            } 
        
        }

        ?>

      
    </div>  

    </body>
</html>