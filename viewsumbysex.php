<?php

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

            // check admin rights                
            
            viewsumbysex();

            ?>

         
        </div>  
    
    </body>
</html>






