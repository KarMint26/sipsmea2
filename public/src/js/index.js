$(document).ready(function () {
    let show = false;
    $(".show-pwd").click(function () {
        if (show) {
            $("#floatingPassword").attr("type", "password");
            show = false;
        } else {
            $("#floatingPassword").attr("type", "text");
            show = true;
        }
    });
});
