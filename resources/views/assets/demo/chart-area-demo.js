// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily =
	'-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#292b2c";

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
	type: "line",
	data: {
		labels: [
			"Jan 3",
			"Jan 4",
			"Feb 1",
			"Feb 2",
			"Feb 3",
			"Feb 4",
			"Mar 1",
			"Mar 2",
			"Mar 3",
			"Mar 4",
			"Apr 1",
			"Apr 2",
			"Apr 3",
		],
		datasets: [
			{
				label: "Thu",
				lineTension: 0.3,
				backgroundColor: "rgba(2,117,216,0.2)",
				borderColor: "rgba(2,117,216,1)",
				pointRadius: 5,
				pointBackgroundColor: "rgba(2,117,216,1)",
				pointBorderColor: "rgba(255,255,255,0.8)",
				pointHoverRadius: 5,
				pointHoverBackgroundColor: "rgba(2,117,216,1)",
				pointHitRadius: 50,
				pointBorderWidth: 2,
				data: [7.6, 7.7, 9.8, 6.7, 8.8, 9.9, 7.6, 7.7, 9.8, 6.7, 8.8, 9.9, 10],
			},
		],
	},
	options: {
		scales: {
			xAxes: [
				{
					time: {
						unit: "date",
					},
					gridLines: {
						display: false,
					},
					ticks: {
						maxTicksLimit: 7,
					},
				},
			],
			yAxes: [
				{
					ticks: {
						min: 0,
						max: 10,
						maxTicksLimit: 5,
					},
					gridLines: {
						color: "rgba(0, 0, 0, .125)",
					},
				},
			],
		},
		legend: {
			display: false,
		},
	},
});
