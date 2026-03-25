<?php

namespace App\Models;

use CodeIgniter\Model;

class PerfilModel extends Model {
  protected $db;

  public function __construct() {
    parent::__construct();
    $this->db = \Config\Database::connect();
  }

  public function CambiarPerfilF(int $PerfilF, int $ClienteID): bool {
    $builder = $this->db->table('Cliente');
    $builder->set('PerfilF', $PerfilF);
    $builder->where('ID', $ClienteID);

    // Intentamos ejecutar la actualización
    $result = $builder->update();

    // Si el método update() devuelve false, hubo un error de consulta
    if ($result === false) {
      return false;
    }

    // Si no se afectó ninguna fila, consideramos que no se realizó cambio
    if ($this->db->affectedRows() === 0) {
      return false;
    }

    // Todo OK
    return true;
  }

  public function ultimoAcceso(int $clienteID): bool {
    $builder = $this->db->table('Cliente');

    $builder->set('UltimoAcceso', 'GETDATE()', false);

    $builder->where('ID', $clienteID);

    // 4) (Opcional) Mira la consulta que se va a ejecutar
    log_message('debug', $builder->getCompiledUpdate(false));

    $result = $builder->update();

    if ($result === false) {
      log_message('error', print_r($this->db->error(), true));
      return false;
    }

    if ($this->db->affectedRows() === 0) {
      log_message('debug', "Update OK pero 0 filas afectadas (¿ya estaba al día?).");
      return false;
    }

    return true;
  }

  public function gestionarCliente(array $params): array {
    try {
      $sql = "EXEC GestionarCliente ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";

      $query = $this->db->query($sql, [
        $params['FK_Cliente'] ?? null,
        $params['Nombre'] ?? null,
        $params['ApellidoP'] ?? null,
        $params['ApellidoM'] ?? null,
        $params['FechaNacimiento'] ?? null,
        $params['Genero'] ?? null,
        $params['Celular'] ?? null,
        $params['DireccionID'] ?? null,
        $params['CodigoPostal'] ?? null,
        $params['Colonia'] ?? null,
        $params['Calle'] ?? null,
        $params['NumExterior'] ?? null,
        $params['NumInterior'] ?? null,
        $params['Referencias'] ?? null,
        $params['TipoDireccion'] ?? null,
      ]);

      $result = $query->getRowArray();

      return [
        'success' => true,
        'direccion' => $result ?? null
      ];
    } catch (\Throwable $e) {
      log_message('error', 'Error en GestionarCliente: ' . $e->getMessage());
      return [
        'success' => false,
        'error' => $e->getMessage(),
        'direccion' => null
      ];
    }
  }

  public function mostrarDireccionesCliente($cliente = null): array {
    try {
      $sql = "EXEC ObtenerDireccionesCliente ?";
      $query = $this->db->query($sql, [$cliente]);

      $result = $query->getResultArray();

      return [
        'data' => $result ?? [] // Captura el CarritoID retornado
      ];
    } catch (\Exception $e) {
      log_message('error', 'Error: ' . $e->getMessage());
      return [
        'data' => []
      ];
    }
  }
}
