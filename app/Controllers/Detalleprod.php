<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\CarritoModel;

class Detalleprod extends BaseController {
  protected $session;
  private $carritoModel;

  public function __construct() {
    $this->session = session();
    helper(['html', 'categoriaNav', 'array', 'text']);
    $this->carritoModel = new CarritoModel();
  }

  public function getIndex(int $id) {
    $producto = $this->cargarProducto($id);

    if (empty($producto)) {
      // Aquí podrías redirigir a una página de error si no existe el producto
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Producto no encontrado');
    }

    $this->session->set('url_anterior', current_url());

    $producto = $producto[0];
    $data = $this->buildPageData($producto['Nombre']);
    $data['producto'] = $producto;

    $data['carrito'] = $this->session->get('logged_in') ? $this->mostrarCarrito(null, $this->session->get('IDCliente'), null) : ($this->session->get('sesion_token') ? $this->mostrarCarrito(null, null, $this->session->get('sesion_token')) : []);

    if ($this->session->get('logged_in')) {
      $data += [
        'IDCliente' => $this->session->get('IDCliente') ?? '',
        'email' => $this->session->get('email') ?? '',
        'PerfilF' => $this->session->get('PerfilF') ?? false,
        'ultimoA' => $this->session->get('UltimoA') ?: false
      ];
    }

    $navbarView = $this->session->get('logged_in') ? 'Genericos/NavbarLogin' : 'Genericos/Navbar';

    return view('Genericos/Base', $data)
      . view($navbarView, $data)
      . view('Productos/DetalleProducto', $data)
      . view('Genericos/Footer');
  }

  private function buildPageData(string $title = ''): array {
    return [
      'title' => $title,
      'inicio' => base_url(),
      'catproductos' => site_url('productos/'),
      'categoriasNav' => CategoriasNavbar(),
    ];
  }

  private function cargarProducto(int $id): array {
    $productoModel = new ProductoModel();
    $productoData = $productoModel->UnProducto($id);

    return $productoData['data'] ?? [];
  }

  /**
   * Agrega un producto al carrito
   */
  private function mostrarCarrito(?int $carritoID = null, ?int $clienteID = null, ?string $sessionToken = null): array {
    if ($clienteID && $sessionToken) {
      $sessionToken = null; // Priorizar clienteID sobre token si ambos existen
    }

    $carritoData = $this->carritoModel->MostrarCarrito($carritoID, $clienteID, $sessionToken);
    return $carritoData ?? [];
  }
}
