<?php

session_start();
require_once("db.php");
require_once("functions.php");
ensuresignin();

// check admin rights

$id = $_SESSION['sac_id'];
ensureaccountactive($id);

checkaccessrights();

ensuremswdo();

include "header.php";

navigationbar();

?>

    <div class="container-fluid">       

        <p>Search SAC barcode number:</p>
        <form action="/sac2/searchresult.php" method ="post" enctype="multipart/form-data">
            <input value="barcode" type="number" name="barcode" placeholder="Barcode No." autofocus>
            <input value="Search" name="search" type="submit">
            
        </form>

    </div>  

    </body>
</html>






