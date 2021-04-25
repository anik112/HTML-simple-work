<?php
require './view/header.php';

$adSql="SELECT * FROM `tb_user_info`";
$getData=$connect->prepare($adSql);
$getData->execute();
$getDatas=$getData->fetchAll(PDO::FETCH_OBJ);

?>




    <!-- Left section of this screeen -->
    <div class="col-sm-2" id="left-side">
        <div class="card">
            <div class="card-header">About Me:</div>
            <div class='card-body'>
            </div>
        </div>
    </div>


    <div class="col-sm-8" id="mid-size">
        <table class="table" style=' background-color: rgba(255, 255, 255,  0.5); '>
            <thead>
                <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Credits</th>
                    <th scope="col">Mandatory?</th>
                    <th scope="col">Taken?</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(isset($_POST["takenCourse"])){
                    $getSemester=$connect->prepare("SELECT `semester` FROM `tb_user_info` WHERE id=$activeId");
                    $getSemester->execute();
                    $getSemesterInfo=$getSemester->fetchAll(PDO::FETCH_OBJ);
                    foreach($getSemesterInfo as $smsInfo){
                        $semester=$smsInfo->semester;
                    }

                    if(isset($_POST["course_id"])){$cus_id=$_POST["course_id"];}
                    if(isset($_POST["course_name"])){$cus_name=$_POST["course_name"];}
                    if(isset($_POST["credits"])){$cus_crds=$_POST["credits"];}

                    if($activeId>0 && $semester>0){
                        $sqlTakeCourse="INSERT INTO `tb_preregstration`(`course_id`, `course_name`, `credits`, `mandatory`, `taken`, `adviser`, `semester`, `student`) 
                        VALUES ('$cus_id','$cus_name','$cus_crds','NO','YES','Anik',$semester,$activeId)";
                        $sqlTakeCourses=$connect->prepare($sqlTakeCourse);
                        $sqlTakeCourses->execute() or die("Not insert"); 
                    } 
                } 
                foreach($getCourses as $course):
                $getTakenCourse=$connect->prepare("SELECT count(id) cut FROM `tb_preregstration` WHERE student=$activeId AND course_id='$course->course_id'" );
                $getTakenCourse->execute();
                $getTakenCourses=$getTakenCourse->fetchAll(PDO::FETCH_OBJ);
                foreach($getTakenCourses as $c){
                    $getTakenCourse=$c->cut;
                }
            ?>
                <?php if($getTakenCourse==0): ?>
                <tr>
                    <th scope="row">
                        <?php echo $course->course_id;?>
                    </th>
                    <td>
                        <?php echo $course->course_name;?>
                    </td>
                    <td>
                        <?php echo $course->credits;?>
                    </td>
                    <td>NO</td>
                    <td>
                        <form class="" method="POST" action="" enctype="multipart/form-data">
                            <input type="hidden" id="course_id" name="course_id" value="<?php echo $course->course_id;?>">
                            <input type="hidden" id="course_name" name="course_name" value="<?php echo $course->course_name;?>">
                            <input type="hidden" id="credits" name="credits" value="<?php echo $course->credits;?>">
                            <button type="submit" name="takenCourse" class="btn btn-primary"
                                style="width: 50px">NO</button>
                        </form>
                    </td>
                </tr>
                <?php endif; ?>
                <?php endforeach;?>
            </tbody>
        </table>


        <table class="table" style='background-color: rgba(255, 255, 255, 0.3);'>
            <h2 class="mt-3">Taken Course</h2>
            <thead>
                <tr>
                    <th scope="col">Course ID</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Credits</th>
                    <th scope="col">Mandatory?</th>
                    <th scope="col">Taken?</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $getTakenCourseList=$connect->prepare("SELECT * FROM `tb_preregstration` WHERE student=$activeId" );
                $getTakenCourseList->execute();
                $getTakenCourseList=$getTakenCourseList->fetchAll(PDO::FETCH_OBJ);
                
                foreach($getTakenCourseList as $course):
                ?>
                <tr>
                    <th scope="row">
                        <?php echo $course->course_id;?>
                    </th>
                    <td>
                        <?php echo $course->course_name;?>
                    </td>
                    <td>
                        <?php echo $course->credits;?>
                    </td>
                    <td>NO</td>
                    <td>YES</td>
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