<?php
class Producto
{
    public $id_producto;
    private $nom_pro;
    private $costo;
    private $stock;
    private $categoria;
    private $descripcion;
    private $imagen;

    public function __GET($k)
    {
        return $this->$k;
    }

    public function __SET($k, $v)
    {
        return $this->$k = $v;
    }
}

class ModeloProducto
{
    private $conexion;

    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    function MetodoListar()
    {
        try {
            $query = "SELECT p.*, c.cat_nom AS nombre_categoria  FROM producto p INNER JOIN categoria c ON p.categoria = c.id_categoria";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();

            // Recuperar todos los resultados
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Comprobar si hay resultados
            if ($data) {
                return $data;
            } else {
                return []; // Retornar un array vacío si no hay resultados
            }
        } catch (Exception $e) {
            // Manejo de errores
            return ['error' => 'Error al listar personal: ' . $e->getMessage()];
        }
    }

    function MetodoListarCategoria()
    {
        try {
            $query = "SELECT * FROM categoria";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();

            // Recuperar todos los resultados
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Comprobar si hay resultados
            if ($data) {
                return $data;
            } else {
                return []; // Retornar un array vacío si no hay resultados
            }
        } catch (Exception $e) {
            // Manejo de errores
            return ['error' => 'Error al listar personal: ' . $e->getMessage()];
        }
    }

    function MetodoListarProductoPorId($id)
    {
        try {
            $query = "SELECT * FROM producto WHERE id_producto = :id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); // más seguro
            $stmt->execute();

            // Recuperar solo una fila
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                return $data;
            } else {
                return []; // No se encontró el producto
            }
        } catch (Exception $e) {
            return ['error' => 'Error al listar producto: ' . $e->getMessage()];
        }
    }





    /* FUNCIONES INNECESARIAS MOMENTANEAMENTE */

    // function MetodoInsertar($personal)
    // {
    //     $query = "INSERT INTO personal(nombre, apellido, correo, rol, usuario, clave) VALUES (?, ?, ?, ?, ?, ?)";
    //     $stm = $this->conexion->prepare($query);
    //     if (
    //         $stm->execute([
    //             $personal->nombre,
    //             $personal->apellido,
    //             $personal->correo,
    //             $personal->rol,
    //             $personal->usuario,
    //             $personal->clave,
    //         ])
    //     ) {
    //         $data = 'Registrado Correctamente';
    //     } else {
    //         $data = 'Hubo un error al registrar';
    //     }
    //     return $data;
    // }

    // public function MetodoActualizar($personalUpdate)
    // {
    //     $query = "UPDATE personal SET nombre = ?, apellido = ?, correo = ?, rol = ?, usuario = ?, clave = ? WHERE id_personal = ?";
    //     $stm = $this->conexion->prepare($query);

    //     if ($stm->execute([
    //             $personalUpdate->nombre,
    //             $personalUpdate->apellido,
    //             $personalUpdate->correo,
    //             $personalUpdate->rol,
    //             $personalUpdate->usuario,
    //             $personalUpdate->clave,
    //             $personalUpdate->id,
    //         ])
    //     ) {
    //         $data = 'Registro actualizado correctamente';
    //     } else {
    //         $data = 'Hubo un error al actualizar el registro';
    //     }

    //     return $data;
    // }

    // function MetodoEliminar($id)
    // {
    //     $query = "DELETE FROM personal WHERE id_personal = ?";
    //     $stm = $this->conexion->prepare($query);

    //     if ($stm->execute([$id])) {
    //         $data = 'Eliminado Correctamente';
    //     } else {
    //         $data = 'Hubo un error al eliminar';
    //     }

    //     return $data;
    // }
}
