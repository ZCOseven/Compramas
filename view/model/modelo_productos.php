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

    public function MetodoInsertarPedido($id_cliente, $nombre, $correo, $telefono, $direccion, $metodo_pago, $total, $igv, $subtotal) {
        $query = "INSERT INTO pedido (id_cliente, nombre, correo, telefono, direccion, metodo_pago, total, igv, subtotal, fecha) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute([$id_cliente, $nombre, $correo, $telefono, $direccion, $metodo_pago, $total, $igv, $subtotal]);
        return $this->conexion->lastInsertId();
    }

    public function MetodoInsertarDetallePedido($id_pedido, $id_producto, $nombre, $cantidad, $precio, $subtotal)
    {
        try {
            $query = "INSERT INTO detalle_pedido (id_pedido, id_producto, nombre_producto, cantidad, precio_unitario, subtotal) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->conexion->prepare($query);
            return $stmt->execute([$id_pedido, $id_producto, $nombre, $cantidad, $precio, $subtotal]);
        } catch (Exception $e) {
            return false;
        }
    }

    public function MetodoInsertarUsuario($nombre, $correo, $telefono) {
        $query = "INSERT INTO users (nombre, email, telefono, password) VALUES (?, ?, ?, '')";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute([$nombre, $correo, $telefono]);
        return $this->conexion->lastInsertId();
    }
}
