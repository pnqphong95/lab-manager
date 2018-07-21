$(function () {
    $('#calendar').fullCalendar({
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
        loading: function (isLoading, view) {
            $('#calendar').css('filter', 'blur(20px)');
            $('#loading-indicator').css('display', 'block');
        },
        eventAfterAllRender: function (view) {
            $('#calendar').css('filter', 'blur(0px)');
            $('#loading-indicator').css('display', 'none');
        },
        resourceGroupField: 'shift',
        resourceLabelText: ' ',
        resourceAreaWidth: '12%',
        resources: 'https://api.myjson.com/bins/1c0ud6'
    });
});