$(document).ready(function() {

    var starcount = 0;
    $(document).on("click", ".feedbackStar", function() {
        var target = $(this).attr("data-starindex");
        var s1 = $(".feedbackStar1");
        var s2 = $(".feedbackStar2");
        var s3 = $(".feedbackStar3");
        var s4 = $(".feedbackStar4");
        var s5 = $(".feedbackStar5");
        if (target == 1) {
            $(".feedbackStar").css("filter", "grayscale(1)");
            s1.css("filter", "grayscale(0)");
            starcount = 1;
        } else if (target == 2) {
            $(".feedbackStar").css("filter", "grayscale(1)");
            s1.css("filter", "grayscale(0)");
            s2.css("filter", "grayscale(0)");
            starcount = 2;
        } else if (target == 3) {
            $(".feedbackStar").css("filter", "grayscale(1)");
            s1.css("filter", "grayscale(0)");
            s2.css("filter", "grayscale(0)");
            s3.css("filter", "grayscale(0)");
            starcount = 3;
        } else if (target == 4) {
            $(".feedbackStar").css("filter", "grayscale(0)");
            s5.css("filter", "grayscale(1)");
            starcount = 4;
        } else if (target == 5) {
            $(".feedbackStar").css("filter", "grayscale(0)");
            starcount = 5;
        }
    });

    $(document).on("click", ".feedbackBtn", function() {
        var subject = $(".feedbackSubject").val();
        var message = $(".feedbackMessage").val();
        $.post("model/sendFeedback.php", {
            subject: subject,
            message: message,
            starcount: starcount
        }, function(data, status) {
            alert(data);
        });
    });

});