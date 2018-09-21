
function upparCase(a) {
    var code = a.charCodeAt(0);
    if (code <= 97) {
        return String.fromCharCode(code - 32);
    } else {
        return String.fromCharCode(code);
    }
}

var loCase = function (a) {
    var code = a.charCodeAt(0);
    if (code >= 97) {
        console.log(String.fromCharCode(code + 32));
    } else {
        console.log(String.fromCharCode(code));
    }
}




function strUp() {

    var ul = "<ul>";
    var strs = document.getElementById("getText").value;
    //console.log(document.getElementById("getText").value);

    var getStr = "";
    for (var i = 0; i < strs.length; i++) {
        var asscCode = strs[i].charCodeAt(0);
        if (strs[i] === ' ') {
            getStr += ' ';
        } else {
            if (asscCode >= 97) {
                getStr += String.fromCharCode(asscCode - 32);
            } else {
                getStr += String.fromCharCode(asscCode);
            }
        }
    }

    var output = document.getElementById("output");
    var outHead='<h1>Output</h1>';
    ul += '<li>' + getStr + '</li>';
    ul += "</ul>";

    output.innerHTML = outHead+ul;
    //console.log(getStr);
}


function strLow() {
    var ul = "<ul>";
    var strs = document.getElementById("getText2").value;
    //console.log(document.getElementById("getText").value);

    var getStr = "";
    for (var i = 0; i < strs.length; i++) {
        var asscCode = strs[i].charCodeAt(0);

        if (strs[i] === ' ') {
            getStr += ' ';
        } else {
            if (asscCode < 97) {
                getStr += String.fromCharCode(asscCode + 32);
            } else {
                getStr += String.fromCharCode(asscCode);
            }
        }
    }

    var output = document.getElementById("output");
    var outHead='<h1>Output</h1>';
    ul += '<li>' + getStr + '</li>';
    ul += "</ul>";

    output.innerHTML = outHead+ul;
    //console.log(getStr); 
}


// var ual= document.getElementsByTagName("ul");




var an = document.getElementsByTagName("a");

for(var i=0; i<an.length; i++){
    an[i]= an[i].style.color = "rgb(221, 3, 3)";
    an[i]= an[i].style.fontSize = "40px";
}

function clickA(p){

    var homes = document.getElementsByTagName("a");
    var siz= homes.length;
    siz = siz-1;

    switch(p){
        case 1:
        while(siz > -1){
            if(siz == 0){
                homes[0] = homes[0].style.color = "teal";
            }else{
                homes[siz] = homes[siz].style.color = "rgb(221, 3, 3)";
            }
            //console.log(siz);
            siz--;
            
        }
        break;

        case 2:
        while(siz > -1){
            if(siz == 1){
                homes[1] = homes[1].style.color = "teal";
            }else{
                homes[siz] = homes[siz].style.color = "rgb(221, 3, 3)";
            }
            //console.log(siz);
            siz--;      
        }
        break;

        
        case 3:
        while(siz > -1){
            if(siz == 2){
                homes[2] = homes[2].style.color = "teal";
            }else{
                homes[siz] = homes[siz].style.color = "rgb(221, 3, 3)";
            }
            //console.log(siz);
            siz--;      
        }
        break;

        case 4:
        while(siz > -1){
            if(siz == 3){
                homes[3] = homes[3].style.color = "teal";
            }else{
                homes[siz] = homes[siz].style.color = "rgb(221, 3, 3)";
            }
            //console.log(siz);
            siz--;      
        }
        break;
    }
    
}




function show(){
    
}