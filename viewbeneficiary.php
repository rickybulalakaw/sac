<?php 

session_start();
include "db.php";
include "functions.php";

include "header.php";

navigationbar();

?>

            <?php 

                if(!isset($_GET['benid'])){
                    echo "You are accessing this page with incorrect parameters.";
                    return;
                }

                $benid = $_GET['benid'];

                // Check if beneficiaryid exists 

                $search = "SELECT id from beneficiary where id = $benid";
                $process = mysqli_query($db, $search);

                if($process->num_rows < 1){
                    echo "Sorry, this link is not valid";
                    return;
                }

                $sql = "SELECT * FROM beneficiary WHERE id=$benid";
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
                $work = $row['work'];
                $sectorid = $row['sectorid'];
                $healthconditionid = $row['healthconditionid'];
                $typeofid = $row['typeofid'];
                $idnumber = $row['idnumber'];
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
                $memberadded = $row['memberadded'];

                $getbarangayname = "select barangay from barangay where id = $barangay";
                $process = $db->query($getbarangayname);
                $row = $process->fetch_assoc();
                $barangayname = $row['barangay'];





            }
            ?>
            

            <div class="row">
            <br>

                <div class="col-md-3 col-xs-12">
                    <br>Last Name <br />                    
                    <div class="block bg-light">
                    <?php echo $lname ?>
                    </div>
                </div>

                <div class="col-md-3 col-xs-12">
                <br>First Name<br />                    
                    <div class="block bg-light">
                    <?php echo $fname ?>
                    </div>
                </div>

                <div class="col-md-3 col-xs-12">
                <br>Middle Name <br/>
                    <div class="block bg-light">                    
                    <?php echo $mname ?>
                    </div>
                    <br>
                </div>

                <div class="col-md-3 col-xs-12">
                <br>Extension<br/>
                    <div class="block bg-light">                    
                    <?php 
                    if($ext==""){
                        echo "<font color='red'>NO DATA ENTERED</font>";
                    } else {
                        echo $ext;
                    } ?>
                    </div>
                    <br>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4 col-xs-12">
                <br>Sex<br />                    
                    <div class="block bg-light">
                    <?php echo $sex ?>
                    </div>
                </div>

                <div class="col-md-4 col-xs-12">
                <br>Civil Status <br />                    
                    <div class="block bg-light">
                    <?=$civilstatus?>
                    </div>
                </div>

                <div class="col-md-4 col-xs-12">
                <br>Date of Birth<br/>
                    <div class="block bg-light">
                    <?php echo $dob ?> 
                    </div>
                </div>
                <br>
            </div>

            <div class="row">

                <div class="col-md-2 col-xs-12">
                <br>Unit<br/>
                    <div class="block bg-light">
                    
                    <?php 
                    if($homeaddress==""){
                        echo "<font color='red'>NO DATA ENTERED</font>";
                    } else {
                        echo $homeaddress;
                    } ?>



                    </div>
                </div>

                <div class="col-md-6 col-xs-12">
                <br>Street Address<br/>
                    <div class="block bg-light">
                    <?php echo $address ?>
                    </div>
                </div>

                <div class="col-md-4 col-xs-12">
                    <br>Barangay<br/>                     
                    <div class="block bg-light">
                    <?= $barangayname ?>
                    </div>

                </div>
                <br>
            </div>

            <div class="row">
                <div class="col-md-4 col-xs-12">
                <br>Work<br/>
                    <div class="block bg-light">
                    <!-- <?= $work ?> -->
                    <?php 
                    if($work==""){
                        echo "<font color='red'>NO DATA ENTERED</font>";
                    } else {
                        echo $work;
                    } ?>
                    </div>

                </div>

                <div class="col-md-4 col-xs-12">
                <br>Monthly Wage<br/>
                    <div class="block bg-light">
                    <?= $monthlywage ?>
                    </div>
                </div>

                <div class="col-md-4 col-xs-12">
                <br>Place of Work<br/>
                    <div class="block bg-light">
                    <!-- <?= $placeofwork ?> -->
                    <?php 
                    if($placeofwork==""){
                        echo "<font color='red'>NO DATA ENTERED</font>";
                    } else {
                        echo $placeofwork;
                    } ?>
                    </div>
                </div>  
                <br>              
            </div>

            <div class="row">
                <div class="col-md-2 col-xs-12">
                <br>Sektor<br/>
                    <div class="block bg-light">
                    <!-- <?= $sectorid ?> -->
                    <?php 
                    if($sectorid==""){
                        echo "<font color='red'>NO DATA ENTERED</font>";
                    } else {
                        echo $sectorid;
                    } ?>


                    </div>

                </div>

                <div class="col-md-2 col-xs-12">
                <br>Health Condition<br/>
                    <div class="block bg-light">
                    <?= $healthconditionid ?>
                    </div>

                </div>

                <div class="col-md-4 col-xs-12">
                <br>Type of ID<br/>
                    <div class="block bg-light">
                    <!-- <?= $typeofid ?> -->
                    <?php 
                    if($typeofid==""){
                        echo "<font color='red'>NO DATA ENTERED</font>";
                    } else {
                        echo $typeofid;
                    } ?>
                    
                    </div>
                </div>

                <div class="col-md-4 col-xs-12">
                <br>ID Number<br/>
                    <div class="block bg-light">
                    <!-- <?= $idnumber ?> -->
                    <?php 
                    if($idnumber==""){
                        echo "<font color='red'>NO DATA ENTERED</font>";
                    } else {
                        echo $idnumber;
                    } ?>

                    </div>
                </div>
                <br>
                        
            </div>

            <div class="row">
                <div class="col-md-4 col-xs-12">
                <br>Indigenous People? <br/>
                    <div class="block bg-light">
                    <?php if ($indigenouspeople == "Y"){
                        echo "Yes";
                    } else {
                        echo "No";
                    }
                    ?> 
                    </div>                  
                </div>

                <div class="col-md-4 col-xs-12">
                <br>Type of Indigenous People<br/>
                    <div class="block bg-light">
                    <p><?php
                    
                    if ($indigenouspeopletype == ""){
                        echo "<font color='red'>NO DATA ENTERED</font>";
                    } else {
                        echo $indigenouspeopletype;
                    }
                    
                    ?></p>
                    </div>
                
                </div>

                <div class="col-md-4 col-xs-12">
                <br>Barcode No. <br />
                    <div class="block bg-light">
                    <?php echo $barcode ?>
                    </div>
                
                </div>
                <br>

            </div>

            <a href="/sac2/editbenrecord/<?=$benid?>" class="btn btn-primary">Edit Beneficiary</a>

            <a href="/sac2/addmember/<?=$benid?>" class="btn btn-primary">Add member</a>
            <?php 

            if($memberadded == "No"){
                echo "<a class='btn btn-primary' href='/sac2/addmaintomember/$dbid' role='button'>Add details to household members</a> ";

                } else {
                    echo "<a class='btn btn-primary disabled' href='/sac2/addmaintomember/$dbid' role='button' >Add details to household members</a> ";
                }

            ?>
            <br><br>
            <?php
            
            $checkmember = "SELECT * FROM member where memberprimary = $benid order by reltohh asc";
            $processcheck = mysqli_query($db, $checkmember);

            // $rownum = mysqli_num_rows($processcheck);

            if(mysqli_num_rows($processcheck) >= 1){
                starttable();
                startrow();
                columnhead("#");
                columnhead("Last Name");
                columnhead("First Name");
                columnhead("Middle Name");
                columnhead("Extension");
                columnhead("Relationship to HH");
                columnhead("Sex");
                columnhead("Date of Birth");
                columnhead("Work");
                columnhead("Sector");
                columnhead("Health Condition");
                columnhead("Action");
                endrow();
                $i=1;

                foreach($processcheck as $key){
                    startrow();
                    columnhead($i);
                    celltext($key['lastname']);
                    celltext($key['firstname']);
                    celltext($key['middlename']);
                    celltext($key['extension']);
                    $dbrel = $key['reltohh'];
                  
                    // get equivalent of reltohh

                    $getreltohh = "select relation from reltohh where id = $dbrel";
                    $pro1 = $db->query($getreltohh);
                    $key2 = $pro1->fetch_assoc();
                    $displayrelation = $key2['relation'];

                    celltext($displayrelation);

                    // convert letter to word for sex
                    if($key['sex'] == "M"){
                        $sexdisplay = "Male";
                    } else {
                        $sexdisplay = "Female";
                    }

                    celltext($sexdisplay);
                    celltext($key['dob']);
                    celltext($key['work']);

                    // get equivalent of sector

                    if($key['sectorid'] == "") {
                        $displaysec = "";
                    } else {
                        $dbsectorid = $key['sectorid'];

                        $getsec = "select sector from sector where id = '$dbsectorid'";
                        $pro3 = $db->query($getsec);
                        $key3 = $pro3->fetch_assoc();
                        $displaysec = $key3['sector'];

                    }

                    

                    celltext($displaysec);

                    // get equivalent of healthcondition

                    if($key['healthconditionid'] == "0"){
                        $displayhealthcondition = "";
                    } else {

                        $dbhealth = $key['healthconditionid'];

                        $gethealth = "select healthcondition from healthcondition where id = $dbhealth";
                        $pro5 = $db->query($gethealth);
                        $key5 = $pro5->fetch_assoc();
                        $displayhealthcondition = $key5['healthcondition'];

                    }

                    celltext($displayhealthcondition);
                    echo "<td><a class='btn btn-danger' href='/sac2/deletemember/".$key['id']."/$benid'>Delete Member</a></td>";

                    endrow();
                    $i++;

                }

                endtable();
                return;

            } else {
                echo "There is no member recorded for this head of household.<br/>";

            }
            ?>
            



        </div>
    </body>
</html>