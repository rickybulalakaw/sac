<?php

function linebartime($presentationtitle, $chartname, $labelposition, $valuecategories, $labelsarray, $valuesarray1, $valuesarray2, $xaxistitle, $yaxistitle){


?>

<h2 align='center'><?php echo $presentationtitle ?></h2> 
    

	<div style="width: 100%">
		<canvas id="<?php echo $chartname ?>"></canvas>
	</div>
	<script>
		var chartData = {
			labels: <?php                         
                        echo json_encode($labelsarray);                        
                        ?>,
			datasets: [{
				type: 'line',
				label: '<?php echo $valuecategories['1'] ?>',
				borderColor: window.chartColors.blue,
				borderWidth: 2,
				fill: false,
				data: <?php                         
                        echo json_encode($valuesarray1); 
                        ?>
			}, {
				type: 'bar',
				label: '<?php echo $valuecategories['0'] ?>',
				backgroundColor: window.chartColors.red,
				data: <?php                         
                        echo json_encode($valuesarray2); 
                        ?>,
				borderColor: 'white',
				borderWidth: 2
			}
			// , {
			// 	type: 'bar',
			// 	label: 'Dataset 3',
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

		};
		window.onload = function() {
			var ctx = document.getElementById('<?php echo $chartname ?>').getContext('2d');
			window.myMixedChart = new Chart(ctx, {
				type: 'bar',
				data: chartData,
				options: {
					responsive: true,
					title: {
						display: false,
						text: 'Chart.js Combo Bar Line Chart'
					},
					legend: {
                        position: '<?php echo $labelposition; ?>',
                	},
					tooltips: {
						mode: 'index',
						intersect: true
					}
				}
			});
		};

		// document.getElementById('randomizeData').addEventListener('click', function() {
		// 	chartData.datasets.forEach(function(dataset) {
		// 		dataset.data = dataset.data.map(function() {
		// 			return randomScalingFactor();
		// 		});
		// 	});
		// 	window.myMixedChart.update();
		// });
	</script>

<?php 

}

?>