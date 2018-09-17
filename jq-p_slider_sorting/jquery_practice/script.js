// selector 
// changing html content 
var h1 = $('h1');
// h1.innerHTML = 'hello world'
// h1.innerHTML

h1.html(); //html content
h1.html('hello world from javascript');
h1.on('click', function () {
  alert('hello world');
});

// function hello() {
//   console.log('hello world');
// }

// var parvez = hello;

// hello();
// parvez();
// single line comment 
/*
css and js comments
*/
//hide function 

$('button.hide').on('click', function () {
  // $('p.first_paragraph').hide(300);
  // $('p.first_paragraph').fadeOut(900);
  $('p.first_paragraph').slideUp(900);
})
$("button.show").on('click', function() {
  // $('p.first_paragraph').show(300);
  // $('p.first_paragraph').fadeIn(900);
  $('p.first_paragraph').slideDown(900);
})
$('button.toggle').on("click", function () {
  // $('p.first_paragraph').toggle(900);
  // $('p.first_paragraph').slideToggle(900);
  $('p.first_paragraph').fadeToggle(900);
})




