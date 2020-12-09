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
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="/profile">
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
                    <a class="nav-link" href="#">Notification</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-md-0">
                <input class="form-control" type="text" placeholder="Search" style="margin-right: 10px;">

                <button class="btn btn-dark" onclick="" style="font-size: 14px; text-align: center;">
                    <img src="./image/avatar.png" class="rounded-circle mx-auto d-block" id="main-head-pro-icon" alt="...">
                    <?php echo $userName; ?>
                </button>
            </form>

        </div>
    </nav>