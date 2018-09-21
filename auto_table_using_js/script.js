

var i=11;

if(i !== 10){
    console.log("Hello World");
}else{
    console.log(i);
}



function add_record() {


    var name = document.getElementById("name").value;
    var city = document.getElementById("city").value;
    var number = document.getElementById("number").value;


    // console.log(name);
    // console.log(city);
    // console.log(number);

    if (name !== "" && city !== "" && number !== "") {
        var tr = document.createElement("tr");


        var td_name = document.createElement("td");
        console.log(td_name);
        var text_name = document.createTextNode(name);
        td_name.appendChild(text_name);

        var td_city = document.createElement("td");
        var text_city = document.createTextNode(city);
        td_city.appendChild(text_city);

        var td_number = document.createElement("td");
        var text_number = document.createTextNode(number);
        td_number.appendChild(text_number);



        tr.appendChild(td_name);
        tr.appendChild(td_city);
        tr.appendChild(td_number);

        // console.log(tr);
        // console.log(td_name);
        // console.log(td_city);
        // console.log(td_number);

        var tbody = document.getElementById("tbody");
        // console.log(tbody);
        tbody.appendChild(tr);

        document.getElementById("name").value = "";
        document.getElementById("city").value = "";
        document.getElementById("number").value = "";
    }else{
        alert("[ >> Please first type right information << ]");
    }




}