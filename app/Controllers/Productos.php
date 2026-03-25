<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\CarritoModel;

class Productos extends BaseController {
  protected $session;
  private $carritoModel;

  public function __construct() {
    $this->session = session();
    helper(['html', 'categoriaNav', 'array', 'text']);
    $this->carritoModel = new CarritoModel();
  }

  // Método GET para renderizar toda la página
  public function getIndex($catID = null, $catNombre = null, $subID = null, $subNombre = null, $precio = null, $orden = 1) {
    $data = $this->buildPageData();

    $this->session->set('url_anterior', current_url());

    $data['carrito'] = $this->session->get('logged_in') ? $this->mostrarCarrito(null, $this->session->get('IDCliente'), null) : ($this->session->get('sesion_token') ? $this->mostrarCarrito(null, null, $this->session->get('sesion_token')) : []);

    $navbarView = $this->session->get('logged_in') ? 'Genericos/NavbarLogin' : 'Genericos/Navbar';

    if ($this->session->get('logged_in')) {
      $data['IDCliente'] = $this->session->get('IDCliente') ?: '';
      $data['email'] = $this->session->get('email') ?: '';
      $data['PerfilF'] = $this->session->get('PerfilF') ?: false;
      $data['ultimoA'] = $this->session->get('UltimoA') ?: false;
    }

    $data['productos'] = $this->cargarProductos($catID, $subID, $precio, $orden);
    $data['filtro'] = $this->filtroProductos($catID, $catNombre, $subID, $subNombre);

    return view('Genericos/Base', $data)
      . view($navbarView, $data)
      . view('Productos/Productos', $data)
      . view('Genericos/Footer');
  }

  private function buildPageData(): array {
    return [
      'title' => 'Productos',
      'inicio' => base_url(),
      'catproductos' => site_url('productos/'),
      'categoriasNav' => CategoriasNavbar(),
    ];
  }

  // Método POST para filtrar productos vía API
  public function postFiltrarproductos() {
    $json = $this->request->getJSON();

    $data = $this->buildPageData();

    $data['productos'] = $this->cargarProductos($json->categorias->id ?? null, $json->subcategorias->id ?? null, $json->precio ?? null, $json->orden ?? null);

    $data['filtro'] = $this->filtroProductos($json->categorias->id ?? null, $json->categorias->nombre ?? null, $json->subcategorias->id ?? null, $json->subcategorias->nombre ?? null);

    $data['carrito'] = $this->session->get('logged_in') ? $this->mostrarCarrito(null, $this->session->get('IDCliente'), null) : ($this->session->get('sesion_token') ? $this->mostrarCarrito(null, null, $this->session->get('sesion_token')) : []);

    $HTMLProductos = view('Productos/Productos', $data);

    return $this->response->setJSON(['success' => true, 'htmlProducto' => $HTMLProductos]);
  }

  // Método privado para preparar datos de productos y navegación
  private function filtroProductos($catID, $catNombre, $subID, $subNombre): array {
    return [
      'catTitulo' => esc($catNombre) ?: 'Todos los productos',
      'subTitulo' => esc($subNombre) ?: null,
      'catID' => esc($catID) ?: null,
      'subID' => esc($subID) ?: null
    ];
  }

  // Método privado para cargar productos
  private function cargarProductos($catID, $subID, $precio, $orden): array {
    $productoModel = new ProductoModel();
    $productosData = $productoModel->AllProductos(20, 0, $catID, $subID, $precio, $orden);

    return $productosData ?? [];
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
