// var person = {
//   name: 'razib',
//   email: 'razib@gmail.com',
//   nameNemail: function () {
//     return 'hello world';
//   }
// }

// person.name // razib
// person['name'] //razib
// person.email // razib@gmail.com
// person.nameNemail() // hello world 

// document.body 
// document.getElementById();

var a = document.getElementsByTagName('a');
for(var i = 0; i < a.length; i++) {
  a[i].style.color = 'red';
  a[i].style.fontSize = '40px';
}