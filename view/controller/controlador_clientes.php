<?php
require_once '../model/modelo_clientes.php';
require_once '../config/conexion.php';

$ObjCliente = new ModeloCliente($conexion);

class ControladorCliente
{
    private $modeloCliente;

    public function __construct($modeloCliente)
    {
        $this->modeloCliente = $modeloCliente;
    }

    public function registrar($nombre, $email, $telefono, $password)
    {
        return $this->modeloCliente->registrarCliente($nombre, $email, $telefono, $password);
    }

    public function login($email, $password)
    {
        return $this->modeloCliente->autenticarCliente($email, $password);
    }

    public function obtenerPorId($id_cliente) {
        return $this->modeloCliente->obtenerPorId($id_cliente);
    }

    public function actualizarDireccion($id_cliente, $direccion) {
        return $this->modeloCliente->actualizarDireccion($id_cliente, $direccion);
    }

    public function actualizarPassword($idCliente, $nuevaPassword) {
        return $this->modeloCliente->actualizarPassword($idCliente, $nuevaPassword);
    }

    public function actualizarPerfil($idCliente, $nombre, $email, $telefono, $direccion)
    {
        return $this->modeloCliente->actualizarPerfil($idCliente, $nombre, $email, $telefono, $direccion);
    }
}

$controladorCliente = new ControladorCliente($ObjCliente);