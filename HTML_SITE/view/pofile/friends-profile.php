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

$sql="SELECT `friends_id` FROM `tb_frends_list` WHERE `friends_id`=$frndID AND `user_id`=$userId";
$checkIsFrnd = $connect->prepare($sql);
$checkIsFrnd->execute();
$checkIsFrndTmp=$checkIsFrnd->fetchAll(PDO::FETCH_OBJ);
$checkIsFrnd=0;

foreach($checkIsFrndTmp as $tmp){
    $checkIsFrnd=$tmp->friends_id;
}

// inser data in pivot table
if(isset($_POST['send-fnd-req']) && $frndID>0){
    $sql="INSERT INTO `tb_frends_list`(`user_id`, `friends_id`) VALUES ($userId,$frndID)";
    $inertFndData = $connect->prepare($sql);
    $inertFndData->execute();
}


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
        <?php if($checkIsFrnd < 1): ?>
            <form action="" method="post" class="text-center">
            <button type="submit" name="send-fnd-req" class="btn btn-primary" style="width: 200px">Send Request</button>
            </form>
        <?php endif; ?>
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

    $sqlgetcomment="SELECT count(id) as cunt FROM `tb_comments_list` WHERE post_id=$post->id";
    $inserData=$connect->prepare($sqlgetcomment);
    $inserData->execute();
    $commentCount=$inserData->fetchAll(PDO::FETCH_OBJ);

    $sqlgetlike="SELECT likes FROM `tb_posts` WHERE id=$post->id";
    $updateData=$connect->prepare($sqlgetlike);
    $updateData->execute();
    $likeCount=$updateData->fetchAll(PDO::FETCH_OBJ);

    if(isset($_POST["comment$post->id"])){
        if(isset($_POST["comment-content"])){
            $comment_content=$_POST["comment-content"];
        }
        
        if($comment_content!=null){
        $sqlInsertComment="INSERT INTO `tb_comments_list`(`post_id`, `user_id`, `user_name`, `content`) VALUES ($post->id,$userId,'$userName','$comment_content')";
        $inserData=$connect->prepare($sqlInsertComment);
        $inserData->execute() or die("Not insert");
        }
    }?>

                            <div class="card my-3">
                                <div class="card-header" id="post-head">
                                    <img src="./image/avatar.png" class="rounded-circle mx-auto d-block"
                                        id="post-head-pro-img" alt="...">
                                    <div class="resizer">
                                        <h3 id="post-aut-name"><?php echo $userName; ?></h3>
                                    </div>
                                </div>
                                <p style="padding: 5px; margin: 5px;">
                                        <?php echo $post->content; ?>
                                </p>
                                <?php if($post->imsge != ""):?>
                                <div class="card-body border" id="post-body">
                                    <img src="<?php echo $post->imsge; ?>" alt="<?php echo $post->imsge; ?>" srcset="" id="post-image">
                                </div>
                                <?php endif; ?>
                                <!-- Post box Footer -->
                                <div class="card-footer">
                                    <button class="btn btn-light" onclick="changeLoveIconInPost('post-love-icon<?php echo $comId;?>')"
                                        style="float: left; padding: 2px; margin: 2px;" id="btn-post-love">
                                        <img src="./image/love-inactive.png" alt="" srcset="" class="post-love-icon" id="post-love-icon<?php echo $comId;?>">
                                        <?php echo $likeCount[0]->likes; ?> Love this
                                    </button>
                                    <button class="btn btn-light" onclick="toggleBtn('comments<?php echo $comId; ?>')"
                                        style="float: right; padding: 2px; margin: 2px;">
                                        <?php echo $commentCount[0]->cunt;?> Comments
                                        <img src="./image/comment.png" alt="" srcset="" id="post-comment-icon">
                                    </button>
                                </div>

                                <!-- Comment section -->
                                <div class="comments" id="comments<?php echo $comId;?>" style="display: none;">
                    
                                    <div class="break-line"></div>
                                    <form class="border rounded border-primary p-4" method="POST" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                        <textarea name="comment-content" id="comment-content" rows="2" placeholder="Type content" class="form-control p-2"></textarea>
                                        </div>
                                        <button type="submit" name="comment<?php echo $post->id;?>" class="btn btn-primary" style="width: 200px">Comment</button>
                                    </form>
                                    <?php
                                        foreach($getComments as $comment):
                                    ?>
                                    <!-- 1 st comment-->
                                    <div class="card" style="margin: 5px; padding: 1px;">
                                        <div class="card-header" id="post-head"
                                            style="margin: 0px; padding: 1px; height: 30px;">
                                            <img src="./image/avatar.png" class="rounded-circle mx-auto d-block"
                                                id="comment-head-pro-img" alt="...">
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
                    <div class="card-header">Public Friends</div>
                    <div class="card-body">
                       <?php
                       $sqlFrinds="SELECT * FROM `tb_user_info`";
                       $selectFrnd=$connect->prepare($sqlFrinds);
                       $selectFrnd->execute();
                       $publicFnds=$selectFrnd->fetchAll(PDO::FETCH_OBJ);

                       foreach($publicFnds as $fnds):
                       ?>

                       <div class="card bg-dark text-white m-2" style="width: 100%;">
                        <img class="card-img" src="./image/COVER.png" alt="Card image">
                            <div class="card-img-overlay">
                            <h5 class="card-title"><a href="/frnd-profile?id=<?=$fnds->id;?>" class="text-light"><?php echo $fnds->sur_name ?></a></h5>
                         </div>
                         <div class='card-body'>
                            <h6 class="m-1"><?php echo $fnds->birthday ?></h6>
                            <h6 class="m-1"><?php echo $fnds->current_city ?></h6>
                            <h6 class="m-1"><?php echo $fnds->interested_in ?></h6>
                        </div>
                        </div>
                       <?php endforeach; ?>
                    </div>
                </div>
</div>


</div>
</div>

<?php endforeach; ?>

<?php require './view/footer.php'; ?>