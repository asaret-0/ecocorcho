<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class PagoIncompleto implements FilterInterface {
  public function before(RequestInterface $request, $arguments = null) {
    $session = session();

    // Si el pago ya se completó, redirige a otra página
    if ($session->get('pago_completado')) {
      return redirect()->to('/carrito');
    }

    // Si no, continúa con la ejecución normal
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
    // No necesitas lógica post-response en este caso
  }
}
