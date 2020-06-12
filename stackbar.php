<?php

function stackbar($presentationtitle, $chartid, $labelposition, $valuecategories, $labelsarray, $valuesarray1, $valuesarray2) { 

?>


<h2><?php echo $presentationtitle ?></h2>
	<div style="width: 100%">		
		<canvas id="<?php echo $chartid ?>"></canvas>
	</div>
	
	<script>
		var barChartData = {
			labels: 
				<?php                         
                        echo json_encode($labelsarray);                        
                        ?>
				,
			datasets: [{
				label: '<?php echo $valuecategories['0'] ?>',
				backgroundColor: window.chartColors.red,
				data: 
					<?php                         
                        echo json_encode($valuesarray1); 
                        ?>				
			}, {
				label: '<?php echo $valuecategories['1'] ?>',
				backgroundColor: window.chartColors.blue,
				data: 
					<?php                         
                        echo json_encode($valuesarray2);                        
                        ?>				
			}
            
            ]

		};
		window.onload = function() {
			var ctx = document.getElementById('<?php echo $chartid ?>').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					title: {
						display: false,
						text: 'Something'
					},
                    legend: {
                        position: '<?php echo $labelposition; ?>',
                    },
					tooltips: {
						mode: 'index',
						intersect: true
					},
					responsive: true,
					scales: {
						xAxes: [{
							stacked: true,
						}],
						yAxes: [{
							stacked: true
						}]
					}
				}
			});
		};

	</script>
<?php 

    }

?>
