<?php

session_start();
require_once("db.php");
require_once("functions.php");
ensuresignin();

$id = $_SESSION['sac_id'];
ensureaccountactive($id);

if(!isset($_GET['bid'])) {
    echo "You are accessing this page with insufficient parameters.";
    return; 

}

ensuremswdo($id);
$barangayid = $_GET['bid'];

include "header.php";

navigationbar();
?>

        <div class="container-fluid">  

            <?php 

                getbenbrgynonsac($barangayid);

            ?>

        
        </div>  

    </body>
</html>