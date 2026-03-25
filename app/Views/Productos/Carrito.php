<div class="pt-24 min-h-screen bg-gray-50">
    <div class="contenedorCarritoT">
        <div class="text-2xl text-primary-950 mx-10 mb-3 mt-10">
            Carrito de compras<?= !empty($carrito['data']) ? ' (<span class="font-light text-xl">' . esc($carrito['data'][0]['TotalProductos']) . ' productos</span>)' : '' ?>:
        </div>
    </div>
    <div class="flex flex-col md:flex-row">
        <div class="md:w-4/6 p-3 md:p-5">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-sm text-gray-800 uppercase">
                        <tr>
                            <th scope="col" class="px-4 font-semibold">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Imagen</span>
                            </th>
                            <th scope="col" class="px-6 py-3 font-semibold">
                                Producto
                            </th>
                            <th scope="col" class="px-6 py-3 font-semibold">
                                Cantidad
                            </th>
                            <th scope="col" class="px-6 py-3 font-semibold">
                                Precio
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Accion</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="contenedorCarrito">
                        <?php if (!empty($carrito['data'])): ?>
                            <?php foreach ($carrito['data'] as $index => $producto): ?>
                                <tr class="bg-white border-b border-gray-300 hover:bg-gray-100">
                                    <td class="w-4 p-3 text-center text-base">
                                        <?= $index + 1 ?>
                                    </td>
                                    <td class="px-6 py-4 w-40">
                                        <a href="<?= site_url('detalleprod/') . esc($producto['ProductoID']) ?>">
                                            <?= img([
                                                'src'   => base_url($producto['ProductoImagen']) . 'frontal.png',
                                                'alt'   => esc($producto['ProductoNombre']),
                                                'class' => "w-auto p-2 rounded-t-lg max-h-full"
                                            ]); ?>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 font-light text-gray-900">
                                        <?= esc($producto['ProductoNombre']); ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="producto-control flex items-center" data-id="<?= esc($producto['ProductoID']); ?>">
                                            <button class="btnMenos inline-flex items-center justify-center p-1 me-3 text-sm font-medium h-6 w-6 text-primary-500 bg-white border border-primary-300 rounded-full focus:outline-none hover:bg-primary-100 focus:ring-4 focus:ring-primary-200" type="button">
                                                <span class="sr-only">Quantity -</span>
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                            <div>
                                                <input
                                                    type="number"
                                                    data-id="<?= esc($producto['ProductoID']) ?>"
                                                    class="cantidadProd bg-primary-50 w-14 border border-primary-300 text-primary-900 text-sm text-center rounded-lg focus:ring-primary-500 focus:border-primary-500 block px-2.5 py-1"
                                                    value="<?= esc($producto['Cantidad']) ?>"
                                                    min="1"
                                                    max="<?= esc($producto['Stock']); ?>"
                                                    <?= esc($producto['Stock']) < 1 ? 'disabled' : ''; ?>
                                                    required />
                                            </div>
                                            <button class="btnMas inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-primary-500 bg-white border border-primary-300 rounded-full focus:outline-none hover:bg-primary-100 focus:ring-4 focus:ring-primary-200" type="button">
                                                <span class="sr-only">Quantity +</span>
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="px-6 font-light py-4 text-gray-900">
                                        $<?= esc($producto['PrecioUnitario']); ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <button type="button" data-id="<?= esc($producto['ProductoID']) ?>" class="eliminarBtn cursor-pointer py-1 px-5 text-sm text-primary-900 focus:outline-none bg-primary-200 rounded-full border-2 border-primary-500 hover:bg-primary-300 focus:z-10 focus:ring-4 focus:ring-primary-300">
                                            Quitar
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-xl font-light py-10 text-primary-950">Carrito vacio</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="md:w-2/6 p-3 md:p-5">
            <div class="shadow-md sm:rounded-lg">
                <div class="text-xl p-5 text-primary-950">Resumen</div>
                <div class="contenedorCarritoBar">
                    <div class="px-5 pb-2">
                        <div class="w-full h-4 mb-4 bg-gray-300 rounded-full">
                            <div class="h-4 bg-primary-300 rounded-full" style="<?= !empty($carrito['data']) ? 'width: 80%;' : 'width: 0%;' ?>"></div>
                        </div>
                    </div>
                </div>
                <div class="contenedorCarritoR">
                    <div class="flex justify-between items-center text-primary-950 px-5">
                        <?php if (!empty($carrito['data'])): ?>
                            <div>
                                Subtotal
                                (
                                <span class="font-light">
                                    <?= esc($carrito['data'][0]['TotalProductos']) ?> productos
                                </span>
                                ):
                            </div>
                            <span class="text-lg font-light">
                                $<?= esc($carrito['data'][0]['Total']) ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="flex justify-between items-center text-primary-950 px-5">
                        <?php if (!empty($carrito['data'])): ?>
                            <div>
                                Gastos de envío y gestión estimados:
                            </div>
                            <span class="text-lg font-light">
                                <?php
                                $subtotal = $carrito['data'][0]['Total'] ?? 0;
                                $esGratis = $subtotal >= 500;
                                ?>
                                <span class="<?= !$esGratis ?: 'text-green-600'  ?>">
                                    <?= $esGratis ? 'Gratis' : '$500.00' ?>
                                </span>
                            </span>
                        <?php endif; ?>
                    </div>
                    <hr class="h-px my-4 mx-5 bg-gray-300/90 border-0">
                    <div class="text-lg flex justify-between items-center text-primary-950 px-5 pb-2">
                        <?php if (!empty($carrito['data'])): ?>
                            <div>
                                Total:
                            </div>
                            <span class="text-lg font-light">
                                $<?= esc(number_format($esGratis ? $subtotal : $subtotal + 500, 2)) ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- <?= esc(previous_url()); ?> -->
                <div class="contenedorCarritoSub">
                    <?php if (!empty($carrito['data'])): ?>
                        <div class="flex justify-center p-2">
                            <a href="<?= $IDCliente ? site_url('pago/') : site_url('registro/') ?>" class="flex justify-self-end items-center py-2 px-5 me-2 mb-2 text-sm font-medium text-primary-50 focus:outline-none bg-primary-600 rounded-full border border-primary-300 hover:bg-primary-700 focus:z-10 focus:ring-4 focus:ring-primary-300">Proceder al pago
                                <svg class="w-6 h-6 text-primary-50 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="-0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                </svg>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
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
                <svg class="mx-auto w-45 h-45 text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mt-3 mb-6 text-lg font-normal leading-5 text-gray-900">Lo sentimos no se puedo realizar la compra</h3>
                <button data-modal-hide="modal-Carrito" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2 text-center">
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const contenedorCarrito = document.querySelector('.contenedorCarrito');

        let holdTimer = null;

        // Función para detener el auto-increment/decrement
        function clearHold() {
            if (holdTimer) {
                clearInterval(holdTimer);
                holdTimer = null;
            }
        }

        // 1) Delegamos pointerdown para +/– y arrancamos el holdTimer
        contenedorCarrito.addEventListener('pointerdown', e => {
            const minus = e.target.closest('.btnMenos');
            const plus = e.target.closest('.btnMas');
            if (!minus && !plus) return;

            const step = minus ? -1 : +1;
            const control = (minus || plus).closest('.producto-control');
            const input = control.querySelector('.cantidadProd');

            // Ejecuta un cambio inmediato
            const doStep = () => {
                if (!input.disabled) {
                    input[step > 0 ? 'stepUp' : 'stepDown']();
                    input.dispatchEvent(new Event('input', {
                        bubbles: true
                    }));
                }
            };
            doStep();

            // Y luego repítelo cada 150ms mientras mantengan pulsado
            holdTimer = setInterval(doStep, 150);
        });

        // 2) Detenemos el hold cuando suelte en cualquier parte
        document.addEventListener('pointerup', clearHold);
        document.addEventListener('pointerleave', clearHold);
        document.addEventListener('pointercancel', clearHold);

        // 3) Delegamos la validación y el envío al backend en el evento 'input'
        let isUpdating = false;

        contenedorCarrito.addEventListener('input', async e => {
            // Solo reaccionar a inputs de cantidad y evitar recursión
            if (!e.target.matches('.cantidadProd') && isUpdating) return;
            isUpdating = true;
            const input = e.target;
            const productoID = input.dataset.id;

            try {
                // Eliminar caracteres no numéricos
                input.value = input.value.replace(/\D+/g, '');
                const {
                    min,
                    max
                } = input;
                const val = input.valueAsNumber;

                // Si quedó vacío, usar el valor mínimo
                if (input.value === '') {
                    input.value = min;
                } else {
                    // Ajustar a rango permitido
                    if (!Number.isNaN(val)) {
                        if (val > +max) input.value = max;
                        else if (val < +min) input.value = min;
                    }
                }

                const resultado = await actualizarCarrito('<?= site_url("carrito/actcantprod") ?>', {
                    id: productoID,
                    cantidad: input.value
                });

                if (resultado.success) {
                    const doc = new DOMParser().parseFromString(resultado.htmlCarrito, 'text/html');

                    ['.contenedorCarritoT', '.contenedorCarritoR', '.contenedorCarritoBar', '.contenedorCarritoSub'].forEach(selector => {
                        const nuevo = doc.querySelector(selector);
                        const actual = document.querySelector(selector);
                        if (nuevo && actual) {
                            actual.innerHTML = nuevo.innerHTML;
                        }
                    });

                    const resultadoNav = await actualizarCarrito('<?= site_url('carrito/navbar') ?>', {
                        id: productoID
                    });

                    if (resultadoNav.success) {
                        const docNav = new DOMParser().parseFromString(resultadoNav.htmlNavbar, 'text/html');

                        ['.carritoCont'].forEach(selector => {
                            const nuevoNav = docNav.querySelector(selector);
                            const actualNav = document.querySelector(selector);
                            if (nuevoNav && actualNav) {
                                actualNav.innerHTML = nuevoNav.innerHTML;
                            }
                        });
                    } else {
                        console.error('Error al actualizar el navbar:', resultadoNav);
                    }
                }

            } catch (err) {
                console.error('Error al actualizar cantidad:', err);
            } finally {
                isUpdating = false;
            }
        });

        contenedorCarrito.addEventListener('focusout', e => {
            if (!e.target.matches('.cantidadProd')) return;
            const input = e.target;
            if (input.value === '' || +input.value < +input.min) {
                input.value = input.min;
                // opcional: vuelve a notificar al backend si quieres:
                input.dispatchEvent(new Event('input'));
            }
        });

        contenedorCarrito.addEventListener('click', async (e) => {
            if (!e.target.closest('.eliminarBtn')) return;
            const btn = e.target.closest('.eliminarBtn');
            const productoID = btn.dataset.id;

            try {
                const resultado = await actualizarCarrito('<?= site_url('carrito/quitarproducto') ?>', {
                    id: productoID
                });

                if (resultado.success) {
                    const doc = new DOMParser().parseFromString(resultado.htmlCarrito, 'text/html');

                    ['.contenedorCarrito', '.contenedorCarritoT', '.contenedorCarritoR', '.contenedorCarritoBar', '.contenedorCarritoSub'].forEach(selector => {
                        const nuevo = doc.querySelector(selector);
                        const actual = document.querySelector(selector);
                        if (nuevo && actual) {
                            actual.innerHTML = nuevo.innerHTML;
                        }
                    });

                    const resultadoNav = await actualizarCarrito('<?= site_url('carrito/navbar') ?>', {
                        id: productoID
                    });

                    if (resultadoNav.success) {
                        const docNav = new DOMParser().parseFromString(resultadoNav.htmlNavbar, 'text/html');

                        ['.carritoCont'].forEach(selector => {
                            const nuevoNav = docNav.querySelector(selector);
                            const actualNav = document.querySelector(selector);
                            if (nuevoNav && actualNav) {
                                actualNav.innerHTML = nuevoNav.innerHTML;
                            }
                        });
                    } else {
                        console.error('Error al actualizar el navbar:', resultadoNav);
                    }
                }

            } catch (error) {
                console.error('Error al eliminar:', error);
            }

        });


        const errorCarrito = <?= json_encode(session()->getFlashdata('error')) ?>;

        if (errorCarrito) {
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

    async function actualizarCarrito(url, datos) {
        if (typeof datos !== 'object' || datos === null) {
            throw new TypeError('Los datos deben ser un objeto válido');
        }

        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                // '<?= csrf_header() ?>': '<?= csrf_hash() ?>'
            },
            body: JSON.stringify(datos)
        });

        if (!response.ok) {
            throw new Error(`Error en la respuesta: ${response.status} ${response.statusText}`);
        }

        const data = await response.json();

        if (!data.success) {
            throw new Error(data.message || 'Error desconocido');
        }

        return data;
    }
</script>