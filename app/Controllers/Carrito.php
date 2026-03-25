<?php

namespace App\Controllers;

use App\Models\CarritoModel;

class Carrito extends BaseController {
  protected $session;
  private CarritoModel $carritoModel;
  private array $defaultViewData;

  public function __construct() {
    $this->session = session();
    helper(['html', 'categoriaNav', 'array', 'text', 'url']);
    $this->carritoModel = new CarritoModel();
    $this->initializeDefaultViewData();
  }

  /**
   * Inicializa los datos por defecto para las vistas
   */
  private function initializeDefaultViewData(): void {
    $this->defaultViewData = [
      'title' => 'Carrito',
      'inicio' => base_url(),
      'catproductos' => site_url('productos/'),
      'categoriasNav' => CategoriasNavbar(),
    ];
  }

  public function getIndex() {

    $this->session->set('url_anterior', current_url());

    $data = $this->buildViewData();

    $data['carrito'] = $this->session->get('logged_in') ? $this->mostrarCarrito(null, $this->session->get('IDCliente'), null) : ($this->session->get('sesion_token') ? $this->mostrarCarrito(null, null, $this->session->get('sesion_token')) : []);

    $data['IDCliente'] = $this->session->get('logged_in') ? $this->session->get('IDCliente') : false;

    $navbarView = $this->getNavbarView();

    return $this->renderViews($navbarView, $data);
  }

  public function postAgregar() {
    $productoID = $this->request->getPost('productoID');
    $cantidad = $this->request->getPost('cantidad');

    if ($productoID !== null && $cantidad !== null) {
      $resultado = $this->procesarCarrito($productoID, $cantidad);

      if (!empty($resultado)) {
        $this->session->remove('pago_completado');
        return redirect()->to('/carrito');
      } else {
        return redirect()->to(current_url())->with('error', 'No se pudo agregar el producto al carrito.');
      }
    } else {
      return redirect()->to(current_url())->with('error', 'Producto o cantidad no válidos.');
    }
  }

  public function postQuitarproducto() {
    $json = $this->request->getJSON();
    $id = $json->id ?? null;

    if (!$id) {
      return $this->response->setJSON(['success' => false, 'message' => 'ID faltante']);
    }

    $idCliente = $this->session->get('IDCliente');
    $sesionToken = $idCliente ? null : $this->session->get('sesion_token');

    if ($idCliente || $sesionToken) {
      $this->actualizarCarrito(
        null,
        $idCliente,
        $sesionToken,
        $id,
        null,
        'ELIMINAR'
      );

      $data['carrito'] = $this->mostrarCarrito(null, $idCliente, $sesionToken);

      $data['IDCliente'] = $this->session->get('logged_in') ? $this->session->get('IDCliente') : false;

      $HTMLCarrito = view('Productos/Carrito', $data);

      return $this->response->setJSON(['success' => true, 'htmlCarrito' => $HTMLCarrito]);
    }

    return $this->response->setJSON(['success' => false, 'message' => 'Sesión no válida']);
  }

  public function postNavbar() {
    $idCliente = $this->session->get('IDCliente');
    $sesionToken = $idCliente ? null : $this->session->get('sesion_token');

    // Obtener datos de sesión o un array vacío
    $data = $this->session->get('logged_in') ? $this->getDatosSesionUsuario() : [];

    // Agregar carrito al arreglo de datos
    $data['carrito'] = $this->mostrarCarrito(null, $idCliente, $sesionToken);

    $navbarView = $this->getNavbarView();

    $datosVista = array_merge($this->defaultViewData, $data);
    $htmlNavbar = view($navbarView, $datosVista);

    return $this->response->setJSON([
      'success' => true,
      'htmlNavbar' => $htmlNavbar
    ]);
  }

  public function postActcantprod() {
    $json = $this->request->getJSON();
    $id = $json->id ?? null;
    $cantidad = $json->cantidad ?? null;

    if (!$id || !$cantidad) {
      return $this->response->setJSON(['success' => false, 'message' => 'ID faltante']);
    }

    $idCliente = $this->session->get('IDCliente');
    $sesionToken = $idCliente ? null : $this->session->get('sesion_token');

    if ($idCliente || $sesionToken) {
      $this->actualizarCarrito(
        null,
        $idCliente,
        $sesionToken,
        $id,
        $cantidad,
        'FIJAR'
      );

      $data['carrito'] = $this->mostrarCarrito(null, $idCliente, $sesionToken);

      $data['IDCliente'] = $this->session->get('logged_in') ? $this->session->get('IDCliente') : false;

      $HTMLCarrito = view('Productos/Carrito', $data);

      return $this->response->setJSON(['success' => true, 'htmlCarrito' => $HTMLCarrito]);
    }

    return $this->response->setJSON(['success' => false, 'message' => 'Sesión no válida']);
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
      . view('Productos/Carrito', $data)
      . view('Genericos/Footer');
  }

  /**
   * Procesa la adición al carrito según sesión
   */
  private function procesarCarrito($productoID, $cantidad): array {
    if ($this->session->get('logged_in')) {
      $clienteID = $this->session->get('IDCliente');
      return $this->agregarCarrito($productoID, $cantidad, null, $clienteID, null);
    } else {
      $token = $this->session->get('sesion_token');
      if (!$token) {
        $token = $this->generateSessionToken();
      }
      return $this->agregarCarrito($productoID, $cantidad, null, null, $token);
    }
  }

  /**
   * Genera un token de sesión si no existe
   */
  private function generateSessionToken(): string {
    $token = $this->generateUUIDv4();
    $this->session->set('sesion_token', $token);
    return $token;
  }

  private function generateUUIDv4(): string {
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // versión 4
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // variante
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
  }


  /**
   * Agrega un producto al carrito
   */
  private function agregarCarrito(
    $productoID,
    $cantidad,
    $carritoID = null,
    $clienteID = null,
    $sessionToken = null
  ): array {
    $carritoData = $this->carritoModel->AgregarAlCarrito(
      $productoID,
      $cantidad,
      $carritoID,
      $clienteID,
      $sessionToken
    );

    return $carritoData ?? [];
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
   * Actualiza el carrito
   */
  private function actualizarCarrito(
    ?int $carritoID = null,
    ?int $clienteID = null,
    ?string $sessionToken = null,
    int $productoID = null,
    int $cantidad = null,
    string $operacion = null
  ): array {
    if ($clienteID && $sessionToken) {
      $sessionToken = null;
    }

    $carritoData = $this->carritoModel->ActualizarCarrito(
      $carritoID,
      $clienteID,
      $sessionToken,
      $productoID,
      $cantidad,
      $operacion
    );

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
