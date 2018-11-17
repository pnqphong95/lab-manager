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
        }
    });

    $('#lm-scheduler').fullCalendar({
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
        height: 'auto',
        header: false,
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
                url: 'api/weekofperiods',
                dataType: 'json',
                data: {
                    from: view.start.format('YYYY-MM-DD'),
                    to: view.end.format('YYYY-MM-DD')
                },
                success: function (week) {
                	console.log(week);
                    $('#lm-scheduler-control-select-week').text('Week No.' + week.numOrder);
                }
            });
        },
        resourceGroupField: 'shift',
        resourceAreaWidth: '80px',
        resourceColumns: [{
                labelText: ' ',
                field: 'labname'
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
        resources: 'https://pnqphong-scheduler.getsandbox.com/api/shift_labs',
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
        return false;
    });

    $('#lm-scheduler-control-next').click(function () {
        $('#lm-scheduler').fullCalendar('next');
        return false;
    });
});