<?php 

function progressbar($entity, $displayvalue, $value) {
    ?>

<div class="row">
            <div class="col-2">
            
            <?php 

            echo "$entity ($displayvalue)";

            ?>            
           
            </div>
            <div class="col-10">
                <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 
                
                <?php 
                
                echo $value; 
                
                ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        
        </div>

        <?php       


}

?>



