var check=0;

window.onload = function(){
    document.getElementById("comments").style.display="none";
    document.getElementById("frm-friends").style.display="none";
}

function showDiv(id){
    document.getElementById(id).style.display="block";
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
    document.getElementById(id).src="love-active.png";
    // .innerHTML='<img src="love-active.png" alt="" srcset="" id="post-love-icon">';
}