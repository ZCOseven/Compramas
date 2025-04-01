
document.getElementById("myForm").addEventListener("submit", function(event){
  var nombre = document.getElementById("nombre").value;
  var email = document.getElementById("email").value;
  var telefono = document.getElementById("telefono").value;
  var nombreError = document.getElementById("errornombre");
  var emailError = document.getElementById("errornombre");
  var telefonoError = document.getElementById("errortelef");
  
  nombreError.textContent = "";
  emailError.textContent = "";
  telefonoError.textContent = "";
  
  if(nombre === "") {
    nombreError.textContent = "Por favor ingresa tu nombre";
    event.preventDefault();
  }
  
  if(email === "") {
    emailError.textContent = "Por favor ingresa tu correo electrónico";
    event.preventDefault();
  }

  if(telefono === "") {
    telefonoError.textContent = "Por favor ingresa tu numero de telefono";
    event.preventDefault();
  }

});
