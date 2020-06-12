<?php 
    session_start();
    if(!isset($_SESSION['sac_id'])) {
        header("Location: signin.php");
    }
    require_once("db.php");

    $id = $_SESSION['sac_id'];

$checkadmin = "SELECT id from user where id = " . $id . " and rights = 'Admin'";
$process = $db->query($checkadmin);

if(mysqli_num_rows($process) < 1){
    echo "<p align='center'>Sorry, you are not allowed to access this page. Click <a href='index.php'>here</a> to go back to the home page.</p>";
    return;
}

echo "<p align='center'>Beneficiaries Table Page</p>";