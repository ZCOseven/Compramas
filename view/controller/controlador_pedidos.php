<?php
require_once '../model/modelo_pedidos.php';
require_once '../config/conexion.php';

$ObjPedido = new ModeloPedidos($conexion);

class ControladorPedidos
{
    private $modeloPedido;

    public function __construct($modeloPedido)
    {
        $this->modeloPedido = $modeloPedido;
    }

    public function obtenerPedidosPorCliente($idCliente)
    {
        return $this->modeloPedido->obtenerPedidosPorCliente($idCliente);
    }

    // Nuevo método para detalle de pedido
    public function obtenerDetallePedido($idPedido, $idCliente)
    {
        return $this->modeloPedido->obtenerDetallePedido($idPedido, $idCliente);
    }
}

// Instancia global para usar en la vista
$controladorPedidos = new ControladorPedidos($ObjPedido);