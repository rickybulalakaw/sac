<?php 
    session_start();
    require_once("db.php");
    require_once("functions.php");
    ensuresignin();
    
    // check admin rights
    
    $id = $_SESSION['sac_id'];

    if(!isset($_GET['bid'])){
        echo "<p align='center'>Sorry, you accessed this page without complete parameters.</p>";
        echo "<p align='center'>Please click <a href='/sac2/addbeneficiary'>here</a> to enter beneficiary record.</p>";
        return;

        
    }

    $bid = $_GET['bid'];

    include "header.php";

    navigationbar();   

?>


    <div class="container-fluid">
        <?php getbeneficiarybarrecord($bid, $id); ?>
    </div>
    
    </body>
</html>






    

