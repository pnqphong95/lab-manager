// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("departmentStatistic");
$.ajax({
	url : '/api/statistic/department',
	dataType : 'json',
	success : function(statisticDto) {
		var keys = Object.keys(statisticDto.labelDatas);
		var values = Object.values(statisticDto.labelDatas);
		var myPieChart = new Chart(ctx, {
			type : 'pie',
			data : {
				labels : keys,
				datasets : [ {
					data : values,
					backgroundColor : [ '#007bff', '#dc3545', '#ffc107',
							'#28a745', '#999966', '#000000'],
				} ],
			},
		});
	}
});

$("#chart-printer").on('click', function() {
	var newCanvas = document.querySelector('#departmentStatistic');

	// create image from dummy canvas
	var newCanvasImg = newCanvas.toDataURL("image/png", 1.0);

	// creates PDF from img
	var doc = new jsPDF('landscape');
	doc.setFontSize(16);
	doc.addImage(newCanvasImg, 'PNG', 10, 10, 264, 86);
	doc.save('department-statistic.pdf');
});

