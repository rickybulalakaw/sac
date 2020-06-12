<?php 

    session_start();
    include "db.php";
    include "functions.php";
    ensuresignin();

    include "header.php";
    navigationbar();

?>

<div class="container-fluid">
    <p>You have succesfully uploaded photo. Click <a href='/sac2/search'>here</a> to search for a beneficiary and upload another photo.</p>



</div>

</body>
</html>
    