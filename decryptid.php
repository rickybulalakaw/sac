<?php 

	
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tryencrypt";


$db2 = new mysqli($servername, $username, $password, $dbname);

$id=$_GET['id'];

$getvalue = "SELECT encrypteddata from encryptedtext where id = $id";
$process1 = mysqli_query($db2, $getvalue);
$value = $process1->fetch_assoc();
$encrypteddata = $value['encrypteddata'];

$decrypt = "SELECT AES_DECRYPT(AESENCRYPT('$encrypteddata', 'myprivatekey')";
$process2 = mysqli_query($db2, $decrypt);

$row2 = $process2->fetch_assoc();
$decrypteddata = $row2[$encrypteddata];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

echo "The encrypted data for data ID ".$id." is <b>".$decrypteddata."</b>";

?>
    
</body>
</html>