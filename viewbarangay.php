<?php 
session_start();
include "db.php";
include "functions.php";

include "header.php";

navigationbar();
?>

    <?php 

    if(!isset($_GET['bid'])){
        echo "You are accessing this page with incomplete parameters. Click Home in the navigation bar.";
        return;
    } 

    $bid = $_GET['bid'];

    $getbarangaydetails = "select * from barangay where id = $bid";
    $process = $db->query($getbarangaydetails);

    $key = $process->fetch_assoc();

    $barangay = $key['barangay'];
    $sacbeneficiaries = $key['sacbeneficiaries'];
    $district = $key['district'];
    $psgc = $key['psgc'];
    $punongbarangay = $key['punongbarangay'];

    ?>

        <div class="row">
            <div class="col">
                <h1 class="text-center">Barangay <?= $barangay?></h1>
                <hr>
            
            </div>
        
        
        </div>

        <div class="row">
            <div class="col-md-3"></div>
        
            <div class="col-md-4 col-xs-12">
                <p>Barangay: <?= $barangay?></p>
                <p>District: <?= $district?></p>
                <p>PSGC Code: <?= $psgc?></p>
                <p>Punong Barangay: <?php
                
                if($punongbarangay == ""){
                    echo "<font color='red'>No data recorded</font>";
                } else {
                    echo $punongbarangay;
                }
                
                ?></p>
                <p>Target SAC Beneficiaries: <?= $sacbeneficiaries?></p>
            
            </div>
            
            <div class="col-md-2 col-xs-12">
            <a href="/sac2/editbenbrgy/<?=$bid?>" class="btn btn-primary btn-block">Edit Details</a>
            
            </div>
        
        
        </div>

        <div class="row">
        
        
        </div>


    </div>
</body>
</html>