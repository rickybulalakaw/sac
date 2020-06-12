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
            <h1>Progress Report</h1>
            <div class="row">               
                <?php viewprogressparagraph($eventtag); ?>
            </div>

            <div class="row">
                <div class='col-md-4 col-xs-12'>
                    <?php viewprogressoverallpie($eventtag); ?>
                    
                </div>

                <div class='col-md-4 col-xs-12'>
                    <?php viewtargetbydistrictpie($eventtag); ?>
                    
                    
                </div>
                
                <div class='col-md-4 col-xs-12'>                    
                        <?php
                            viewprogressbydistrictstack($eventtag);                
                        ?>
                </div>
            
            </div>

            <div class="row">
                <div class="col">
                </div>
            </div> 

            <div class="row">
                <div class="col">
                <?php viewdailyprogress($eventtag); ?>
                
                </div>
            </div> 
            
        </div>
           
    </body>
</html>






    


