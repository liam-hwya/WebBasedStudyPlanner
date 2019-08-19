$(document).ready(function() {
    $(document).on("click", ".myClassMenu", function() {
        var target = $(this).attr("data-target");
        $(".myClassDataContainer").load("model/myclass.php", {
            target: target
        });
        $(".myClassMenu").removeClass("myclassActive");
        $(this).addClass("myclassActive");
    });

    $(document).on("click", ".myclassAddBtn", function() {
        var target = $(this).attr("data-target");
        if ($(this).hasClass("showingAddClassForm")) {
            $(".myClassAndNewForm").css("display", "none");
            $(this).css("transform", "rotate(0deg)");
            $(this).removeClass("showingAddClassForm");
        } else {
            if (target == "myteachers") {
                $(".addNewTeacherForm").css("display", "flex");
            } else if (target == "mysubjects") {
                $(".addNewSubjectForminClass").css("display", "flex");
            } else if (target == "myclassmates") {
                $(".addNewClassMatesForm").css("display", "flex");
            }

            $(this).css("transform", "rotate(45deg)");
            $(this).addClass("showingAddClassForm");
        }
    });

    //add subject
    $(document).on("click", ".myClassAddSubjectBtn", function() {
        var newSubject = $(".myClassSubjectInput").val();
        var target = "mysubjects";
        if (newSubject != "") {
            $.post("model/addClassSubject.php", {
                newSubject: newSubject
            }, function(data, status) {
                //dosomething
            });
            $(".addNewSubjectForminClass").css("display", "none");
            $(".myclassAddBtn").css("transform", "rotate(0deg)");
            $(".myclassAddBtn").removeClass("showingAddClassForm");
            $(".myClassDataContainer").load("model/myclass.php", {
                target: target
            });
        }
    });


    //add Teacher
    $(document).on("click", ".addClassTeacherBtn", function() {
        var target = "myteachers";
        var teacherName = $(".teacherNameInput").val();
        var teacherSubject = $(".teacherSubjectInput").val();
        var teacherPhone = $(".teacherPhoneInput").val();
        if (teacherName != "" && teacherSubject != "No Subjects!" && teacherPhone != "") {
            $.post("model/addNewTeacher.php", {
                teacherName: teacherName,
                teacherSubject: teacherSubject,
                teacherPhone: teacherPhone
            }, function(data, status) {
                recoreAlert("Added Teacher", 1);
            });
            $(".addNewTeacherForm").css("display", "none");
            $(".teacherNameInput").val("");
            $(".teacherPhoneInput").val("");
            $(".myclassAddBtn").css("transform", "rotate(0deg)");
            $(".myclassAddBtn").removeClass("showingAddClassForm");
            $(".myClassDataContainer").load("model/myclass.php", {
                target: target
            });
        } else {
            //dosomething
        }
    });



    //add Classmate
    $(document).on("click", ".addClassmateBtn", function() {
        var target = "myclassmates";
        var classmateName = $(".classmateNameInput").val();
        var classmatePhone = $(".classmatePhoneInput").val();
        var classmateAddress = $(".classmateAddressInput").val();
        if (classmateName != "" && classmatePhone != "" && classmateAddress != "") {
            $.post("model/addNewClassmate.php", {
                classmateName: classmateName,
                classmatePhone: classmatePhone,
                classmateAddress: classmateAddress
            }, function(data, status) {
                recoreAlert("Added Classmate", 1);
            });
            $(".addNewClassMatesForm").css("display", "none");
            $(".classmateNameInput").val("");
            $(".classmatePhoneInput").val("");
            $(".classmateAddressInput").val("");
            $(".myclassAddBtn").css("transform", "rotate(0deg)");
            $(".myclassAddBtn").removeClass("showingAddClassForm");
            $(".myClassDataContainer").load("model/myclass.php", {
                target: target
            });
        } else {
            //dosomething
        }
    });


    $(document).on("click", ".classCardinnerContainer", function() {
        $(".classCardinnerContainer").removeClass("openClassCard");
        $(this).toggleClass("openClassCard");
    });

    $(document).on("dblclick", ".classCardContainer", function() {
        var target = $(this).attr("data-target");
        var cardid = $(this).attr("data-cardid");
        $.post("model/deleteClassCard.php", {
            target: target,
            cardid: cardid
        });
        $(this).css("display", "none");
        recoreAlert("Removed", 1);
    });



});