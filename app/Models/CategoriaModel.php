<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model {
  protected $db;

  public function __construct() {
    parent::__construct();
    $this->db = \Config\Database::connect(); // Conectar a la BD
  }

  public function categoria() {
    try {
      $sql = 'SELECT * FROM Categoria';
      $query = $this->db->query($sql);

      $result = $query->getResultArray();

      if (empty($result)) {
        return [
          'data' => []
        ];
      }

      return [
        'data' => $result
      ];
    } catch (\Exception $e) {
      log_message('error', 'Error en la consulta: ' . $e->getMessage());
      return [
        'data' => []
      ];
    }
  }

  public function subcategoria() {
    try {
      $sql = 'SELECT * FROM SubCategoria';
      $query = $this->db->query($sql);

      $result = $query->getResultArray();

      if (empty($result)) {
        return [
          'data' => []
        ];
      }

      return [
        'data' => $result
      ];
    } catch (\Exception $e) {
      log_message('error', 'Error en la consulta: ' . $e->getMessage());
      return [
        'data' => []
      ];
    }
  }

  public function CategoriasNavbar() {
    try {
      $sql = 'EXEC CategoriasNavbar';
      $query = $this->db->query($sql);

      $result = $query->getResultArray();

      if (empty($result)) {
        return [
          'data' => []
        ];
      }

      return [
        'data' => $result
      ];
    } catch (\Exception $e) {
      log_message('error', 'Error en la consulta: ' . $e->getMessage());
      return [
        'data' => []
      ];
    }
  }
}
