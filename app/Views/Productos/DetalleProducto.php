<div class="h-auto pt-24 bg-gray-50">
  <div class="flex w-full">
    <div class="md:w-1/6">

    </div>
    <nav class="flex" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-2 my-10 mx-10 md:mx-0 rtl:space-x-reverse">
        <li>
          <div class="flex items-center">
            <a href="#" class="text-md md:text-lg font-base hover:text-primary-800"><?= esc($producto['Categoria']); ?></a>
          </div>
        </li>
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <a href="#" class="text-md md:text-lg font-light hover:text-primary-800"><?= esc($producto['SubCategoria']); ?></a>
          </div>
        </li>
      </ol>
    </nav>
  </div>
  <div class="flex w-full flex-col md:flex-row">
    <div id="indicators-carousel" data-carousel="static" class="md:w-3/6">
      <div class="flex flex-col-reverse md:flex-row">
        <div class="sm:w-full md:w-1/4">
          <div class="overflow-x-auto md:overflow-x-auto md:overflow-y-auto md:h-130">
            <div class="flex md:flex-col p-5 gap-x-3 md:gap-y-2 justify-center">
              <?php for ($i = 0; $i < 3; $i++): ?>
                <button
                  type="button"
                  class="rounded-xl w-30 md:w-35"
                  aria-current="<?= $i === 0 ? 'true' : 'false' ?>"
                  data-carousel-slide-to="<?= $i ?>"
                  aria-label="Slide <?= $i + 1 ?>">
                  <?= img([
                    'src'   => base_url($producto['ValorImagen']) . $i + 1 . '.png',
                    'alt'   => esc($producto['Nombre']),
                    'class' => "h-auto max-h-full rounded-lg"
                  ]); ?>
                </button>
              <?php endfor; ?>
            </div>
          </div>
        </div>
        <div class="sm:w-full md:w-3/4">
          <div class="relative w-full">
            <!-- Carousel wrapper -->
            <div class="relative h-80 overflow-hidden rounded-lg md:h-96">
              <?php for ($i = 0; $i < 3; $i++): ?>
                <div class="hidden duration-700 ease-in-out" data-carousel-item="<?= $i === 0 ? 'active' : '' ?>">
                  <?= img([
                    'src'   => base_url($producto['ValorImagen']) . $i + 1 . '.png',
                    'data-zoom' => base_url($producto['ValorImagen']) . $i + 1 . '.png',
                    'alt'   => esc($producto['Nombre']),
                    'class' => "drift-image p-5 absolute block max-h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                  ]); ?>
                </div>
              <?php endfor; ?>
            </div>
            <!-- Slider indicators -->
            <!-- <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
            <?php for ($i = 0; $i < 3; $i++): ?>
              <button
                type="button"
                class="w-3 h-3 rounded-full"
                aria-current="<?= $i === 0 ? 'true' : 'false' ?>"
                aria-label="Slide <?= $i + 1 ?>"
                data-carousel-slide-to="<?= $i ?>">
              </button>
            <?php endfor; ?>
          </div> -->
            <!-- Slider controls -->
            <div class="flex justify-center items-center">
              <button type="button" class="flex justify-center items-center me-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="text-primary-400 hover:text-primary-900 group-focus:text-primary-900">
                  <svg class="rtl:rotate-180 w-7 h-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 5H1m0 0 4 4M1 5l4-4" />
                  </svg>
                  <span class="sr-only">Previous</span>
                </span>
              </button>
              <button type="button" class="flex justify-center items-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="text-primary-400 hover:text-primary-900 group-focus:text-primary-900">
                  <svg class="rtl:rotate-180 w-7 h-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M1 5h12m0 0L9 1m4 4L9 9" />
                  </svg>
                  <span class="sr-only">Next</span>
                </span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="md:w-3/6 pt-3 pl-5">
      <form method="post">
        <div class="flex flex-col gap-y-4">
          <div class="mb-5">
            <div class="text-2xl font-base mb-1">
              <?= esc($producto['Nombre']); ?>
            </div>
            <div class="flex items-center">
              <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
              </svg>
              <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
              </svg>
              <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
              </svg>
              <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
              </svg>
              <svg class="w-4 h-4 text-primary-200 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
              </svg>
              <p class="ms-1 text-sm font-medium text-primary-800">4.95</p>
              <p class="ms-1 text-sm font-medium text-primary-800">de</p>
              <p class="ms-1 text-sm font-medium text-primary-800">5</p>
            </div>
          </div>
          <div class="text-3xl font-light mb-2">
            <?php
            $precio = number_format($producto['PrecioBase'], 2, '.', '');
            list($entero, $decimal) = explode('.', $precio);
            ?>
            <?= '$' . $entero; ?><span class="text-base align-super">.<?= $decimal; ?></span>
          </div>
          <div class="text-lg">
            <?php
            $stockDisponible = $producto['Stock'] > 0;
            $claseStock = $stockDisponible ? 'text-green-600' : 'text-red-500 italic';
            $textoStock = $stockDisponible ? 'Stock disponible' : 'Stock no disponible';
            ?>
            <span class="<?= esc($claseStock); ?>">
              <?= esc($textoStock); ?>
            </span>
          </div>
          <div class="mb-5">
            <p class="text-sm font-base mb-2">Cantidad:</p>
            <div class="flex items-center mb-2">
              <button id="btnMenos" class="inline-flex items-center justify-center p-1 me-3 text-sm font-medium h-6 w-6 text-primary-500 bg-white border border-primary-300 rounded-full focus:outline-none hover:bg-primary-100 focus:ring-4 focus:ring-primary-200" type="button">
                <span class="sr-only">Quantity -</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                </svg>
              </button>
              <div>
                <input class="hidden" name="productoID" value="<?= esc($producto['ID']); ?>" required />
                <input
                  id="cantidadProd"
                  type="number"
                  name="cantidad"
                  class="bg-primary-50 w-14 border border-primary-300 text-primary-900 text-sm text-center rounded-lg focus:ring-primary-500 focus:border-primary-500 block px-2.5 py-1"
                  value="<?= esc($producto['Stock']) > 0 ? 1 : 0; ?>"
                  min="1"
                  max="<?= esc($producto['Stock']); ?>"
                  <?= esc($producto['Stock']) < 1 ? 'disabled' : ''; ?>
                  required />
              </div>
              <button id="btnMas" class="inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-primary-500 bg-white border border-primary-300 rounded-full focus:outline-none hover:bg-primary-100 focus:ring-4 focus:ring-primary-200" type="button">
                <span class="sr-only">Quantity +</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                </svg>
              </button>
            </div>
            <p class="text-sm font-light"><?= 'max.' . ' ' . esc($producto['Stock']); ?></p>
          </div>
          <div class="flex gap-x-5 mb-5">
            <?php
            $disabled = esc($producto['Stock']) < 1;
            ?>
            <button
              id="agregarCarrito"
              type="submit"
              formaction="<?= site_url('carrito/agregar') ?>"
              class="text-primary-900 bg-primary-100 focus:ring-4 focus:ring-primary-300 font-base rounded-lg border border-primary-700 text-sm focus:outline-none px-10 py-4 <?= $disabled ? 'opacity-60 cursor-not-allowed hover:bg-primary-100' : 'hover:bg-primary-200 cursor-pointer'; ?>"
              <?= $disabled ? 'disabled' : ''; ?>>
              Agregar al carrito
            </button>
            <button
              id="comprarAhora"
              class="text-primary-50 bg-primary-700 focus:ring-4 focus:ring-primary-300 font-base rounded-lg border border-primary-700 text-sm focus:outline-none px-10 py-4 <?= $disabled ? 'opacity-60 cursor-not-allowed hover:bg-primary-700' : 'hover:bg-primary-800 cursor-pointer'; ?>"
              <?= $disabled ? 'disabled' : ''; ?>>
              Comprar ahora
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="p-5">
    <div class="text-xl font-light px-2 pb-5 text-primary-950">Opiniones de clientes:</div>
    <div class="flex items-center mb-2">
      <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
      </svg>
      <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
      </svg>
      <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
      </svg>
      <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
      </svg>
      <svg class="w-4 h-4 text-gray-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
      </svg>
      <p class="ms-1 text-sm font-medium text-primary-700">4.95</p>
      <p class="ms-1 text-sm font-medium text-primary-700">de</p>
      <p class="ms-1 text-sm font-medium text-primary-700">5</p>
    </div>
    <p class="text-sm font-medium text-gray-500">1,745 valoraciones globales</p>
    <div class="flex items-center mt-4">
      <a href="#" class="text-sm font-medium text-primary-700 hover:underline">5 star</a>
      <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded-sm">
        <div class="h-5 bg-yellow-300 rounded-sm" style="width: 70%"></div>
      </div>
      <span class="text-sm font-medium text-gray-500">70%</span>
    </div>
    <div class="flex items-center mt-4">
      <a href="#" class="text-sm font-medium text-primary-700 hover:underline">4 star</a>
      <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded-sm">
        <div class="h-5 bg-yellow-300 rounded-sm" style="width: 17%"></div>
      </div>
      <span class="text-sm font-medium text-gray-500">17%</span>
    </div>
    <div class="flex items-center mt-4">
      <a href="#" class="text-sm font-medium text-primary-700 hover:underline">3 star</a>
      <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded-sm">
        <div class="h-5 bg-yellow-300 rounded-sm" style="width: 8%"></div>
      </div>
      <span class="text-sm font-medium text-gray-500">8%</span>
    </div>
    <div class="flex items-center mt-4">
      <a href="#" class="text-sm font-medium text-primary-700 hover:underline">2 star</a>
      <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded-sm">
        <div class="h-5 bg-yellow-300 rounded-sm" style="width: 4%"></div>
      </div>
      <span class="text-sm font-medium text-gray-500">4%</span>
    </div>
    <div class="flex items-center mt-4">
      <a href="#" class="text-sm font-medium text-primary-700 hover:underline">1 star</a>
      <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded-sm">
        <div class="h-5 bg-yellow-300 rounded-sm" style="width: 1%"></div>
      </div>
      <span class="text-sm font-medium text-gray-500">1%</span>
    </div>
  </div>
  <div class="p-5">
    <div class="text-xl font-light px-2 pb-7 text-primary-950">Comentarios:</div>
    <div class="w-full">
      <form class="w-5/6">
        <div class="w-full mb-4 border-2 border-primary-300 rounded-lg bg-primary-50">
          <div class="px-4 py-2 bg-white rounded-t-lg">
            <label for="comment" class="sr-only">Tu comentario</label>
            <textarea id="comment" rows="4" class="w-full px-0 text-sm text-primary-900 bg-white border-0 focus:ring-0 placeholder-primary-400" placeholder="Escribe tu comentario..." required></textarea>
          </div>
          <div class="flex items-center bg-primary-100 justify-between px-3 py-2 border-t border-primary-200">
            <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
              Postear comentario
            </button>
            <div class="flex ps-0 space-x-1 rtl:space-x-reverse sm:ps-2">
              <button type="button" class="inline-flex justify-center items-center p-2 text-primary-500 rounded-sm cursor-pointer hover:text-primary-900 hover:bg-primary-100">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 20">
                  <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M1 6v8a5 5 0 1 0 10 0V4.5a3.5 3.5 0 1 0-7 0V13a2 2 0 0 0 4 0V6" />
                </svg>
                <span class="sr-only">Attach file</span>
              </button>
              <button type="button" class="inline-flex justify-center items-center p-2 text-primary-500 rounded-sm cursor-pointer hover:text-primary-900 hover:bg-primary-100">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                  <path d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z" />
                </svg>
                <span class="sr-only">Upload image</span>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {

    const root = document.getElementById('indicators-carousel');

    // 1) Recopilamos slides e indicadores (igual que antes)
    const items = Array.from(root.querySelectorAll('[data-carousel-item]'))
      .map((el, idx) => ({
        position: idx,
        el
      }));

    const indicatorEls = Array.from(root.querySelectorAll('[data-carousel-slide-to]'))
      .map((el, idx) => ({
        position: idx,
        el
      }));

    const options = {
      defaultPosition: 0,
      interval: 0,
      indicators: {
        activeClasses: '!bg-primary-50 hover:outline-3 outline-primary-700 outline-offset-4 border-2 p-1 border-primary-500',
        inactiveClasses: '!bg-primary-200 opacity-70 p-5',
        items: indicatorEls
      },
      onNext: () => console.log('Siguiente slide'),
      onPrev: () => console.log('Slide anterior'),
      onChange: () => console.log('Slide cambiado'),
    };

    const instanceOptions = {
      id: 'indicators-carousel',
      override: true
    };
    
    const carousel = new Carousel(root, items, options, instanceOptions);

    // 2) Enlazamos los controles
    const prevBtn = root.querySelector('[data-carousel-prev]');
    const nextBtn = root.querySelector('[data-carousel-next]');

    prevBtn.addEventListener('click', () => carousel.prev());
    nextBtn.addEventListener('click', () => carousel.next());

    // Opcional: Si necesitas agregar más personalización
    root.querySelector('[data-carousel-prev]').classList.add('custom-prev-class');
    root.querySelector('[data-carousel-next]').classList.add('custom-next-class');

    const btnMinus = document.getElementById('btnMenos');
    const btnPlus = document.getElementById('btnMas');
    const cantidadInput = document.getElementById('cantidadProd');
    let holdTimer = null;
    let isUpdating = false;

    // Función para detener el auto-increment/decrement
    function clearHold() {
      if (holdTimer) {
        clearInterval(holdTimer);
        holdTimer = null;
      }
    }

    document.addEventListener('pointerup', clearHold);
    document.addEventListener('pointerleave', clearHold);
    document.addEventListener('pointercancel', clearHold);

    // Función para cambiar valor en base al step
    function doStep(step) {
      if (cantidadInput.disabled) return;
      cantidadInput[step > 0 ? 'stepUp' : 'stepDown']();
      cantidadInput.dispatchEvent(new Event('input', {
        bubbles: true
      }));
    }

    // Gestor de pulsación larga en botones
    function holdButton(button, step) {
      button.addEventListener('pointerdown', () => {
        doStep(step); // cambio inmediato
        holdTimer = setInterval(() => doStep(step), 150);
      });
    }

    holdButton(btnMinus, -1);
    holdButton(btnPlus, +1);

    // Validación en cada input
    cantidadInput.addEventListener('input', async () => {
      if (isUpdating) return;
      isUpdating = true;
      try {
        // Solo dígitos
        cantidadInput.value = cantidadInput.value.replace(/\D+/g, '');
        const {
          min,
          max
        } = cantidadInput;
        const val = cantidadInput.valueAsNumber;

        // Si quedó vacío o fuera de rango, normalizar
        if (cantidadInput.value === '' || Number.isNaN(val) || val < +min) {
          cantidadInput.value = min;
        } else if (val > +max) {
          cantidadInput.value = max;
        }

        // Aquí podrías enviar al backend:
        // await actualizarCantidad(cantidadInput.dataset.id, cantidadInput.valueAsNumber);
      } catch (error) {
        console.error('Error al actualizar cantidad:', error);
      } finally {
        isUpdating = false;
      }
    });

    // Asegurar que al perder foco nunca quede vacío
    cantidadInput.addEventListener('blur', () => {
      if (cantidadInput.value === '' || +cantidadInput.value < +cantidadInput.min) {
        cantidadInput.value = cantidadInput.min;
      }
    });

    document.querySelectorAll('.drift-image').forEach(img => {
      new Drift(img, {
        paneContainer: document.body,
        inlinePane: true,
        containInline: true,
        hoverBoundingBox: false,
        inlineOffsetX: 0,
        inlineOffsetY: 0,
        zoomFactor: 2,
      });
    });
  });
</script>