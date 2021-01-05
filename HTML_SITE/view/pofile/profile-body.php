<?php 
require './view/header.php';
require './functions/profile.php';
require './database/dbConnect.php';

// get current active id
$activeId=0;
$userName="";
if(isset($_SESSION['userId'])){$activeId=$_SESSION['userId'];}
if(isset($_SESSION['name'])){$userName=$_SESSION['name'];}

// get friend id from friendlist table
$myFrindes=getDataUsingColNameAndId($connect,'frendslist',$activeId,'user_id');

// get friend data from friend list
$frindes=getFriendsData($connect,$userId); 

// declare page titles and user image
$pageName='My Profile';

?>

<div class="continer">
        <div class="row">
            <div id="fram-cover">
                <div class="col-sm-8 border rounded" id="cover-image">
                    <img src="./image/avatar.png" class="rounded-circle mx-auto d-block" id="pro-img" alt="...">

                    <nav class="navbar navbar-expand navbar-dark bg-dark  border rounded">
                        <div class="collapse navbar-collapse" id="frm-link">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <button class="nav-link btn btn-dark"
                                        onclick="showPosts()">Posts |<span
                                            class="sr-only">(current)</span></button>
                                </li>
                                <li class="nav-item active">
                                    <button class="nav-link btn btn-dark"
                                        onclick="showFrinds()">Friends |<span
                                            class="sr-only">(current)</span></button>
                                </li>
                                <li class="nav-item active">
                                    <button class="nav-link btn btn-dark" onclick="showPhotos()">Photos |<span
                                            class="sr-only">(current)</span></button>
                                </li>
                                <li class="nav-item active">
                                    <button class="nav-link btn btn-dark" onclick="showPreregistration()">Preregistration |<span
                                            class="sr-only">(current)</span></button>
                                </li>
                                <li class="nav-item active">
                                    <button class="nav-link btn btn-dark" onclick="showDiv('frm-about')">Schedule |<span
                                            class="sr-only">(current)</span></button>
                                </li>
                                <li class="nav-item active">
                                    <button class="nav-link btn btn-dark" onclick="showDiv('frm-about')">Billing |<span
                                            class="sr-only">(current)</span></button>
                                </li>
                                <li class="nav-item active">    
                                    <button class="nav-link btn btn-dark" onclick="showDiv('frm-about')">Result |<span
                                            class="sr-only">(current)</span></button>
                                </li>
                                <li class="nav-item active">
                                    <button class="nav-link btn btn-dark" onclick="showDiv('frm-about')">Teacher Evaluation <span
                                            class="sr-only">(current)</span></button>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-sep">
                </div>
            </div> 
        </div>

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
                            <div class='col-sm-10 px-3'><?=$sur_name.' [ '.$nik_name.' ]'; $sur_name=null;?></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/mail.png" alt="mail" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'><?=$email; $email=null;?></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/phone-contact.png" alt="number" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'><?=$mobile; $mobile=null;?></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/gender.png" alt="gender" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'><?=$gender; $gender=null;?></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/birthday-reminder.png" alt="date Of birth"
                                    srcset="" style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'><?=$birthday; $birthday=null;?></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/location.png" alt="current city" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'><?=$current_city; $current_city=null;?></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/house.png" alt="home town" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'><?=$home_town; $home_town=null;?></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/point-of-interest.png" alt="interest"
                                    srcset="" style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'><?=$interested_in; $interested_in=null;?></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/language.png" alt="language" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'><?=$languages; $languages=null;?></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/care.png" alt="relationship" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'><?=$relationship; $relationship=null;?></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/street-name.png" alt="user name" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'><?=$user_name; $user_name=null;?></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

            <!-- Middel section of this screen -->
            <div class="col-sm-8" id="mid-size">

                <div id="frm-deshboard">
                    <?php require "./view/deshboard.php";?>
                </div>
                

                <div id="frm-posts">
                    <?php require "./view/pofile/post.php";?>
                </div>

                <div id="frm-friends">
                   <?php require "./view/pofile/friends.php";?>
                </div>

                <div id="frm-photos">
                    <?php require "./view/photos.php";?>
                </div>

                <div id="frm-preregistration">
                    <?php require "./view/preregistration.php";?>
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

                       <div class="card m-2 bg-dark text-center text-white" style="width: 100%; background-color: rgba(245, 245, 245, 0.6);" >
                            <h5 class="card-title p-1"><a href="/frnd-profile?id=<?=$fnds->id;?>" class="text-light"><?php echo $fnds->sur_name ?></a></h5>
                            <div class='card-body' style="margin:2px; padding: 0px;">
                            <img src="./image/avatar.png" class="rounded-circle mx-auto d-block mx-3" id="small-head-pro-img" alt="..."> 
                            </div>                        
                        </div>
                       <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php require './view/footer.php'; ?>