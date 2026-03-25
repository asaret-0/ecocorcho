<?php

namespace App\Controllers;

use App\Models\CarritoModel;
use App\Models\PedidoModel;

class Pedido extends BaseController {
  protected $session;
  private array $defaultViewData;
  private $carritoModel;
  private $pedidoModel;

  public function __construct() {
    $this->session = session();
    helper(['html', 'categoriaNav', 'array', 'text', 'url']);
    $this->initializeDefaultViewData();
    $this->carritoModel = new CarritoModel();
    $this->pedidoModel = new PedidoModel();
  }

  /**
   * Inicializa los datos por defecto para las vistas
   */
  private function initializeDefaultViewData(): void {
    $this->defaultViewData = [
      'title' => 'Mis pedidos',
      'inicio' => base_url(),
      'catproductos' => site_url('productos/'),
      'categoriasNav' => CategoriasNavbar(),
    ];
  }

  public function getIndex() {

    $this->session->set('url_anterior', current_url());

    $data = $this->buildViewData();

    $data['carrito'] = $this->session->get('logged_in') ? $this->mostrarCarrito(null, $this->session->get('IDCliente'), null) : ($this->session->get('sesion_token') ? $this->mostrarCarrito(null, null, $this->session->get('sesion_token')) : []);

    $data['pedido'] = $this->session->get('logged_in') ? $this->pedidoModel->VerPedidos($this->session->get('IDCliente'), null, null, 'DESC') : [];

    $navbarView = $this->getNavbarView();

    return $this->renderViews($navbarView, $data);
  }

  /**
   * Construye los datos para la vista
   */
  private function buildViewData(): array {
    $data = $this->defaultViewData;

    if ($this->session->get('logged_in')) {
      $data += $this->getDatosSesionUsuario();
    }

    return $data;
  }

  /**
   * Determina qué navbar mostrar según el estado de login
   */
  private function getNavbarView(): string {
    return $this->session->get('logged_in')
      ? 'Genericos/NavbarLogin'
      : 'Genericos/Navbar';
  }

  /**
   * Renderiza todas las vistas necesarias
   */
  private function renderViews(string $navbarView, array $data): string {
    return view('Genericos/Base', $data)
      . view($navbarView, $data)
      . view('Compra/Pedido', $data)
      . view('Genericos/Footer');
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

  /**
   * Obtiene los datos de sesión del usuario
   */
  private function getDatosSesionUsuario(): array {
    return [
      'IDCliente' => $this->session->get('IDCliente') ?? '',
      'email' => $this->session->get('email') ?? '',
      'PerfilF' => $this->session->get('PerfilF') ?? false,
      'ultimoA' => $this->session->get('UltimoA') ?: false,
    ];
  }
}
