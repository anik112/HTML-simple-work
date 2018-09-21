

function more_show(){
    var more=document.getElementById("more-show").className = " active-button";
    var more_text=document.getElementById("more-text").className += " active-text";

    var more=document.getElementById("more-popular-show").className = "";
    var more_text=document.getElementById("most-popular-text").className = "more-text";
}

function more_popular_show(){

    var more=document.getElementById("more-show").className = "";
    var more_text=document.getElementById("more-text").className = "more-text";

    var more=document.getElementById("more-popular-show").className = "active-button";
    var more_text=document.getElementById("most-popular-text").className += " active-text";
}


function exitMainNav(){
    document.getElementById("main-nav").style.display="none";
}

function showMainNav(){
    document.getElementById("main-nav").style.display="block";
}