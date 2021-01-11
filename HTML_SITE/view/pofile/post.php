                <div id="frm-posts">
                    <div class="card" id="1">
                        <div class="card-header">
                            <button class="btn btn-dark border-light" onclick="togleBtnCreatePost('show-create-post')" style="float: right; padding: 10px; width: 200px">
                            <h5>Create Post</h5>
                            </button>
                        </div>
                        <div class="card-body">
                        
                        <?php
                        $post_content="";
                        $target_file="";
                        $file_tmp;
                        if(isset($_POST["submit"])){
                            if(isset($_POST["post-content"])){
                                $post_content=$_POST["post-content"];
                            }
                            
                            if(isset($_FILES["images"])){
                                $target_dir = "uploads/";
                                $file_tmp=$_FILES['images']['tmp_name'];
                                $file=$_FILES["images"];
                                if(strlen($file_tmp)>0){
                                    $target_file = basename($_FILES["images"]["name"]);
                                    $target_file="C:\Users\carev\Documents/$target_file";
                                    move_uploaded_file($file_tmp,$target_file);
                                }else{
                                    $target_file=""; 
                                }
                                
                            }

                            if((strlen($post_content)>0) or (strlen($file_tmp)>0)){
                                $sqlInsertPost="INSERT INTO `tb_posts`( `user_id`, `user_name`, `content`, `imsge`,  `likes`, `comment`) VALUES ($activeId,'$userName','$post_content','$target_file',0,0)";
                                $inserData= $connect->prepare($sqlInsertPost);
                                $inserData->execute();
                            }
                        }

                        ?>

                        <div id='show-create-post'>
                        <form class="border rounded border-primary p-4" method="POST" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <textarea name="post-content" id="post-content" rows="2" placeholder="Type content" class="form-control p-2"></textarea>
                                <small id="emailHelp" class="form-text text-muted">Please share the valid information.</small>
                            </div>
                            <div class="form-group">
                                <label for="ps-img">Choose Post image</label>
                                <input type="file" name="images" class="form-control-file" id="ps-img">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary" style="width: 200px">Postes</button>
                        </form>

                        </div>



                        <!-- discribe all data -->
                <?php 
                $comId=1;
                foreach($posts as $post): 
                // get comment from comment table
                $getComments=getDataUsingOrderAndId($connect,'`tb_comments_list`',$post->id,'post_id');
                $commentCount=0;
                $likeCount=0;

                $sqlgetcomment="SELECT count(id) as cunt FROM `tb_comments_list` WHERE post_id=$post->id";
                $inserData=$connect->prepare($sqlgetcomment);
                $inserData->execute();
                $commentCount=$inserData->fetchAll(PDO::FETCH_OBJ);

                $sqlgetlike="SELECT COUNT(`id`) cut FROM `tb_likes_list` WHERE post_id=$post->id";
                $updateData=$connect->prepare($sqlgetlike);
                $updateData->execute();
                $likes=$updateData->fetchAll(PDO::FETCH_OBJ);

                if(isset($_POST["comment$post->id"])){
                    if(isset($_POST["comment-content"])){
                        $comment_content=$_POST["comment-content"];
                    }
                    
                   if($comment_content!=null){
                        $inserData=$connect->prepare("INSERT INTO `tb_comments_list`(`post_id`, `user_id`, `user_name`, `content`) VALUES ($post->id,$userId,'$userName','$comment_content')");
                        $inserData->execute() or die("Not insert");
                        header("Location: /profile");
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
                    header("Location: /profile");
                }
                ?>

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

                                    <form class="" method="POST" action="" enctype="multipart/form-data">

                                        <button name="like<?php echo $post->id;?>" class="btn btn-light" onclick="changeLoveIconInPost('post-love-icon<?php echo $comId;?>')"
                                            style="float: left; padding: 2px; margin: 2px;" id="btn-post-love">
                                            <?php if($showLove==1): ?>
                                            <img src="./image/love-active.png" alt="" srcset="" class="post-love-icon" id="post-love-icon<?php echo $comId;?>">
                                            <?php endif; ?>
                                            <?php if($showLove==0): ?>
                                            <img src="./image/love-inactive.png" alt="" srcset="" class="post-love-icon" id="post-love-icon<?php echo $comId;?>">
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
                    </div>

                </div>
