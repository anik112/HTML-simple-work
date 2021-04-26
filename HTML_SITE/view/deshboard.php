
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
    <div class="col-sm-8" id="mid-size">

        <div id="frm-deshboard">
            <div class="card" id="1">
                <div class="card-header">
                    <h5>Desh Board</h5>
                </div>
                <div class="card-body">

                    <!-- discribe all data -->
                    <?php 

                $sql="SELECT * FROM `tb_posts` ORDER BY id DESC;";
                $getData = $connect->prepare($sql);
                $getData->execute();
                $publicPosts=$getData->fetchAll(PDO::FETCH_OBJ);

                $comId=1;
                foreach($publicPosts as $post): 
                // get comment from comment table
                $getComments=getDataUsingOrderAndId($connect,'`tb_comments_list`',$post->id,'post_id');
                $commentCount=0;
                $likeCount=0;

                $sqlgetcomment="SELECT count(id) as cunt FROM `tb_comments_list` WHERE post_id=$post->id";
                $inserData=$connect->prepare($sqlgetcomment);
                $inserData->execute();
                $commentCount=$inserData->fetchAll(PDO::FETCH_OBJ);

                $sqlgetlike="SELECT likes FROM `tb_posts` WHERE id=$post->id";
                $updateData=$connect->prepare($sqlgetlike);
                $updateData->execute();
                $likeCount=$updateData->fetchAll(PDO::FETCH_OBJ);

                if(isset($_POST["commentds$post->id"])){
                    if(isset($_POST["comment-content"])){
                        $comment_content=$_POST["comment-content"];
                    }
                    
                if($comment_content!=null){
                        $sqlInsertComment="INSERT INTO `tb_comments_list`(`post_id`, `user_id`, `user_name`, `content`) VALUES ($post->id,$activeId,'$userName','$comment_content')";
                        $inserData=$connect->prepare($sqlInsertComment);
                        $inserData->execute() or die("Not insert");
                        header("Location: /deshboard");
                }
                }

                $updateData=$connect->prepare("SELECT `user_id`, `user_name` FROM `tb_likes_list` WHERE post_id=$post->id");
                $updateData->execute();
                $sqlgetlikesList=$updateData->fetchAll(PDO::FETCH_OBJ);

                $showLove=0;
                foreach($sqlgetlikesList as $lk){
                    if(($lk->user_id)==$userId){
                      $showLove=1;
                      break;
                    }else{
                      $showLove=0;
                    }
                }

                if(isset($_POST["like$post->id"])){
                    $inserData=$connect->prepare("INSERT INTO `tb_likes_list` (`post_id`, `user_id`, `user_name`) VALUES ($post->id,$userId,'$userName')");
                    $inserData->execute() or die("Not insert");
                    header("Location: /deshboard");
                }
            ?>

                    <div class="card my-3">
                        <div class="card-header" id="post-head">
                            <img src="./image/avatar.png" class="rounded-circle mx-auto d-block" id="post-head-pro-img"
                                alt="...">
                            <div class="resizer">
                                <h3 id="post-aut-name">
                                    <?php echo $post->user_name; ?>
                                </h3>
                            </div>
                        </div>
                        <p style="padding: 5px; margin: 5px;">
                            <?php echo $post->content; ?>
                        </p>
                        <?php if($post->imsge != ""):?>
                        <div class="card-body border" id="post-body">
                            <img src="<?php echo $post->imsge; ?>" alt="<?php echo $post->imsge; ?>" srcset=""
                                id="post-image">
                        </div>
                        <?php endif; ?>
                        <!-- Post box Footer -->
                        <div class="card-footer">
                            <form class="" method="POST" action="" enctype="multipart/form-data">
                                <button name="like<?php echo $post->id;?>" class="btn btn-light"
                                    onclick="changeLoveIconInPost('post-love-icon<?php echo $comId;?>')"
                                    style="float: left; padding: 2px; margin: 2px;" id="btn-post-love">
                                    <?php if($showLove==1): ?>
                                    <img src="./image/love-active.png" alt="" srcset="" class="post-love-icon"
                                        id="post-love-icon<?php echo $comId;?>">
                                    <?php endif; ?>
                                    <?php if($showLove==0): ?>
                                    <img src="./image/love-inactive.png" alt="" srcset="" class="post-love-icon"
                                        id="post-love-icon<?php echo $comId;?>">
                                    <?php endif; ?>
                                    <?php echo $updateData->rowCount(); ?> Love this
                                </button>
                            </form>

                            <button class="btn btn-light" onclick="toggleBtn('comments<?php echo $comId; ?>')"
                                style="float: right; padding: 2px; margin: 2px;">
                                <?php echo $commentCount[0]->cunt;?> Comments
                                <img src="./image/comment.png" alt="" srcset="" id="post-comment-icon">
                            </button>
                        </div>

                        <!-- Comment section -->
                        <div class="comments" id="comments<?php echo $comId;?>" style="display: none;">

                            <div class="break-line"></div>
                            <form class="border rounded border-primary p-4" method="POST" action=""
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <textarea name="comment-content" id="comment-content" rows="2"
                                        placeholder="Type content" class="form-control p-2"></textarea>
                                </div>
                                <button type="submit" name="commentds<?php echo $post->id;?>" class="btn btn-primary"
                                    style="width: 200px">Comment</button>
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
                                        <p id="post-aut-name">
                                            <?php echo $comment->user_name; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-body" style="margin: 0px; padding: 2px;">
                                    <p>
                                        <?=$comment->content;?>
                                    </p>
                                </div>
                            </div>
                            <?php $commentCount++; endforeach;?>
                            <!--- End of cpmments -->
                        </div>
                    </div>
                    <?php $comId++; endforeach; ?>

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
                        <img src="<?php echo $fnds->image_url;?>" class="rounded-circle mx-auto d-block mx-3"
                            id="small-head-pro-img" alt="...">
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php require './view/footer.php'; ?>