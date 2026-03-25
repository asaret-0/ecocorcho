<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model {
  protected $db;

  public function __construct() {
    parent::__construct();
    $this->db = \Config\Database::connect(); // Conectar a la BD
  }

  public function VerPedidos($clienteID = null, $fechaInicio = null, $fechaFin = null, $orden = null): array {
    try {
      $sql = "EXEC ListarPedidos ?, ?, ?, ?";
      $query = $this->db->query($sql, [$clienteID, $fechaInicio, $fechaFin, $orden]);

      $result = $query->getResultArray();

      return [
        'data' => $result ?? [] // Captura el CarritoID retornado
      ];
    } catch (\Exception $e) {
      log_message('error', 'Error al agregar producto al carrito: ' . $e->getMessage());
      return [
        'data' => []
      ];
    }
  }
}
