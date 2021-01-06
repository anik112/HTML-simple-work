<?php

require './database/dbConnect.php';
// require databaseFunction.php page
require './function/databaseFunction.php';


// declare variable for contain data
$id=0;
$sur_name=null;
$nik_name=null;
$mobile=null; 
$email=null;
$birthday=null;
$gender=null;
$current_city=null;
$home_town=null;
$interested_in=null;
$languages=null;
$relationship=null;
$about_you=null;
$user_image=null;
$user_name=null;
$password=null;
$posts=null;
$photos=null;

// get user data from database
$getUserData=getAllDataFromTableUsingId($connect,'tb_user_about',$userId);

// discribe array object 
foreach($getUserData as $user){
    // set data in variable
    $id=$user->id;
    $nik_name=$user->nick_name;
    $mobile=$user->mobile;
    $email=$user->email;
    $birthday=$user->birthday;
    $gender=$user->gender;
    $current_city=$user->current_city;
    $home_town=$user->home_town;
    $interested_in=$user->interested_in;
    $languages=$user->languages;
    $relationship=$user->relationship;
    $photos=$user->pro_img_link;
}


// make a function for get post data this user
function getAllPosts($connect,$userId){
    $getData = $connect->prepare("SELECT * FROM `tb_posts` WHERE user_id=$userId ORDER BY id DESC;");
    $getData->execute();

    return $getData->fetchAll(PDO::FETCH_OBJ);
}
// get this user all post
$posts=getAllPosts($connect,$userId);
?>