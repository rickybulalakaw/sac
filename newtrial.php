<?php



?>


<!doctype html>
<html>

<head>
	<title>Stacked Bar Chart</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script src="https://www.chartjs.org/samples/latest/utils.js"></script>
	<style>
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	</style>
</head>

<body>
	<div style="width: 75%">
		<canvas id="canvas"></canvas>
	</div>
	<button id="randomizeData">Randomize Data</button>
	<script>
		var barChartData = {
			labels: [
				'District 1', 
				'District 2', 
				'District 3', 
				'District 4', 
				'District 5', 
				'District 6', 
				'District 7', 
				'District 8', 
				'District 9'
				],
			datasets: [{
				label: 'Completed',
				backgroundColor: window.chartColors.red,
				data: [
					1,
					2,
					3,
					4,
					5,
					6,
					7,
					8,
					9
				]
			}, {
				label: 'Remaining',
				backgroundColor: window.chartColors.blue,
				data: [
					1,
					2,
					3,
					4,
					5,
					6,
					7,
					8,
					9
				]
			}, {
				label: 'Additional',
				backgroundColor: window.chartColors.green,
				data: [
					1,
					2,
					3,
					4,
					5,
					6,
					7,
					8,
					9
				]
			}]

		};
		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					title: {
						display: true,
						text: 'Social Amelioration Payout'
					},
					tooltips: {
						mode: 'index',
						intersect: false
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

		document.getElementById('randomizeData').addEventListener('click', function() {
			barChartData.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});
			window.myBar.update();
		});
	</script>
</body>

</html>
