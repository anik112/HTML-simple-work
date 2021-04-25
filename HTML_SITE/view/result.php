

<?php
require './view/header.php';
require './view/pofile/header-part.php';

$sqlCourse="SELECT `course_id`, `course_name`, `credits` FROM `tb_coures_info`";
$getCourse=$connect->prepare($sqlCourse);
$getCourse->execute();
$getCourses=$getCourse->fetchAll(PDO::FETCH_OBJ);


?>


<div class="row" id="frm-main">

    <!-- Left section of this screeen -->
    <div class="col-sm-2" id="left-side">
        <div class="card">
            <div class="card-header">About Me:</div>
            <div class='card-body'>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/account.png" alt="name" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$sur_name.' [ '.$nik_name.' ]'; $sur_name=null;?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/mail.png" alt="mail" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$email; $email=null;?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/phone-contact.png" alt="number" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$mobile; $mobile=null;?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/gender.png" alt="gender" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$gender; $gender=null;?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/birthday-reminder.png" alt="date Of birth" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$birthday; $birthday=null;?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/location.png" alt="current city" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$current_city; $current_city=null;?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/house.png" alt="home town" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$home_town; $home_town=null;?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/point-of-interest.png" alt="interest" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$interested_in; $interested_in=null;?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/language.png" alt="language" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$languages; $languages=null;?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/care.png" alt="relationship" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$relationship; $relationship=null;?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/street-name.png" alt="user name" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$user_name; $user_name=null;?>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="col-sm-8" id="mid-size">

    <div class="card">
        <?php 
        $runingSemester=0;
        $studentId='';
        $totalCraditCompleted=0;

        $getTakenUserDoc=$connect->prepare("SELECT `sur_name`, `nick_name`, `runing_semester`, `student_id` FROM `tb_user_info` WHERE id=$activeId");
        $getTakenUserDoc->execute();
        $getTakenUserDocument=$getTakenUserDoc->fetchAll(PDO::FETCH_OBJ);
        foreach($getTakenUserDocument as $c){
            $runingSemester=$c->runing_semester;
            $studentId=$c->student_id;
        }


        $getCredit=$connect->prepare("SELECT sum(`credits`) as credits FROM `tb_compltd_semester` WHERE semester=$runingSemester and studentID=$studentId;");
        $getCredit->execute();
        $getCredits=$getCredit->fetchAll(PDO::FETCH_OBJ);
        foreach($getCredits as $c){
            $totalCraditCompleted=$c->credits;
        }


        $numberOfCraditBeforThisSemester=0;
        $getBeforCredit=$connect->prepare("SELECT sum(`credits`) as credits FROM `tb_compltd_semester` WHERE semester!=$runingSemester and studentID=$studentId;");
        $getBeforCredit->execute();
        $getBeforCredits=$getBeforCredit->fetchAll(PDO::FETCH_OBJ);
        foreach($getBeforCredits as $c){
            $numberOfCraditBeforThisSemester=$c->credits;
        }


        $numberOfCourse=0;
        $getNumberOfCourse=$connect->prepare("SELECT count(`course`) as credits FROM `tb_compltd_semester` WHERE semester=$runingSemester and studentID=$studentId;");
        $getNumberOfCourse->execute();
        $getNumberOfCourses=$getNumberOfCourse->fetchAll(PDO::FETCH_OBJ);
        foreach($getNumberOfCourses as $c){
            $numberOfCourse=$c->credits;
        }

        ?>

        <div class="card-header" style="text-align: center;"><h4>Result History</h4></div>
        <div class="card-body">
            <h5>Semester: <?php echo $runingSemester;?></h5>
            <h5>Student: <?php echo $userName;?> (<?php echo $studentId; ?>)</h5>
            <h5>Adviser: <?php echo 'Anik' ?></h5>
            <hr class="style2">
            <h5>CGPA: <?php  ?></h5>
            <h5>Total Credit Hours Completed: <?php echo $totalCraditCompleted; ?></h5>
            <h5>Number of Courses Completed Before This Semester: <?php echo $numberOfCraditBeforThisSemester; ?></h5>
            <h5>Number of Courses Completed in This Semester: <?php echo '0'; ?></h5>
            <h5>Total Number of Courses Completed: <?php echo $numberOfCourse;  ?></h5>
        </div>
    </div>


    <div class="card mt-3">
        <div class="card-header" style="text-align: center;"><h4>Semester-wise GPA</h4></div>
        <div class="card-body">
        <table class="table" style='background-color: rgba(255, 255, 255, 0.3);'>
            <thead>
                <tr>
                    <th scope="col">Semester</th>
                    <th scope="col">Credit Hours Completed</th>
                    <th scope="col">GPA</th>
                    <th scope="col">CGPA</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $getSemesterWiseData=$connect->prepare("SELECT `semester`, sum(`cgpa`) as gpa, count(`course`) as sumCourse, sum(`cradit`) as sumCadits FROM `tb_studied_info` 
                                                    WHERE  student=$studentId group by semester;");
            $getSemesterWiseData->execute();
            $getSemesterWiseDatas=$getSemesterWiseData->fetchAll(PDO::FETCH_OBJ);
            
            foreach($getSemesterWiseDatas as $c):
            ?>
               <tr>
                    <th scope="row">
                        <?php echo $c->semester;?>
                    </th>
                    <td>
                        <?php echo $c->sumCadits;?>
                    </td>
                    <td>
                        <?php echo $c->gpa;?>
                    </td>
                    <td>
                        <?php echo $c->gpa;?>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    </div>

    <!---------------------------------------------->

    <table class="table" style='background-color: rgba(255, 255, 255, 0.3);'>
            <h2 class="mt-3">Result of completed/registered courses</h2>
            <thead>
                <tr>
                    <th scope="col">Semester</th>
                    <th scope="col">Course</th>
                    <th scope="col">Course Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Credit</th>
                    <th scope="col">Result</th>
                    <th scope="col">Comments</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $getCompletedCourse=$connect->prepare("SELECT `cgpa`, `semester`, `course`, `course_title`, `type`, `result`, `cradit` FROM `tb_studied_info` 
                                                        WHERE student=$studentId order by semester desc" );
                $getCompletedCourse->execute();
                $getCompletedCourses=$getCompletedCourse->fetchAll(PDO::FETCH_OBJ);
                
                foreach($getCompletedCourses as $c):
                ?>
               <tr>
                    <th scope="row">
                        <?php echo $c->semester;?>
                    </th>
                    <td>
                        <?php echo $c->course;?>
                    </td>
                    <td>
                        <?php echo $c->course_title;?>
                    </td>
                    <td>
                        <?php echo $c->type;?>
                    </td>
                    <td>
                        <?php echo $c->cradit;?>
                    </td>
                    <td>
                        <?php echo $c->result;?>
                    </td>
                    <td>
                        <?php echo ' - ';?>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>

    </div>


<!-- Right section of this screeen -->
<div class="col-sm-2" id="right-side">
    <div class="card">
        <div class="card-header">Public Friends</div>
        <div class="card-body">
            <?php
                       $sqlFrinds="SELECT * FROM `tb_user_info`";
                       $selectFrnd=$connect->prepare($sqlFrinds);
                       $selectFrnd->execute();
                       $publicFnds=$selectFrnd->fetchAll(PDO::FETCH_OBJ);

                       foreach($publicFnds as $fnds):?>

            <div class="card m-2 bg-dark text-center text-white"
                style="width: 100%; background-color: rgba(245, 245, 245, 0.6);">
                <h5 class="card-title p-1"><a href="/frnd-profile?id=<?=$fnds->id;?>" class="text-light">
                        <?php echo $fnds->sur_name ?>
                    </a></h5>
                <div class='card-body' style="margin:2px; padding: 0px;">
                    <img src="./image/avatar.png" class="rounded-circle mx-auto d-block mx-3" id="small-head-pro-img"
                        alt="...">
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>


<?php require './view/footer.php'; ?>