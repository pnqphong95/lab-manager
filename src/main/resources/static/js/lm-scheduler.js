$(function () {
    $.ajax({
        url: 'api/periods',
        dataType: 'json',
        data: {
            now: moment().format('YYYY-MM-DD')
        },
        success: function (period) {
            $('#lm-scheduler').fullCalendar('option', 'validRange', {
                start: period.startDate,
                end: period.endDate
            });
        },
        error: function() {
        	alert("Thời điểm hiện tại thuộc học kỳ niên khóa nào! Hãy chọn học kỳ");
        }
    });

    $('#lm-scheduler').fullCalendar({
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
        height: 'auto',
        header: false,
        locale: 'vi',
        defaultView: 'timelineWeekCustom',
        views: {
            timelineWeekCustom: {
                type: 'timelineWeek',
                slotDuration: { days: 1 }
            }
        },
        firstDay: 1,
        slotLabelFormat: ['dddd, DD/MM'],
        loading: function (isLoading, view) {
            $('#lm-scheduler').css('filter', 'blur(100px)');
            $('#loading-indicator').css('display', 'block');
        },
        eventAfterAllRender: function (view) {
            $('#lm-scheduler').css('filter', 'blur(0px)');
            $('#loading-indicator').css('display', 'none');
        },
        viewRender: function (view) {
            $.ajax({
                url: 'api/weekofperiods/inrange',
                dataType: 'json',
                data: {
                    from: view.start.format('YYYY-MM-DD'),
                    to: view.end.format('YYYY-MM-DD')
                },
                success: function (week) {
                    $('#lm-scheduler-control-select-week').text('Week No.' + week.numOrder);
                }
            });
        },
        resourceGroupField: 'shift',
        resourceAreaWidth: '110px',
        resourceColumns: [{
                labelText: ' ',
                field: 'labName'
        }],
        windowResize: function (view) {
            $('#lm-scheduler').fullCalendar('rerenderEvents');
        }, 
        eventRender: function (event, element) {
            element.css("border", "none");
            element.css("font-size", "1em");
            element.css("padding", "6px 0");
            element.css("background-color", "#00abd2");
            element.css("line-height", "1.5");
        },
        resources: 'api/shiftlabs',
        events: function (start, end, timezone, callback) {
            $.ajax({
                url: 'https://pnqphong-scheduler.getsandbox.com/api/lab_events',
                dataType: 'json',
                data: {
                    from: start.format('YYYY-MM-DD'),
                    to: end.subtract(1, 'days').format('YYYY-MM-DD')
                },
                success: function (events) {
                    callback(events);
                }
            });
        }
    });

    $('#lm-scheduler-control-prev').click(function () {
        $('#lm-scheduler').fullCalendar('prev');
        var equalGoToSeletor = 'a[goto="'+ $('#lm-scheduler').fullCalendar('getView').start.format('YYYY-MM-DD')  +'"]';
        $('.weekofperiod-item').removeClass('active');
    	$(equalGoToSeletor).addClass('active');
    	console.log(equalGoToSeletor);
    	$('#select-week-dropdown .week-text').text($(equalGoToSeletor).text());
        return false;
    });

    $('#lm-scheduler-control-next').click(function () {
        $('#lm-scheduler').fullCalendar('next');
        var equalGoToSeletor = 'a[goto="'+ $('#lm-scheduler').fullCalendar('getView').start.format('YYYY-MM-DD')  +'"]';
        $('.weekofperiod-item').removeClass('active');
    	$(equalGoToSeletor).addClass('active');
    	console.log(equalGoToSeletor);
    	$('#select-week-dropdown .week-text').text($(equalGoToSeletor).text());
        return false;
    });
    
    $('div[aria-labelledby="select-week-dropdown"]').on("click","a.weekofperiod-item", function(){
    	$('.weekofperiod-item').removeClass('active');
    	$(this).addClass('active');
    	$('#select-week-dropdown .week-text').text($(this).text());
    	$('#lm-scheduler').fullCalendar('gotoDate', $(this).attr('goto'));
    });
    
    $('a.period-item').click(function() {
    	$('.period-item').removeClass('active');
    	$(this).addClass('active');
    	$('#select-period-dropdown').text($(this).text());
    	var startDate = $(this).attr('start');
    	var endDate = $(this).attr('end');
    	$.ajax({
            url: 'api/weekofperiods',
            dataType: 'json',
            data: {
            	startDate: startDate
            },
            success: function (weeks) {
            	var listItem = "";
            	$.each( weeks, function( index, value ) {
            		listItem += '<a class="dropdown-item weekofperiod-item" href="#" goto="'+ value.startDate + '">Tuần ' + value.numOrder + '</a>';
            	});
            	var dom = $(listItem);
            	dom.first().addClass('active');
            	$('#select-week-dropdown .week-text').text(dom.first().text());
            	$('div[aria-labelledby="select-week-dropdown"]').html(dom);
            },
            error: function() {
            	alert("Thời điểm hiện tại thuộc học kỳ niên khóa nào! Hãy chọn học kỳ");
            }
        });
    	$('#lm-scheduler').fullCalendar('option', 'validRange', {
            start: startDate,
            end: endDate
        });
    	return;
    });
});