<?php

namespace App\Controllers;

use App\Models\PerfilModel;

class Logout extends BaseController {

  public function __construct() {
    helper('form');
  }

  public function postLogout() {
    $session = session();
    $id = $this->request->getPost('clienteID');
    $ultimoAcceso = new PerfilModel();
    $now = $ultimoAcceso->UltimoAcceso($id);

    if ($now == true) {
      $session->destroy();
      return redirect()->to(base_url());
    }
  }
}
