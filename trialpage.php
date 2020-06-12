<?php

// session_start();
include "db.php";
include "header.php";

?> 
    <div class="container-fluid">

	<?php
	
	$date=date_create(date("Y/m/d"));
date_add($date,date_interval_create_from_date_string("1 week"));
echo date_format($date,"Y-m-d");
	
?>

	</div>
        
</body>
</html>