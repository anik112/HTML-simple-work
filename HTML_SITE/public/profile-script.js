var check=0;
var checkCreatePost=0;

window.onload = function(){
    //document.getElementById("comments").style.display="none";
    document.getElementById("frm-friends").style.display="none";
    document.getElementById("show-create-post").style.display="none";
    document.getElementById("frm-posts").style.display="none";
    document.getElementById("frm-photos").style.display="none";
    document.getElementById("frm-preregistration").style.display="none";
}

function showDiv(id){
    document.getElementById(id).style.display="block";
}

function togleBtnCreatePost(id){
    if(checkCreatePost==0){
        document.getElementById(id).style.display="block";
        checkCreatePost=1;
    }else if(checkCreatePost==1){
        document.getElementById(id).style.display="none";
        checkCreatePost=0;
    }
}

function toggleBtn(id){
    if(check==0){
        document.getElementById(id).style.display="block";
        check=1;
    }else if(check==1){
        document.getElementById(id).style.display="none";
        check=0;
    }
}

function hideDiv(id){
    document.getElementById(id).style.display="none";
}

function showPosts(){
    document.getElementById("frm-posts").style.display="block";
    document.getElementById("frm-deshboard").style.display="none";
    document.getElementById("frm-friends").style.display="none";
    document.getElementById("frm-photos").style.display="none";
    document.getElementById("frm-preregistration").style.display="none";
}

function showFrinds(){
    document.getElementById("frm-friends").style.display="block";
    document.getElementById("frm-deshboard").style.display="none";
    document.getElementById("frm-posts").style.display="none";
    document.getElementById("frm-photos").style.display="none";
    document.getElementById("frm-preregistration").style.display="none";
}

function showPhotos(){
    document.getElementById("frm-friends").style.display="none";
    document.getElementById("frm-deshboard").style.display="none";
    document.getElementById("frm-posts").style.display="none";
    document.getElementById("frm-photos").style.display="block";
    document.getElementById("frm-preregistration").style.display="none";
}

function showPreregistration(){
    document.getElementById("frm-friends").style.display="none";
    document.getElementById("frm-deshboard").style.display="none";
    document.getElementById("frm-posts").style.display="none";
    document.getElementById("frm-photos").style.display="none";
    document.getElementById("frm-preregistration").style.display="block";
}


function changeLoveIconInPost(id){
    document.getElementById(id).src="../image/love-active.png";
    
    // .innerHTML='<img src="love-active.png" alt="" srcset="" id="post-love-icon">';
}