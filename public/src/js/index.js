$(document).ready(function () {
    let show = false;
    $(".show-pwd").click(function () {
        if (show) {
            $("#floatingPassword").attr("type", "password");
            $("#eye").attr("class", "bi bi-eye-slash-fill");
            show = false;
        } else {
            $("#floatingPassword").attr("type", "text");
            $("#eye").attr("class", "bi bi-eye-fill");
            show = true;
        }
    });

    const resendEmailBtn = $(".resend_email_btn");
    const textResendEmail = $("#text_resend_email");
    let timeLeft = 15;

    resendEmailBtn.addClass("disabled");

    const timer = setInterval(() => {
        if (timeLeft <= 0) {
            clearInterval(timer);
            resendEmailBtn.css("background-color", "#a00a52").removeClass("disabled");
            textResendEmail.text("Kirim Ulang Email Verifikasi");
        } else {
            textResendEmail.text(`Verifikasi Ulang - ${timeLeft} detik`);
            timeLeft--;
        }
    }, 1000);
});
