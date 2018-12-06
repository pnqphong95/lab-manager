// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

var ctx = document.getElementById("weekOfPeriodStatistic");
$.ajax({
	url : '/api/statistic/wop',
	dataType : 'json',
	success : function(statisticDto) {
		var keys = Object.keys(statisticDto.labelDatas).map(function(value){
			return "Tuần " + value;
		})
		var values = Object.values(statisticDto.labelDatas);
		var maxY = Math.max.apply(Math,values);
		var myLineChart = new Chart(ctx, {
			type : 'bar',
			data : {
				labels : keys,
				datasets : [ {
					label : "Số lượt đăng ký",
					backgroundColor : "rgba(2,117,216,1)",
					borderColor : "rgba(2,117,216,1)",
					data : values,
				} ],
			},
			options : {
				scales : {
					xAxes : [ {
						time : {
							unit : 'month'
						},
						gridLines : {
							display : false
						},
						ticks : {
							maxTicksLimit : keys.length
						}
					} ],
					yAxes : [ {
						ticks : {
							min : 0,
							max : maxY * 1.5,
							maxTicksLimit : 5
						},
						gridLines : {
							display : true
						}
					} ],
				},
				legend : {
					display : false
				}
			}
		});
	}
});

$("#chart-printer").on('click', function() {
	var newCanvas = document.querySelector('#weekOfPeriodStatistic');

	// create image from dummy canvas
	var newCanvasImg = newCanvas.toDataURL("image/png", 1.0);

	// creates PDF from img
	var doc = new jsPDF('landscape');
	doc.setFontSize(16);
	doc.addImage(newCanvasImg, 'PNG', 10, 10, 280, 150);
	doc.save('weekofperiod-statistic.pdf');
});
