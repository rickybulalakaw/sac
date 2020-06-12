<?php 

function updownbargraph($presentationtitle, $chartid, $labelposition, $valuecategories, $labelsarray, $valuesarray1, $valuesarray2) {  
?>

<h2><?php echo $presentationtitle ?></h2>
<p></p>

	<div id="container" style="width: 75%;">
		<canvas id="<?php echo $chartid ?>"></canvas>
	</div>
	<!-- <button id="randomizeData">Randomize Data</button>
	<button id="addDataset">Add Dataset</button>
	<button id="removeDataset">Remove Dataset</button>
	<button id="addData">Add Data</button>
	<button id="removeData">Remove Data</button> -->
	<script>
		// var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		var color = Chart.helpers.color;
		var barChartData = {
			labels: <?php echo json_encode($labelsarray) ?>,
			datasets: [{
				label: '<?php echo $valuecategories['0'] ?>',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				borderWidth: 1,
                data: <?php 
                    echo json_encode($valuesarray1);
                ?>
			}, {
				label: '<?php echo $valuecategories['1'] ?>',
				backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
				borderColor: window.chartColors.blue,
				borderWidth: 1,
				data: <?php 
                    echo json_encode($valuesarray2);
                ?>
			}]

		};

		window.onload = function() {
			var ctx = document.getElementById('<?php echo $chartid ?>').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					responsive: true,
					legend: {
						position: '<?php echo $labelposition ?>',
					},
					title: {
						display: false,
						text: ''
					}
				}
			});

		};

	
	</script>

<?php 
}
?>