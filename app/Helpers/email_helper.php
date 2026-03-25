<?php

function enviarEmail(
  string $destinatario,
  string $asunto,
  string $contenido = '',
  array $datosVista = [],
  ?string $remitenteEmail = null,
  ?string $remitenteNombre = null,
  bool $esVista = true
): bool {
  $email = \Config\Services::email();

  $remitenteEmail = $remitenteEmail ?? env('email.fromEmail');
  $remitenteNombre = $remitenteNombre ?? env('email.fromName');

  $email->setFrom($remitenteEmail, $remitenteNombre);
  $email->setTo($destinatario);
  $email->setSubject($asunto);

  if (empty($contenido)) {
    $mensaje = 'Este es un correo automático sin contenido específico.';
  } elseif ($esVista) {
    $mensaje = view($contenido, $datosVista);
  } else {
    $mensaje = $contenido;
  }

  $email->setMessage($mensaje);

  if (!$email->send()) {
    log_message('error', 'Error al enviar email: ' . $email->printDebugger(['headers']));
    return false;
  }

  return true;
}
