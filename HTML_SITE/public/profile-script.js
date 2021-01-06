var check=0;
var checkCreatePost=0;
var counter=0;

window.onload = function(){
    //document.getElementById("comments").style.display="none";
    document.getElementById("show-create-post").style.display="none";
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

function changeLoveIconInPost(id){
    document.getElementById(id).src="../image/love-active.png";
    counter++;
    // .innerHTML='<img src="love-active.png" alt="" srcset="" id="post-love-icon">';
}