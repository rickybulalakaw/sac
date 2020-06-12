<?php 
    session_start();
    include "db.php";
    include "functions.php";
    ensuresignin();
    
    // check admin rights
    
    $id = $_SESSION['sac_id'];

    if(!isset($_GET['bar'])){
        echo "<p align='center'>Sorry, you accessed this page without complete parameters.</p>";
        echo "<p align='center'>Please click <a href='/sac2/addbeneficiary'>here</a> to enter beneficiary record.</p>";
        return;
    }

    $bar = $_GET['bar'];

    include "header.php";

    navigationbar();
    
    ?>

    <body>
        <div class="container-fluid">
          
            <?php getbeneficiaryupdatedbarrecord($bar, $id); ?>
            
        </div>
    
    </body>
</html>






    

