<?php

namespace App\Controllers;

use App\Models\CarritoModel;
use App\Models\PerfilModel;

class Pago extends BaseController {
  protected $session;
  private CarritoModel $carritoModel;
  private array $defaultViewData;
  private $PerfilModel;

  public function __construct() {
    $this->session = session();
    helper(['html', 'array', 'text', 'avatarUser', 'email']);
    $this->carritoModel = new CarritoModel();
    $this->PerfilModel = new PerfilModel();
    $this->initializeDefaultViewData();
  }

  private function initializeDefaultViewData(): void {
    $this->defaultViewData = [
      'title' => 'Finalizar compra',
    ];
  }

  public function getIndex() {
    $data = $this->buildViewData();

    $data['carrito'] = $this->obtenerCarrito();

    $data['direccionCliente'] = $this->PerfilModel->mostrarDireccionesCliente($this->session->get('IDCliente'));

    return $this->renderViews($data);
  }

  private function mostrarCarrito(?int $carritoID = null, ?int $clienteID = null, ?string $sessionToken = null): array {
    if ($clienteID && $sessionToken) {
      $sessionToken = null; // Priorizar clienteID sobre token si ambos existen
    }

    $carritoData = $this->carritoModel->MostrarCarrito($carritoID, $clienteID, $sessionToken);
    return $carritoData ?? [];
  }

  public function postCheckout() {
    // Obtener parámetros para enviar al modelo
    $clienteID = $this->session->get('IDCliente') ?? null;
    $sesionToken = $this->session->get('sesion_token') ?? null;

    $tipoEnvio = $this->request->getPost('envio-radio');

    $data['carrito'] = $this->obtenerCarrito();
    $subtotal = $data['carrito']['data'][0]['Total'] ?? 0;
    $esGratis = $subtotal >= 500;

    $gastoEnvio = 0;

    switch ($tipoEnvio) {
      case '1': // Estándar
        $gastoEnvio = $esGratis ? 0 : 500;
        break;
      case '2': // Express
        $gastoEnvio = $esGratis ? 100 : 600;
        break;
      case '3': // Recoger en punto
        $gastoEnvio = 0;
        break;
      default:
        // Manejar opción inválida
        throw new \Exception("Opción de envío no válida");
    }

    // Llamar al modelo para procesar el checkout
    $resultado = $this->carritoModel->Checkout(null, $clienteID, null, $gastoEnvio);

    if ($resultado['success'] ?? false) {
      $pedidoID = $resultado['pedido_id'];

      $emailDestino = $this->session->get('email');

      enviarEmail(
        $emailDestino,
        "Confirmación de Pedido #$pedidoID"
      );

      $this->session->set('pago_completado', true);

      // Mensaje flash de éxito con el número de pedido
      $this->session->setFlashdata('success', "Pedido generado exitosamente. Número de pedido: $pedidoID");

      // Redirigir a la página de confirmación o pedidos
      return redirect()->to('/pedido');  // Redirige a página fija
    } else {
      // Mensaje flash de error
      $mensajeError = $resultado['error'] ?? 'No se pudo completar el pedido.';
      $this->session->setFlashdata('error', $mensajeError);

      // Redirigir de vuelta al carrito o a la página que desees
      return redirect()->to('/carrito');
    }
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
   * Renderiza todas las vistas necesarias
   */
  private function renderViews(array $data): string {
    return view('Genericos/Base', $data)
      . view('Compra/Pago', $data);
  }

  private function getDatosSesionUsuario(): array {
    return [
      'IDCliente' => $this->session->get('IDCliente') ?? '',
      'email' => $this->session->get('email') ?? '',
      'PerfilF' => $this->session->get('PerfilF') ?? false,
      'ultimoA' => $this->session->get('UltimoA') ?: false,
    ];
  }

  private function obtenerCarrito() {
    $clienteID = $this->session->get('IDCliente') ?? null;
    $sesionToken = $this->session->get('sesion_token') ?? null;

    return $this->session->get('logged_in')
      ? $this->mostrarCarrito(null, $clienteID, null)
      : ($sesionToken ? $this->mostrarCarrito(null, null, $sesionToken) : []);
  }
}
