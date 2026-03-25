<?php
function getUserAvatarUrl(?int $userId, int $isFakeProfile): ?string {
  if ($isFakeProfile !== 1 || ! $userId) {
    return null;
  }

  $relativePath = "uploads/images/usuarios/{$userId}/{$userId}.webp";
  $fullPath     = FCPATH . $relativePath;

  if (file_exists($fullPath)) {
    $version = filemtime($fullPath);
    return base_url($relativePath) . '?v=' . $version;
  }

  return null;
}
