<?php

namespace App\Models;

use CodeIgniter\Model;

class CarritoModel extends Model {
  protected $db;

  public function __construct() {
    parent::__construct();
    $this->db = \Config\Database::connect(); // Conectar a la BD
  }

  public function AgregarAlCarrito($productoID, $cantidad, $carrito = null, $cliente = null, $sessionT = null) {
    try {
      $sql = "EXEC AgregarAlCarrito ?, ?, ?, ?, ?";
      $query = $this->db->query($sql, [$carrito, $cliente, $sessionT, $productoID, $cantidad]);

      $result = $query->getResultArray();

      return [
        'data' => $result[0] ?? [] // Captura el CarritoID retornado
      ];
    } catch (\Exception $e) {
      log_message('error', 'Error al agregar producto al carrito: ' . $e->getMessage());
      return [
        'data' => []
      ];
    }
  }

  public function MostrarCarrito($carrito = null, $cliente = null, $sessionT = null): array {
    try {
      $sql = "EXEC MostrarCarrito ?, ?, ?";
      $query = $this->db->query($sql, [$carrito, $cliente, $sessionT]);

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

  public function ActualizarCarrito($carrito = null, $cliente = null, $sessionT = null, $productoID = null, $cantidad = null, $operacion = null): array {
    try {
      $sql = "EXEC ActualizarCarrito ?, ?, ?, ?, ?, ?";
      $query = $this->db->query($sql, [$carrito, $cliente, $sessionT, $productoID, $cantidad, $operacion]);

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

  public function Checkout($carrito = null, $cliente = null, $sessionT = null, $gastoEnvio = null): array {
    try {
      $sql = "EXEC ProcesarCheckout ?, ?, ?, ?";
      $query = $this->db->query($sql, [$carrito, $cliente, $sessionT, $gastoEnvio]);

      $result = $query->getRowArray();

      if ($result && isset($result['PedidoID'])) {
        return [
          'success' => true,
          'pedido_id' => $result['PedidoID']
        ];
      }

      return [
        'success' => false,
        'error' => 'No se pudo generar el pedido.'
      ];
    } catch (\Exception $e) {
      log_message('error', 'Error al procesar el checkout: ' . $e->getMessage());
      return [
        'success' => false,
        'error' => 'Error interno al procesar el checkout.'
      ];
    }
  }

  public function TranferirCarrito($cliente = null, $sessionT = null): array {
    try {
      $sql = "EXEC TransferirCarritoAnonimo ?, ?";
      $query = $this->db->query($sql, [$cliente, $sessionT]);

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
