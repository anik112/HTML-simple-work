
var images = [
    "image/img2.jpg",
    "image/img3.jpg",
    "image/img4.jpg",
    "image/img5.jpg",
    "image/img1.jpg"
];

var img = document.querySelector("img");
console.log(img);

var index = 0;

function next() {
    index++;
    index = index > images.length - 1 ? 0 : index;
    img.setAttribute("src", images[index]);
}

function prev() {
    index--;
    index = index < 0 ? images.length - 1 : index;
    img.setAttribute("src", images[index]);
}

var side_show = setInterval(next, 4000);

// setTimeout(function (){
//     clearInterval(side_show);
// },10000);


$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    items: 1
});
