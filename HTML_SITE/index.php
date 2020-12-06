<?php
//require './view/pofile/profile-body.php';


// get url and trim url
$url = trim( parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/' );

// database create sassion
if($url == "dbCreate"){
    require './database/createTable.php';
}


session_start(); // Start the session.

// set all routes
$routes = [
    'deshbord' => './view/deshbord.php',
    'login' => './view/login.php',
    'profile'=> './view/pofile/profile-body.php',
    'frnd-profile'=>'./view/pofile/friends-profile.php'
];

 
$basedPage='./view/login.php';

// echo $url;

if($url == null){
    require $basedPage;
}else{
    if(isset($_SESSION['userId']) > 0 || $url == 'registration'){
        // check request url have in this routes
        if(array_key_exists($url, $routes)){
            require $routes[$url];
        }else{
            require '404error.html'; // otherwise call 404 page
        }
    }else{
        require "$basedPage"; // otherwise call based page
    }
}

if(!empty($_GET['url'])){
    $requestURL=$_GET['url'];
}

?>