<?php 
session_start();
require_once("db.php");
require_once("functions.php");
ensuresignin();

$id = $_SESSION['sac_id'];

// check admin rights

checkaccessrights();

ensuremswdo();

if (isset($_POST['upload'])) {

    // CREATE VIEW imagestable as SELECT beneficiary.id as BeneficiaryID, beneficiary.lastname as LastName, beneficiary.firstname as FirstName, beneficiary.middlename as MiddleName, imagerec.date as DateUploaded, imagerec.actiontype as ImageType, imagerec.imagedbref as ImageRef from beneficiary, imagerec where beneficiary.id = imagerec.entityid

    $entitytype = $_POST['entitytype']; // ok
    $entityid = $_POST['entityid']; // ok
    $entitype = $_POST['entitytype']; // ok
    $actiontype = $_POST['actiontype']; // ok

    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'bmp');

    if(in_array($fileActualExt, $allowed)) {
        if($fileError === 0) {
            if($fileSize < 10000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $sql = "INSERT INTO `imagerec`(`entitytype`, `entityid`, `imagedbref`, `actiontype`, `enteredby`) VALUES ('$entitytype','$entityid','$fileNameNew','$actiontype',$id)";

                if(mysqli_query($db,$sql)) {
                    // echo "File uploaded";
                    header("Location: /sac2/photouploaded");
                } else {
                    echo "Error";
                }

                

            } else {
                echo "Your file is too big.";
                return;
            }

        } else {
            echo "There is an error uploading your file.";
            
            return;
        }

    } else {

        echo "You cannot upload files of this type.";
        return;

    }


    
}

include "header.php";

navigationbar();

?>

        <div class="container-fluid">

            <div class="content">
                <?php 

                if(!isset($_GET['entity'])) {
                    echo "You are accessing this page with insufficient parameters. Please click <a href='index.php'>Home</a>.";
                    return;
                }

                $entitytype = $_GET['entity'];                
                
                if(!isset($_GET['entityid'])) {
                    echo "You are accessing this page with insufficient parameters. Please click <a href='index.php'>Home</a>.";
                    return;
                }

                $entityid = $_GET['entityid'];

                if($entitytype == "beneficiary"){
                    // check that the beneficiary exists

                    $checkbeneficiary = "SELECT * FROM beneficiary where id = $entityid";
                    $process = mysqli_query($db, $checkbeneficiary);
                    if(mysqli_num_rows($process) < 1) {
                        echo "Sorry, you are accessing this page with incorrect paramaters. Please click back on your browser and try again to refresh the link.";
                        return;
                    }
                }
                
                if(!isset($_GET['actiontype'])) {
                    echo "You are accessing this page with insufficient parameters. Please click <a href='index.php'>Home</a>.";
                    return;
                }
                
                $actiontype = $_GET['actiontype'];

                switch($actiontype) {
                    case "sacdistribution1": 
                        $actiondisplaylabel = "SAC Cash Distribution Batch 1";
                    break;

                    case "sacdistribution2": 
                        $actiondisplaylabel = "SAC Cash Distribution Batch 2";
                    break;

                    case "sacard": 
                        $actiondisplaylabel = "Copy of Social Amelioration Card";
                    break;

                    default:                     
                        $actiondisplaylabel = "Error";
                    
                }

?>

            <h1>Photo Uploading Form</h1>

            <form method="post" enctype="multipart/form-data">
                
                <input type="text" name="entitytype" value="<?php echo $entitytype ?>" hidden readonly>
                <p>You are uploading a photo for <?php echo ucfirst($entitytype); ?> ID 
                <input type="text" name="entityid" value="<?php echo $entityid ?>" readonly></p>

                <?php

                    if($entitytype == "beneficiary") {

                        $getdetails = "SELECT lastname, firstname, middlename, barcode from beneficiary where id = $entityid";
                        $process = mysqli_query($db, $getdetails);
                        if(mysqli_num_rows($process) == 1) {
                            $row = mysqli_fetch_array($process);
                            $lastname = $row['lastname'];
                            $firstname = $row['firstname'];
                            $middlename = $row['middlename'];
                            $barcode = $row['barcode'];

                            echo "<p>Full Name: <b>$firstname $middlename $lastname</b></p>";
                            
                            echo "<p>SAC Barcode No.: $barcode</p>";  

                        } else {
                            echo "Error on checking from database.";
                            return;
                        }

                    }     
                
                ?>
                <input type="text" name="actiontype" value="<?php echo $actiontype ?>" hidden>

                <p>You are uploading a photo of: <b><?php echo ucfirst($actiondisplaylabel); ?></b> </p>
                
                <label>Image Upload</label>
                <input type="File" name="file"><br/><br/>
                <p><input type="submit" name="upload" value="Upload"></p>
            </form>

        </div>           
    
    </body>
</html>
