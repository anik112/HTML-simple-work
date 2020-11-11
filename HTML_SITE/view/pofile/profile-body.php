<?php 
require './view/header.php';
$pageName="My Profile"
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
                                        onclick="hideDiv('frm-friends'); showDiv('frm-posts')">Posts |<span
                                            class="sr-only">(current)</span></button>
                                </li>
                                <li class="nav-item active">
                                    <button class="nav-link btn btn-dark"
                                        onclick="hideDiv('frm-posts');showDiv('frm-friends')">Friends |<span
                                            class="sr-only">(current)</span></button>
                                </li>
                                <li class="nav-item active">
                                    <button class="nav-link btn btn-dark" onclick="showDiv('frm-about')">Photos |<span
                                            class="sr-only">(current)</span></button>
                                </li>
                                <li class="nav-item active">
                                    <button class="nav-link btn btn-dark" onclick="showDiv('frm-about')">Preregistration |<span
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
                    <div class="card-header">Left</div>
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam eius,
                            provident illum beatae voluptatum itaque eveniet labore.</p>
                    </div>
                </div>
            </div>

            <!-- Middel section of this screen -->
            <div class="col-sm-8" id="mid-size">
                <div id="frm-posts">
                    <div class="card" id="1">
                        <div class="card-header">Posts</div>
                        <div class="card-body">

                            <div class="card">
                                <div class="card-header" id="post-head">
                                    <img src="./image/avatar.png" class="rounded-circle mx-auto d-block"
                                        id="post-head-pro-img" alt="...">
                                    <div class="resizer">
                                        <h3 id="post-aut-name">Anik Paul</h3>
                                    </div>
                                </div>
                                <div class="card-body" id="post-body">
                                    <img src="./image/COVER.png" alt="" srcset="" id="post-image">
                                </div>

                                <!-- Post box Footer -->
                                <div class="card-footer">
                                    <button class="btn btn-light" onclick="changeLoveIconInPost('post-love-icon')"
                                        style="float: left; padding: 2px; margin: 2px;" id="btn-post-love">
                                        <img src="./image/love-inactive.png" alt="" srcset="" id="post-love-icon">
                                        12 Love this
                                    </button>
                                    <button class="btn btn-light" onclick="toggleBtn('comments')"
                                        style="float: right; padding: 2px; margin: 2px;">
                                        13 Comments
                                        <img src="./image/comment.png" alt="" srcset="" id="post-comment-icon">
                                    </button>
                                </div>

                                <!-- Comment section -->
                                <div class="comments" id="comments">
                                    <div class="break-line"></div>
                                    <!-- 1 st comment-->
                                    <div class="card" style="margin: 5px; padding: 1px;">
                                        <div class="card-header" id="post-head"
                                            style="margin: 0px; padding: 1px; height: 30px;">
                                            <img src="./image/avatar.png" class="rounded-circle mx-auto d-block"
                                                id="comment-head-pro-img" alt="...">
                                            <div class="resizer" style="height: 30px;">
                                                <p id="post-aut-name">Anik Paul</p>
                                            </div>
                                        </div>
                                        <div class="card-body" style="margin: 0px; padding: 2px;">
                                            <p>Lorem ipsum dolor sit ame
                                                t consectetur adipisicing elit. Debitis tempore, corporis modi rei
                                                ciendis, obcaecati dolores placeat expedita veritatis minima amet
                                                consectetur saepe hic vo
                                                luptatibus quos quibusdam harum volup
                                                tas deleniti reprehenderit?</p>
                                        </div>
                                    </div>

                                    <!-- 2 st comment-->
                                    <div class="card" style="margin: 5px; padding: 1px;">
                                        <div class="card-header" id="post-head"
                                            style="margin: 0px; padding: 1px; height: 30px;">
                                            <img src="./image/avatar.png" class="rounded-circle mx-auto d-block"
                                                id="comment-head-pro-img" alt="...">
                                            <div class="resizer" style="height: 30px;">
                                                <p id="post-aut-name">Anik Paul</p>
                                            </div>
                                        </div>
                                        <div class="card-body" style="margin: 0px; padding: 2px;">
                                            <p>Lorem ipsum dolor sit ame
                                                t consectetur adipisicing elit. Debitis tempore, corporis modi rei
                                                ciendis, obcaecati dolores placeat expedita veritatis minima amet
                                                consectetur saepe hic vo
                                                luptatibus quos quibusdam harum volup
                                                tas deleniti reprehenderit?</p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div id="frm-friends">
                    <div class="card">
                        <div class="card-header">Frinds</div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam eius,
                                provident illum beatae voluptatum itaque eveniet labore.
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur quisquam doloremque
                                ratione, labore culpa tenetur
                                fuga adipisci eaque quod nam voluptate harum error officia maiores magnam modi illo! In,
                                quam.</p>
                        </div>

                    </div>
                </div>

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


    <?php require './view/footer.php'; ?>