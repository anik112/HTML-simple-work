<?php
require './view/header.php';
require './database/dbConnect.php';
require './function/databaseFunction.php';

$frndID=0;
if(isset($_GET['id'])){
    $frndID=$_GET['id'];
}

$sql="SELECT id, sur_name, nick_name, mobile, email, birthday, gender, current_city, home_town, interested_in, languages, relationship, about_you, image FROM tb_user_info WHERE id=$frndID";
$getData = $connect->prepare($sql);
$getData->execute();
$dataList=$getData->fetchAll(PDO::FETCH_OBJ);

?>

<?php foreach($dataList as $data): ?>
    <div class="row">
        <div id="fram-cover">
            <div class="col-sm-8 border rounded" id="cover-image">
                <img src="./image/avatar.png" class="rounded-circle mx-auto d-block" id="pro-img" alt="...">
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-12">
        <h1 class="text-center"><?php echo $data->sur_name." ( ".$data->nick_name." )";?></h1>
        <h5 class="text-center"><?php echo "[ ".$data->about_you." ]";?></h5>
        </div>
    </div> 

<div class="row" id="frm-main">

<!-- Left section of this screeen -->
<div class="col-sm-2" id="left-side">
<div class="card">
<div class="card-header">About Friend:</div>
<div class='card-body'>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <div class='row'>
                <div class=''><img src="../image/icon/account.png" alt="name" srcset=""
                        style="width: 20px; hight:20px;"></div>
                <div class='col-sm-10 px-3'><?php echo ' [ '.$data->nick_name.' ]';?></div>
            </div>
        </li>
        <li class="list-group-item">
            <div class='row'>
                <div class=''><img src="../image/icon/mail.png" alt="mail" srcset=""
                        style="width: 20px; hight:20px;"></div>
                <div class='col-sm-10 px-3'><?=$data->email;?></div>
            </div>
        </li>
        <li class="list-group-item">
            <div class='row'>
                <div class=''><img src="../image/icon/phone-contact.png" alt="number" srcset=""
                        style="width: 20px; hight:20px;"></div>
                <div class='col-sm-10 px-3'><?=$data->mobile;?></div>
            </div>
        </li>
        <li class="list-group-item">
            <div class='row'>
                <div class=''><img src="../image/icon/gender.png" alt="gender" srcset=""
                        style="width: 20px; hight:20px;"></div>
                <div class='col-sm-10 px-3'><?=$data->gender;?></div>
            </div>
        </li>
        <li class="list-group-item">
            <div class='row'>
                <div class=''><img src="../image/icon/birthday-reminder.png" alt="date Of birth"
                        srcset="" style="width: 20px; hight:20px;"></div>
                <div class='col-sm-10 px-3'><?=$data->birthday;?></div>
            </div>
        </li>
        <li class="list-group-item">
            <div class='row'>
                <div class=''><img src="../image/icon/location.png" alt="current city" srcset=""
                        style="width: 20px; hight:20px;"></div>
                <div class='col-sm-10 px-3'><?=$data->current_city; ?></div>
            </div>
        </li>
        <li class="list-group-item">
            <div class='row'>
                <div class=''><img src="../image/icon/house.png" alt="home town" srcset=""
                        style="width: 20px; hight:20px;"></div>
                <div class='col-sm-10 px-3'><?=$data->home_town; ?></div>
            </div>
        </li>
        <li class="list-group-item">
            <div class='row'>
                <div class=''><img src="../image/icon/point-of-interest.png" alt="interest"
                        srcset="" style="width: 20px; hight:20px;"></div>
                <div class='col-sm-10 px-3'><?=$data->interested_in; ?></div>
            </div>
        </li>
        <li class="list-group-item">
            <div class='row'>
                <div class=''><img src="../image/icon/language.png" alt="language" srcset=""
                        style="width: 20px; hight:20px;"></div>
                <div class='col-sm-10 px-3'><?=$data->languages;?></div>
            </div>
        </li>
        <li class="list-group-item">
            <div class='row'>
                <div class=''><img src="../image/icon/care.png" alt="relationship" srcset=""
                        style="width: 20px; hight:20px;"></div>
                <div class='col-sm-10 px-3'><?=$data->relationship; ?></div>
            </div>
        </li>
        <li class="list-group-item">
            <div class='row'>
                <div class=''><img src="../image/icon/street-name.png" alt="user name" srcset=""
                        style="width: 20px; hight:20px;"></div>
                <div class='col-sm-10 px-3'><?php ?></div>
            </div>
        </li>
    </ul>
</div>
</div>
</div>

<!-- Middel section of this screen -->


<div class="col-sm-8" id="mid-size">
    <?php 
    $comId=1;
    $sql="SELECT * FROM `tb_posts` WHERE user_id=$frndID ORDER BY id DESC;";
    $getData = $connect->prepare($sql);
    $getData->execute();
    $posts=$getData->fetchAll(PDO::FETCH_OBJ);
    foreach($posts as $post): 
    // get comment from comment table
    $getComments=getDataUsingOrderAndId($connect,'`tb_comments_list`',$post->id,'post_id');
    $commentCount=0;?>

    <div class="card my-3">
        <div class="card-header" id="post-head">
            <img src="./image/avatar.png" class="rounded-circle mx-auto d-block" id="post-head-pro-img" alt="...">
            <div class="resizer">
                <h3 id="post-aut-name"><?php echo $userName; ?></h3>
            </div>
        </div>
        <div class="card-body" id="post-body">
            <p style="padding: 5px; margin:0px;">
                <?php echo $post->content; ?>
            </p>
            <img src="./image/COVER.png" alt="" srcset="" id="post-image">
        </div>

        <!-- Post box Footer -->
        <div class="card-footer">
            <button class="btn btn-light" onclick="changeLoveIconInPost('post-love-icon<?php echo $comId;?>')"
                style="float: left; padding: 2px; margin: 2px;" id="btn-post-love">
                <img src="./image/love-inactive.png" alt="" srcset="" class="post-love-icon"
                    id="post-love-icon<?php echo $comId;?>">
                12 Love this
            </button>
            <button class="btn btn-light" onclick="toggleBtn('comments<?php echo $comId; ?>')"
                style="float: right; padding: 2px; margin: 2px;">
                12 Comments
                <img src="./image/comment.png" alt="" srcset="" id="post-comment-icon">
            </button>
        </div>

        <!-- Comment section -->
        <div class="comments" id="comments<?php echo $comId;?>" style="display: none;">
            <div class="break-line"></div>
            <?php
                            foreach($getComments as $comment):
                        ?>
            <!-- 1 st comment-->
            <div class="card" style="margin: 5px; padding: 1px;">
                <div class="card-header" id="post-head" style="margin: 0px; padding: 1px; height: 30px;">
                    <img src="./image/avatar.png" class="rounded-circle mx-auto d-block" id="comment-head-pro-img"
                        alt="...">
                    <div class="resizer" style="height: 30px;">
                        <p id="post-aut-name"><?php echo $comment->user_name; ?></p>
                    </div>
                </div>
                <div class="card-body" style="margin: 0px; padding: 2px;">
                    <p><?=$comment->content;?></p>
                </div>
            </div>
            <?php $commentCount++; endforeach;?>
            <!--- End of cpmments -->
        </div>
    </div>
    <?php $comId++; endforeach; ?>

</div>

<!-- Right section of this screeen -->
<div class="col-sm-2" id="right-side">
    <div class="card">
        <div class="card-header">Right</div>
        <div class="card-body">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam eius,
                provident illum beatae voluptatum itaque eveniet labore.</p>
        </div>
    </div>
</div>


</div>
</div>

<?php endforeach; ?>

<?php require './view/footer.php'; ?>