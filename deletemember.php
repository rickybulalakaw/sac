<?php 

session_start();
include "db.php";

include "functions.php";

$rights = $_SESSION['rights'];

$allowed = array("MSWDO", "MSWDOAdmin");

if(!in_array($rights, $allowed))
{
    echo "You are not allowed to proceed.";
    return;
}

if(!isset($_GET['memberid'])){
    echo "You are accessing this page with incomplete parameters.";
    return;
}


$memberid = $_GET['memberid'];


if(!isset($_GET['bid'])){
    echo "You are accessing this page with incomplete parameters.";
    return;
}

$bid = $_GET['bid'];

$getmember = "select * from member where id = $memberid";
$process3 = $db->query($getmember);

$row = $process3->fetch_assoc();
$name = $row['firstname'] . " " . $row['lastname'];

$userid = $_SESSION['sac_id'];

$deletemember = "DELETE FROM member WHERE ID = $memberid";
$process = $db->query($deletemember);

$register = "insert into systemrecord (user, object, record) values ($userid, $memberid, 'Delete member $name from Beneficiary ID $bid')";
$process2 = $db->query($register);

header("Location: /sac2/viewbeneficiary/$bid");



?>