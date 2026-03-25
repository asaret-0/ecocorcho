<?php
$categorias = array_group_by($categoriasNav, ['CatID']);
?>

<nav class="h-24 fixed w-full z-40 top-0 start-0 bg-primary-400">
  <div class="flex flex-wrap items-center justify-around mx-auto bg-primary-400">
    <div>
      <a href="<?= base_url() ?>" class="flex items-center space-x-3 rtl:space-x-reverse">
        <svg width="130" viewBox="0 0 390 267">
          <g id="SvgjsG10015" featurekey="symbolFeature-0" transform="matrix(1.365231956734165,0,0,1.365231956734165,80.30687602215252,-3.7004145823100316)" fill="#381a10">
            <path xmlns="http://www.w3.org/2000/svg" fill="" d="M83.96 17.36q.99 0 1.95.58 34.41 21.18 47.55 29.17a3.7 3.69 15.7 0 1 1.77 3.15q.02 7.05.04 28.48.02 21.42.01 28.48a3.7 3.69-15.8 0 1-1.77 3.15q-13.13 8.01-47.5 29.24-.95.59-1.95.59t-1.95-.58q-34.41-21.18-47.55-29.17a3.7 3.69 15.7 0 1-1.77-3.15q-.02-7.05-.04-28.48-.02-21.42-.01-28.48a3.7 3.69-15.8 0 1 1.77-3.15q13.12-8.01 47.5-29.24.95-.59 1.95-.59m.02 14.83q.76 0 1.28.32 17.53 10.72 34.87 21.35a.43.43 0 0 0 .44 0l6.41-4a.11.11 0 0 0 0-.19q-16.99-10.48-42.72-26.18-.11-.07-.28-.07t-.28.07Q57.98 39.21 40.99 49.7a.11.11 0 0 0 0 .19l6.42 3.99a.43.43 0 0 0 .44 0Q65.18 43.24 82.7 32.51q.52-.32 1.28-.32M84 47.28q.85.01 1.38.33 8.88 5.41 22.3 13.76a.41.4 43.8 0 0 .41 0l6.6-4.12a.11.11 0 0 0 0-.19q-16.2-10.04-30.54-18.68-.02-.01-.08-.02h-.15q-.06.01-.08.02Q69.5 47.02 53.3 57.06a.11.11 0 0 0 0 .19l6.6 4.12a.41.4-43.8 0 0 .41 0q13.42-8.35 22.3-13.76.53-.33 1.39-.33M65.85 64.55a.33.33 0 0 0 0 .56l18.08 11.13a.33.33 0 0 0 .34 0l17.98-11.21a.33.33 0 0 0 0-.56L84.18 53.34a.33.33 0 0 0-.34 0zm63.33 10.18a.31.31 0 0 0 .48-.26l.03-19.26a.31.31 0 0 0-.47-.27l-15.66 9.61a.31.31 0 0 0 0 .53zM38.91 55.15a.34.34 0 0 0-.52.3l.1 19.06a.34.34 0 0 0 .52.29l15.66-9.62a.34.34 0 0 0-.01-.58zm3.75 24.01a.31.31 0 0 0 .01.52l38.37 23.65a.31.31 0 0 0 .47-.27V81.48a.31.31 0 0 0-.15-.26L60.4 68.3a.31.31 0 0 0-.32 0zm65.37-10.95a.33.33 0 0 0-.34 0L87.23 80.96a.33.33 0 0 0-.16.28v21.55a.33.33 0 0 0 .5.28l37.85-23.6a.33.33 0 0 0 0-.56zm-20.96 63.74a.32.32 0 0 0 .49.28l41.97-26.17a.32.32 0 0 0 .15-.27V83.98a.32.32 0 0 0-.49-.27l-41.97 26.17a.32.32 0 0 0-.15.27zm-48.63-25.86a.32.32 0 0 0 .15.27l42.44 26.16a.32.32 0 0 0 .49-.27v-21.84a.32.32 0 0 0-.15-.27L38.93 83.97a.32.32 0 0 0-.49.27z"></path>
          </g>
          <g id="SvgjsG10016" featurekey="nameFeature-0" transform="matrix(1.3535252755101594,0,0,1.3535252755101594,17.72607744678537,191.70355831613514)" fill="#381a10">
            <path d="M1.68 40 l0 -27.4 l20.04 0 l0 5.6 l-13.84 0 l0 5.16 l12.8 0 l0 5.44 l-12.8 0 l0 5.6 l13.88 0 l0 5.6 l-20.08 0 z M39.218 17.8 c-4.64 0 -8.16 3.72 -8.16 8.44 c0 4.84 3.52 8.52 8.36 8.52 c3.36 0 5.92 -1.76 7.48 -4.44 l4.84 3.36 c-2.64 4.32 -6.68 6.88 -12.24 6.88 c-8.44 0 -14.76 -6.28 -14.76 -14.32 c0 -7.96 6.28 -14.2 14.6 -14.2 c5.4 0 9.68 2.24 12.28 6.84 l-4.92 3.4 c-1.6 -2.64 -4 -4.48 -7.48 -4.48 z M68.876 40.56 c-8 0 -14.52 -6.12 -14.52 -14.24 c0 -8.16 6.52 -14.28 14.52 -14.28 c8.2 0 14.52 6.12 14.52 14.24 c0 8.16 -6.32 14.28 -14.52 14.28 z M68.876 34.8 c4.64 0 8.2 -3.68 8.2 -8.52 c0 -4.76 -3.56 -8.48 -8.2 -8.48 s-8.2 3.72 -8.2 8.52 s3.56 8.48 8.2 8.48 z M100.81400000000001 17.8 c-4.64 0 -8.16 3.72 -8.16 8.44 c0 4.84 3.52 8.52 8.36 8.52 c3.36 0 5.92 -1.76 7.48 -4.44 l4.84 3.36 c-2.64 4.32 -6.68 6.88 -12.24 6.88 c-8.44 0 -14.76 -6.28 -14.76 -14.32 c0 -7.96 6.28 -14.2 14.6 -14.2 c5.4 0 9.68 2.24 12.28 6.84 l-4.92 3.4 c-1.6 -2.64 -4 -4.48 -7.48 -4.48 z M130.472 40.56 c-8 0 -14.52 -6.12 -14.52 -14.24 c0 -8.16 6.52 -14.28 14.52 -14.28 c8.2 0 14.52 6.12 14.52 14.24 c0 8.16 -6.32 14.28 -14.52 14.28 z M130.472 34.8 c4.64 0 8.2 -3.68 8.2 -8.52 c0 -4.76 -3.56 -8.48 -8.2 -8.48 s-8.2 3.72 -8.2 8.52 s3.56 8.48 8.2 8.48 z M159.33 18.28 l-4.56 0 l0 7.32 l4.36 0 c2.68 0 4.32 -1.52 4.32 -3.64 s-1.36 -3.68 -4.12 -3.68 z M154.77 30.68 l0 9.32 l-6.2 0 l0 -27.4 l11.68 0 c5.84 0 9.44 3.76 9.44 9.12 c0 4.28 -2.84 7.84 -7.48 8.76 l8.72 9.52 l-8.08 0 z M187.86800000000002 17.8 c-4.64 0 -8.16 3.72 -8.16 8.44 c0 4.84 3.52 8.52 8.36 8.52 c3.36 0 5.92 -1.76 7.48 -4.44 l4.84 3.36 c-2.64 4.32 -6.68 6.88 -12.24 6.88 c-8.44 0 -14.76 -6.28 -14.76 -14.32 c0 -7.96 6.28 -14.2 14.6 -14.2 c5.4 0 9.68 2.24 12.28 6.84 l-4.92 3.4 c-1.6 -2.64 -4 -4.48 -7.48 -4.48 z M221.446 40 l0 -10.72 l-11.6 0 l0 10.72 l-6.2 0 l0 -27.4 l6.2 0 l0 11 l11.6 0 l0 -11 l6.2 0 l0 27.4 l-6.2 0 z M245.744 40.56 c-8 0 -14.52 -6.12 -14.52 -14.24 c0 -8.16 6.52 -14.28 14.52 -14.28 c8.2 0 14.52 6.12 14.52 14.24 c0 8.16 -6.32 14.28 -14.52 14.28 z M245.744 34.8 c4.64 0 8.2 -3.68 8.2 -8.52 c0 -4.76 -3.56 -8.48 -8.2 -8.48 s-8.2 3.72 -8.2 8.52 s3.56 8.48 8.2 8.48 z"></path>
          </g>
        </svg>
      </a>
    </div>
    <div class="pt-3 w-2/6">
      <form class="w-full max-w-md">
        <div class="relative">
          <input
            type="search"
            id="inputSearchNav"
            title="search"
            class="block w-full px-3 py-2.5 text-sm text-primary-900 bg-primary-50 border-2 border-primary-300 rounded-lg placeholder-primary-300 focus:ring-primary-500 focus:border-primary-500"
            placeholder="Buscar"
            required />
          <button
            type="submit"
            class="absolute top-0 right-0 h-full p-2.5 text-sm font-medium text-primary-50 bg-primary-600 border border-primary-600 rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
          </button>
        </div>
      </form>
    </div>
    <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-primary-950 rounded-lg md:hidden hover:bg-primary-100 focus:outline-none focus:ring-2 focus:ring-primary-600" aria-controls="navbar-user" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-user">
      <div class="flex flex-col md:flex-row px-2 gap-x-5 pb-2 md:pt-8 md:pb-0">
        <ul class="flex flex-col md:items-center gap-x-2 font-semibold text-xl p-4 md:p-0 border-2 border-primary-700 rounded-lg bg-primary-400 rtl:space-x-reverse md:flex-row md:mt-1 md:border-0">
          <li>
            <a href="<?= base_url() ?>" class="block py-2 px-2 text-primary-50 rounded-lg hover:bg-primary-800 md:border-0 md:p-2" aria-current="page">Inicio</a>
          </li>
          <li>
            <button id="dropdownHoverButton" data-dropdown-toggle="nosotros" data-dropdown-trigger="hover" class="flex items-center justify-between w-full py-2 px-2 text-primary-50 rounded-lg hover:bg-primary-800 md:border-0 md:p-2 md:w-auto">Nosotros <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
              </svg></button>
            <!-- Dropdown menu -->
            <div id="nosotros" class="z-50 hidden font-normal bg-primary-800 divide-y divide-primary-100 rounded-lg shadow-sm">
              <ul class="py-2 text-md font-light text-primary-50" aria-labelledby="dropdownHoverButton">
                <li>
                  <a href="<?= base_url('#historia-empresa') ?>" class=" block px-4 py-2 hover:bg-primary-600">Historia de la empresa</a>
                </li>
                <li>
                  <a href="<?= base_url('#valores-empresa') ?>" class="block px-4 py-2 hover:bg-primary-600">Valores</a>
                </li>
                <li>
                  <a href="<?= base_url('#mision-vision') ?>" class="block px-4 py-2 hover:bg-primary-600">Misión y Visión</a>
                </li>
                <li>
                  <a href="<?= base_url('#estructura') ?>" class="block px-4 py-2 hover:bg-primary-600">Estructura organizacional</a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a href="<?= site_url('productos') ?>" id="dropdownHoverButton" data-dropdown-toggle="productosNav" data-dropdown-trigger="hover" class="flex items-center justify-between w-full py-2 px-2 text-primary-50 rounded-lg hover:bg-primary-800 md:border-0 md:p-2 md:w-auto">Productos <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
              </svg></a>
            <!-- Dropdown menu -->
            <div id="productosNav" class="z-60 hidden -translate-y-1/3 md:translate-y-0 font-normal bg-primary-800 rounded-lg shadow-sm sm:w-auto">
              <div aria-labelledby="dropdownHoverButton" class="flex font-thin text-sm">
                <?php if (!empty($categorias)): ?>
                  <div class="p-3 grid grid-cols-2 md:grid-cols-3 gap-3">
                    <?php foreach ($categorias as $categoria): ?>
                      <?php
                      $catID = esc($categoria[0]['CatID']);
                      $catNombre = esc(convert_accented_characters($categoria[0]['CatNombre']));
                      $catURL = site_url(sprintf('productos/%s/%s', $catID, $catNombre));
                      ?>

                      <section class="text-primary-100">
                        <a href="<?= $catURL ?>"
                          class="block px-4 text-2xl font-bold py-3 hover:text-primary-300 transition-colors duration-200">
                          <?= esc($categoria[0]['CatNombre']) ?>
                        </a>

                        <ul>
                          <?php foreach ($categoria as $subcategoria): ?>
                            <?php
                            $subID = esc($subcategoria['SubID']);
                            $subNombre = esc(convert_accented_characters($subcategoria['SubNombre']));
                            $subURL = site_url(sprintf('productos/%s/%s/%s/%s', $catID, $catNombre, $subID, $subNombre));
                            ?>

                            <li>
                              <a href="<?= $subURL ?>"
                                class="block px-4 py-1 hover:text-primary-200 transition-colors duration-200 hover:pl-5">
                                <?= esc($subcategoria['SubNombre']) ?>
                              </a>
                            </li>
                          <?php endforeach; ?>
                        </ul>
                      </section>
                    <?php endforeach; ?>

                  </div>
                <?php else: ?>
                  <div class="">Vacio.</div>
                <?php endif; ?>
              </div>
              <div class="pb-5 pr-5 text-right">
                <a href="<?= esc($catproductos) ?>" class="inline-flex items-center font-normal text-2xl  text-primary-300 hover:text-primary-50 hover:underline">
                  Ver todos los productos
                  <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                  </svg>
                </a>
              </div>
            </div>
          </li>
          <!-- <li>
              <a href="#" class="block py-2 px-2 text-primary-50 rounded-lg hover:bg-primary-800 md:border-0 md:p-2">Contacto</a>
            </li> -->
        </ul>
        <hr id="hr-nav" class="md:hidden w-48 h-1 mx-auto my-4 bg-primary-900 border-0 rounded-sm">
        <ul class="flex flex-col md:items-center gap-x-4 font-semibold text-xl p-4 md:p-0 border-2 border-primary-700 rounded-lg bg-primary-400 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
          <li>
            <span class="flex items-start">
              <a href="<?= site_url('carrito') ?>">
                <svg class="w-8 h-10 text-primary-50 hover:text-primary-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="8" height="10" fill="none" viewBox="0 -2 20 28">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z" />
                </svg>
              </a>
              <span class="carritoCont text-xs text-primary-800 bg-primary-100 w-5 h-5 flex items-center justify-center rounded-full">
                <?= !empty($carrito['data']) ? esc($carrito['data'][0]['TotalProductos']) : '0' ?>
              </span>
            </span>
          </li>
          <li class="flex justify-center">
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
              <button type="button" class="cursor-pointer flex text-sm bg-primary-900 rounded-full md:me-0 focus:ring-4 focus:ring-primary-50 hover:ring-4 hover:ring-primary-200" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-trigger="hover" data-dropdown-placement="bottom">
                <?php
                // --- Lógica de obtención de la URL de avatar (mejor aún: ponla en un helper) ---
                $clienteID       = esc($IDCliente);
                $relativePath = "uploads/images/usuarios/{$clienteID}/{$clienteID}.webp";
                $fullPath     = FCPATH . $relativePath;

                if ($PerfilF == 1 && file_exists($fullPath)) {
                  // Si no es perfil ficticio y el archivo existe, usarlo con cache-busting
                  $version  = filemtime($fullPath);
                  $avatarSrc = base_url($relativePath) . '?v=' . $version;
                } else {
                  // Perfil ficticio o imagen faltante → usar icono SVG
                  $avatarSrc = null;
                }
                ?>
                <?php if (is_null($avatarSrc)): ?>
                  <!-- SVG por defecto -->
                  <svg class="w-11 h-11 text-primary-50" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd"
                      d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                      clip-rule="evenodd" />
                  </svg>
                <?php else: ?>
                  <!-- Avatar de usuario -->
                  <img
                    id="<?= $clienteID ?>"
                    src="<?= esc($avatarSrc) ?>"
                    alt="<?= esc($email) ?>"
                    class="w-11 h-11 rounded-full object-cover"
                    loading="lazy"
                    width="44"
                    height="44">
                <?php endif; ?>
              </button>
              <!-- Dropdown menu -->
              <div class="z-50 hidden my-4 text-base list-none bg-primary-50 divide-y divide-primary-100 rounded-lg shadow-sm" id="user-dropdown">
                <div class="px-4 py-3">
                  <span class="block text-sm text-primary-500 truncate"><?= esc($email) ?></span>
                </div>
                <ul class="py-2 font-normal" aria-labelledby="user-menu-button">
                  <li>
                    <a href="<?= site_url('perfil/') ?>" class="block px-4 py-2 text-sm text-primary-700 hover:bg-primary-100">Perfil</a>
                  </li>
                  <li>
                    <a href="<?= site_url('pedido/') ?>" class="block px-4 py-2 text-sm text-primary-700 hover:bg-primary-100">Mis pedidos</a>
                  </li>
                  <li>
                    <a class="block px-4 py-2 text-sm text-primary-700 hover:bg-primary-100">Ajustes</a>
                  </li>
                  <li>
                    <a class="block px-4 py-2 text-sm text-primary-700 hover:bg-primary-100">Ayuda</a>
                  </li>
                  <li>
                    <button id="trigger-modal-Logout" type="button" class="cursor-pointer text-start w-full block px-4 py-3 text-sm font-bold text-primary-700 hover:bg-primary-100">Cerrar sesión</button>
                  </li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div id="modal-Logout" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-md max-h-full">
    <div class="relative bg-gray-950 rounded-lg shadow-sm">
      <button type="button" class="absolute top-3 end-2.5 text-primary-400 bg-transparent hover:bg-primary-200 hover:text-primary-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="modal-Logout">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Cerrar</span>
      </button>
      <div class="p-4 md:p-5 text-center">
        <svg class="mx-auto mb-4 text-primary-50 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <h3 class="mb-5 text-lg font-normal text-primary-200">¿Deseas cerrar sesión?</h3>
        <form id="logout" method="POST" action="<?= site_url('logout/logout') ?>">
          <input type="hidden" name="clienteID" value="<?= esc($IDCliente) ?>">
          <button data-modal-hide="modal-Logout" type="submit" class="cursor-pointer text-primary-50 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-500 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
            Si, estoy seguro
          </button>
          <button data-modal-hide="modal-Logout" type="button" class="cursor-pointer py-2.5 px-5 ms-3 text-sm font-medium text-primary-900 focus:outline-none bg-primary-50 rounded-lg border border-primary-300 hover:bg-primary-200 focus:z-10 focus:ring-4 focus:ring-primary-100">No, cancelar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function initModal(targetId, customOptions = {}, customInstanceOptions = {}) {
    // Obtener el elemento del DOM
    const targetEl = document.getElementById(targetId);
    if (!targetEl) {
      console.error(`No se encontró el elemento con ID \"${targetId}\"`);
      return null;
    }

    // Opciones por defecto
    const defaultOptions = {
      placement: 'top-center',
      backdrop: 'static',
      backdropClasses: 'bg-gray-900/50 fixed inset-0 z-40',
      closable: true,
      onHide: () => console.log('modal is hidden'),
      onShow: () => console.log('modal is shown'),
      onToggle: () => console.log('modal has been toggled'),
    };

    // Opciones de instancia por defecto
    const defaultInstanceOptions = {
      id: targetId,
      override: true,
    };

    // Fusionar opciones
    const options = {
      ...defaultOptions,
      ...customOptions
    };

    const instanceOptions = {
      ...defaultInstanceOptions,
      ...customInstanceOptions
    };

    // Crear y mostrar modal
    const modal = new Modal(targetEl, options, instanceOptions);

    return modal;
  }

  const ModalLO = initModal(
    'modal-Logout', {
      placement: 'center'
    }, {
      id: 'modal-Logout'
    }
  );

  document.addEventListener('DOMContentLoaded', () => {
    const logoutBtn = document.querySelector('#trigger-modal-Logout');
    if (!logoutBtn) return;
    logoutBtn.addEventListener('click', e => {
      e.preventDefault();
      ModalLO.show();
    });
  });
</script>