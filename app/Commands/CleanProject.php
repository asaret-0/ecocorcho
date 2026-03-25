<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Services;

class CleanProject extends BaseCommand {
  protected $group       = 'custom';
  protected $name        = 'clean:project';
  protected $description = 'Limpia caché, logs, sesiones y debugbar en writable/.';

  public function run(array $params) {
    // Limpiar la caché
    $cache = Services::cache();
    $cache->clean();
    CLI::write('✔ Caché limpiada', 'green');

    // Borrar archivos de logs
    $this->deleteFilesIn(WRITEPATH . 'logs/', '*.log');
    CLI::write('✔ Logs eliminados', 'green');

    // Borrar archivos de sesión
    $this->deleteFilesIn(WRITEPATH . 'session/', '*');
    CLI::write('✔ Sesiones eliminadas', 'green');

    // Borrar archivos de debugbar
    $this->deleteFilesIn(WRITEPATH . 'debugbar/', '*');
    CLI::write('✔ Debugbar eliminada', 'green');
  }

  private function deleteFilesIn(string $folder, string $pattern) {
    $files = glob($folder . $pattern);
    foreach ($files as $file) {
      if (is_file($file)) {
        unlink($file);
      }
    }
  }
}

//php spark clean:project