<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface {
  public function before(RequestInterface $request, $arguments = null) {
    $session = session();

    // Supongamos que usas una variable de sesión llamada 'isLoggedIn'
    if (!$session->get('logged_in')) {
      return redirect()->to('/login');
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
    // No necesitamos nada aquí por ahora
  }
}
