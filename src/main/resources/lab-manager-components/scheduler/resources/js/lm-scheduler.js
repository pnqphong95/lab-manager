$(function () {
    $('#lm-scheduler').fullCalendar({
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
        locale: 'vi',
        height: 'auto',
        header: false,
        defaultView: 'timelineWeekCustom',
        views: {
            timelineWeekCustom: {
                type: 'timelineWeek',
                slotDuration: { days: 1 }
            }
        },
        slotLabelFormat: ['dddd\nDD/MM/YYYY'],
        loading: function (isLoading, view) {
            $('#lm-scheduler').css('filter', 'blur(100px)');
            $('#loading-indicator').css('display', 'block');
        },
        eventAfterAllRender: function (view) {
            $('#lm-scheduler').css('filter', 'blur(0px)');
            $('#loading-indicator').css('display', 'none');
        },
        resourceGroupField: 'shift',
        resourceAreaWidth: '75px',
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
        resources: 'http://pnqphong-scheduler.getsandbox.com/api/shift_labs',
        events: function (start, end, timezone, callback) {
            $.ajax({
                url: 'http://pnqphong-scheduler.getsandbox.com/api/lab_events',
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
});