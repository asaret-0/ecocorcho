<?php

namespace App\Controllers;

use App\Models\RegistroModel;
use App\Models\CarritoModel;

class Login extends BaseController {
  private $carritoModel;
  protected $session;

  public function __construct() {
    helper(['html', 'form', 'text', 'url']);
    $this->carritoModel = new CarritoModel();
    $this->session = session();
  }

  public function getIndex(): string {

    $data = [
      'title' => 'Inicia sesión',
    ];

    return view('Genericos/Base', $data) . view('Registro/Login', $data);
  }

  public function postLogincliente() {
    $json = $this->request->getJSON();

    if (!isset($json->email)) {
      return $this->response->setJSON([
        'success' => false,
        'message' => 'El email es requerido.'
      ]);
    }

    if (!filter_var($json->email, FILTER_VALIDATE_EMAIL)) {
      return $this->response->setJSON([
        'success' => false,
        'message' => 'El email no tiene un formato válido.'
      ]);
    }

    try {
      $cliente = $this->loginCliente($json->email);

      if (!password_verify($json->password, $cliente['cliente'][0]['HASH'])) {
        return $this->response->setJSON([
          'success' => false,
          'message' => 'La constraseña es incorrecta.'
        ]);
      }

      // Accedemos al servicio de sesión
      $this->session->set([
        'logged_in' => true,
        'IDCliente' => $cliente['cliente'][0]['ID'],
        'email' => $json->email,
        'PerfilF' => $cliente['cliente'][0]['PerfilF'],
        'UltimoA' => $cliente['cliente'][0]['UltimoAcceso']
      ]);

      if ($this->session->get('sesion_token')) {
        $carrito = $this->carritoModel->TranferirCarrito($cliente['cliente'][0]['ID'], $this->session->get('sesion_token'));
        if ($carrito) {
        }
      }

      $path = parse_url($this->session->get('url_anterior'), PHP_URL_PATH) ?: '';
      $path = trim($path, '/');

      // Mapa de redirección
      $redirectMap = [
        'carrito'         => ['site_url', 'carrito'],
        'productos/*'       => ['site_url', 'productos'],
        'detalleprod/*'   => ['site_url', 'detalleprod'], 
      ];

      // Buscar coincidencia exacta o patrón
      $urlFunc = 'base_url';
      $param = null;

      foreach ($redirectMap as $pattern => [$func, $target]) {
        if ($pattern === $path || (str_ends_with($pattern, '/*') && str_starts_with($path, rtrim($pattern, '/*')))) {
          $urlFunc = $func;
          // Si es dinámico, usamos el path original
          $param = str_ends_with($pattern, '/*') ? $path : $target;
          break;
        }
      }
      $redirectUrl = is_null($param)
        ? $urlFunc()
        : $urlFunc($param);

      // Evitar loop de redirección
      if ($redirectUrl === current_url()) {
        $redirectUrl = base_url();
      }

      return $this->response->setJSON([
        'success'  => true,
        'redirect' => $redirectUrl,
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

  private function loginCliente($email): array {
    $registroModel = new RegistroModel();
    $registroData = $registroModel->LoginCliente($email);

    return [
      'cliente' => $registroData['data']
    ];
  }
}
