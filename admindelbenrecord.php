<?php

session_start();
include "db.php";
include "functions.php";
ensuresignin();

$id = $_SESSION['sac_id'];
ensureaccountactive();
checkaccessrights();

if(!isset($_GET['barangayid'])){
    echo "You are accesing the page without sufficient parameters. Please click back on your browser and click a valid link from the website. The link lacks beneficiary id";
    return;
}

$barangayid = $_GET['barangayid'];

if(!isset($_GET['beneficiaryid'])){
    echo "You are accesing the page without sufficient parameters. Please click back on your browser and click a valid link from the website. The link lacks barangay id";
    return;
}

$beneficiaryid = $_GET['beneficiaryid'];

// check admin rights

$rights = $_SESSION['rights'];

if($rights != "MSWDOAdmin") {
    header("Location: /sac2/notsufficientrights.php");
    return;
}

include "header.php";

navigationbar();

?>
    <div class="container-fluid">

    

        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <h1>Beneficiary Record Deletion Confirmation Page</h1>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <p>This page lets you know that you are deleting a beneficiary record that has a record of payment of Social Amelioration. Proceed with caution.</p>
                
                <?php 

                preparetodelete($barangayid, $beneficiaryid);

                ?>
            </div>
            <div class="col-2"></div>
        </div>







    </div>
    
</body>
</html>