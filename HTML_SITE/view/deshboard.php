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
                   }
                }
                ?>

                            <div class="card my-3">
                                <div class="card-header" id="post-head">
                                    <img src="./image/avatar.png" class="rounded-circle mx-auto d-block"
                                        id="post-head-pro-img" alt="...">
                                    <div class="resizer">
                                        <h3 id="post-aut-name"><?php echo $post->user_name; ?></h3>
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
                                        <button type="submit" name="commentds<?php echo $post->id;?>" class="btn btn-primary" style="width: 200px">Comment</button>
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
