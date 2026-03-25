<?php

namespace App\Controllers;

use App\Models\RegistroModel;

class Registro extends BaseController {

  public function __construct() {
    helper(['html', 'form', 'text']);
  }

  public function getIndex(): string {
    $data = [
      'title' => 'Registraté',
    ];

    return view('Genericos/Base', $data) . view('Registro/Registro', $data);
  }

  public function postRegistrarcliente() {
    $json = $this->request->getJSON();

    if (!isset($json->email) || !isset($json->password)) {
      return $this->response->setJSON([
        'success' => false,
        'message' => 'Email y contraseña son requeridos.'
      ]);
    }

    if (!filter_var($json->email, FILTER_VALIDATE_EMAIL)) {
      return $this->response->setJSON([
        'success' => false,
        'message' => 'El email no tiene un formato válido.'
      ]);
    }

    try {
      $passwordHash = password_hash($json->password, PASSWORD_BCRYPT);
      $this->insertCliente($json->email, $passwordHash); 

      return $this->response->setJSON([
        'success' => true,
        'redirect' => site_url('login/'),
        'email' => $json->email 
      ]);
    } catch (\Throwable $e) {
      $errorMessage = $e->getMessage();
      $message = preg_replace('/^(\[[^\]]*\]\s*)+/', '', $errorMessage);
      return $this->response->setJSON([
        'success' => false,
        'message' => trim($message)
      ]);
    }
  }

  private function insertCliente($email, $contrasena): array {
    $registroModel = new RegistroModel();
    $registroData = $registroModel->RegistrarCliente($email, $contrasena);

    return [
      'cliente' => $registroData['data']
    ];
  }
}
