<?php

namespace App\Models;

use CodeIgniter\Model;

class PromocionModel extends Model {
  protected $db;

  public function __construct() {
    parent::__construct();
    $this->db = \Config\Database::connect();
  }

  public function EstadoPromocion($estado = 1) {
    try {
      $sql = "EXEC PromocionEstado ?";
      $query = $this->db->query($sql, [$estado]);

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
      return [
        'data' => []
      ];
    }
  }
}
