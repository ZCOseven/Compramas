<?php
session_start();

require '../model/database.php';

if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT id, email, nombre, password FROM users WHERE id = :id');
  $records->bindParam(':id', $_SESSION['user_id']);
  if ($records->execute()) {
    $results = $records->fetch(PDO::FETCH_ASSOC);
    if ($results) {
      $user = $results;
    } else {
      echo "Datos de usuario no encontrados en la base de datos.";
    }
  } else {
    echo "Fallo en la consulta a la base de datos.";
  }
} else {
  echo "Sesión de usuario no encontrada.";
}




$sentencia = $conn->query("SELECT * FROM categoria;");
$categoria = $sentencia->fetchAll(PDO::FETCH_OBJ);
// print_r($categoria);





?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">

  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../favicon.png">

  <style>
    .titulo {
      font-size: 32px;
      font-weight: 600;
      color: #fff;
    }
  </style>

</head>

<body>
  <div class="container-scroller">
    <div class="row p-0 m-0 " id="" style="background-color: #3B5D50;">
      <div class="col-md-12 p-0 m-0">
        <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
          <div class="ps-lg-1">
            <div class="d-flex align-items-center justify-content-between">
              <p class="mb-0 font-weight-medium me-3 buy-now-text"></p>
              <a href="" target="_blank" class="btn me-2 buy-now-btn border-0"></a>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <a href=""><i class="mdi mdi-home me-3 text-white"></i></a>
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="mdi mdi-close text-white me-0"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row"
      style="background-color: #3B5D50;">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"
        style="background-color: #3B5D50;">

        <a class="navbar-brand titulo" href="panel.php" style="color:white;">Furni<span
            style="color:#899E96;">tore.</span></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg"
            alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu" style="color: white;"></span>
        </button>
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                <i class="input-group-text border-0 mdi mdi-magnify" style="color: white;"></i>
              </div>
              <input type="text" class="form-control bg-transparent border-0" placeholder="Buscar">
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link " href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="assets/images/faces/face1.jpg" alt="image">
                <span class="availability-status online"></span>
              </div>
              <div class="nav-profile-text">
                <!-- NOMBRE DEL USUARIO -->
                <p class="mb-1 text-white"><?= $user['nombre']; ?></p>
              </div>
            </a>

          </li>

          <li class="nav-item nav-logout d-none d-lg-block" style="color: white;">
            <a class="nav-link" href="panel.php">
              <i class="mdi mdi-home"></i>
            </a>
          </li>
          <li class="nav-item nav-settings d-none d-lg-block" style="color: white;">
            <a class="nav-link" href="../logout.php">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="assets/images/faces/face1.jpg" alt="profile">
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <!-- NOMBRE DE USUARIO -->
                <span class="font-weight-bold mb-2"><?= $user['nombre']; ?></span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="panel.php">
              <span class="menu-title">Añadir Categoria</span>
              <i class="mdi  mdi-view-grid menu-icon"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="addproduct.php">
              <span class="menu-title">Añadir Producto</span>
              <i class="mdi  mdi-library-plus menu-icon"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="product.php">
              <span class="menu-title">Gestionar Productos</span>
              <i class="mdi mdi-cube-send menu-icon"></i>
            </a>
          </li>



          <li class="nav-item">
            <a class="nav-link" href="category.php">
              <span class="menu-title">Gestionar Categorias</span>
              <i class="mdi mdi-shape-plus menu-icon"></i>
            </a>
          </li>



          <li class="nav-item sidebar-actions">
            <span class="nav-link">
            <a href="../logout.php">
              <button class="btn btn-block btn-lg btn-gradient-primary mt-4"><i class="mdi mdi-logout "></i> Salir
              </button></a>
              <div class="mt-4">

              </div>
            </span>
          </li>
        </ul>
      </nav>


      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <nav aria-label="breadcrumb">
            </nav>
          </div>


          <!-- ALERTA DE MENSAJE -->
          <?php
          // Leer el parámetro 'message' de la URL
          $message = isset($_GET['message']) ? $_GET['message'] : '';

          // Mostrar la alerta correspondiente
          if ($message === 'success') {
            echo '<div class="alert alert-success" role="alert">Los datos se han actualizado correctamente en la tabla categoría.</div>';
          } elseif ($message === 'error') {
            echo '<div class="alert alert-danger" role="alert">Hubo un error al actualizar los datos en la tabla categoría.</div>';
          }
          ?>
          <!-- ALERTA DE MENSAJE -->

          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">CATEGORIAS</h4>
                  <p class="card-description"> Listar todas las categorias
                  </p>
                  <table class="table">
                    <thead>

                      <tr>

                        <th>Nombre </th>

                        <th>Descripción </th>

                        <th>Editar </th>
                        <th>Eiminar </th>



                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      foreach ($categoria as $dato) {
                        ?>
                        <tr>
                          <!-- 
                          <td><?php echo $dato->id_categoria; ?></td> -->
                          <td><?php echo $dato->cat_nom; ?></td>
                          <td>
                            <?php echo (strlen($dato->cat_des) > 30) ? substr($dato->cat_des, 0, 30) . '...' : $dato->cat_des; ?>
                          </td>



                          <td>
                            <button style="padding: 10px;" type="submit" class="btn btn-primary"
                              onclick="loadEditForm(<?php echo $dato->id_categoria; ?>)">
                              <i class="mdi mdi-pencil-box-outline"></i>
                            </button>
                          </td>

                          <td>
                            <button type="button" class="btn btn-danger" style="padding: 10px;" data-bs-toggle="modal"
                              data-bs-target="#confirmDeleteModal<?php echo $dato->id_categoria; ?>"
                              data-id="<?php echo $dato->id_categoria; ?>">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </td>
                        </tr>

                        <!-- Modal de confirmación de eliminación -->
                        <div class="modal fade" id="confirmDeleteModal<?php echo $dato->id_categoria; ?>" tabindex="-1"
                          aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                ¿Está seguro de que desea eliminar esta categoría?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <a href="eliminar.php?id=<?php echo $dato->id_categoria; ?>" id="confirmDeleteButton"
                                  class="btn btn-danger">Eliminar</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal de confirmación de eliminación -->
                        <?php
                      }

                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>



        <!-- Modal para el formulario de edición -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

            </div>
          </div>
        </div>







        <!-- FOOTER -->
        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Maricarmen Peña
              Jimenez
          </div>
        </footer>
        <!-- FOOTER -->
      </div>
    </div>
  </div>



  <!-- SCRIPT DE VISUALIZAION DEL MODAL -->

  <script>
    // Función para cargar y mostrar el formulario de edición en el modal
    function loadEditForm(id) {
      // Realizar una solicitud AJAX para obtener el formulario de edición
      $.ajax({
        url: 'editar.php',
        type: 'GET',
        data: { id: id },
        success: function (response) {
          // Colocar el formulario de edición en el contenido del modal
          $('#editModal .modal-content').html(response);
          // Mostrar el modal
          $('#editModal').modal('show');
        }
      });
    }
  </script>

  <!-- SCRIPT DE VISUALIZAION DEL MODAL -->


  <!-- SCRIPT DE MENSAJE  -->
  <script>
    // Cerrar automáticamente la alerta después de 5 segundos
    setTimeout(function () {
      $(".alert").alert('close');
    }, 3000);
  </script>
  <!-- SCRIPT DE MENSAJE  -->





  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- End custom js for this page -->
</body>

</html>