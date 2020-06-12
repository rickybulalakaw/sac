<?php 

// CREATE view barangaynonsacsummary as SELECT barangay.id as barangayid, barangay.barangay as barangayname, count(beneficiary.barangay) as brgynonsacrecorded from beneficiary, barangay where barangay.id = beneficiary.barangay and beneficiary.barcode = 0 group by barangay.id

// CREATE view totalnonsac as select count(id) as totalnonsac from beneficiary where barcode = 0

session_start();
require_once("db.php");
require_once("functions.php");
ensuresignin();

$id = $_SESSION['sac_id'];
ensureaccountactive($id);


include "header.php";

navigationbar();

?>

        <div class="container-fluid">

            <?php 

            pagetitle("Summary of Non-SAC Households Recorded");        
            
            viewnonsacbybrgy($id); // 

            ?>

          
        </div>  
    
    </body>
</html>







