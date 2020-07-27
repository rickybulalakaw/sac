<?php

include "db.php";
include "header.php";
$trabahongtamad = "select * from member where reltohh = '1'";
$process1 = mysqli_query($db, $trabahongtamad);

foreach($process1 as $member){
    $arrayofencoded[] = $member['memberprimary'];

}
echo "Array of primary member encoded<br>";
// print_r($arrayofencoded);

// $filter = "select * from beneficiary where "

$getallbens = "select * from beneficiary";
$process2 = mysqli_query($db, $getallbens);

foreach($process2 as $ben){
    $arrayofallbeneficiaries[] = $ben['id'];
}
echo "<br>";

echo "arrayofallbeneficiaries: <br>";

// print_r($arrayofallbeneficiaries);
echo "<br>BREAK<br>";
echo "<br>";
echo "<br>BREAK<br>";
foreach($arrayofallbeneficiaries as $beneficiary){
    if(!in_array($beneficiary, $arrayofencoded)){
        $dinaencodearray[] = $beneficiary;
    }
}
echo "<br>BREAK<br>";

echo "# of dinaencode <br>";
// $count = count($dinaencodearray);
// echo "$count<br>";
// print_r($count);
echo "<br>BREAK<br>";
echo "Di naencode array:<br>";
// print_r($dinaencodearray);

foreach($dinaencodearray as $dbrecord){
    $collect = "select * from beneficiary where id = $dbrecord";
    $process5 = mysqli_query($db, $collect);

    $row = mysqli_fetch_assoc($process5);

    $dinaencodearray2[] = $row;

}

echo count($dinaencodearray2)."<br>";


foreach($dinaencodearray2 as $tobeadded){

    $lname = $tobeadded['lastname'];
    $fname = $tobeadded['firstname'];
    $mname = $tobeadded['middlename'];
    $ext = $tobeadded['extension'];

    if($tobeadded['sex'] == "Male"){
        $sex = "M";
    } else {
        $sex = "F";
    }
    // $sex = $tobeadded['sex'];
    $dob = $tobeadded['dob'];
    $work = $tobeadded['work'];
    $sectorid = $tobeadded['sectorid'];
    $health = $tobeadded['healthconditionid'];
    $memberprim = $tobeadded['id'];
    

    $addtomembertable = "INSERT INTO member(lastname, firstname, middlename, extension, reltohh, sex, dob, work, sectorid, healthconditionid, memberprimary, enteredby) VALUES ('$lname', '$fname', '$mname', '$ext', '1', '$sex', '$dob', '$work', '$sectorid', '$health', '$memberprim', '11')";
    mysqli_query($db, $addtomembertable) or trigger_error("Query failed: ".mysqli_error($db), E_USER_ERROR);
}

echo "success";