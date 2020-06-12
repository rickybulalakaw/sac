<?php

session_start();
require_once("db.php");
require_once("functions.php");
ensuresignin();

$id = $_SESSION['sac_id'];

// check admin rights

checkadminpage($id);

if(!isset($_GET['page'])){
    $page = 1;
} else {
    $page = $_GET['page'];

}

include "header.php";

?>

          
        <div class="grid">

            <div class="title">
            <?php titlephp(); ?>                
            </div>

            <div class="header">

                <h1>Payroll Printout Page</h1>

            </div>

            <div class="navigation">

                <?php navigationbar(); ?> 

            </div>

            <div class="content">

                <p>No content yet</p>

            </div>
            <div class="sidebar">

            </div>
            <div class="footer">

            </div>
        </div>  
    </body>
</html>