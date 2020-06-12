<?php 
    session_start();

    include "db.php";
    include "functions.php";
    include "piechart.php";
    include "stackbar.php";
    include "linebar.php";
    ensuresignin();
    
    // check admin rights
    
    $id = $_SESSION['sac_id'];

    if(!isset($_GET['eventtag'])){
        echo "<p align='center'>Sorry, you accessed this page wit incomplete parameters.</p>";
        echo "<p align='center'>Please click <a href='/sac2'>here</a> to go to the homepage.</p>";
        return;
    }

    $eventtag = $_GET['eventtag'];
    //ensureexecutive($id);

    include "header.php";

    navigationbar();

 

?>

   
        <div class="container-fluid">
            

            <div class="row">
                <div class="col">
                <?php viewdailydistributiongraph($eventtag); ?>
                
                </div>
            </div> 
            
        </div>
           
    </body>
</html>






    


