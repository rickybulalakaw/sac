<?php 

// include "db.php";
// include "header.php";

// include "updownbargraph.php";
include "stackbar.php";


$districtprogressview = "progressbydistrictbatch1view";
    
    // get values 

    $getdistricttargetandaccomplish = "select District, Target, Paid from $districtprogressview";
    $processgetdistrictaccomp = mysqli_query($db, $getdistricttargetandaccomplish);
    foreach($processgetdistrictaccomp as $key5){
        $districtarray[] = "District ".$key5['District'];
        $paidfamilies[] = intval($key5['Paid']);
        $remaining = intval($key5['Target']-$key5['Paid']);
        $remainingfamilies[] = $remaining;
    }

    echo json_encode($districtarray);
    echo "<br />";
    echo json_encode($paidfamilies);
    echo "<br />";
    echo json_encode($remainingfamilies);
    echo "<br />";

    $presentationtitle3 = "Accomplishment per District";
    $chartid3 = "myChart3";
    $labelposition3 = "bottom";

    $valuescategories3 = array("Unpaid", "Paid");

    stackbar($presentationtitle3, $chartid3, $labelposition3, $valuescategories3, $districtarray, $paidfamilies, $remainingfamilies);
?>


<!-- 




	
</body>

</html> -->
