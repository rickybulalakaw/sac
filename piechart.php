<?php

function piechart($presentationtitle, $chartname, $labelposition, $numberofvalues, $labelsarray, $valuesarray) { 
    
// $numberofvalues is from 2-6. $labelsarray is a text string with commas to separate values. $valuesarray is a string array with each value ended by comma except the last
    
    switch ($numberofvalues) {
        
        case 3: 
            $shade = 0.5;
            $backgroundcolor = "'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)'";
            $bordercolor = "'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)'";
        break;
        case 4: 
            $shade = 0.5;
            $backgroundcolor = "'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)'";
            $bordercolor = "'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)'";
        break;
        case 5: 
            $shade = 0.5;
            $backgroundcolor = "'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)'";
            $bordercolor = "'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)'";
        break;
        case 6: 
            $shade = 0.5;
            $backgroundcolor = "'rgba(255, 99, 132, 0.2)',
            'rgba(177, 0, 0, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'";
            $bordercolor = "'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'";
        break;
        case 7: 
            $shade = 0.5;
            $backgroundcolor = "'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(153, 24, 15, 0.2)'";
            $bordercolor = "'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(153, 25, 14, 1)'";
        break;
        case 8:      
            $shade = 0.5;       
            $backgroundcolor = "'rgba(177,0,0, $shade)',
            'rgba(179, 18, 0, $shade)',
            'rgba(182, 30, 0, $shade)',
            'rgba(184,39, 0, $shade)',
            'rgba(186, 46, 0, $shade)',
            'rgba(188, 53, 0, $shade)',
            'rgba(190, 60, 0, $shade)',
            'rgba(193, 66, 0, $shade)'";
            $bordercolor = "'rgba(255, 99, 132, 1)',            
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)'";
        break;
        case 9: 
            $shade = 0.5;
            $backgroundcolor = "'rgba(166, 15, 15, $shade)',
            'rgba(164, 46, 0, $shade)',
            'rgba(159, 67, 0, $shade)',
            'rgba(151, 86, 0, $shade)',
            'rgba(139, 102, 0, $shade)',
            'rgba(124, 117, 0, $shade)',
            'rgba(105, 131, 0, $shade)',
            'rgba(81, 143, 0, $shade)',
            'rgba(39, 155, 0, $shade)'";
            $bordercolor = "'rgba(54, 162, 235, 1)',            
            'rgba(54, 162, 235, 1)', 
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)'";

            // 54, 162, 235, 1
            // 255, 99, 132, 1

        break;
        default: 
            $shade = 0.7;
            $backgroundcolor = "'rgba(255, 99, 132, $shade)',
            'rgba(54, 162, 235, $shade)'";
            $bordercolor = "'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)'";
    }


?>
        <h2><?php echo $presentationtitle ?></h2>
        <p></p>
 

        <canvas id="<?php echo $chartname ?>" width="100%" height="65px"></canvas>
        <script>
            var ctx = document.getElementById('<?php echo $chartname ?>');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: <?php 
                        echo json_encode($labelsarray);                        
                        ?>, 
                    datasets: [{
                        label: '<?php echo $chartname ?>',
                        data: <?php                        
                            echo json_encode($valuesarray);
                        ?>, //
                        backgroundColor: [
                            <?php
                            echo $backgroundcolor;
                            ?>
                        ],
                        borderColor: [
                            <?php
                            echo $bordercolor; 
                            ?>
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    legend: {
                        position: '<?php echo $labelposition; ?>',
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    }
                   
                }
            });
        </script>
   
    
    <?php 

        }
        ?>

    
