<?php

// print_r($_GET);
if (!isset($_GET['id'])) {
    header('Location:panel.php');
}

include '../model/database.php';

$id = $_GET['id'];

// Preparar la sentencia INSERT 
$sentencia = $conn->prepare("SELECT * FROM categoria WHERE id_categoria = ?;");
$sentencia->execute([$id]);
$categoria = $sentencia->fetch(PDO::FETCH_OBJ);
// print_r($categoria);





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Enlace al archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css">
</head>

<body>
    <!-- FORMULARIO  -->
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">EDITAR CATEGORIA</h4>

                <!-- FORMULARIO  -->
                <form class="forms-sample" id="categoriaForm" method="POST" action="editarproceso.php">
                    <div class="form-group">
                        <label for="exampleInputName1">Nombre de Categoria</label>
                        <input value="<?php echo $categoria->cat_nom ?>" type="text" class="form-control"
                            name="txtnombrecat" id="exampleInputName1" placeholder="Nombre de categoria" required>
                        <div class="invalid-feedback">Por favor ingresa un nombre de categoría.</div>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Descripción</label>
                        <textarea name="txtdesecat" class="form-control"
                            id="exampleTextarea1" rows="4" placeholder="Escribe la descripción de la Categoria"
                            required><?php echo $categoria->cat_des ?></textarea>
                        <div class="invalid-feedback">Por favor ingresa una descripción.</div>
                    </div>

                    <input type="hidden" name="oculto" >
                    <input type="hidden" name="txtid" value="<?php echo $categoria->id_categoria ?>" >

                    <button type="submit" class="btn btn-gradient-primary me-2">Editar</button>
                    <!-- <button type="reset" class="btn btn-gradient-primary me-2">Restablecer</button> -->
                </form>
            </div>
        </div>
    </div>



</body>

</html>