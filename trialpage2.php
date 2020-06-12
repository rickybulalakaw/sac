<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trial Page</title>
</head>
<body>

<?php 

echo "Example of loose typecasting: <br />";
$a = "15"; 
$b = 2*$a;
echo $b;
echo "<br />";
echo "<br />";
echo "WHILE in action: <br />";
$i = 0; // change this to beyond 10

while($i < 10){
	echo $i."<br/>";
	$i++;
}
echo "<br />";

echo "DO WHILE in action: <br/>";
echo "<br />";

$count = 1; // change this to beyond 10
do
echo "$count times 12 is " . $count * 12 . "<br>";
while (++$count <= 10);
echo "<br /";


echo "FOR in action: <br />";
for ($count = 1 ; $count <= 12 ; ++$count) // change count to 13
echo "$count times 12 is " . $count * 12 . "<br>";
echo "<br/>";

?>
	
</body>
</html>