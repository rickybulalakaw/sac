<?php

session_start();
require_once("db.php");
require_once("functions.php");
ensuresignin();

// check admin rights

$id = $_SESSION['sac_id'];

if(isset($_POST['register'])) {
        require_once("db.php");
        
        $lastname = strip_tags($_POST['lastname']);
        $firstname = strip_tags($_POST['firstname']);
        $middlename = strip_tags($_POST['middlename']);     
        $sex = strip_tags($_POST['sex']);
        $civilstatus = strip_tags($_POST['civilstatus']);
        $dob = strip_tags($_POST['dob']);
        $barangay = strip_tags($_POST['barangay']);
        $address = strip_tags($_POST['address']);        
        $barcode = strip_tags($_POST['barcode']);
         
        $lastname = stripslashes($lastname);
        $firstname = stripslashes($firstname); 
        $middlename = stripslashes($middlename);        
        $sex = stripslashes($sex); 
        $civilstatus = stripslashes($civilstatus); 
        $dob = stripslashes($dob); 
        $barangay = stripslashes($barangay); 
        $address = stripslashes($address); 
        $barcode = stripslashes($barcode);        
               
        $lastname = mysqli_real_escape_string($db, $lastname);
        $firstname = mysqli_real_escape_string($db, $firstname);
        $middlename = mysqli_real_escape_string($db, $middlename);        
        $sex = mysqli_real_escape_string($db, $sex);
        $civilstatus = mysqli_real_escape_string($db, $civilstatus);
        $dob = mysqli_real_escape_string($db, $dob);
        $barangay = mysqli_real_escape_string($db, $barangay);
        $address = mysqli_real_escape_string($db, $address);
        $barcode = mysqli_real_escape_string($db, $barcode);

        $enteredby = $_SESSION['sac_id'];

        if($barangay == ""){
            echo "Please identify the barangay of the beneficiary. Please click back on your browser to enter the needed data.";
            return;
        }

        // Checks that the barcode is unique 

        if($barcode != ""){
            $sql2 = "SELECT id from beneficiary where barcode = ?";
            // $process = $db->query($checkbarcode);

            // Create a prepared statement
            $stmt = mysqli_stmt_init($db);

            // Prepare the statement
            if(!mysqli_stmt_prepare($stmt, $sql2)){
                echo "SQL Statement Failed.";
                return;
            } else {
                // Bind parameters to the placeholders
                mysqli_stmt_bind_param($stmt, "i", $barcode);        // Run parameters inside database 
                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);
                if(mysqli_num_rows($result) >= 1){
                    echo "Please check the barcode you entered as the data you entered is already in the system.<br /><br />";                
                    echo "Please click Back on your browser.";                
                    return;
                } 
            }

        }

        
        
        
        $sql = "INSERT INTO `beneficiary`(`lastname`, `firstname`, `middlename`, `sex`, `civilstatus`, `dob`, `barangay`, `address`, `barcode`, `enteredby`)  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Create a prepared statement
    $stmt = mysqli_stmt_init($db);

    // Prepare the statement
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL Statement Failed.";
        return;
    } else {
        // Bind parameters to the placeholders
        mysqli_stmt_bind_param($stmt, "ssssssisii", $lastname, $firstname, $middlename, $sex, $civilstatus, $dob, $barangay, $address, $barcode, $enteredby);        
        
        // Run parameters inside database 
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

    }
       
       header("Location:/sac2/beneficiaryregistered/$barangay");      
       
    }

    include "header.php";

    navigationbar();

?>



        <div class="container-fluid">
            <div class="row">
                <div class="col-2">
                <p></p>
                </div>
                <div class="col-8">
            
                    <h1>Beneficiary Registration Page</h1>    
                    <!-- <p>This registration page is only entering data of Social Amelioration Program beneficiaries.</p> -->
                    
                
                    <form action="/sac2/addbeneficiary.php" method ="post" enctype="multipart/form-data">
                        <p>Last Name <br/>
                        <input placeholder="Last Name" name="lastname" class="form-control"   type="text" required></p>
                        <p>First Name <br/>
                        <input placeholder="First Name" name="firstname" class="form-control"   type="text" required></p>
                        <p>Middle Name <br/>
                        <input placeholder="Middle Name" name="middlename" class="form-control"  type="text"></p>
                        
                        <p>Sex <br />
                        <select name="sex" class="form-control"  >
                            <option value=""></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            </select></p>    

                        <p>Civil Status <br />
                        <select name="civilstatus" class="form-control"  ></p>
                        <p><option value=""></option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Common Law Partner">Common Law Partner</option>
                            <option value="Separated">Separated</option>
                            <option value="Widow">Widow</option>
                            </select></p>

                        <p>Date of Birth<br />
                        <input type="date" name = "dob" ></p>

                        <p>Barangay<br/>                    
                        <?php                     
                            barangaydrop();                    
                        ?>
                        
                        <p>Address<br />
                        <input name="address" class="form-control"  placeholder = "Address" type = "text"></p>

                        <p>Barcode No. (Required for SAC recipient)<br />
                        <input name="barcode" class="form-control"   placeholder = "Barcode No." type = "number"></p>
                        
                        <p><b>Please check the details before clicking "Register" below</b></p>
                        
                        <p><input name="register" type="submit" value="Register"></p>
                    </form>
                </div>
            </div>
            <div class="col-2"></div>

        </div>
             

                
            

        
        
    </body>
</html>

