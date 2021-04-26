
<?php 
require './view/header.php';
require './view/pofile/header-part.php';
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
<div class="col-sm-8" id="mid-size">
    <div class="card">
    <div class="card-header">Edit Profile</div>
    <div class="card-body">
        <div class='row'>
            <div class='col-lg-12'>
            <?php
            $test='NOT'; 
            if(isset($_POST['submit'])){

                $surName1=$_POST['surName'];
                $nikName1=$_POST['nikName'];
                $mobileNumber1=$_POST['mobileNumber'];
                $email1=$_POST['email'];
                $dateOfBirth1=$_POST['dateOfBirth'];
                $gender1=$_POST['gender'];
                $currentCity1=$_POST['currentCity'];
                $homeTown1=$_POST['homeTown'];
                $interstedIn1=$_POST['interstedIn'];
                $language1=$_POST['language'];
                $relatonShip1=$_POST['relationship'];
                $aboutYou1=$_POST['aboutYou'];
                $userName1=$_POST['userName'];
                $password1=$_POST['password'];
                $rePassword1=$_POST['retPassword'];
                $imageName='';

                if(($_FILES["image"]["size"]) > 0){

                    $target_dir = "../images/";
                    $target_file = $target_dir . basename($_FILES['image']['name']);
                    echo $target_file;
        
                    // Select file type
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
                    // Valid file extensions
                    $extensions_arr = array("jpg","jpeg","png","gif");
        
                    // Check extension
                    if( in_array($imageFileType,$extensions_arr) ){
                        $imageName=$target_dir.$_FILES['image']['name']; // get image name with dir
                    }
                }

                $getTakenSemesterNumber=$connect->prepare("UPDATE `tb_user_info` SET 
                `sur_name`='$surName1',
                `nick_name`='$nikName1',
                `mobile`='$mobileNumber1',
                `email`='$email1',
                `birthday`='$dateOfBirth1',
                `gender`='$gender1',
                `current_city`='$currentCity1',
                `home_town`='$homeTown1',
                `interested_in`='$interstedIn1',
                `languages`='$language1',
                `relationship`='$relatonShip1',
                `about_you`='$aboutYou1',
                `user_name`='$userName1'
                WHERE id=$activeId;");

                $getTakenSemesterNumber->execute();
                $test='OK';
            }

            if($test == 'OK'): ?>
                <div class="alert alert-success">
                    <strong>Success!</strong> Save successfull.
                </div>
            <?php endif; ?>
            <?php
            $getEditData=$connect->prepare("SELECT `id`, `sur_name`, `nick_name`, `mobile`, `email`, 
            `birthday`, `gender`, `current_city`, `home_town`, `interested_in`, `languages`, `relationship`, 
            `about_you`, `image`, `user_name`, `password`, `runing_semester`, `student_id` 
            FROM `tb_user_info` WHERE id=$activeId;");
            $getEditData->execute();
            $getEditDatas=$getEditData->fetchAll(PDO::FETCH_OBJ);

            foreach($getEditDatas as $data):
            ?>
                <!-- get all data from users & send [ ./core/registration.php ] -->
                <form method="POST" action="" enctype="multipart/form-data" >
                    <div class='float-left'>
                        <div class='form-group'>
                            <?php if(!empty($surnameError)): ?>
                                <div class="alert alert-danger">
                                <strong>Danger!</strong> <?php echo $massage["$surnameError"];?>
                                </div>
                            <?php endif; ?>
                            <input type="text" name="surName" id="" class='form-control my-2' placeholder='Sur name' required value="<?php echo $data->sur_name;?>">
                            <input type="text" name="nikName" id="" class='form-control my-2' placeholder='Nik name' value="<?php echo $data->nick_name;?>">
                            <?php if(!empty($numberError)): ?>
                            <div class="alert alert-warning">
                            <strong>Warning!</strong> <?php echo $massage["$numberError"];?>
                            </div>
                            <?php endif; ?>
                            <input type="text" name="mobileNumber" id="" class='form-control my-2' placeholder='Mobile number' required value="<?php echo $data->mobile;?>">
                            <?php if(!empty($emailError)): ?>
                                <div class="alert alert-warning">
                                <strong>Warning!</strong> <?php echo $massage["$emailError"];?>
                                </div>
                            <?php endif; ?>
                            <input type="email" name="email" id="" class='form-control my-2' placeholder='@email.com' required value="<?php echo $data->email;?>">
                            <input type="date" name="dateOfBirth" id="" class='form-control my-2' value="<?php echo $data->birthday;?>">
                            <!-- gender -->
                            <h5>Gender:</h5><div class='my-3'></div>
                            <input type="radio" name="gender" value="male" class='mx-2' <?php if(($data->gender)=='male'){echo 'checked';} ?>> Male
                            <input type="radio" name="gender" value="female " class='mx-2' <?php if(($data->gender)=='female'){echo 'checked';} ?>> Female
                            <input type="radio" name="gender" value="other" class='mx-2' <?php if(($data->gender)=='other'){echo 'checked';} ?>> Other
                            <!-- gender -->
                            <input type="text" name="currentCity" id="" class='form-control my-2' placeholder='Current city' value="<?php echo $data->current_city;?>">
                            <input type="text" name="homeTown" class='form-control my-2' placeholder='Home town' value="<?php echo $data->home_town;?>">
                            <!-- intersted in -->
                            <h5>Intersted In:</h5><div class='my-3'></div>
                            <input type="radio" name="interstedIn" value="male" class='mx-2' <?php if(($data->interested_in)=='male'){echo 'checked';} ?>> Male
                            <input type="radio" name="interstedIn" value="female" class='mx-2' <?php if(($data->interested_in)=='female'){echo 'checked';} ?> > Female
                            <input type="radio" name="interstedIn" value="other" class='mx-2' <?php if(($data->interested_in)=='other'){echo 'checked';} ?> > Other
                            <input type="radio" name="interstedIn" value="none" class='mx-2' <?php if(($data->interested_in)=='none'){echo 'checked';} ?> > None
                            <!-- language -->
                            <input type="text" name="language" class='form-control my-2' placeholder='Language' value="<?php echo $data->languages;?>">
                        </div>
                    </div>
                    <div class='float-right'>
                        <div class='form-group'>
                            <!-- relation ship -->
                            <h5>Relation Ship:</h5><div class='my-3'></div>
                            <input type="radio" name="relationship" value="married" class='mx-2' <?php if(($data->relationship)=='married'){echo 'checked';} ?>> Married
                            <input type="radio" name="relationship" value="single " class='mx-2' <?php if(($data->relationship)=='single'){echo 'checked';} ?>> Single
                            <!-- relation ship -->
                            <textarea name="aboutYou" id="" cols="30" rows="5" class='form-control my-2' placeholder='About you [ max: 180 w ]'><?php echo $data->about_you;?></textarea>
                            <!-- get image from user -->
                            <?php if(!empty($imageError)): ?>
                                <div class="alert alert-warning">
                                <strong>Warning!</strong> <?php echo $massage["$imageError"];?>
                                </div>
                            <?php endif; ?>
                            <div class="custom-file">
                                <input type="file" name='image' class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose Image file</label>
                            </div>
                            <!-- get user name -->
                            <?php if(!empty($usernameError)): ?>
                                <div class="alert alert-warning">
                                <strong>Warning!</strong> <?php echo $massage["$usernameError"];?>
                                </div>
                            <?php endif; ?>
                            <input type="text" name="userName" id="" class='form-control my-2' placeholder='User Name' value="<?php echo $data->user_name;?>">
                            <!-- get password -->
                            <?php if(!empty($passwordError)): ?>
                                <div class="alert alert-danger">
                                <strong>Danger!</strong> <?php echo $massage["$passwordError"];?>
                                </div>
                            <?php endif; ?>
                            <input type="password" name="password" id="" class='form-control my-2' placeholder='Password' value="<?php echo $data->password;?>">
                            <input type="password" name="retPassword" id="" class='form-control my-2' placeholder='Retype password'>
                        </div>
                        <div class='form-group'>
                            <input type="submit" name='submit' value="Save" class='btn btn-outline-primary px-5'>
                        </div>
                    </div>      
                </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    </div>
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
                    <img src="<?php echo $fnds->image_url;?>" class="rounded-circle mx-auto d-block mx-3" id="small-head-pro-img"
                        alt="...">
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>
<?php require './view/footer.php'; ?>