<?php

namespace App\Controllers;

use App\Models\PromocionModel;
use App\Models\CarritoModel;

class Inicio extends BaseController {
    private $promocionModel;
    private $carritoModel;
    protected $session;

    public function __construct() {
        $this->session = session();
        helper(['html', 'categoriaNav', 'array', 'text', 'url']);
        $this->promocionModel = new PromocionModel();
        $this->carritoModel = new CarritoModel();
    }

    public function getIndex() {
        $data = $this->buildPageData();
        $promocion = $this->getPromocionActiva();

        $this->session->set('url_anterior', current_url());

        $data['carrito'] = $this->session->get('logged_in') ? $this->mostrarCarrito(null, $this->session->get('IDCliente'), null) : ($this->session->get('sesion_token') ? $this->mostrarCarrito(null, null, $this->session->get('sesion_token')) : []);

        $navbarView = $this->session->get('logged_in') ? 'Genericos/NavbarLogin' : 'Genericos/Navbar';

        if ($this->session->get('logged_in')) {
            $data['IDCliente'] = $this->session->get('IDCliente') ?: '';
            $data['email'] = $this->session->get('email') ?: '';
            $data['PerfilF'] = $this->session->get('PerfilF') ?: false;
            $data['ultimoA'] = $this->session->get('UltimoA') ?: false;
        }

        return view('Genericos/Base', $data)
            . view($navbarView, $data)
            . view('Inicio/Carrusel', $promocion)
            . view('Inicio/Nosotros')
            . view('Genericos/Footer');
    }

    private function buildPageData(): array {
        return [
            'title' => 'Inicio',
            'inicio' => base_url(),
            'catproductos' => site_url('productos/'),
            'categoriasNav' => CategoriasNavbar(),
        ];
    }

    private function getPromocionActiva(): array {
        $promocionData = $this->promocionModel->EstadoPromocion();

        return ['activa' => $promocionData['data'] ?? []];
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
