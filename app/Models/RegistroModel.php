<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistroModel extends Model {
  protected $db;

  public function __construct() {
    parent::__construct();
    $this->db = \Config\Database::connect();
  }

  public function RegistrarCliente($email, $contrasena): array {
    if ($email === null || $contrasena === null) {
      throw new \InvalidArgumentException("Email y contraseña son obligatorios.");
    }

    $sql = "EXEC InsertCliente ?, ?";
    $query = $this->db->query($sql, [$email, $contrasena]);

    if ($query === false) {
      $error = $this->db->error();
      throw new \RuntimeException($error['message'], $error['code']);
    }

    $result = $query->getResultArray();

    if (empty($result)) {
      throw new \RuntimeException("Error al registrar el cliente.");
    }

    return ['data' => $result];
  }

  public function LoginCliente($email): array {
    if ($email === null) {
      throw new \InvalidArgumentException("El email es obligatorio.");
    }

    $sql = "EXEC ObtenerHashCliente ?";
    $query = $this->db->query($sql, [$email]);

    if ($query === false) {
      $error = $this->db->error();
      throw new \RuntimeException($error['message'], $error['code']);
    }

    $result = $query->getResultArray();

    if (empty($result)) {
      throw new \RuntimeException("El email no está registrado.");
    }

    return ['data' => $result];
  }

}
