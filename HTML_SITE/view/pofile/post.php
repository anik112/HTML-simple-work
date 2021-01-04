                <div id="frm-posts">
                    <div class="card" id="1">
                        <div class="card-header">
                            <button class="btn btn-dark border-light" onclick="" style="float: right; padding: 10px; width: 300px">
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
                            
<<<<<<< HEAD
                            if(isset($_FILES["images"])){
                                $target_dir = "uploads/";
                                $file_tmp=$_FILES['images']['tmp_name'];
                                $file=$_FILES["images"];
                                $target_file = basename($_FILES["images"]["name"]);
                                move_uploaded_file($file_tmp,"./images/$target_file");
=======
                            if(isset($_FILES["post-image"])){
                                $file_name=$_FILES["post-image"]["tmp_name"];
                                echo $file_name;
                                $target_dir = "../images/";
                                $file=$_FILES["post-image"];
                                echo $target_file;
>>>>>>> d9603e26af6f3951443ad266d0e60ce81905ee2a
                            }

                            $sqlInsertPost="INSERT INTO `tb_posts`( `user_id`, `user_name`, `content`, `imsge`,  `likes`, `comment`) VALUES ($activeId,'$userName','$post_content','./images/$target_file',0,0)";
                            $inserData= $connect->prepare($sqlInsertPost);
                            $inserData->execute();
                        }

                        ?>

                        <div>
                        <form class="border rounded border-primary p-4" method="POST" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <textarea name="post-content" id="post-content" rows="3" placeholder="Type content" class="form-control p-2"></textarea>
                                <small id="emailHelp" class="form-text text-muted">Please share the valid information.</small>
                            </div>
                            <div class="form-group">
                                <label for="post-image">Choose Post image</label>
                                <input type="file" name="images" class="form-control-file" id="post-image">
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

                $sqlgetcomment="SELECT COMMENT FROM `tb_posts` WHERE id=$post->id";
                $inserData=$connect->prepare($sqlgetcomment);
                $inserData->execute();
                $commentCount=$inserData->fetchAll(PDO::FETCH_OBJ);

                $sqlgetlike="SELECT likes FROM `tb_posts` WHERE id=$post->id";
                $updateData=$connect->prepare($sqlgetlike);
                $updateData->execute();
                $likeCount=$updateData->fetchAll(PDO::FETCH_OBJ);
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

                                <div class="card-body border" id="post-body">
                                    <img src="<?php echo $post->imsge; ?>" alt="<?php echo $post->imsge; ?>" srcset="" id="post-image">
                                </div>

                                <!-- Post box Footer -->
                                <div class="card-footer">
                                    <button class="btn btn-light" onclick="changeLoveIconInPost('post-love-icon<?php echo $comId;?>')"
                                        style="float: left; padding: 2px; margin: 2px;" id="btn-post-love">
                                        <img src="./image/love-inactive.png" alt="" srcset="" class="post-love-icon" id="post-love-icon<?php echo $comId;?>">
                                        <?php echo $likeCount[0]->likes; ?> Love this
                                    </button>
                                    <button class="btn btn-light" onclick="toggleBtn('comments<?php echo $comId; ?>')"
                                        style="float: right; padding: 2px; margin: 2px;">
                                        <?php echo $commentCount[0]->COMMENT;?> Comments
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
