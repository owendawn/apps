$(window).scroll(function() {
    if (window.scrollY > 100) {
        $(".navbar").fadeOut("slow");
    } else {
        $(".navbar").fadeIn("slow");
    }
});

$("[data-toggle='tooltip']").tooltip();