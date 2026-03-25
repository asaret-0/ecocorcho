<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model {
  protected $db;

  public function __construct() {
    parent::__construct();
    $this->db = \Config\Database::connect(); // Conectar a la BD
  }

  public function AllProductos($limit = 10, $offset = 0, $catID = null, $subID = null, $precio = null, $orden = null) {
    try {

      $sql = "EXEC CatalogoProductos ?, ?, ?, ?, ?, ?";

      $query = $this->db->query($sql, [$limit, $offset, $catID, $subID, $precio, $orden]);

      $result = $query->getResultArray();

      return [
        'data' => $result ?? []
      ];
    } catch (\Exception $e) {
      log_message('error', 'Error en la consulta: ' . $e->getMessage());
      return [
        'data' => [],
        'totalRecords' => 0
      ];
    }
  }

  public function UnProducto(int $id) {
    try {

      $sql = "EXEC CatalogoProductoPorId ?";

      $query = $this->db->query($sql, [$id]);

      $result = $query->getResultArray();

      return [
        'data' => $result ?? [] // Captura el CarritoID retornado
      ];

    } catch (\Exception $e) {
      log_message('error', 'Error en la consulta: ' . $e->getMessage());
      return [
        'data' => []
      ];
    }
  }
}
