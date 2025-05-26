<?php
require_once '../model/modelo_productos.php';
require_once '../config/conexion.php';

$conne = $conexion;

$ObjProducto = new ModeloProducto($conne);

class ControladorProducto
{
    private $modeloProducto;

    public function __construct($modeloProducto)
    {
        $this->modeloProducto = $modeloProducto;
    }

    public function listarProducto()
    {
        $data = $this->modeloProducto->MetodoListar();
        return $data;
    }

    public function listarCategoriaProducto()
    {
        $data = $this->modeloProducto->MetodoListarCategoria();
        return $data;
    }

    public function listarProductoPorId($id)
    {
        $data = $this->modeloProducto->MetodoListarProductoPorId($id);
        return $data;
    }

    public function InsertarProducto($producto)
    {
        $data = $this->modeloProducto->MetodoInsertar($producto);
        return $data;
    }

    public function ActualizarProducto($productoUpdate)
    {
        $data = $this->modeloProducto->MetodoActualizar($productoUpdate);
        return $data;
    }

    public function EliminarProducto($id)
    {
        $data = $this->modeloProducto->MetodoEliminar($id);
        return $data;
    }

    public function insertarPedidoCompleto($datosPedido, $carrito)
    {
        // Usa el id_cliente de la sesión
        $idCliente = $_SESSION['cliente']['id_cliente'];
        $idPedido = $this->modeloProducto->MetodoInsertarPedido(
            $idCliente,
            $datosPedido['nombre'],
            $datosPedido['correo'],
            $datosPedido['telefono'],
            $datosPedido['direccion'],
            $datosPedido['metodo_pago'],
            $datosPedido['total'],
            $datosPedido['igv'],
            $datosPedido['subtotal']
        );
        if (!$idPedido) return false;

        foreach ($carrito as $prod) {
            $this->modeloProducto->MetodoInsertarDetallePedido(
                $idPedido,
                $prod['id'],
                $prod['nombre'],
                $prod['cantidad'],
                $prod['precio'],
                $prod['precio'] * $prod['cantidad']
            );
        }
        return $idPedido;
    }
}

//Instanciamos el controlador
$controladorProducto = new ControladorProducto($ObjProducto);
