<?php

session_start();
include "db.php";
include "functions.php";
setsessiontype();

// ensuresignin();

// check admin rights

// $id = $_SESSION['sac_id'];

if(!isset($_SESSION['fullname'])) {
    $fullname = "Kabaley";
} else {
    $fullname = $_SESSION['fullname'];
    checkaccessrights();
}


include "header.php";

navigationbar();   

?>
        
        
            <div class="row">
                <div class="col"> 

                    <p>Welcome, <?php echo $fullname ?>.</p>
                    <p>This website has been developed for recording and reporting beneficiary households for the DSWD Social Amelioration Program.</p>
                    
                </div>
            </div>

            <div class="row">            
                
                <div class="col-md-4 col-xs-12">


                    <!-- <?php 
                        if($_SESSION['sessiontype'] == "Public") {
                            // viewsacbybrgy();

                        }                    
                    ?> -->
                    <img src="/sac2/images/0-02-08-cc814a465f2a6e11304dbeebba718b6697266a193f08b433c439075dcef7abff_3d3aa556.jpg" class="img-fluid img-thumbnail" alt="Responsive image">
                



                </div>
                <div class="col-md-4 col-xs-12">
                <img src="/sac2/images/0-02-08-66541af69366e1e0d9ca69533f5996d5c1b66764b29dfc5754d062573bba7b11_e7ba170f.jpg" class="img-fluid img-thumbnail" alt="Responsive image">
                
                
                </div>

                <div class="col-md-4 col-xs-12">
                <img src="/sac2/images/0-02-08-c1b6d7489832245c43f24a561e7cb0f7c231b3e6c0c40d880a3a802c64caf74e_a126b4ad.jpg" class="img-fluid img-thumbnail" alt="Responsive image">
                
                </div>
                
            </div>

            <div class="row">            
                
                <div class="col-md-4 col-xs-12">
                <img src="/sac2/images/0-02-08-fd9bcd5b955932512be4d2eb67c5d82d85c7bc42901ffc7a17d6dcd942ee9aab_2e1cfe87.jpg" class="img-fluid img-thumbnail" alt="Responsive image">
                </div>

                <div class="col-md-4 col-xs-12">
                <img src="/sac2/images/0-02-08-338afb76c9330981ce7b24a421cc63c8a119ad5c59a02987c7322820ddd08060_5646ff0e.jpg" class="img-fluid img-thumbnail" alt="Responsive image">
                </div>

                <div class="col-md-4 col-xs-12">
                <img src="/sac2/images/0-02-08-4093b87e73dcf8000088f38beed6adcdb585ce7a9589e7ab0bc7ebee3e26aed1_4ba853fe.jpg" class="img-fluid img-thumbnail" alt="Responsive image">
                
                </div>
                
            </div>
            <div></div>
            
        </div>

    </body>
</html>