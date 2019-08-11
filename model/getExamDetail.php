<?php

    require_once("auth.php");
    require_once("db_con.php");
    require_once("../model/getuserdatas.php");
    $UTuser=$_SESSION['UTuser'];
    $UTuserid=userData($UTuser,'id');
    if(isset($_POST['examid'])){
        $examid=$_POST['examid'];
        $getQuery="SELECT * FROM utexam WHERE id='$examid' AND userid='$UTuserid'";
    }else{
        $getQuery="SELECT * FROM utexam WHERE examStatus='0' AND userid='$UTuserid' ORDER BY id DESC LIMIT 1";
    }

    $getexam=mysqli_query($con,$getQuery);
    if(mysqli_num_rows($getexam)>0){
        while($examdata=mysqli_fetch_assoc($getexam)){
            $examid=$examdata['id'];
            $examName=$examdata['examName'];
            $examStatus=$examdata['examStatus'];
            if($examStatus==0){
                $addbtn="<div data-examid='".$examid."' class='addMoreSubjectsBtn'><span>Add Subjects</span><img src='assets/icons/add.png'></div>";
            }else{
                $addbtn="";
            }
            echo "<div class='examDetailHeader'><span>".$examName."</span><img src='assets/icons/!.png'></div>";
        }

        echo "<div class='subListTaleContainer'><table data-examid='".$examid."' class='examDetailTable'>
        <th>Subject</th>
        <th>Date</th>
        <th>From Time</th>
        <th>To Time</th>
        <th>Room</th>
        <th>Chair No</th>
        <th></th>
            ";
            $getsubsQuery="SELECT * FROM utsubjects WHERE examid='$examid'";
            $getsubjects=mysqli_query($con,$getsubsQuery);
            if(mysqli_num_rows($getsubjects)>0){
                while($subject=mysqli_fetch_assoc($getsubjects)){
                    echo "<tr>";
                        echo "
                            <td>".$subject['utsubject']."</td>
                            <td>".$subject['subjectDate']."</td>
                            <td>".$subject['fromTime']."</td>
                            <td>".$subject['toTime']."</td>
                            <td>".$subject['roomNo']."</td>
                            <td>".$subject['chairNo']."</td>
                            <td><img data-subid='".$subject['id']."' src='assets/icons/delsubject.png' class='deleteThisSubjectBtn'></td>
                        ";
                    echo "</tr>";
                }
            }
            echo "</table>".$addbtn."</div>";

    }else{
        echo "no Exam";
    }

    
    

?>

<div data-examid="<?php echo $examid;  ?>" class="addExamResultBtn"><img src="assets/icons/addresult.png"><span>Add Result</span></div>