<?php
$categorias = array_group_by($categoriasNav, ['CatID']);
$precios = !empty($productos['data']) ? array_values(array_unique(array_map('intval', array_column($productos['data'], 'PrecioBase')))) : [];
?>
<div class="pt-24 w-full flex bg-gray-50 justify-center">

  <div class="hidden md:inline md:w-1/4 px-5 py-10">
    <section>
      <ul>
        <li class="mt-30 mb-7">
          <p class="inline-flex items-center font-bold text-lg text-primary-950 gap-x-3">
            Filtros
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="21" height="21" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
              <g>
                <path d="M16 90.259h243.605c7.342 33.419 37.186 58.508 72.778 58.508s65.436-25.088 72.778-58.508H496c8.836 0 16-7.164 16-16s-7.164-16-16-16h-90.847c-7.356-33.402-37.241-58.507-72.77-58.507-35.548 0-65.419 25.101-72.772 58.507H16c-8.836 0-16 7.164-16 16s7.164 16 16 16zm273.877-15.958.001-.172c.07-23.367 19.137-42.376 42.505-42.376 23.335 0 42.403 18.983 42.504 42.339l.003.235c-.037 23.407-19.091 42.441-42.507 42.441-23.406 0-42.454-19.015-42.507-42.408zM496 421.74h-90.847c-7.357-33.401-37.241-58.507-72.77-58.507-35.548 0-65.419 25.102-72.772 58.507H16c-8.836 0-16 7.163-16 16s7.164 16 16 16h243.605c7.342 33.419 37.186 58.508 72.778 58.508s65.436-25.089 72.778-58.508H496c8.836 0 16-7.163 16-16s-7.164-16-16-16zm-163.617 58.508c-23.406 0-42.454-19.015-42.507-42.408l.001-.058.001-.172c.07-23.367 19.137-42.377 42.505-42.377 23.335 0 42.403 18.983 42.504 42.338l.003.235c-.034 23.41-19.089 42.442-42.507 42.442zM496 240H252.395c-7.342-33.419-37.186-58.507-72.778-58.507S114.181 206.581 106.839 240H16c-8.836 0-16 7.164-16 16 0 8.837 7.164 16 16 16h90.847c7.357 33.401 37.241 58.507 72.77 58.507 35.548 0 65.419-25.102 72.772-58.507H496c8.836 0 16-7.163 16-16 0-8.836-7.164-16-16-16zm-273.877 15.958-.001.172c-.07 23.367-19.137 42.376-42.505 42.376-23.335 0-42.403-18.983-42.504-42.338l-.003-.234c.035-23.41 19.09-42.441 42.507-42.441 23.406 0 42.454 19.014 42.507 42.408z" fill="currentColor" opacity="1" data-original="#000000" class=""></path>
              </g>
            </svg>
          </p>
        </li>
      </ul>
      <div class="overflow-y-auto h-160">
        <div id="accordion-flush" data-accordion="open" data-active-classes="text-primary-900" data-inactive-classes="text-primary-700">
          <h2 id="accordion-flush-heading-1">
            <button type="button" class="flex items-center justify-between border-t-1 border-primary-200 w-full text-lg py-5 font-medium text-left text-primary-700 gap-3" data-accordion-target="#accordion-flush-body-1" aria-expanded="true" aria-controls="accordion-flush-body-1">
              <span>Precio</span>
              <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
              </svg>
            </button>
          </h2>
          <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
            <div class="pb-7">
              <div class="relative mb-6 mt-3">
                <input id="precio-range" type="range" placeholder="Precio" class="w-full h-8 cursor-pointer appearance-none bg-transparent">
                <span id="precio-min" class="precio-min text-sm text-primary-900 absolute left-0 -bottom-6"></span>
                <span id="precio-max" class="precio-max text-sm text-primary-900 absolute right-0 -bottom-6"></span>
                <!-- Tooltip -->
                <div id="tooltip" class="absolute text-center px-2 py-1 bg-primary-950 text-primary-50 text-sm rounded opacity-0 transition-opacity transform -translate-x-1/2"></div>
              </div>
            </div>
          </div>
          <h2 id="accordion-flush-heading-2">
            <button type="button" class="flex items-center justify-between border-t-1 border-primary-200 text-lg w-full py-5 font-medium text-left text-primary-700 gap-3" data-accordion-target="#accordion-flush-body-2" aria-expanded="true" aria-controls="accordion-flush-body-2">
              <span>Categorias</span>
              <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
              </svg>
            </button>
          </h2>
          <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
            <div class="contenedorCat">
              <?php if (!empty($categorias)): ?>
                <ul id="categorias-check" class="checkbox-group w-full px-2 pb-5 text-sm font-medium text-gray-900" data-group="categorias" data-selection="single">
                  <?php foreach ($categorias as $categoria): ?>
                    <li class="w-full" data-categoria='<?= esc(json_encode($categoria[0])) ?>'>
                      <div class="flex items-center ps-3">
                        <input
                          id="cat-<?= esc($categoria[0]['CatID'] ?? '') ?>"
                          <?= isset($filtro['catID']) && $filtro['catID'] == $categoria[0]['CatID'] ? 'checked' : '' ?>
                          type="checkbox"
                          value="<?= esc($categoria[0]['CatID'] ?? '') ?>"
                          data-nombre="<?= esc($categoria[0]['CatNombre'] ?? '') ?>"
                          class="single-checkbox w-4 h-4 text-primary-900 bg-primary-50 border-primary-400 focus:ring-primary-950 focus:ring-2">
                        <label
                          for="cat-<?= esc($categoria[0]['CatID'] ?? '') ?>"
                          class="w-full py-3 ms-2 text-sm font-normal text-primary-900">
                          <?= esc($categoria[0]['CatNombre'] ?? '') ?>
                        </label>
                      </div>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php else: ?>
                <div class="">Vacio.</div>
              <?php endif; ?>
            </div>
          </div>
          <h2 id="accordion-flush-heading-3">
            <button type="button" class="flex items-center justify-between  border-t-1 border-primary-200 w-full text-lg py-5 font-medium text-left text-primary-700 gap-3" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
              <span>Subcategorias</span>
              <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
              </svg>
            </button>
          </h2>
          <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
            <div class="contenedorSub">
              <?php if (!empty($categorias)): ?>
                <ul id="subcategorias-check" class="checkbox-group w-full px-2 pb-5 text-sm font-medium text-gray-900" data-group="subcategorias" data-selection="single">
                  <?php foreach ($categorias as $categoria): ?>
                    <?php if (!isset($filtro['catID']) || $filtro['catID'] == $categoria[0]['CatID']): ?>
                      <?php foreach ($categoria as $subcategoria): ?>
                        <li class="w-full" data-subcategoria='<?= esc(json_encode($subcategoria)) ?>'>
                          <div class="flex items-center ps-3">
                            <input
                              id="sub-<?= esc($subcategoria['SubID'] ?? '') ?>"
                              type="checkbox"
                              <?= isset($filtro['subID']) && $filtro['subID'] == $subcategoria['SubID'] ? 'checked' : '' ?>
                              value="<?= esc($subcategoria['SubID'] ?? '') ?>"
                              data-nombre="<?= esc($subcategoria['SubNombre'] ?? '') ?>"
                              class="single-checkbox w-4 h-4 text-primary-900 bg-primary-50 border-primary-400 focus:ring-primary-950 focus:ring-2">
                            <label
                              for="sub-<?= esc($subcategoria['SubID'] ?? '') ?>"
                              class="w-full py-3 ms-2 text-sm font-normal text-primary-900">
                              <?= esc($subcategoria['SubNombre'] ?? '') ?>
                            </label>
                          </div>
                        </li>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </ul>
              <?php else: ?>
                <div class="">Vacio.</div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="w-full md:w-3/4 pb-5">

    <div class="px-5 py-10 text-primary-950">
      <div class="contenedorBreadcrumb">
        <nav class="flex" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li>
              <div class="flex items-center">
                <a href="#" class="text-2xl font-medium hover:text-primary-800"><?= esc($filtro['catTitulo']); ?></a>
              </div>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-2xl font-medium hover:text-primary-800 md:ms-2">
                  <?= esc($filtro['subTitulo']) . ' (' . (empty($productos['data']) ? 0 : esc($productos['data'][0]['TotalRecords'])) . ')' ?>
                </span>
              </div>
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="flex justify-between px-5">
      <div>
        <button id="dropdownDelayButton" data-dropdown-toggle="dropdownDelay" data-dropdown-delay="500" data-dropdown-trigger="hover" class="text-white bg-primary-700 hover:bg-primary-900 focus:ring-4 focus:outline-none focus:ring-primary-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">Ordenar por: <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
          </svg>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdownDelay" class="z-10 hidden bg-primary-100 w-48 divide-y divide-primary-100 rounded-lg shadow-md">
          <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dropdownDelayButton">
            <li>
              <div class="flex items-center p-2 rounded-sm hover:bg-primary-200">
                <input id="radio-1" type="radio" value="1" name="orden-radio" checked class="w-4 h-4 text-primary-800 bg-gray-100 border-primary-900 focus:ring-primary-400">
                <label for="radio-1" class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm">Precio más bajo</label>
              </div>
            </li>
            <li>
              <div class="flex items-center p-2 rounded-sm hover:bg-primary-200">
                <input id="radio-2" type="radio" value="2" name="orden-radio" class="w-4 h-4 text-primary-800 bg-gray-100 border-primary-900 focus:ring-primary-400">
                <label for="radio-2" class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm">Precio más alto</label>
              </div>
            </li>
            <li>
              <div class="flex items-center p-2 rounded-sm hover:bg-primary-200">
                <input id="radio-3" type="radio" value="3" name="orden-radio" class="w-4 h-4 text-primary-800 bg-gray-100 border-primary-900 focus:ring-primary-400">
                <label for="radio-3" class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm">A - Z</label>
              </div>
            </li>
            <li>
              <div class="flex items-center p-2 rounded-sm hover:bg-primary-200">
                <input id="radio-4" type="radio" value="4" name="orden-radio" class="w-4 h-4 text-primary-800 bg-gray-100 border-primary-900 focus:ring-primary-400">
                <label for="radio-4" class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm">Z - A</label>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div>
        <div class="relative">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
          </div>
          <input type="search" id="buscarProductos" class="block w-70 p-4 ps-10 text-sm text-gray-900 border border-primary-400 rounded-lg focus:ring-primary-500 focus:border-primary-500" placeholder="Buscar producto" required />
        </div>
      </div>
    </div>

    <div class="contenedorProductos">
      <div class="preciosLista" data-precios="<?= esc(json_encode($precios)) ?>"></div>
      <?php if ($productos['data']): ?>
        <?php
        if ($carrito) {
          $cantidadesProductoID = array_column(
            $carrito['data'],      // el array de origen
            'Cantidad',            // el valor
            'ProductoID'           // la clave
          );
        }
        ?>
        <div class="w-full p-5">
          <div id="productosContainer" class="grid sm:grid-cols-3 md:grid-cols-4 gap-6 md:gap-8 justify-items-center">
            <?php foreach ($productos['data'] as $producto): ?>
              <div id="<?= esc($producto['ID']); ?>" data-nombre="<?= esc(strtolower($producto['Nombre'])); ?>" data-precio="<?= esc((float)$producto['PrecioBase']); ?>" class="producto-card w-full max-w-sm border border-gray-200 rounded-lg shadow-md transform transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                <a href="<?= site_url('detalleprod/') . esc($producto['ID']) ?>">
                  <?= img([
                    'src'   => base_url($producto['ValorImagen']) . 'frontal.png',
                    'alt'   => esc($producto['Nombre']),
                    'class' => "p-8 rounded-t-lg max-h-full"
                  ]); ?>
                </a>
                <div class="px-5 pb-5">
                  <a href="<?= site_url('detalleprod/') . esc($producto['ID']) ?>">
                    <h5 class="md:text-lg font-light leading-5 mb-1 tracking-tight text-gray-900"><?= esc($producto['Nombre']); ?></h5>
                  </a>
                  <p class="text-sm font-thin leading-5 text-gray-900"><?= esc($producto['SubCategoria']); ?></p>
                  <div class="flex items-center mt-2.5 mb-5">
                    <div class="flex items-center space-x-1 rtl:space-x-reverse">
                      <!-- Aquí puedes incluir los íconos de estrellas o cualquier otro contenido dinámico -->
                      <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                      </svg>
                      <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                      </svg>
                      <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                      </svg>
                      <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                      </svg>
                      <svg class="w-4 h-4 text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                      </svg>
                    </div>
                    <span class="bg-primary-100 text-primary-800 text-xs font-semibold px-2.5 py-0.5 rounded-sm">5.0</span>
                  </div>
                  <div class="flex items-center justify-between flex-wrap">
                    <span class="md:text-lg font-light text-gray-900">$<?= esc($producto['PrecioBase']); ?></span>
                    <form method="post">
                      <input class="hidden" name="productoID" value="<?= esc($producto['ID']); ?>" required />
                      <?php
                      $cantidad = isset($cantidadesProductoID[$producto['ID']]) ? $cantidadesProductoID[$producto['ID']] : 0;
                      ?>
                      <?php if ($producto['Stock'] < 1): ?>
                        <button type="button" class="text-primary-900 bg-primary-300 cursor-not-allowed opacity-50 font-normal rounded-lg text-xs md:text-sm px-4 py-1.5 text-center" disabled>
                          Sin stock
                        </button>
                      <?php else: ?>
                        <input class="hidden" name="cantidad" value="1" required />
                        <?php if ($cantidad > 0): ?>
                          <button type="submit" formaction="<?= site_url('carrito/') ?>" class="flex justify-self-end items-center cursor-pointer text-primary-100 bg-primary-600 hover:text-primary-50 focus:ring-2 focus:outline-none focus:ring-primary-700 font-normal rounded-lg text-xs md:text-sm px-4 py-1.5 text-center gap-x-2">
                            Añadido
                            <span class="text-xs text-primary-800 bg-primary-100 w-5 h-5 flex items-center justify-center rounded-full">
                              <?= esc($cantidad) ?>
                            </span>
                          </button>
                        <?php else: ?>
                          <button type="submit" formaction="<?= site_url('carrito/agregar') ?>" class="cursor-pointer text-primary-900 bg-primary-200 hover:bg-primary-500 hover:text-primary-50 focus:ring-2 focus:outline-none focus:ring-primary-700 font-normal rounded-lg text-xs md:text-sm px-4 py-1.5 text-center">
                            Agregar +
                          </button>
                        <?php endif; ?>
                      <?php endif; ?>
                    </form>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

      <?php else: ?>

        <div class=" w-full text-center my-30 text-primary-950">
          <div class="pb-10 flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="200" height="200" x="0" y="0" viewBox="0 0 682.667 682.667" xml:space="preserve">
              <g>
                <g clip-path="url(#a)" transform="matrix(1.33333 0 0 -1.33333 0 682.667)">
                  <path d="M0 0c0 31.132 29.589 63.362 48.626 92.377 5.095 7.763 16.483 7.763 21.577 0C89.241 63.362 118.829 31.132 118.829 0c0-32.814-26.6-59.415-59.414-59.415C26.602-59.415 0-32.814 0 0Z" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(51.697 98.446)" fill="none" stroke="currentColor" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                  <path d="M0 0c-47.051-44.235-76.333-106.426-76.333-175.307 0-52.87 17.261-101.792 46.558-141.686" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(83.833 431.307)" fill="none" stroke="currentColor" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                  <path d="M0 0c42.979 43.702 69.402 103.097 69.402 168.53 0 134.265-111.256 243.108-248.5 243.108-54.02 0-104.015-16.864-144.784-45.503" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(435.098 87.47)" fill="none" stroke="currentColor" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                  <path d="M0 0c35.905-19.71 77.313-30.964 121.415-30.964 57.316 0 110.101 18.984 152.141 50.874" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(134.585 43.856)" fill="none" stroke="currentColor" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                  <path d="M0 0c-11.503 16.535-28.426 26.999-47.31 26.999-18.883 0-35.806-10.464-47.309-26.999" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(303.31 195.906)" fill="none" stroke="currentColor" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                  <path d="M0 0c7.399-8.49 18.283-13.862 30.429-13.862C42.574-13.862 53.458-8.49 60.856 0" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(110.157 258.08)" fill="none" stroke="currentColor" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                  <path d="M0 0c-7.399-8.49-18.283-13.862-30.429-13.862-12.145 0-23.029 5.372-30.428 13.862" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(401.843 258.08)" fill="none" stroke="currentColor" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                  <path d="M0 0c14.974-3.494 39.431-20.963 44.921-26.453" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(372.744 322.687)" fill="none" stroke="currentColor" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                  <path d="M0 0c-14.974-3.494-39.431-20.963-44.921-26.453" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(139.255 322.687)" fill="none" stroke="currentColor" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                </g>
              </g>
            </svg>
          </div>
          <span class="text-lg"> Lo sentimos, no hay productos disponibles</span>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const preciosOriginales = <?= json_encode($precios) ?>;

    const range = document.getElementById("precio-range");
    const tooltip = document.getElementById("tooltip");
    const precioMinSpan = document.getElementById("precio-min");
    const precioMaxSpan = document.getElementById("precio-max");

    document.addEventListener('input', e => {
      if (e.target && (e.target.id === 'buscarProductos' || e.target.id === 'inputSearchNav')) {
        const q = e.target.value.trim().toLowerCase();
        document.querySelectorAll('.producto-card').forEach(card => {
          card.style.display = card.dataset.nombre.toLowerCase().includes(q) ? '' : 'none';
        });
      }
    });

    // Delegación para los radio de “ordenar por”
    document.addEventListener('change', e => {
      // ¿Fue un input de nombre "orden-radio"?
      if (e.target.matches('input[name="orden-radio"]')) {
        const criterio = e.target.value; // "1", "2", "3" ó "4"
        ordenarTarjetas(criterio);
      }
    });

    function ordenarTarjetas(criterio) {
      const cont = document.getElementById('productosContainer');
      if (!cont) return;

      // Tomamos un array de las tarjetas actuales
      const cards = Array.from(cont.querySelectorAll('.producto-card'));

      cards.sort((a, b) => {
        const nombreA = a.dataset.nombre;
        const nombreB = b.dataset.nombre;
        const precioA = parseFloat(a.dataset.precio);
        const precioB = parseFloat(b.dataset.precio);

        switch (criterio) {
          case '1': // Precio más bajo
            return precioA - precioB;
          case '2': // Precio más alto
            return precioB - precioA;
          case '3': // A → Z
            return nombreA.localeCompare(nombreB);
          case '4': // Z → A
            return nombreB.localeCompare(nombreA);
          default:
            return 0;
        }
      });

      // Reemplazamos el orden en el DOM
      cards.forEach(card => cont.appendChild(card));
    }

    /**
     * Configura el slider y el tooltip usando el array de precios.
     * Establece los valores mínimo y máximo del slider y actualiza los spans.
     */
    function configurarSlider(precios) {
      const minPrecio = precios.length > 0 ? Math.min(...precios) : 0;
      const maxPrecio = precios.length > 0 ? Math.max(...precios) : 0;

      precioMinSpan.textContent = `${minPrecio}.MXN`;
      precioMaxSpan.textContent = `${maxPrecio}.MXN`;

      const maxIndex = Math.max(precios.length - 1, 0);
      range.min = 0;
      range.max = maxIndex;
      range.step = 1;
      range.value = maxIndex;

      actualizarTooltip(precios);
    }

    /**
     * Actualiza la posición y el contenido del tooltip según el valor actual del slider.
     */
    function actualizarTooltip(precios) {
      if (precios.length === 0) return;

      // Usar requestAnimationFrame para actualizar posición sincronizado con el render
      requestAnimationFrame(() => {
        const index = parseInt(range.value, 10);
        const value = precios[index];
        const percent = index / (precios.length - 1);

        // Obtener posición del slider en el documento
        const rangeRect = range.getBoundingClientRect();

        // Calcular posición absoluta considerando scroll
        const thumbOffset = percent * range.offsetWidth;

        tooltip.style.position = "fixed";
        tooltip.style.zIndex = "40";
        tooltip.style.left = `${thumbOffset + rangeRect.left}px`;
        tooltip.style.top = `${rangeRect.top - 40}px`;
        tooltip.textContent = `$${value}`;
      });
    }

    /**
     * Maneja el clic sobre la barra del slider optimizado para movimiento continuo
     */
    function moverSliderConClic(event, precios) {
      const rangeRect = range.getBoundingClientRect();
      const clickX = event.clientX - rangeRect.left;
      const porcentajeClick = clickX / rangeRect.width;

      const min = parseFloat(range.min);
      const max = parseFloat(range.max);
      const step = parseFloat(range.step) || 1;
      const valorActual = parseFloat(range.value);

      // Calcular la posición actual del thumb
      const posicionThumb = ((valorActual - min) / (max - min)) * rangeRect.width;
      const margenThumb = 15; // margen alrededor del thumb

      if (Math.abs(clickX - posicionThumb) > margenThumb) {
        const nuevoValor = min + Math.round((porcentajeClick * (max - min)) / step) * step;
        const valorAjustado = Math.min(max, Math.max(min, nuevoValor));

        if (valorAjustado !== valorActual) {
          range.value = valorAjustado;
          // Forzar la actualización de la UI y disparar el evento "input"
          range.dispatchEvent(new Event('input', {
            bubbles: true
          }));
        }
      }
    }

    /**
     * Activa o desactiva la visibilidad del tooltip.
     */
    function toggleTooltip(show) {
      tooltip.style.visibility = show ? 'visible' : 'hidden';
      tooltip.style.opacity = show ? '1' : '0';
    }

    /**
     * Configura los listeners para el slider, eliminando previamente los existentes.
     */
    function configurarListeners(precios) {
      limpiarListeners();

      const handlePointerDown = (event) => {
        toggleTooltip(true);
        moverSliderConClic(event, precios);
      };

      const handlePointerMove = () => actualizarTooltip(precios);

      const handleInput = async () => {
        actualizarTooltip(precios);
        await enviarSeleccion(precios); // Se asume que esta función está definida en otro lugar
      };

      range.addEventListener('pointerdown', handlePointerDown, {
        passive: true
      });
      range.addEventListener('pointerup', () => toggleTooltip(false));
      range.addEventListener('pointerleave', () => toggleTooltip(false));
      range.addEventListener('pointermove', handlePointerMove, {
        passive: true
      });
      range.addEventListener('input', handleInput);

      // Guardar las referencias para eliminar los listeners cuando sea necesario
      range._listeners = {
        pointerdown: handlePointerDown,
        pointerup: () => toggleTooltip(false),
        pointerleave: () => toggleTooltip(false),
        pointermove: handlePointerMove,
        input: handleInput
      };
    }

    /**
     * Elimina los listeners previamente configurados para evitar duplicados.
     */
    function limpiarListeners() {
      if (range._listeners) {
        const {
          pointerdown,
          pointerup,
          pointerleave,
          pointermove,
          input
        } = range._listeners;
        range.removeEventListener('pointerdown', pointerdown);
        range.removeEventListener('pointerup', pointerup);
        range.removeEventListener('pointerleave', pointerleave);
        range.removeEventListener('pointermove', pointermove);
        range.removeEventListener('input', input);
        delete range._listeners;
      }
    }

    // Inicialización: configurar el slider y los listeners con los valores originales
    configurarSlider(preciosOriginales.sort((a, b) => a - b));
    configurarListeners(preciosOriginales.sort((a, b) => a - b));

    // Función que reconfigura el slider leyendo los nuevos datos de precios
    function reinitializeSlider() {
      const contenedorPrecio = document.querySelector('.preciosLista');
      if (contenedorPrecio) {
        try {
          // Se extraen los precios del atributo data-precios (deben estar actualizados en el HTML)
          const preciosData = contenedorPrecio.getAttribute('data-precios');
          const nuevosPrecios = JSON.parse(preciosData);

          configurarSlider(nuevosPrecios.sort((a, b) => a - b));

          configurarListeners(nuevosPrecios.sort((a, b) => a - b));

        } catch (error) {
          console.error('Error reinitializing slider:', error);
        }
      }
    }

    document.addEventListener('change', async (e) => {
      const checkbox = e.target.closest('.single-checkbox');
      if (!checkbox) return;

      const group = checkbox.closest('.checkbox-group');
      if (!group) return;

      if (group.dataset.selection === 'single') {
        handleSingleSelection(group, checkbox);
      }

      await enviarSeleccion();

      // Reconfiguramos el slider después de actualizar la selección
      reinitializeSlider();
    });

    function handleSingleSelection(group, selectedCheckbox) {
      if (group.id === 'categorias-check') {
        const catId = selectedCheckbox.value;
        document.querySelectorAll(`#subcategorias-check .single-checkbox`).forEach(subCheckbox => {
          const associatedCategories = JSON.parse(subCheckbox.dataset.associatedCategories || "[]");
          if (subCheckbox.checked && !associatedCategories.includes(catId)) {
            subCheckbox.checked = false;
          }
        });
      }

      group.querySelectorAll('.single-checkbox').forEach(checkbox => {
        if (checkbox !== selectedCheckbox) checkbox.checked = false;
      });
    }

    function obtenerPrecioSeleccionado(precios) {
      if (!precios || !Array.isArray(precios)) return null; // Verifica si precios es válido
      const index = parseInt(range?.value, 10);
      return precios[index] ?? null; // Evita errores si el índice no es válido
    }

    async function enviarSeleccion(precios) {
      try {
        const payload = {
          categorias: obtenerSeleccion('categorias-check'),
          subcategorias: obtenerSeleccion('subcategorias-check'),
          precio: obtenerPrecioSeleccionado(precios),
          orden: obtenerValorRadioSeleccionado('orden-radio')
        };

        await actualizarProductos(payload);
      } catch (error) {
        console.error('Error al enviar selección:', error);
        // Puedes agregar aquí manejo de errores adicional (ej. mostrar mensaje al usuario)
      }
    }

    function obtenerValorRadioSeleccionado(nombreGrupo) {
      const radioSeleccionado = document.querySelector(
        `input[type="radio"][name="${nombreGrupo}"]:checked`
      );
      return radioSeleccionado?.value || null;
    }

    function obtenerSeleccion(groupId, multiple = false) {
      const checkboxes = [...document.querySelectorAll(`#${groupId} .single-checkbox:checked`)];
      return multiple ? checkboxes.map(({
          value,
          dataset
        }) => ({
          id: value,
          nombre: dataset.nombre
        })) :
        checkboxes.length ? {
          id: checkboxes[0].value,
          nombre: checkboxes[0].dataset.nombre
        } : null;
    }

    async function actualizarProductos(datos) {
      try {
        const response = await fetch('<?= site_url('productos/filtrarproductos') ?>', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            // '<?= csrf_header() ?>': '<?= csrf_hash() ?>'
          },
          body: JSON.stringify(datos),
          cache: 'no-store' // Opción más efectiva que 'reload' para POST
        });

        if (!response.ok) throw new Error(`Error en la respuesta: ${response.status} ${response.statusText}`);

        const resultado = await response.json();

        const doc = new DOMParser().parseFromString(resultado.htmlProducto, 'text/html');

        if (resultado.success) {
          ['.contenedorSub', '.contenedorBreadcrumb', '.contenedorProductos'].forEach(selector => {
            const nuevo = doc.querySelector(selector);
            const actual = document.querySelector(selector);
            if (nuevo && actual) {
              actual.innerHTML = nuevo.innerHTML;
            }
          });
        }

      } catch (error) {
        console.error('Error al actualizar productos:', error);
      }
    }

  });
</script>