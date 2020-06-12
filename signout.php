<?php

session_start();
include "db.php";

$id = $_SESSION['sac_id'];

$registersignout = "INSERT INTO systemrecord (user, object, record) values ($id, $id, 'Signed out')";
$process = $db->query($registersignout);

session_destroy();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            
        </title>
    </head>
    <body>
        <meta http-equiv="refresh" content="1;url=/sac2">
    </body>
</html>

