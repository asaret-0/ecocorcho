<div class="pt-24 min-h-screen w-full">
  <div class="text-2xl text-primary-950 mx-10 mb-3 mt-10">
    Mis pedidos
  </div>
  <?php

  if ($pedido['data']) {

    foreach ($pedido['data'] as $row) {
      $fecha = (new DateTime($row['FechaPedido']))->format('Y-m-d');
      $pedidoId = $row['PedidoID'];

      if (!isset($pedidosXfecha[$fecha][$pedidoId])) {
        $pedidosXfecha[$fecha][$pedidoId] = [
          'PedidoID' => $pedidoId,
          'Total' => $row['Total'],
          'FechaPedido' => (new DateTime($row['FechaPedido']))->format('Y-m-d H:i'),
          'ImagenP' => $row['ValorImagen'],
          'TotalProductos' => 0,
        ];
      }

      $pedidosXfecha[$fecha][$pedidoId]['TotalProductos'] += $row['Cantidad'];
    }
  }
  ?>

  <?php if (isset($pedidosXfecha)) : ?>
    <?php foreach ($pedidosXfecha as $fecha => $dia): ?>
      <div class="m-10 text-2xl text-primary-700 underline"> <?= esc($fecha === date('Y-m-d') ? 'Pedido hoy' : ($fecha === date('Y-m-d', strtotime('-1 day')) ? 'Pedido ayer' : $fecha)) ?>
      </div>
      <div class="w-full px-10">
        <?php foreach ($dia as $pedido): ?>
          <div class="p-3 w-full my-2">
            <a href="#" class="flex justify-between bg-white border border-gray-200 rounded-lg shadow-md hover:bg-primary-50">
              <div class="flex items-center md:gap-x-3">
                <?= img([
                  'src'   => base_url($pedido['ImagenP']) . 'frontal.png',
                  'alt'   => esc($pedido['PedidoID']),
                  'class' => "object-cover p-3 rounded-t-lg h-50 max-h-full"
                ]); ?>
                <div>
                  <h5 class="mb-2 text-lg md:text-xl font-semibold tracking-tight text-gray-900">ID de pedido: <span class="font-light"><?= esc($pedido['PedidoID']) ?></span></h5>
                  <p class="mb-3 font-normal md:text-lg text-gray-700">Cantidad de productos: <span class=""><?= esc($pedido['TotalProductos']) ?></span></p>
                </div>
              </div>
              <div class="flex flex-col justify-between">
                <div class="py-3 px-4 text-gray-700">
                  Fecha de pedido: <span class=""><?= esc($pedido['FechaPedido']) ?></span>
                </div>
                <div class="text-right py-5 px-5 text-lg md:text-xl">
                  Total: <span class="font-light">$<?= esc($pedido['Total']) ?></span>
                </div>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
      <hr class="h-px my-10 mx-30 bg-gray-300 border-0 rounded-lg">
    <?php endforeach; ?>
  <?php else: ?>
    <div class="text-center text-2xl font-light m-30">
      Sin Pedidos
    </div>
  <?php endif; ?>

</div>



<div id="modal-Carrito" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-md max-h-full">
    <div class="relative bg-gray-50 rounded-lg shadow-sm">
      <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-hide="modal-Carrito">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
      </button>
      <div class="p-4 md:p-5 text-center">
        <svg class="w-45 h-45 mx-auto text-green-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
          <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd" />
        </svg>
        <h3 class="mt-4 mb-6 text-lg font-semilight leading-5 text-gray-900"><?= ($msg = session()->getFlashdata('success')) ? esc($msg) : '' ?></h3>
        <button data-modal-hide="modal-Carrito" type="button" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-400 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2 text-center">
          Ver pedido
        </button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {

    const exitoCarrito = <?= json_encode(session()->getFlashdata('success')) ?>;

    if (exitoCarrito) {
      const ModalCarrito = initModal(
        'modal-Carrito', {
          placement: 'center'
        }, {
          id: 'modal-Carrito'
        }
      );
      ModalCarrito.show();
    }

  });
</script>