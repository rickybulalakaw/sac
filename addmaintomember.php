<?php
include "db.php";
include "functions.php";

session_start();

include "header.php";

navigationbar();



?>

            <?php 
                if(!isset($_GET['memberprimaryid'])){
                    echo "You are accessing this page with incomplete details.";
                    return;
                }

                $benid = $_GET['memberprimaryid']; 

                // Check if beneficiaryid exists 

                $search = "SELECT id from beneficiary where id = $benid";
                $process = mysqli_query($db, $search);

                if($process->num_rows < 1){
                    echo "Sorry, this link is not valid";
                    return;
                }

                $getdetails = "select * from beneficiary where id = $benid";
                $process = $db->query($getdetails);
                foreach($process as $key){
                    $lastname = $key['lastname'];
                    $firstname = $key['firstname'];
                    $middlename = $key['middlename'];
                    $extension = $key['extension'];
                    $work = $key['work'];
                    $sectorid = $key['sectorid'];
                    $healthconditionid = $key['healthconditionid'];
                    $dob = $key['dob'];
                }




                

            ?>
            <div class="row">
                <div class="col alert-primary">
                    <p>The contents in this field are taken from the database. Please check and make sure all required fields are filled out.</p>    
                </div>
                
            </div>
            
            <form action="/sac2/addmaintomemberprocess.php" method ="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-3 col-xs-12">
                    <input type="number" name="memberprimary" value="<?= $benid ?>" hidden>
                    <label>Last Name</label>
                    <input type="text" name="lastname" class="form-control" placeholder="LastName" value="<?= $lastname?>" required>
                    </div>
                
                    <div class="col-md-3 col-xs-12">


                    <label>First Name</label>
                    <input type="text" name="firstname" class="form-control" placeholder="FirstName" value="<?= $firstname?>" required>
                    </div>
                

                    <div class="col-md-3 col-xs-12">
                    <label>Middle Name</label>
                    <input type="text" name="middlename" class="form-control" placeholder="Middle Name" value="<?= $middlename?>" >
                    </div>
                
                    <div class="col-md-3 col-xs-12">
                    <label>Extension</label>
                    <input type="text" name="extension" class="form-control" placeholder="Extension" value="<?= $extension?>" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-xs-12">
                    <label>Sex</label>
                    <select name="sex" class="form-control" value="<?= $sex?>"  required>
                        <option value=""></option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                    </div>
                
                    <div class="col-md-3 col-xs-12">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" class="form-control" value="<?= $dob?>"  required>
                    </div>
                

                    <div class="col-md-3 col-xs-12">
                    <label>Sector</label>
                    <select name="sectorid" class="form-control" required>
                        <option value=""></option>
                        <?php
                        
                            $getsector = "SELECT * from sector";
                            $process = mysqli_query($db, $getsector);

                            foreach($process as $row){
                                echo "<option value='".$row['id']."'>".$row['sector']."</option>";
                            }
                        
                        ?>
                    </select>
                    </div>
                
                    <div class="col-md-3 col-xs-12">
                    <label>Health Condition</label>
                    <select name="healthconditionid" class="form-control" required>
                        <option value=""></option>
                        <?php
                        
                            $gethealth = "SELECT * from healthcondition";
                            $process = mysqli_query($db, $gethealth);

                            foreach($process as $row){
                                echo "<option value='".$row['id']."'>".$row['healthcondition']."</option>";
                            }
                        
                        ?>
                        
                    </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <label>Relationship to Household</label>
                        <select name="reltohh" class="form-control" required>
                            <option value=""></option>
                            <?php
                            
                                $getrel = "SELECT * from reltohh";
                                $process = mysqli_query($db, $getrel);

                                foreach($process as $row){
                                    echo "<option value='".$row['id']."'>".$row['relation']."</option>";
                                }
                            
                            ?>
                        </select>
                    
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <label>Work</label>
                        <input type="text" name="work" class="form-control" value="None"  required>
                        <small>If none, leave the value as is. Otherwise, indicate work or source of livelihood in this field.</small>
                    
                    </div>
                       
                </div>
                
                <div class="row">
                    <div class="col">
                        <p></p>     
                        <p>Please check the details of this member before pressing Enter. There is currently no edit function for members.</p>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">

                    </div>

                </div>
                
                            
            </form>

      
        </div>
    </body>
</html>