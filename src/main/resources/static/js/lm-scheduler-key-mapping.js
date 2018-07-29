$(function () {
    $("body").keydown(function (e) {
        // left arrow
        if ((e.keyCode || e.which) == 37) {
            $('#lm-scheduler-control-prev').click();
            return false;
        }
        // right arrow
        if ((e.keyCode || e.which) == 39) {
            $('#lm-scheduler-control-next').click();
            return false;
        }
    });
});