<div class="min-h-screen">
  <div class="w-full md:w-auto">
    <div class="shadow-md rounded-lg mx-15 my-10 bg-gray-50">
      <div class="text-2xl p-5 text-primary-950">Resumen</div>
      <div class="contenedorCarritoBar">
        <div class="px-5 pb-2">
          <div class="w-full h-4 mb-4 bg-gray-300 rounded-full">
            <div class="h-4 bg-primary-400 rounded-full" style="<?= !empty($carrito['data']) ? 'width: 100%;' : 'width: 0%;' ?>"></div>
          </div>
        </div>
      </div>
      <div class="contenedorCarritoR">
        <div class="px-5">
          <div id="accordion-sub" data-accordion="collapse" data-active-classes="bg-gray-50 text-gray-900" data-inactive-classes="text-gray-800">
            <h2 id="accordion-head-sub">
              <button type="button" class="flex items-center justify-between w-full py-1 font-medium rtl:text-right text-primary-900 gap-3" data-accordion-target="#accordion-body-sub" aria-expanded="false" aria-controls="accordion-body-sub">
                <?php if (!empty($carrito['data'])): ?>
                  <div>
                    Subtotal
                    (
                    <span class="font-light">
                      <?= esc($carrito['data'][0]['TotalProductos']) ?> productos
                    </span>
                    ):
                  </div>
                  <div class="flex items-center">
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                    </svg>
                    <span class="text-lg font-light ms-3">
                      $<?= esc($carrito['data'][0]['Total']) ?>
                    </span>
                  </div>
                <?php endif; ?>
              </button>
            </h2>
            <div id="accordion-body-sub" class="hidden" aria-labelledby="accordion-head-sub">
              <div class="py-3 bg-gray-50 mb-4">
                <div class="">
                  <table class="w-full text-sm text-gray-700">
                    <thead>
                      <tr>
                        <th scope="col">

                        </th>
                        <th scope="col">

                        </th>
                      </tr>
                    </thead>
                    <tbody class="contenedorCarrito">
                      <?php if (!empty($carrito['data'])): ?>
                        <?php foreach ($carrito['data'] as $index => $producto): ?>
                          <tr class="bg-gray-50">
                            <td class="flex gap-3">
                              <span><?= $index + 1 ?></span>
                              <?= esc($producto['ProductoNombre']); ?>
                              <span>(x<?= esc($producto['Cantidad']); ?>)</span>
                            </td>
                            <td class="text-right">
                              $<?= esc($producto['PrecioUnitario']); ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="flex justify-between items-center text-primary-900 px-5">
          <?php if (!empty($carrito['data'])): ?>
            <div>
              Gastos de envío y gestión estimados:
            </div>
            <span class="text-lg font-light">
              <?php
              $subtotal = $carrito['data'][0]['Total'] ?? 0;
              $esGratis = $subtotal >= 500;
              ?>
              <span id="gastosEnvio"
                class="<?= !$esGratis ? '' : 'text-green-600' ?>"
                data-es-gratis="<?= $esGratis ? '1' : '0' ?>">
                <?= $esGratis ? 'Gratis' : '$500.00' ?>
              </span>
            </span>
          <?php endif; ?>
        </div>
        <hr class="h-px my-4 mx-5 bg-gray-300/90 border-0">
        <div class="text-xl flex justify-between items-center text-primary-950 px-5 pb-4">
          <?php if (!empty($carrito['data'])): ?>
            <div>
              Total:
            </div>
            <span id="totalResumen"
              class="text-xl"
              data-subtotal="<?= $subtotal ?>"
              data-es-gratis="<?= $esGratis ? '1' : '0' ?>">
              $<?= esc(number_format($esGratis ? $subtotal : $subtotal + 500, 2)) ?>
            </span>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="shadow-md rounded-lg mx-15 my-10 bg-gray-50">
      <div class="px-5 py-3 flex items-center gap-7">
        <?php
        $userId    = esc($IDCliente ?? 0);
        $email     = esc($email ?? '');
        $avatarSrc = getUserAvatarUrl((int)$IDCliente, (int)$PerfilF);
        ?>
        <div class="relative w-15 h-15 overflow-hidden bg-primary-900 border rounded-full">
          <?php if ($avatarSrc === null): ?>
            <!-- SVG de avatar por defecto -->
            <svg class="w-full h-full text-primary-50" xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd"
                d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                clip-rule="evenodd" />
            </svg>
          <?php else: ?>
            <!-- Imagen de avatar -->
            <img
              id="<?= $userId ?>"
              src="<?= esc($avatarSrc) ?>"
              alt="Avatar de <?= $email ?>"
              class="w-full h-full rounded-full object-cover"
              loading="lazy">
          <?php endif; ?>
        </div>
        <div class="text-lg font-semibold"><?= esc($email) ?></div>
      </div>
      <div class="px-5 py-3 flex items-center">
        <div class="text-lg w-1/2">
          Nombre:<span class="font-light ms-2"><?= isset($direccionCliente['data'][0]['Nombre']) ? esc($direccionCliente['data'][0]['Nombre']) : '' ?></span>
        </div>
        <div class="text-lg w-1/2">
          Celular:<span class="font-light ms-2"><?= isset($direccionCliente['data'][0]['Celular']) ? esc($direccionCliente['data'][0]['Celular']) : '' ?></span>
        </div>
      </div>
    </div>

    <form id="checkout" method="POST" action="<?= site_url('pago/checkout') ?>">
      <div class="shadow-md rounded-lg mx-15 my-10 bg-gray-50">
        <div class="p-5">
          <div id="accordion-flush" data-accordion="open" data-active-classes="bg-gray-50 text-gray-900" data-inactive-classes="text-gray-800">
            <h2 id="accordion-head-direccion">
              <button type="button" class="flex items-center justify-between w-full py-7 font-medium rtl:text-right text-gray-800 border-b border-gray-200 gap-3" data-accordion-target="#accordion-body-direccion" aria-expanded="true" aria-controls="accordion-body-direccion">
                <span class="text-xl flex items-center gap-3 font-normal">
                  <span class="flex items-center justify-center text-base font-light w-7 h-7 border-2 border-primary-600 rounded-full shrink-0">
                    1
                  </span>
                  Dirección de envío</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                </svg>
              </button>
            </h2>
            <div id="accordion-body-direccion" class="hidden" aria-labelledby="accordion-head-direccion">
              <div class="py-3 border-b border-gray-200 bg-gray-50">
                <div class="ml-3 border-l-1 border-gray-300 p-3">

                </div>
              </div>
            </div>
            <h2 id="accordion-head-m-envio">
              <button type="button" class="flex items-center justify-between w-full py-7 font-medium rtl:text-right text-gray-800 border-b border-gray-200 gap-3" data-accordion-target="#accordion-body-m-envio" aria-expanded="true" aria-controls="accordion-body-m-envio">
                <span class="text-xl flex items-center gap-3 font-normal">
                  <span class="flex items-center justify-center text-base font-light w-7 h-7 border-2 border-primary-600 rounded-full shrink-0">
                    2
                  </span>Método en envío</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                </svg>
              </button>
            </h2>
            <div id="accordion-body-m-envio" class="hidden" aria-labelledby="accordion-head-m-envio">
              <div class="py-3 border-b border-gray-200">
                <div class="ml-3 border-l-1 border-gray-300 p-3 bg-gray-50">
                  <div class="">Opciones de envío disponibles:</div>
                  <ul class="p-3 text-sm text-gray-700">
                    <li>
                      <div class="flex items-center">
                        <div class="flex items-center p-1 rounded-sm">
                          <input id="radio-1" type="radio" value="1" name="envio-radio" checked class="w-4 h-4 text-primary-700 bg-gray-100 border-primary-900 focus:ring-primary-400">
                          <label for="radio-1" class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm">Estandar</label>
                        </div>
                        <div class="ms-3">
                          <span class="<?= $esGratis ? 'text-green-600' : 'text-primary-900'  ?>">
                            <?= $esGratis ? 'Gratis' : '$500.00' ?>
                          </span>
                          <span class="text-primary-950 font-light">
                            (Entrega en 3-5 días)
                          </span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="flex items-center">
                        <div class="flex items-center p-1 rounded-sm">
                          <input id="radio-2" type="radio" value="2" name="envio-radio" class="w-4 h-4 text-primary-700 bg-gray-100 border-primary-900 focus:ring-primary-400">
                          <label for="radio-2" class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm">Express</label>
                        </div>
                        <div class="ms-3">
                          <span class="text-primary-900">
                            $<?= !$esGratis ? '600.00' : '100.00' ?>
                          </span>
                          <span class="text-primary-950 font-light">
                            (Entrega en 1-2 días)
                          </span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="flex items-center p-1 rounded-sm">
                        <div class="flex items-center">
                          <input id="radio-3" type="radio" value="3" name="envio-radio" class="w-4 h-4 text-primary-700 bg-gray-100 border-primary-900 focus:ring-primary-400">
                          <label for="radio-3" class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm">Recoger en un punto</label>
                          <div class="ms-3">
                            <span class="text-green-600">
                              Gratis
                            </span>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <h2 id="accordion-head-m-pago">
              <button type="button" class="flex items-center justify-between w-full py-7 font-medium rtl:text-right text-gray-800 border-b border-gray-200 gap-3" data-accordion-target="#accordion-body-m-pago" aria-expanded="true" aria-controls="accordion-body-m-pago">
                <span class="text-xl flex items-center gap-3 font-normal">
                  <span class="flex items-center justify-center text-base font-light w-7 h-7 border-2 border-primary-600 rounded-full shrink-0">
                    3
                  </span>Método de pago</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                </svg>
              </button>
            </h2>
            <div id="accordion-body-m-pago" class="hidden" aria-labelledby="accordion-head-m-pago">
              <div class="py-3 border-b border-gray-200 bg-gray-50">
                <div class="ml-3 border-l-1 border-gray-300 p-3">
                  <div class="">Seleccióna un método de pago::</div>
                  <ul class="p-3 text-sm text-gray-700">
                    <li>
                      <div class="flex items-center">
                        <div class="flex items-center p-1 rounded-sm">
                          <input id="radio-4" type="radio" value="1" name="mpago-radio" checked class="w-4 h-4 text-primary-700 bg-gray-100 border-primary-900 focus:ring-primary-400">
                          <label for="radio-4" class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm">Tarjeta de debito/crédito</label>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <div class="flex flex-col max-w-md justify-start px-5 py-2">
                    <div class="relative">
                      <input type="text" id="card-number-input" class="bg-gray-50 border-2 border-primary-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pe-10 p-2.5 placeholder-gray-400" placeholder="XXXX XXXX XXXX XXXX" pattern="^(?:4\d{3}(?: \d{4}){3}|5[1-5]\d{2}(?: \d{4}){3}|2(?:2[2-9]\d|[3-6]\d{2}|7[01]\d|720)\d(?: \d{4}){3}|3[47]\d{2} \d{6} \d{5}|6(?:011|5\d{2})(?: \d{4}){3}|35(?:2[89]|[3-8]\d)\d(?: \d{4}){3})$" maxlength="19" required />
                      <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M6 14h2m3 0h5M3 7v10a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1Z" />
                        </svg>
                        </svg>
                      </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 my-4 pb-3">
                      <div class="relative max-w-sm col-span-2">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                          <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                          </svg>
                        </div>
                        <label for="card-expiration-input" class="sr-only">Card expiration date:</label>
                        <input id="card-expiration-input" type="text" class="bg-gray-50 border-2 border-primary-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full ps-10 p-2.5 placeholder-gray-400 appareance-none" pattern="^(0[1-9]|1[0-2])\/\d{2}$" placeholder="12/25" maxlength="5" required />
                      </div>
                      <div class="col-span-1">
                        <label for="cvv-input" class="sr-only">Card CVV code:</label>
                        <input
                          type="text"
                          id="cvv-input"
                          maxlength="3"
                          inputmode="numeric"
                          pattern="^\d{3}$"
                          class="bg-gray-50 border-2 border-primary-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 placeholder-gray-400"
                          placeholder="CVV"
                          required />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="contenedorCarritoSub">
          <?php if (!empty($carrito['data'])): ?>
            <div class="flex justify-center pb-3">
              <button type="submit" class="cursor-pointer flex justify-self-center items-center py-2 px-6 me-2 mb-2 text-sm font-medium text-white focus:outline-none bg-green-600 rounded-full focus:z-10 focus:ring-4 focus:ring-green-300"><svg class="w-6 h-6 text-white me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M11.644 3.066a1 1 0 0 1 .712 0l7 2.666A1 1 0 0 1 20 6.68a17.694 17.694 0 0 1-2.023 7.98 17.406 17.406 0 0 1-5.402 6.158 1 1 0 0 1-1.15 0 17.405 17.405 0 0 1-5.403-6.157A17.695 17.695 0 0 1 4 6.68a1 1 0 0 1 .644-.949l7-2.666Zm4.014 7.187a1 1 0 0 0-1.316-1.506l-3.296 2.884-.839-.838a1 1 0 0 0-1.414 1.414l1.5 1.5a1 1 0 0 0 1.366.046l4-3.5Z" clip-rule="evenodd" />
                </svg>
                Pagar
              </button>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </form>

  </div>
</div>

<script>
  function getTodayString() {
    const today = new Date();
    const year = String(today.getFullYear()).slice(-2); // Últimos 2 dígitos del año
    const month = String(today.getMonth() + 1).padStart(2, '0'); // Mes con 0 inicial
    return `${month}/${year}`; // Resultado: mm/yy
  }

  document.addEventListener('DOMContentLoaded', () => {

    const datepickerEl = document.getElementById('card-expiration-input');

    // optional options with default values and callback functions
    const options = {
      defaultDatepickerId: null,
      autohide: true,
      format: 'mm/yy',
      maxDate: null,
      minDate: new Date(),
      orientation: 'bottom',
      buttons: false,
      autoSelectToday: false,
      title: null,
      rangePicker: false,
      onShow: () => {},
      onHide: () => {},
    };

    const instanceOptions = {
      id: 'card-expiration-input',
      override: true
    };

    const datepickerI = new Datepicker(datepickerEl, options, instanceOptions);

    datepickerEl.addEventListener('click', () => {
      datepickerI.show();
      console.log(getTodayString());
    });

    const input = document.getElementById('card-number-input');

    input.addEventListener('input', (e) => {
      let value = e.target.value;

      // Eliminar todo lo que no sea dígito
      value = value.replace(/\D/g, '');

      // Detectar tipo de tarjeta
      let formatted = '';
      if (/^3[47]/.test(value)) {
        // American Express: 4-6-5
        formatted = value
          .replace(/^(\d{0,4})(\d{0,6})(\d{0,5}).*/, (_, p1, p2, p3) => [p1, p2, p3].filter(Boolean).join(' '));
      } else {
        // Visa, MasterCard, etc.: grupos de 4
        formatted = value
          .replace(/(\d{4})/g, '$1 ')
          .trim();
      }

      e.target.value = formatted;
    });

    const cvvInput = document.getElementById('cvv-input');

    cvvInput.addEventListener('input', (e) => {
      // Remover caracteres no numéricos
      e.target.value = e.target.value.replace(/\D/g, '').slice(0, 3);
    });

    const radios = document.querySelectorAll('input[name="envio-radio"]');
    const totalSpan = document.getElementById("totalResumen");
    const gastosSpan = document.getElementById("gastosEnvio");

    // Obtener valores iniciales desde los atributos
    const subtotal = parseFloat(totalSpan.dataset.subtotal);
    const esGratis = totalSpan.dataset.esGratis === "1";

    radios.forEach(radio => {
      radio.addEventListener("change", () => {
        let total = subtotal;
        let gastos = 0;
        let textoGasto = '';
        let claseGasto = 'text-primary-900';

        switch (radio.value) {
          case "1": // Estandar
            gastos = esGratis ? 0 : 500;
            textoGasto = esGratis ? 'Gratis' : '$500.00';
            break;
          case "2": // Express
            gastos = esGratis ? 100 : 600;
            textoGasto = `$${gastos.toFixed(2)}`;
            break;
          case "3": // Recoger
            gastos = 0;
            textoGasto = 'Gratis';
            break;
        }

        total += gastos;

        // Actualizar el total
        totalSpan.textContent = `$${total.toFixed(2)}`;

        // Actualizar gastos de envío
        gastosSpan.textContent = textoGasto;

        // Actualizar clases
        if (textoGasto === 'Gratis') {
          gastosSpan.classList.add('text-green-600');
          gastosSpan.classList.remove('text-primary-900');
        } else {
          gastosSpan.classList.add('text-primary-900');
          gastosSpan.classList.remove('text-green-600');
        }
      });
    });

  });
</script>