<?php

namespace App\Controllers;

use App\Models\PerfilModel;

class Perfil extends BaseController {
  protected $session;
  private $PerfilModel;

  public function __construct() {
    helper(['html', 'form', 'text', 'avatarUser']);
    $this->session = session();
    $this->PerfilModel = new PerfilModel();
  }

  public function getIndex(): string {
    // Inicializamos los datos con el título
    $data = [
      'title' => 'Perfil',
    ];

    // Si el usuario está logueado
    if ($this->session->get('logged_in')) {
      $data['IDCliente'] = $this->session->get('IDCliente') ?: '';
      $data['email'] = $this->session->get('email') ?: '';
      $data['PerfilF'] = $this->session->get('PerfilF') ?: false;
      $data['ultimoA'] = $this->session->get('UltimoA') ?: false;

      $data['direccionCliente'] = $this->PerfilModel->mostrarDireccionesCliente($this->session->get('IDCliente'));
    }

    return view('Genericos/Base', $data) . view('Usuario/perfil', $data) . view('Registro/DatosCliente', $data);
  }

  public function postSubirimagen() {
    // 1. Validar CSRF (recomendado descomentar)
    // $security = service('security');
    // if (!$security->CSRFVerify()) {
    //   return $this->response->setJSON([]);
    // }

    // 2. Obtener datos
    $nombreImagen = trim($this->request->getPost('nombreImagen'));
    $nombreImagen = preg_replace('/[^a-zA-Z0-9-_]/', '', $nombreImagen);
    $imagen = $this->request->getFile('imagen');

    // 3. Validar imagen
    if (!$imagen->isValid()) {
      return $this->response->setJSON([
        'success' => false,
        'error' => $imagen->getErrorString()
      ]);
    }

    if ($imagen->hasMoved()) {
      return $this->response->setJSON([
        'success' => false,
        'error' => 'El archivo ya fue movido'
      ]);
    }

    $maxSize = 1024 * 1024 * 10; // 10MB
    $allowedTypes = ['image/webp'];

    if ($imagen->getSize() > $maxSize) {
      return $this->response->setJSON([
        'success' => false,
        'error' => 'El archivo excede el tamaño máximo'
      ]);
    }

    if (!in_array($imagen->getMimeType(), $allowedTypes)) {
      return $this->response->setJSON([
        'success' => false,
        'error' => 'Tipo de archivo no permitido'
      ]);
    }

    // 4. Validar nombre
    if (!$nombreImagen || !preg_match('/^[a-zA-Z0-9-_]+$/', $nombreImagen)) {
      return $this->response->setJSON([]);
    }

    // 5. Configurar rutas (usar directorio público)
    $directorioBase = FCPATH . 'uploads/images/usuarios/';
    $directorioDestino = $directorioBase . $nombreImagen . '/';
    $extension = 'webp'; // Forzar siempre jpeg
    $nombreFinal = $nombreImagen . '.' . $extension;

    try {
      // 6. Crear directorio
      if (!is_dir($directorioDestino)) {
        mkdir($directorioDestino, 0755, true);
      }

      // 7. Mover archivo con nombre y extensión correctos
      $imagen->move($directorioDestino, $nombreFinal, true);

      // 8. URL accesible públicamente
      $urlPublica = base_url("uploads/images/usuarios/{$nombreImagen}/{$nombreFinal}");

      $bitPerfilF = $this->cambiarBitPerfilF(1, $nombreImagen);

      if ($bitPerfilF) {
        $this->session->set([
          'PerfilF' => 1
        ]);
      }

      return $this->response->setJSON([
        'success' => true,
        'url' => $urlPublica, // Incluir URL pública
        'file_info' => [
          'size' => $imagen->getSize(),
          'mime' => $imagen->getMimeType(),
          'extension' => $extension
        ]
      ]);
    } catch (\Exception $e) {
      log_message('error', 'Error subir imagen: ' . $e->getMessage());
      return $this->response->setJSON([]);
    }
  }

  public function postGestionarcliente() {

    $datos = [
      'FK_Cliente'      => $this->session->get('IDCliente'),
      'Nombre'          => $this->request->getPost('Nombre'),
      'ApellidoP'       => $this->request->getPost('ApellidoP'),
      'ApellidoM'       => $this->request->getPost('ApellidoM') ?: null,
      'FechaNacimiento' => $this->request->getPost('FechaNacimiento'),
      'Genero'          => $this->request->getPost('Genero'),
      'Celular'         => $this->request->getPost('Celular'),
      'DireccionID'     => $this->request->getPost('DireccionID') ?: null,
      'CodigoPostal'    => $this->request->getPost('CodigoPostal'),
      'Colonia'         => $this->request->getPost('Colonia'),
      'Calle'           => $this->request->getPost('Calle'),
      'NumExterior'     => $this->request->getPost('NumExterior'),
      'NumInterior'     => $this->request->getPost('NumInterior'),
      'Referencias'     => $this->request->getPost('Referencias'),
      'TipoDireccion'   => $this->request->getPost('TipoDireccion'),
    ];

    $resultado = $this->PerfilModel->gestionarCliente($datos);

    if ($resultado['success']) {
      // Opcional: flashdata o mensaje
      return redirect()->to('/perfil');
    } else {
      return $this->response->setStatusCode(400)->setBody('Error: ' . $resultado['error']);
    }
  }

  private function cambiarBitPerfilF(int $PerfilF, int $ClienteID): bool {

    $PerfilData  = $this->PerfilModel->CambiarPerfilF($PerfilF, $ClienteID);

    return $PerfilData;
  }
}
