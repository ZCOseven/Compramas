<?php
class ModeloPedidos
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function obtenerPedidosPorCliente($idCliente)
    {
        $query = "SELECT * FROM pedido WHERE id_cliente = ? ORDER BY fecha DESC";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute([$idCliente]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function obtenerDetallePedido($idPedido, $idCliente)
    {
        // Datos generales del pedido
        $query = "SELECT * FROM pedido WHERE id_pedido = ? AND id_cliente = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute([$idPedido, $idCliente]);
        $pedido = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$pedido) {
            return null;
        }

        // Productos del pedido
        $queryProd = "SELECT cantidad, precio_unitario, nombre_producto, subtotal 
                      FROM detalle_pedido 
                      WHERE id_pedido = ?";
        $stmtProd = $this->conexion->prepare($queryProd);
        $stmtProd->execute([$idPedido]);
        $productos = $stmtProd->fetchAll(PDO::FETCH_ASSOC);

        $pedido['productos'] = $productos;
        return $pedido;
    }
}