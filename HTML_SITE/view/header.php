<?php

$image='';
$userId;
$userName='';
if(isset($_SESSION['image'])){
    $image=$_SESSION['image']; // get current user image.
}
if(isset($_SESSION['userId'])){
    $userId=$_SESSION['userId'];
} // set sesson variable user Id.
if(isset($_SESSION['name'])){
    $userName=$_SESSION['name'];
} // set sessin variable user name.


if(isset($_POST['logout'])){
    // remove all session variables
    session_unset();
    // destroy the session
    session_destroy();
    header("Location: /login");
}

if(isset($_POST['search'])){
    $srcItem=$_POST['search'];
    $searchData=$connect->prepare("SELECT * FROM `tb_user_info` WHERE sur_name like '$srcItem%'");
    $searchData->execute();
    $searchDataList=$searchData->fetchAll(PDO::FETCH_OBJ);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $pageName;?></title>
    <link rel="stylesheet" href="./public/bootstrap.min.css">
    <link rel="stylesheet" href="./public/profile-css.css">
    <link rel="stylesheet" href="./public/view.css">
    <link rel="stylesheet" href="./public/ac-panel.css">
    <link rel="stylesheet" href="./public/chat.css">
    <link href="./public/font-awesome.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="/deshboard">
            <h3>LookBook</h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02"
            aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Chat <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="\notification">Notification</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-md-0" method="POST" action="" enctype="multipart/form-data">
                <input class="form-control mr-5" type="text" name='search' placeholder="Search" style="margin-right: 10px;">
                <img src="./image/avatar.png" class="rounded-circle mx-auto d-block" id="main-head-pro-icon" alt="...">
                <button class="btn btn-dark" onclick="" style="font-size: 14px; text-align: center;">
                    <?php echo $userName; ?>
                </button>
            </form>
            
            <form class="form-inline my-2 my-md-0" method="POST" action="" enctype="multipart/form-data">
                <button type='submit' class="btn btn-dark border ml-2" onclick="" name='logout' style="font-size: 14px; text-align: center;">Logout</button>
            </form>

        </div>
    </nav>

<?php // get current active id

require './functions/profile.php';
require './database/dbConnect.php';

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