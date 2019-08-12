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
                //show alert
            }
        });
        $(".addNewExam").toggleClass("addBtnImgRotate");
        $(".addNewExamForm").toggle();
        getExamList();
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
                //do someting
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
            //dosomething
        });
        $(".utExamDetailContainer").load("model/getExamDetail.php", {
            examid: examid
        });
    });


    //Add Exam Result
    $(document).on("click", ".addExamResultBtn", function() {
        var examid = $(this).attr("data-examid");
        alert(examid);
    });
});