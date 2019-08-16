$(document).ready(function() {



    $(document).on("click", ".addNewProject", function() {
        $(this).toggleClass("addBtnImgRotate");
        $(".addNewProjectForm").toggle();
    });


    //create New Project
    $(document).on("click", ".createProjectBtn", function() {
        var projectName = $(".addNewProjectName").val();
        var projectDate = $(".addNewProjectDate").val();
        var projectDescription = $(".addNewProjectDescription").val();
        $.post("model/createNewProject.php", {
            projectName: projectName,
            projectDate: projectDate,
            projectDescription: projectDescription
        }, function(data, status) {
            //dosomething
        });
        $(".projectListContainer").load("model/getProjectsList.php");
        $(".addNewProjectForm").toggle();
        $(".addNewProject").toggleClass("addBtnImgRotate");
    });


    //view project detail
    $(document).on("click", ".eachProjectContainer", function() {
        var projectid = $(this).attr("data-projectid");
        $(".thisProjectContainer").load("model/getProjectDetail.php", {
            projectid: projectid
        });
        if ($(window).width() < 767) {
            $(".projectListContainer").css("display", "none");
            $(".thisProjectContainer").css("display", "flex");
        }
    });

    $(document).on("click", ".hideProjectDetailinMobile", function() {
        $(".projectListContainer").css("display", "flex");
        $(".thisProjectContainer").css("display", "none");
    });

    //get main task status
    function getMainTask(taskid) {
        var target = $(".id" + taskid);
        target.load("model/getptaskstatus.php", {
            taskid: taskid
        });
    }

    //getProject Prograss Bar
    function projectPrograss(projectid) {
        $('.projectPrograssBarContainer').load('model/projectPrograss.php', {
            projectid: projectid
        });
    }

    //check done tasks
    $(document).on("click", ".projectTaskControl", function() {
        var taskid = $(this).attr("data-taskid");
        var projectid = $(this).attr("data-projectid");
        if ($(this).hasClass("checkable")) {
            if ($(this).hasClass("checked")) {
                $(this).removeClass("checked");
                $(this).attr("src", "assets/icons/beforeCheck.png");
                var todo = "uncheck";
                $.post("model/checkptask.php", {
                    taskid: taskid,
                    todo: todo
                }, function(data, status) {
                    //do someting
                });
            } else {
                $(this).addClass("checked");
                $(this).attr("src", "assets/icons/afterCheck.png");
                var todo = "check";
                $.post("model/checkptask.php", {
                    taskid: taskid,
                    todo: todo
                }, function(data, status) {
                    //do something
                });
            }
            projectPrograss(projectid);
        } else {
            if ($(this).hasClass("checked")) {
                alert("Uncheck sub tasks");
            } else {
                alert("Finish All Tasks");
            }
        }

    });


    //check sub task
    $(document).on("click", ".subTaskControl", function() {
        var subTaskid = $(this).attr("data-subTaskid");
        var taskid = $(this).attr("data-taskid");
        var projectid = $(this).attr("data-projectid");
        if ($(this).hasClass("checked")) {
            $(this).removeClass("checked");
            $(this).attr("src", "assets/icons/beforeCheck.png");
            var todo = "uncheck";
            $.post("model/checksubtask.php", {
                subTaskid: subTaskid,
                todo: todo
            }, function(data, status) {
                //dosomething
            });
        } else {
            $(this).attr("src", "assets/icons/afterCheck.png");
            $(this).addClass("checked");
            var todo = "check";
            $.post("model/checksubtask.php", {
                subTaskid: subTaskid,
                todo: todo
            }, function(data, status) {
                //dosomething
            });
        }
        getMainTask(taskid);
        projectPrograss(projectid);
    });


    //show add new subtask box
    $(document).on("click", ".showAddSubTaskInput", function() {
        var taskid = $(this).attr("data-taskid");
        if ($(this).hasClass("showing")) {
            $(".addSubTaskbox" + taskid).css("display", "none");
            $(this).removeClass("showing");
            $(this).css("transform", "rotate(0deg)");
        } else {
            $(".addSubTaskbox" + taskid).css("display", "flex");
            $(this).addClass("showing");
            $(this).css("transform", "rotate(45deg)");
        }
    });

    //add new sub task
    $(document).on("click", ".addNewSubTaskBtn", function() {
        var ptaskid = $(this).attr("data-subtaskid");
        var projectid = $(this).attr("data-projectid");
        var newtaskText = $(".addNewSubTaskBox" + ptaskid).val();
        if (newtaskText != "") {
            $.post("model/addNewSubTask.php", {
                ptaskid: ptaskid,
                projectid: projectid,
                newtaskText: newtaskText
            }, function(data, status) {
                //do some thing
            });

            //reloat the whole project detail
            $(".thisProjectContainer").load("model/getProjectDetail.php", {
                projectid: projectid
            });
            projectPrograss(projectid);
        } else {
            alert("Empty");
        }

    });


    //add new task
    $(document).on("click", ".addNewTaskBtn", function() {
        var projectid = $(this).attr("data-projectid");
        var newTaskText = $(".addTaskTextFor" + projectid).val();
        if (newTaskText != "") {
            $.post("model/addNewPTask.php", {
                projectid: projectid,
                newTaskText: newTaskText
            }, function(data, status) {
                //do something
            });

            //reloat the whole project detail
            $(".thisProjectContainer").load("model/getProjectDetail.php", {
                projectid: projectid
            });
            projectPrograss(projectid);
        } else {
            alert("Empty");
        }

    });

    $(document).on("click", function(e) {
        var text = $(".showDeleteTaskBox");
        var deleteBtn = $(".delTaskBtnBox");
        if (text.is(e.target) || deleteBtn.is(e.target)) {
            deleteBtn.css("display", "block");
        } else {
            deleteBtn.css("display", "none");
        }
    });


    //show deleteTaskbox
    $(document).on("click", ".showDeleteTaskBox", function(e) {
        var x = e.pageX;
        var y = e.pageY;
        var deleteBtn = $(".delTaskBtnBox");
        deleteBtn.css("top", y + "px");
        deleteBtn.css("left", x + "px");

        if ($(this).hasClass("projectTaskText")) {
            var taskid = $(this).attr("data-taskid");
            deleteBtn.attr("data-id", taskid);
            deleteBtn.attr("data-target", "task");
        } else if ($(this).hasClass("subTaskText")) {
            var subtaskid = $(this).attr("data-subtaskid");
            deleteBtn.attr("data-id", subtaskid);
            deleteBtn.attr("data-target", "subtask");
        }
    });

    $(document).on("click", ".delTaskBtnBox", function() {
        var projectid = $(this).attr("data-projectid");
        var id = $(this).attr("data-id");
        var target = $(this).attr("data-target");
        $.post("model/delptask.php", {
            id: id,
            target: target
        }, function(data, status) {
            //do something
        });
        $(".thisProjectContainer").load("model/getProjectDetail.php", {
            projectid: projectid
        });
    });

    $(".Utime_main_body").on("scroll", function() {
        $(".delTaskBtnBox").css("display", "none");
    });

    //show project controls 
    $(document).on("click", ".projectInfoBtn", function(e) {
        var y = e.pageY;
        var x = e.pageX;
        var controller = $(".projectControlContainer");
        controller.css("left", x + "px");
        controller.css("top", y + "px");
        controller.toggle();

    });

    $(".Utime_main_body").on("scroll", function() {
        $(".projectControlContainer").css("display", "none");
    });

    $(document).on("click", ".finishProjectBtn", function() {
        var projectid = $(this).attr("data-projectid");
        var status = 1;
        if ($(".projectProjectBarData").attr("data-projectPrograss") == 100) {
            $.post("model/updateProjectStatus.php", {
                projectid: projectid,
                status: status
            }, function(data, status) {
                //dosomething
            });
        } else {
            alert("not finished yet");
        }
        $(".projectListContainer").load("model/getProjectsList.php");
        $(".projectControlContainer").css("display", "none");
        $(".thisProjectContainer").load("model/getProjectDetail.php", {
            projectid: projectid
        });
    });

    $(document).on("click", ".closeProjectBtn", function() {
        var projectid = $(this).attr("data-projectid");
        var status = 2;
        $.post("model/updateProjectStatus.php", {
            projectid: projectid,
            status: status
        }, function(data, status) {
            //dosomething
        });
        $(".projectListContainer").load("model/getProjectsList.php");
        $(".projectControlContainer").css("display", "none");
        $(".thisProjectContainer").load("model/getProjectDetail.php", {
            projectid: projectid
        });
    });

    $(document).on("click", ".upDateProject", function() {
        var projectid = $(this).attr("data-projectid");
        var status = 0;
        $.post("model/updateProjectStatus.php", {
            projectid: projectid,
            status: status
        }, function(data, status) {
            //dosomething
        });
        $(".projectListContainer").load("model/getProjectsList.php");
        $(".projectControlContainer").css("display", "none");
        $(".thisProjectContainer").load("model/getProjectDetail.php", {
            projectid: projectid
        });
    });

    //delete project
    $(document).on("click", ".delProjectBtn", function() {
        var projectid = $(".addNewTaskBtn").attr("data-projectid");
        $.post("model/deleteProject.php", {
            projectid: projectid,
        }, function(data, status) {
            //dosomething
        });
        $(".projectListContainer").load("model/getProjectsList.php");
        $(".projectControlContainer").css("display", "none");
        $(".thisProjectContainer").load("model/getProjectDetail.php", {
            projectid: projectid
        });
    });

});