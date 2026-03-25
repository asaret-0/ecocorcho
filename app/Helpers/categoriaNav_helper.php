<?php

use App\Models\CategoriaModel;

function Categorias(): array {
  $categoriaModel = new CategoriaModel();
  return $categoriaModel->categoria()['data'] ?? [];
}

function SubCategorias(): array {
  $categoriaModel = new CategoriaModel();
  return $categoriaModel->subcategoria()['data'] ?? [];
}

function CategoriasNavbar(): array {
  $categoriaModel = new CategoriaModel();
  return $categoriaModel->CategoriasNavbar()['data'] ?? [];
}
