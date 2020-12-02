                <div id="frm-posts">
                    <div class="card" id="1">
                        <div class="card-header">Posts</div>
                        <div class="card-body">

                        <!-- discribe all data -->
                <?php 
                $comId=1;
                foreach($posts as $post): 
                // get comment from comment table
                $getComments=getDataUsingOrderAndId($connect,'`tb_comments_list`',$post->id,'post_id');
                $commentCount=0;
                    ?>

                            <div class="card my-3">
                                <div class="card-header" id="post-head">
                                    <img src="./image/avatar.png" class="rounded-circle mx-auto d-block"
                                        id="post-head-pro-img" alt="...">
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
                                        <img src="./image/love-inactive.png" alt="" srcset="" class="post-love-icon" id="post-love-icon<?php echo $comId;?>">
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
