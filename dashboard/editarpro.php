<?php

print_r($_GET);

if (!isset($_GET['id'])) {
    header('Location:producto.php');
}

include '../model/database.php';

$id = $_GET['id'];

// Preparar la sentencia INSERT 
$sentencia = $conn->prepare("SELECT * FROM producto WHERE id_producto = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
// print_r($categoria);


//ejecuta la sentencia preparada
$cons = $conn->query("SELECT  * FROM categoria");



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
                <h4 class="card-title">EDITAR PRODUCTO</h4>

                <!-- FORMULARIO  -->
                <form class="forms-sample" id="productoForm" method="POST" action="editarproceso2.php"
                    enctype="multipart/form-data">


                    <p class="card-description"> Datos del Producto</p>

                    <div class="form-group">
                        <label for="exampleInputName1"><i class="mdi mdi-lead-pencil me-3"></i>Nombre de
                            Producto</label>
                        <input value="<?php echo $producto->nom_pro ?>" type="text" class="form-control"
                            name="txtnombrepro" id="exampleInputName1" placeholder="Nombre de Producto" required>
                        <div class="invalid-feedback">Por favor ingresa un nombre del producto.</div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"><i class="mdi mdi-cash-multiple me-3"></i>Costo</label>
                        <input value="<?php echo $producto->costo ?>" type="text" class="form-control"
                            name="txtcostopro" id="exampleInputName1" placeholder="Costo del Producto" required>
                        <div class="invalid-feedback">Por favor ingresa el costo del producto.</div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"><i class="mdi mdi-shopping me-3"></i>Stock</label>
                        <input value="<?php echo $producto->stock ?>" type="text" class="form-control"
                            name="txtstockpro" id="exampleInputName1" placeholder="Stock del Producto" required>
                        <div class="invalid-feedback">Por favor ingresa el stock del producto.</div>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1"><i class="mdi mdi-view-headlineme-3"></i>Descripción</label>
                        <textarea name="txtdescripcionpro" class="form-control" id="exampleTextarea1" rows="4"
                            placeholder="Escribe la descripción del Producto"
                            required><?php echo $producto->descripcion ?></textarea>
                        <div class="invalid-feedback">Por favor ingresa una descripción.</div>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1"><i class="mdi mdi-view-headlineme-3"></i>Categoria</label>

                        <select required size="1" class="form-control" name="txtcategoria">
                            <?php foreach ($cons as $categoria) {
                                $id_categoria = $categoria['id_categoria']; // Nombre de la columna de ID de categoría
                                $nom_categoria = $categoria['cat_nom']; // Nombre de la columna de nombre de categoría
                                $selected = ($id_categoria == $producto->categoria) ? 'selected' : '';
                                echo "<option value=\"$id_categoria\" $selected>$nom_categoria</option>";
                            } ?>
                        </select>


                        <div class="invalid-feedback">Por favor ingresa una descripción.</div>
                    </div>


                    
                    <!-- Agregar un campo oculto para almacenar la imagen actual -->
                    <input type="hidden" name="imagen_actual" value="<?php echo $producto->imagen; ?>">


                    <!-- Mostrar la imagen existente -->
                    <?php if (!empty($producto->imagen)): ?>
                        <img src="<?php echo $producto->imagen; ?>" alt="Imagen actual" style="max-width: 100px;">
                    <?php else: ?>
                        <p>No hay imagen disponible</p>
                    <?php endif; ?>


                    <div class="form-group">
                        <label for="exampleInputName1"><i class="mdi mdi-image me-3"></i>Imagen</label>
                        <div class="input-group">
                            <input type="file" name="imagen" class="form-control file-upload-info " accept="image/*">
                        </div>
                        <div class="invalid-feedback">Por favor selecciona una imagen.</div>
                    </div>



                    <input type="hidden" name="oculto">
                    <input type="hidden" name="txtidpro" value="<?php echo $producto->id_producto ?>">

                    <button type="submit" class="btn btn-gradient-primary me-2">Editar</button>
                    <!-- <button type="reset" class="btn btn-gradient-primary me-2">Restablecer</button> -->
                </form>
            </div>
        </div>
    </div>



</body>

</html>