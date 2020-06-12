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

echo "<p align='center'>User Activation Page</p>";

// Table of Requests

$fetchuserrequest = "SELECT id, username, fullname from user where status = 'Inactive'";
$process = $db->query($fetchuserrequest);

if(mysqli_num_rows($process) > 0){

    echo "<p align='center'>View the accounts created below and click <b>Approve</b> to allow them to sign in.</p>";
    echo "<p align='center'>";

    echo "<table border='1' style='width:100%'>";

    echo "<tr>";
    echo "<td style='background-color:#87CEFA' align='center'><b>Full Name</b></td>";    
    echo "<td style='background-color:#87CEFA' align='center'><b>Username</b></td>";
    echo "<td style='background-color:#87CEFA' align='center'><b>Action</b></td>";
    echo "</tr>";

    $i = 1;

    while($row = $process->fetch_assoc()){
        echo "<tr>";
        echo "<td>$i. ".$row['fullname']."</td>";
        echo "<td align='center'>".$row['username']."</td>";
        echo "<td align='center'><a href='activateuser.php?newid=".$row['id']."'>Activate User</a></td>";
        echo "</tr>";
        $i++;
    }

    echo "</table>";
    echo "</p>";


} else {
    echo "<p align='center'>Great! There is no new user access request. Click <a href='index.php'>here</a> to go back to the home page.</p> ";
    return;
}