<?php
require './view/header.php';
require './view/pofile/header-part.php';
$sql="SELECT id, sur_name, gender,birthday, current_city, interested_in, image FROM tb_user_info WHERE id IN (select friends_id from tb_frends_list where user_id=$activeId)";

$getData = $connect->prepare($sql);
$getData->execute();
$dataList=$getData->fetchAll(PDO::FETCH_OBJ);

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
<!-- Middel section of this screen -->
<div class="col-sm-10" id="mid-size">

<?php

if(isset($_POST["submit-ad"])){

    if(isset($_POST['semester']) && isset($_POST['semester']) && isset($_POST['course']) && isset($_POST['course_title']) && isset($_POST['type'])
    && isset($_POST['cradit']) && isset($_POST['result']) && isset($_POST['cgpa'])){

        $studentAd=$_POST['student'];
        $semesterAd=$_POST['semester'];
        $courseAd=$_POST['course'];
        $courseTitleAd=$_POST['course_title'];
        $typeAd=$_POST['type'];
        $craditAd=(float) $_POST['cradit'];
        $resultAd=$_POST['result'];
        $cgpaAd=(float) $_POST['cgpa'];

        $insertResult="INSERT INTO `tb_studied_info`(`student`, `name`, `cgpa`, `semester`, `course`, `course_title`, `cradit`, `type`, `result`) 
                        VALUES ($studentAd,'$userName',$cgpaAd,$semesterAd,'$courseAd','$courseTitleAd', $craditAd, '$typeAd', '$resultAd')";
        $insertResults= $connect->prepare($insertResult);
        $insertResults->execute() or die('Data not insert line 145 in ad-panel');
    }
    

}

?>


<form class="border rounded border-primary p-4" method="POST" action="" enctype="multipart/form-data">

<div class="row mt-1">
<div class="col-sm-2" >
      <input type="text" class="form-control" id="student" placeholder="Student ID" name="student">
    </div>
    <div class="col-sm-1" >
      <input type="text" class="form-control" id="semester" placeholder="Semester" name="semester">
    </div>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="course" placeholder="Course" name="course">
    </div>
    <div class="col-sm-2" >
      <input type="text" class="form-control" id="course_title" placeholder="Course Title" name="course_title">
    </div>
    <div class="col-sm-1">
      <input type="text" class="form-control" id="type" placeholder="Type" name="type">
    </div>
    <div class="col-sm-1">
      <input type="text" class="form-control" id="cradit" placeholder="Cradit" name="cradit">
    </div>
    <div class="col-sm-1">
      <input type="text" class="form-control" id="cgpa" placeholder="CGPA" name="cgpa">
    </div>
    <div class="col-sm-1">
      <input type="text" class="form-control" id="result" placeholder="Result" name="result">
    </div>
  </div>

  <div class='row mt-5'>
  <div class='col'>
  <div class="form-group">
    <button type="submit" name="submit-ad" class="btn btn-primary" style="width: 200px">Save</button>
    </div>
  </div>
  </div>
</form>
</div>
</div>
<?php require './view/footer.php'; ?>