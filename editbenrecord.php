<?php

session_start();
include "db.php";
include "functions.php";
ensuresignin();

$id = $_SESSION['sac_id'];
ensureaccountactive($id);
checkaccessrights();

if(!isset($_GET['id'])){
    echo "You are accesing the page without sufficient parameters. Please click back on your browser and click a valid link from the website.";
    return;
}

$recordid = $_GET['id'];

ensuremswdo();
    
    $sql = "SELECT * FROM beneficiary WHERE id=$recordid";
    //$result = $db->query($sql);
    $result = mysqli_query($db, $sql);

    if(mysqli_num_rows($result) != NULL){
        $row = $result->fetch_assoc();

        // $row = mysqli_fetch_assoc($result);
    
        $dbid = $row['id'];
        $lname = $row['lastname'];
        $fname = $row['firstname'];
        $mname = $row['middlename'];
        $ext = $row['extension'];

        if($ext == ""){
            $ext = "-";
        }

        $work = $row['work'];
        $sectorid = $row['sectorid'];

        if($sectorid) {
            $getsectorlabel = "select sector from sector where id = '$sectorid'";
            $processgetsectorlabel = $db->query($getsectorlabel);
            $row55 = $processgetsectorlabel->fetch_assoc();
            $sectorlabel = $row55['sector'];
        } else {
            $sectorlabel = "";
        }

        

        $healthconditionid = $row['healthconditionid'];
        
        $gethealthlabel = "select * from healthcondition";
        $processgethealth = $db->query($gethealthlabel);
        $row57 = $processgethealth->fetch_assoc();
        $healthconditionlabel = $row57['healthcondition'];


        $typeofid = $row['typeofid'];

        $getidlabel = "select * from typeofid";
        $processgetidlabel = $db->query($getidlabel);
        $row56 = $processgetidlabel->fetch_assoc();
        $typeofidlabel = $row56['typeofid'];



        $idnumber = $row['idnumber'];
        $cellphone = $row['cellphone'];
        $monthlywage = $row['monthlywage'];
        $indigenouspeople = $row['indigenouspeople'];
        $indigenouspeopletype = $row['indigenouspeopletype'];
        $placeofwork = $row['placeofwork'];
        $sex = $row['sex'];
        $civilstatus = $row['civilstatus'];
        $dob = $row['dob'];
        $barangay = $row['barangay'];
        $homeaddress = $row['homeaddress'];
        $address = $row['address'];
        $enteredby = $row['enteredby'];
        $timestamp = $row['timestamp'];
        $barcode = $row['barcode'];

        $searchbarangayname = "select barangay from barangay where id = $barangay";
        $result2 = $db->query($searchbarangayname);
        $row2 = $result2->fetch_assoc();
        $barangayname = $row2['barangay'];
        
        $searchenteredbyname = "select fullname from user where id = $enteredby";
        $result3 = $db->query($searchenteredbyname);
        if(mysqli_num_rows($result3) != 1){
            $enteredbyname = "The person who entered this is no longer in the database";
        } else {
            $row3 = $result3->fetch_assoc();
            $enteredbyname = $row3['fullname'];
        } 

        $register = "INSERT INTO `systemrecord`(`user`, `object`, `record`) VALUES ($id,$recordid,'Prepare to edit beneficiary record with existing data $lname, $fname, $mname / Sex=$sex / DOB=$dob / CivilStatus=$civilstatus / BarangayID=$barangay / BarangayName=$barangayname / Address=$address / BarCode=$barcode')";
        $processregister = mysqli_query($db, $register);
        
    } else {
        echo "Sorry, that Beneficiary Record ID does not exist. Please make sure you enter the details correctly when you try again. Thank you.";
        return;
    }
        

include "header.php";

navigationbar();

?>
 
  
        <h1>Beneficiary Record Editing Page</h1>
        <hr>
            
            <!-- <p>Search Result for Barcode No. <?php echo $barcode ?>  </p> -->

            <form action="/sac2/editbenrecordprocess.php" method='post' enctype='multipart/form-data'>

                <input name="id" value="<?php echo $dbid ?>" hidden>
                <div class="row">

                    <div class="col-md-3 col-xs-12">
                        <p>Last Name: <br /> 
                        <input name='lastname' type='text' required type="text" class="form-control" value="<?php echo $lname ?>" required> </p>
                    </div>
                
                    <div class="col-md-3 col-xs-12">
                        <p>First Name <br/>
                        <input placeholder="firstname" name="firstname" class="form-control"  type="text" value="<?php echo $fname ?>" required></p>
                    </div>
                
                    <div class="col-md-3 col-xs-12">
                        <p>Middle Name <br/>
                        <input placeholder="middlename" name="middlename" class="form-control"  type="text" value="<?php echo $mname ?>"  >
                        <small>If none, just use the hyphen "-".</small></p>
                    </div>
                    
                    <div class="col-md-3 col-xs-12">
                        <p>Extension <br/>
                        <input placeholder="Extension" name="extension" class="form-control"  type="text" value="<?php echo $ext ?>"  >
                        <small>If none, just use the hyphen "-".</small></p>
                    </div>   

                </div>

                <div class="row">

                    <div class="col-md-4 col-xs-12">
                            <p>Cellphone <br />
                            <input type="text" value="<?= $cellphone?>" name="cellphone" class="form-control">
                            <small>Cellphone number should be 11 digits, including the 0. Do not include the dash.</small>
                                                
                        </div>
                    <div class="col-md-2 col-xs-12">
                        <p>Sex <br />
                        <select name="sex" class="form-control" required>
                            <option value="<?php echo $sex ?>"><?php echo $sex ?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            </select></p>                     
                    </div>
                    
                    <div class="col-md-2 col-xs-12">
                        <p>Civil Status <br />
                        <select class="form-control" name="civilstatus" required></p>
                        <p>
                            <option value="<?php echo $civilstatus ?>"><?php echo $civilstatus ?></option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Separated">Separated</option>
                            <option value="Widow">Widow</option>
                            </select></p>                    
                    </div>
                    
                    <div class="col-md-4 col-xs-12">
                        <p>Date of Birth<br />
                        <input type="date" class="form-control" name = "dob" value="<?php echo $dob ?>" required></p>
                    </div>
                </div>
                
                <div class="row">

                <div class="col-md-2 col-xs-12">
                        <p>Tirahan<br />
                        <input name="homeaddress" placeholder = "Unit" class="form-control" type="text" value="<?php echo $homeaddress ?>" required>
                        <small>If none, just use the hyphen "-"</small></p>
                    </div>
                    
                    <div class="col-md-6 col-xs-12">
                        <p>Kalye<br />
                        <input name="address" placeholder = "Address" class="form-control" type="text" value="<?php echo $address ?>" required></p>                    
                    </div>
                    <div class="col-md-4 col-xs-12">
                            <p>Barangay<br/>
                            <select name="barangay" class="form-control">
                                <option value="<?= $barangay?>"><?= $barangayname?></option>
                                <?php 
                                    $selectbarangay = "select * from barangay";
                                    $processbarangay = $db->query($selectbarangay);
                                    foreach($processbarangay as $row5){ ?>
                                    <option value="<?= $row5['id']?>"><?= $row5['barangay']?></option>

                                    <?php }
                                ?>
                            
                            </select>               
                            
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-xs-12">
                    <label>Trabaho</label>
                    <input type="text" name="work" class="form-control" value="<?= $work ?>" required>
                    <small>If none, just use the hyphen "-".</small>
                    
                    </div>

                    <div class="col-md-4 col-xs-12">
                    <label>Buwanang Kita</label>
                    <input type="number" name="monthlywage" class="form-control" value="<?= $monthlywage ?>">
                    </div>

                    <div class="col-md-4 col-xs-12">
                    <label>Lugar ng Pinagtatrabahuhan</label>
                    <input type="text" name="placeofwork" class="form-control" value="<?= $placeofwork ?>">
                    <small>If none, just use the hyphen "-".</small>                    
                    
                    </div>                
                </div>

                <div class="row">
                    <div class="col-md-2 col-xs-12">
                    <label>Sektor</label>
                    <select name="sectorid" class="form-control" required>
                        <option value="<?= $sectorid ?>"><?= $sectorlabel ?></option>
                        <?php
                        
                            $getsector = "SELECT * from sector";
                            $process = mysqli_query($db, $getsector);

                            foreach($process as $row){
                                echo "<option value='".$row['id']."'>".$row['sector']."</option>";
                            }
                        
                        ?>
                    </select> 
                    </div>

                    <div class="col-md-2 col-xs-12">
                    <label>Kundisyon ng Kalusugan</label>
                    <select name="healthconditionid" class="form-control" required>
                        <option value="<?=$healthconditionid?>"><?=$healthconditionlabel?></option>
                        <?php
                        
                            $gethealth = "SELECT * from healthcondition";
                            $process = mysqli_query($db, $gethealth);

                            foreach($process as $row){
                                echo "<option value='".$row['id']."'>".$row['healthcondition']."</option>";
                            }
                        
                        ?>
                        
                    </select>
                    
                    </div>

                    <div class="col-md-4 col-xs-12">
                    <label>Uri ng ID</label>
                    <select name="typeofid" class="form-control" required>
                        <option value="<?=$typeofid?>"><?=$typeofidlabel?></option>
                        <?php $getidtypes = "select * from typeofid";
                        $process2 = $db->query($getidtypes);
                        
                        foreach($process2 as $row){ ?>
                        <option value="<?=$row['id']?>"><?= $row['typeofid']?></option>
                        <?php }?>
                    </select>
                    </div>

                    <div class="col-md-4 col-xs-12">
                    <label>Numero ng ID</label>
                    <input type="text" name="idnumber" class="form-control" value="<?= $idnumber ?>" required>                    
                    </div>
                                
                </div>

                <div class="row">
                    <div class="col-md-4 col-xs-12">
                    <label>Katutubo? </label>
                    <select name="indigenouspeople" class="form-control" required>
                        <?php if($indigenouspeople == "Y") { ?>
                            <option value="Y">Yes</option>
                        <?php } else { ?>
                            <option value="N">No</option>
                        <?php } ?>                        
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>  
                    </div>

                    <div class="col-md-4 col-xs-12">
                    <label>Ngalan ng Groupong Katutubo</label>
                    <input type="text" name="indigenouspeopletype" class="form-control" value="<?= $indigenouspeopletype ?>">
                    <small>If none, just use the hyphen "-".</small> 
                    
                    </div>

                    <div class="col-md-4 col-xs-12">
                    <p>Barcode No. <br />
                    <input name="barcode" placeholder = "Barcode No." type="number" class="form-control" minlength="6" required></p>
                    </div>
                
                </div>
                <br>
                
                <div class="alert-danger"><p>Warning: The system can no longer double-check if the barcode number is unique as it already exists within the system, so make sure the barcode number here reflects the SAC barcode number for this beneficiary.</p></div>
                <p><b>Please check the details before clicking "Revise" below</b></p>
                <input name="Revise" type="submit" value = "Revise" class="btn btn-primary">

            </form>
    
    </div>  
    </body>
</html>

