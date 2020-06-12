<?php

	
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tryencrypt";


$db2 = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['submit'])) {
    $encrypteddata = $_POST['encrypt'];


    $sql = "INSERT into encryptedtext (encrypteddata) VALUES (AES_ENCRYPT('$encrypteddata', 'myprivatekey'))";
    if(mysqli_query($db2, $sql) === TRUE) {
        echo "Successfully encrypted";

    } else {
        echo "Encryption failed";
        echo $db2->error;
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="tryencrypt.php" method="post">
        <label for="EncryptedData">Enter Encrypted Data</label>
        <input type="text" name="encrypt">
        <input type="submit" name="submit" value="Encrypt">
    </form>
</body>
</html>