<?php
class ModeloCliente
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function registrarCliente($nombre, $email, $telefono, $password)
    {
        $query = "SELECT id_cliente FROM clientes WHERE email = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            return ['success' => false, 'message' => 'El correo ya está registrado.'];
        }

        // Guarda la contraseña tal cual (sin hash)
        $query = "INSERT INTO clientes (nombre, email, telefono, password) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $ok = $stmt->execute([$nombre, $email, $telefono, $password]);
        if ($ok) {
            return ['success' => true];
        } else {
            return ['success' => false, 'message' => 'Error al registrar cliente.'];
        }
    }

    public function autenticarCliente($email, $password)
    {
        $query = "SELECT * FROM clientes WHERE email = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute([$email]);
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
        // Compara directamente (sin password_verify)
        if ($cliente && $cliente['password'] === $password) {
            return ['success' => true, 'cliente' => $cliente];
        } else {
            return ['success' => false, 'message' => 'Correo o contraseña incorrectos.'];
        }
    }

    public function obtenerPorId($id_cliente) {
        $query = "SELECT * FROM clientes WHERE id_cliente = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute([$id_cliente]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarDireccion($id_cliente, $direccion) {
        $query = "UPDATE clientes SET direccion = ? WHERE id_cliente = ?";
        $stmt = $this->conexion->prepare($query);
        return $stmt->execute([$direccion, $id_cliente]);
    }

    public function actualizarPassword($idCliente, $nuevaPassword) {
        $stmt = $this->conexion->prepare("UPDATE clientes SET password=? WHERE id_cliente=?");
        return $stmt->execute([$nuevaPassword, $idCliente])
            ? ['success' => true]
            : ['success' => false, 'message' => 'No se pudo actualizar la contraseña'];
    }

    public function actualizarPerfil($idCliente, $nombre, $email, $telefono, $direccion)
    {
        $stmt = $this->conexion->prepare("UPDATE clientes SET nombre = ?, email = ?, telefono = ?, direccion = ? WHERE id_cliente = ?");
        $ok = $stmt->execute([$nombre, $email, $telefono, $direccion, $idCliente]);
        if ($ok) {
            return ['success' => true];
        } else {
            return ['success' => false, 'message' => 'No se pudo actualizar el perfil.'];
        }
    }
}