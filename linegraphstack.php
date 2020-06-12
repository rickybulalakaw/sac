<?php

function linegraphstack($presentationtitle, $chartname, $labelposition, $valuecategories, $labelsarray, $valuesarray1, $valuesarray2, $xaxistitle, $yaxistitle) {
 
?>

<h2><?php echo $presentationtitle ?></h2>

<div style="width:100%;">
		<canvas id="<?php echo $chartname ?>"></canvas>
	</div>
	<br>
	<br>
	<!-- <button id="randomizeData">Randomize Data</button>
	<button id="addDataset">Add Dataset</button>
	<button id="removeDataset">Remove Dataset</button>
	<button id="addData">Add Data</button>
	<button id="removeData">Remove Data</button> -->
	<script>
		// var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		var config = {
			type: 'line',
			data: {
				labels: <?php                         
                        echo json_encode($labelsarray);                        
                        ?>,
				datasets: [{
					label: '<?php echo $valuecategories['0'] ?>',
					borderColor: window.chartColors.red,
					backgroundColor: window.chartColors.red,
					data: 
						<?php                         
                        echo json_encode($valuesarray1); 
                        ?>	
					,
				}, {
					label: '<?php echo $valuecategories['1'] ?>',
					borderColor: window.chartColors.blue,
					backgroundColor: window.chartColors.blue,
					data: 
						<?php                         
                        echo json_encode($valuesarray2); 
                        ?>	
					,
				}
                // , {
				// 	label: 'My Third dataset',
				// 	borderColor: window.chartColors.green,
				// 	backgroundColor: window.chartColors.green,
				// 	data: [
				// 		randomScalingFactor(),
				// 		randomScalingFactor(),
				// 		randomScalingFactor(),
				// 		randomScalingFactor(),
				// 		randomScalingFactor(),
				// 		randomScalingFactor(),
				// 		randomScalingFactor()
				// 	]
				// }
                ]
			},
			options: {
				responsive: true,
				title: {
					display: false,
					text: '<?php echo $presentationtitle ?>'
				},
                legend: {
                        position: '<?php echo $labelposition; ?>',
                },
				tooltips: {
					mode: 'index',
				},
				hover: {
					mode: 'index'
				},
				scales: {
					xAxes: [{
						scaleLabel: {
							display: true,
							labelString: '<?php echo $xaxistitle ?>'
						}
					}],
					yAxes: [{
						stacked: true,
						scaleLabel: {
							display: true,
							labelString: '<?php echo $yaxistitle ?>'
						}
					}]
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('<?php echo $chartname ?>').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};
        
		var colorNames = Object.keys(window.chartColors);
		
	</script>

    <?php 

}

    ?>
