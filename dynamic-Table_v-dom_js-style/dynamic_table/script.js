var button = document.getElementById('button');
button.addEventListener('click', function () {
  // name extract 
  var name = document.getElementById('name').value;
  // create textNode for name
  var namenode = document.createTextNode(name);
  // email extract
  var email = document.getElementById('email').value;
  // create textNode for email
  var emailnode = document.createTextNode(email);
  // create td for name
  var tdname = document.createElement('td');
  // append name node to tdname
  tdname.appendChild(namenode)
  // create td for email
  var tdemail = document.createElement('td');
  // append email node to tdemail
  tdemail.appendChild(emailnode);
  // create tr element
  var tr = document.createElement('tr');
  // append tdname to tr 
  tr.appendChild(tdname)
  // append tdemail to tr 
  tr.appendChild(tdemail)
  // select table from real dom
  console.log(tr);
  var table = document.getElementById('table');
  // append tr to table
  table.appendChild(tr);
  document.getElementById('name').value = '';
  document.getElementById('email').value = '';

})