$(document).ready(function() {

    $(document).on("click", ".addNewExam", function() {
        $(this).toggleClass("addBtnImgRotate");
        $(".addNewExamForm").toggle();
    });

    //show exam list
    function getExamList() {
        $(".utExamListContainer").load("model/getExamList.php");
    }

    //Add New Exam
    $(document).on("click", ".createExamBtn", function() {
        var examName = $(".addNewExamName").val();
        var examDate = $(".addNewExamDate").val();
        $.post("model/addExam.php", {
            examName: examName,
            examDate: examDate
        }, function(data, status) {
            if (data == 1) {
                recoreAlert("Successfully Added", 1);
            } else {
                recoreAlert("Something is wrong", 0)
            }
        });
        getExamList();
        $(".addNewExam").toggleClass("addBtnImgRotate");
        $(".addNewExamForm").toggle();

    });

    //viewthis exam
    $(document).on("click", ".eachExamContainer", function() {
        var examid = $(this).attr("data-examid");
        $(".utExamDetailContainer").load("model/getExamDetail.php", {
            examid: examid
        });
    });

    //Add More subject
    $(document).on("click", ".addMoreSubjectsBtn", function() {
        var examid = $(this).attr('data-examid');
        $(".addNewSubjectFormContanier").css("display", "flex");
        $(".addNewSubjectForm").attr("data-examid", examid);
    });
    //close add subject form
    $(document).on("click", ".closeAddNewSubjectForm", function() {
        $(".addNewSubjectFormContanier").css("display", "none");
        $(".addNewSubjectFormContanier :input").val("");
    });
    //Add subject Btn
    $(document).on("click", ".addNewSubjectSubmitBtn", function() {
        var examid = $(".addNewSubjectForm").attr("data-examid");
        var subject = $(".addNewSubjectName").val();
        var date = $(".addNewSubjectDate").val();

        var ftimeH = $(".addNewSubftimeHour").val();
        var ftimeM = $(".addNewSubftimeMinute").val();
        var ftimeampm = $(".addNewSubftimeampm").val();
        var ftime = ftimeH + ":" + ftimeM + " " + ftimeampm;

        var ttimeH = $(".addNewSubttimeHour").val();
        var ttimeM = $(".addNewSubttimeMinute").val();
        var ttimeampm = $(".addNewSubttimeampm").val();
        var ttime = ttimeH + ":" + ttimeM + " " + ttimeampm;

        var roomno = $(".addNewSubjectRoomNo").val();
        var chairno = $(".addNewSubjectChairNo").val();
        var minmark = $(".addNewSubjectMinMark").val();
        if (subject != "" && date != "" && ftime != "" && ttime != "" && roomno != "" && chairno != "" && minmark != "") {
            $.post("model/addNewSubject.php", {
                subject: subject,
                date: date,
                ftime: ftime,
                ttime: ttime,
                roomno: roomno,
                chairno: chairno,
                minmark: minmark,
                examid: examid
            }, function(data, status) {
                recoreAlert("Added New Subject", 1);
            });
            $(".addNewSubjectFormContanier").css("display", "none");
            $(".addNewSubjectFormContanier :input").val("");
            $(".utExamDetailContainer").load("model/getExamDetail.php", {
                examid: examid
            });
        } else {
            alert("fill all fields");
        }
    });

    //remove subject from exam
    $(document).on("click", ".deleteThisSubjectBtn", function() {
        var examid = $(".examDetailTable").attr("data-examid");
        var subid = $(this).attr("data-subid");
        $.post("model/delsubject.php", {
            subid: subid
        }, function(data, status) {
            recoreAlert("Removed Subject", 1);
        });
        $(".utExamDetailContainer").load("model/getExamDetail.php", {
            examid: examid
        });
    });


    //Add Exam Result
    $(document).on("click", ".addExamResultBtn", function() {
        var examid = $(this).attr("data-examid");
        $(".addResultFromContainer").css("display", "flex");
        $(".addResultForm").load("model/addresult.php", {
            examid: examid
        });
    });

    //add mark
    $(document).on("keyup", ".addMarkInput", function() {
        var subid = $(this).attr("data-subid");
        var submark = $(this).val();
        if ($.isNumeric(submark)) {
            $.post("model/addMark.php", {
                subid: subid,
                submark: submark
            }, function(data, status) {
                //do something
            });
        } else if (submark == "") {
            alert("your mark cannot be blank");
        } else {
            alert("your mark cannot be text");
        }
    });

    //calculate Exam Result
    $(document).on("click", ".calcExamResultBtn", function() {
        var examid = $(this).attr("data-examid");
        $.post("model/calcResult.php", {
            examid: examid
        }, function(data, status) {
            if (data == "pass") {
                recoreAlert("CONGRATULATION! You Passed The Exam", 1);
            } else if (data == "fail") {
                recoreAlert("OPPS! You Failed The Exam", 0);
            } else {
                recoreAlert("Something is Wrong!");
            }
        });

        $(".addResultFromContainer").css("display", "none");
        $(".addResultTable :input").val("");
        getExamList();
    });

    $(document).on("click", ".cancelExamResultBtn", function() {
        $(".addResultFromContainer").css("display", "none");
        $(".addResultTable :input").val("");
    });

    //delete exam
    $(document).on("click", ".delExamBtn", function() {
        var examid = $(this).attr("data-examid");
        $.post("model/delExam.php", {
            examid: examid
        }, function(data, status) {
            recoreAlert("Deleted Exam", 1);
        });
        getExamList();
        $(".utExamDetailContainer").load("model/getExamDetail.php");
    });

});