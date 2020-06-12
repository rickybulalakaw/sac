<?php 
    session_start();

    include "db.php";
    include "functions.php";
    ensuresignin();
    
    // check admin rights
    
    $id = $_SESSION['sac_id'];

    if(!isset($_GET['eventtag'])){
        echo "<p align='center'>Sorry, you accessed this page without complete parameters.</p>";
        echo "<p align='center'>Please click <a href='/sac2'>here</a> to go to the homepage.</p>";
        return;
    }

    $eventtag = $_GET['eventtag'];
    //ensureexecutive($id);

    include "header.php";

    navigationbar();

 

?>

   
            <div class="container-fluid">
                <h1>Progress Report</h1>

                <?php         
                                
                    viewprogress2($eventtag);
                ?>
                <br><br>
                <?php                     
                    viewdailyprogress($eventtag);
                ?>
            </div>
           
    </body>
</html>






    


