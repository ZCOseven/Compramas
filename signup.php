<?php

require 'model/database.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validar correo electrónico
  if (!empty ($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    // Validar contraseña
    if (!empty ($_POST['password']) && !empty ($_POST['confirm_password']) && ($_POST['password'] == $_POST['confirm_password'])) {
      $sql = "INSERT INTO users (email, password, nombre, telefono) VALUES (:email, :password, :nombre, :telefono)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':email', $_POST['email']);
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $stmt->bindParam(':password', $password);
      $stmt->bindParam(':nombre', $_POST['nombre']);
      $stmt->bindParam(':telefono', $_POST['telefono']);

      if ($stmt->execute()) {
        $message = 'Nuevo usuario creado exitosamente';
      } else {
        $message = 'Lo sentimos, debe haber habido un problema al crear tu cuenta.';
      }
    } else {
      $message = 'Las contraseñas no coinciden';
    }
  } else {
    $message = 'El correo electrónico no tiene un formato válido';
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>SignUp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/4ab0829245.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/css/login.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<style>
  #telefonoError {
    font-size: 12px;

  }

  @keyframes floatUpDown {
    0%, 100% {
      transform: translateY(0);
    }
    50% {
      transform: translateY(-5%);
    }
  }
</style>

<body>

  <?php if (!empty ($message)): ?>
    <div
      class="alert alert-<?php echo ($message === 'Nuevo usuario creado exitosamente') ? 'success' : 'danger'; ?> alert-dismissible fade show"
      role="alert">
      <?php echo $message; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>


  <div data-aos="fade-up" data-aos-duration="2000" class="wrapper">
    <div class="container main">
      <div class="row">
        <div class="col-md-6 side-image" style="position: relative; ">
          <img src="images/img3.png" alt="" style="position: absolute; animation: floatUpDown 8s infinite;">
        </div>
        <div class="col-md-6 right">

          <div class="input-box">
            <form class="mx-auto" action="signup.php" method="POST" id="myForm">
              <header>Crear cuenta</header>

              <div class="input-field">
                <input type="text" class="input" id="nombre" required="" autocomplete="off" name="nombre" >
                <label for="email">Nombre</label>



              </div>
              <div class="input-field">
                <input type="email" class="input" id="email" required="" autocomplete="off" name="email">
                <label for="email">Email</label>
                <span id="emailError" class="text-danger"></span>
              </div>

              <div class="input-field">
                <input type="phone" class="input" id="telefono" required="" autocomplete="off" name="telefono">
                <label for="telefono">Teléfono</label>
                <span id="telefonoError" class="text-danger"></span>
              </div>

              <div class="input-field">
                <input type="password" class="input" id="pass" required="" name="password">
                <label for="pass">Contraseña</label>

              </div>
              <div class="input-field">
                <input type="password" class="input" id="pass" required="" name="confirm_password">
                <label for="pass">Confirmar contraseña</label>
              </div>

              <div class="input-field">

                <input type="submit" class="submit" value="Crear">
              </div>
              <div class="signin">
                <span>Ya tienes una cuenta? <a href="login.php">Iniciar sesión</a></span>
              </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <!-- duracion de la alerta -->
  <script>
    setTimeout(function () {
      document.querySelector('.alert').remove();
    }, 3000); 
  </script>




  <script>
    document.getElementById('myForm').addEventListener('submit', function (event) {
      var telefonoInput = document.getElementById('telefono');
      var telefonoError = document.getElementById('telefonoError');
      var telefono = telefonoInput.value.trim();

      // Verificar si el teléfono tiene nueve dígitos y no contiene letras
      if (telefono.length !== 9 || isNaN(telefono)) {
        telefonoError.textContent = 'El teléfono debe tener 9 números sin letras.';
        event.preventDefault(); // Evitar que el formulario se envíe si hay un error
      } else {
        telefonoError.textContent = ''; // Limpiar el mensaje de error si es válido
      }
    });
  </script>

  <script>
    document.getElementById('myForm').addEventListener('submit', function (event) {
      var emailInput = document.getElementById('email');
      var emailError = document.getElementById('emailError');
      var email = emailInput.value.trim();
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      // Verificar si el correo electrónico tiene un formato válido
      if (!emailRegex.test(email)) {
        emailError.textContent = 'El correo electrónico no tiene un formato válido.';
        event.preventDefault(); // Evitar que el formulario se envíe si hay un error
      } else {
        emailError.textContent = ''; // Limpiar el mensaje de error si es válido
      }
    });
  </script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>

</html>