<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RedirectMap implements FilterInterface {
  public function before(RequestInterface $request, $arguments = null) {
    helper('url');               // previous_url(), site_url(), base_url()
    $session = session();
    $session->regenerate();      // seguridad: nuevo ID de sesión

    // 1) Obtenemos el path de la URL anterior
    $path = parse_url(previous_url(), PHP_URL_PATH) ?: '';
    $path = trim($path, '/');

    // 2) Define tu mapeo ruta → [función, parámetro]
    $redirectMap = [
      'ecocorcho/public/carrito' => ['site_url', 'carrito'],
      // 'antiguo/ruta'           => ['route_to', 'nombreRoute'],
    ];

    // 3) Fallback a base_url() si no hay match
    [$urlFunc, $param] = $redirectMap[$path] ?? ['base_url', null];

    // 4) Construye la URL de redirección
    $redirectUrl = is_null($param)
      ? $urlFunc()
      : $urlFunc($param);

    // 5) Evita bucles: solo redirige si no es la misma URL
    if ($redirectUrl !== current_url()) {
      return redirect()->to($redirectUrl);
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
    // No necesitamos lógica aquí
  }
}
