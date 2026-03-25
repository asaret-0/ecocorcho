  <div id="modal-DatosCliente" data-modal-backdrop="static" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-3xl max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow-md">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-primary-200">
          <div class="w-full px-3">
            <ol id="stepper-datosPersonales" class="flex items-center text-sm w-full text-center text-gray-500">
              <li class="flex w-full items-center text-primary-600 text-base sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-300 after:border-1 after:hidden sm:after:inline-block after:mx-6 md:after:mx-10">
                <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-300">
                  <div>

                  </div>
                  <span class="me-2">1</span>
                  Datos <span class="hidden sm:inline-flex sm:ms-2">personales</span>
                </span>
              </li>
              <li class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-300 after:border-1 after:hidden sm:after:inline-block after:mx-6 md:after:mx-10">
                <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-300">
                  <div>

                  </div>
                  <span class="me-2">2</span>
                  Dirección
                </span>
              </li>
              <li class="flex items-center">
                <span class="me-2">3</span>
                Confirmación
              </li>
            </ol>
          </div>
          <div class="w-auto">
            <button type="button" class="text-primary-400 bg-transparent hover:bg-primary-200 hover:text-primary-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="modal-DatosCliente">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
          </div>
        </div>
        <form id="informacionCliente" method="POST" action="<?= site_url('perfil/gestionarcliente') ?>">
          <input type="number" class="hidden" name="DireccionID" value="<?= isset($direccionCliente['data'][0]['DireccionID']) ? esc($direccionCliente['data'][0]['DireccionID']) : '' ?>">
          <!-- Modal body -->
          <div class="px-5">
            <div id="accordion-cliente" data-accordion="open" data-active-classes="bg-white text-primary-900" data-inactive-classes="text-primary-500">
              <h2 id="accordion-head-datosC">
                <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-primary-500 border-b border-primary-100 gap-3" data-accordion-target="#accordion-body-datosC" aria-expanded="true" aria-controls="accordion-body-datosC">
                  <span>1 - Datos personales</span>
                  <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                  </svg>
                </button>
              </h2>
              <div id="accordion-body-datosC" class="hidden" aria-labelledby="accordion-head-datosC">
                <div class="py-5 border-b border-primary-200">
                  <div id="datosC" class="p-4 md:p-5 space-y-4">
                    <div class="relative z-0 w-full mb-5">
                      <input type="text" id="floating_nombre" name="Nombre" class="requerido soloTexto block px-2.5 pb-2.5 pt-4 w-full text-sm text-primary-900 bg-transparent rounded-lg border-1 border-primary-200 appearance-none focus:outline-none focus:ring-0 focus:border-primary-600 peer" value="<?= isset($direccionCliente['data'][0]['Nombre']) ? esc($direccionCliente['data'][0]['Nombre']) : '' ?>" placeholder=" " required />
                      <label for="floating_nombre" class="absolute text-sm text-primary-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-primary-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nombre</label>
                    </div>
                    <div class="grid grid-cols-2 gap-3 md:gap-6">
                      <div class="relative z-0 w-full mb-1 group">
                        <input type="text" id="floating_apellidoP" name="ApellidoP" class="requerido soloTexto block px-2.5 pb-2.5 pt-4 w-full text-sm text-primary-900 bg-transparent rounded-lg border-1 border-primary-200 appearance-none focus:outline-none focus:ring-0 focus:border-primary-600 peer" value="<?= isset($direccionCliente['data'][0]['ApellidoP']) ? esc($direccionCliente['data'][0]['ApellidoP']) : '' ?>" placeholder=" " required />
                        <label for="floating_apellidoP" class="absolute text-sm text-primary-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-primary-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Apellido paterno</label>
                      </div>
                      <div class="relative z-0 w-full mb-1 group">
                        <input type="text" id="floating_apellidoM" name="ApellidoM" class="soloTexto block px-2.5 pb-2.5 pt-4 w-full text-sm text-primary-900 bg-transparent rounded-lg border-1 border-primary-200 appearance-none focus:outline-none focus:ring-0 focus:border-primary-600 peer" value="<?= isset($direccionCliente['data'][0]['ApellidoM']) ? esc($direccionCliente['data'][0]['ApellidoM']) : '' ?>" placeholder=" " required />
                        <label for="floating_apellidoM" class="absolute text-sm text-primary-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-primary-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Apellido materno</label>
                      </div>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-6">
                      <div class="relative z-0 w-full mb-1 group">
                        <label for="phone-input" class="block mb-2 text-sm font-medium text-primary-900">Celular:</label>
                        <div class="relative">
                          <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-primary-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                              <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                            </svg>
                          </div>
                          <input type="number" id="phone-input" aria-describedby="helper-text-explanation" name="Celular" class="bg-white border border-primary-200 text-primary-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full ps-10 p-2.5" value="<?= isset($direccionCliente['data'][0]['Celular']) ? esc($direccionCliente['data'][0]['Celular']) : '' ?>" placeholder="" required />
                        </div>
                      </div>
                      <div class="relative z-0 w-full mb-1 group">
                        <label for="genero" class="block mb-2 text-sm font-medium text-primary-900">Genero:</label>
                        <?php $genero = isset($direccionCliente['data'][0]['Genero']) ? $direccionCliente['data'][0]['Genero'] : ''; ?>
                        <select id="genero" name="Genero" class="requerido bg-white border border-primary-200 text-primary-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                          <option value="M" <?= $genero === 'M' ? 'selected' : '' ?>>Masculino</option>
                          <option value="F" <?= $genero === 'F' ? 'selected' : '' ?>>Femenino</option>
                          <option value="O" <?= $genero === 'O' ? 'selected' : '' ?>>Otro</option>
                        </select>
                      </div>
                      <div class="relative z-0 w-full mb-1 group">
                        <label for="fechaNac" class="block mb-2 text-sm font-medium text-primary-900">Año de nacimiento:</label>
                        <div class="relative max-w-sm">
                          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-primary-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                          </div>
                          <?php
                          $fechaOriginal = $direccionCliente['data'][0]['FechaNacimiento'] ?? '';
                          $fechaFormateada = $fechaOriginal ? date('m-d-Y', strtotime($fechaOriginal)) : '';
                          ?>
                          <input id="fechaNac"
                            datepicker
                            datepicker-autohide
                            type="text"
                            datepicker-format="mm-dd-yyyy"
                            datepicker-min-date="01/01/1900"
                            datepicker-max-date="localtime"
                            value="<?= esc($fechaFormateada) ?>"
                            name="FechaNacimiento"
                            class="z-100 bg-white border border-primary-200 text-primary-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full ps-10 p-2.5 placeholder-primary-400"
                            placeholder="Seleccionar"
                            required>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <h2 id="accordion-head-direccionC">
                <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-primary-500 border-b border-primary-100 gap-3" data-accordion-target="#accordion-body-direccionC" aria-expanded="true" aria-controls="accordion-body-direccionC">
                  <span>2 - Dirección</span>
                  <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                  </svg>
                </button>
              </h2>
              <div id="accordion-body-direccionC" class="hidden" aria-labelledby="accordion-head-direccionC">
                <div class="py-5 border-b border-primary-200">
                  <div id="direccionC" class="p-4 md:p-5 space-y-4">
                    <div class="grid grid-cols-3 gap-3 md:gap-6">
                      <div class="relative z-0 w-full mb-1">
                        <label for="calle" class="block mb-2 text-sm font-medium text-primary-900">Calle</label>
                        <input type="text" id="calle" name="Calle" class="requerido bg-white border border-primary-200 text-primary-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" value="<?= isset($direccionCliente['data'][0]['Calle']) ? esc($direccionCliente['data'][0]['Calle']) : '' ?>" placeholder="" required />
                      </div>
                      <div class="relative z-0 w-full mb-1">
                        <label for="zip-input" class="block mb-2 text-sm font-medium text-primary-900">Codigo postal:</label>
                        <div class="relative">
                          <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-primary-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                              <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                            </svg>
                          </div>
                          <input type="text" id="zip-input" aria-describedby="helper-text-explanation" name="CodigoPostal" class="requerido soloNumeros bg-white border border-primary-200 text-primary-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full ps-10 p-2.5 " placeholder="" pattern="\d{5}" maxlength="5" value="<?= isset($direccionCliente['data'][0]['CodigoPostal']) ? esc($direccionCliente['data'][0]['CodigoPostal']) : '' ?>" required />
                        </div>
                      </div>
                      <div class="relative z-0 w-full mb-1">
                        <label for="colonia" class="block mb-2 text-sm font-medium text-primary-900">Colonia</label>
                        <select id="colonia" name="Colonia" class="bg-white border border-primary-200 text-primary-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                          <option value="" disabled selected>Seleccionar</option>
                        </select>
                      </div>
                    </div>
                    <div class="grid grid-cols-3 gap-3 md:gap-6">
                      <div class="relative z-0 w-full mb-1">
                        <label for="numExt" class="block mb-2 text-sm font-medium text-primary-900">Numero exterior</label>
                        <input type="text" id="numExt" name="NumExterior" class="requerido bg-white border border-primary-200 text-primary-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" value="<?= isset($direccionCliente['data'][0]['NumExterior']) ? esc($direccionCliente['data'][0]['NumExterior']) : '' ?>" placeholder="" required />
                      </div>
                      <div class="relative z-0 w-full mb-1">
                        <label for="numInt" class="block mb-2 text-sm font-medium text-primary-900">Numero interior</label>
                        <input type="text" id="numInt" name="NumInterior" class="bg-white border border-primary-200 text-primary-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 placeholder-primary-400" placeholder="Opcional" value="<?= isset($direccionCliente['data'][0]['NumInterior']) ? esc($direccionCliente['data'][0]['NumInterior']) : '' ?>" />
                      </div>
                      <div class="relative z-0 w-full mb-1">
                        <label for="tipoVivienda" class="block mb-2 text-sm font-medium text-primary-900">Tipo de vivienda:</label>
                        <?php $tipo = isset($direccionCliente['data'][0]['TipoDireccion']) ? $direccionCliente['data'][0]['TipoDireccion'] : ''; ?>
                        <select id="tipoVivienda" name="TipoDireccion" class="requerido bg-white border border-primary-200 text-primary-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                          <option value="Casa" <?= $tipo === 'Casa' ? 'selected' : '' ?>>Casa</option>
                          <option value="Oficina" <?= $tipo === 'Oficina' ? 'selected' : '' ?>>Oficina</option>
                          <option value="Departamento" <?= $tipo === 'Departamento' ? 'selected' : '' ?>>Departamento</option>
                          <option value="Negocio" <?= $tipo === 'Negocio' ? 'selected' : '' ?>>Negocio</option>
                        </select>
                      </div>
                    </div>
                    <div class="relative z-0 w-full mb-1">
                      <label for="referencias" class="block mb-2 text-sm font-medium text-primary-900">Escribe algunas referencias:</label>
                      <textarea id="referencias" rows="3" name="Referencias" class="block p-2.5 w-full text-sm text-primary-900 bg-white rounded-lg border border-primary-200 focus:ring-primary-500 focus:border-primary-500 placeholder-primary-400" placeholder="Escribe aquí..."><?= isset($direccionCliente['data'][0]['Referencias']) ? esc($direccionCliente['data'][0]['Referencias']) : '' ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal footer -->
          <div class="grid grid-flow-col content-center w-full p-5 border-t border-primary-200 rounded-b">
            <button id="atras" type="button" class="hidden flex justify-self-start text-primary-50 items-center bg-primary-700 hover:bg-primary-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center">
              <svg class="w-6 h-6 text-primary-50 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4" />
              </svg>
              Atras
            </button>
            <button id="siguiente" type="button" class="flex justify-self-end text-primary-50 items-center bg-primary-700 hover:bg-primary-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Siguiente
              <svg class="w-6 h-6 text-primary-50 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="-0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
              </svg>
            </button>
            <button id="confirmar" type="submit" class="hidden flex justify-self-end text-primary-50 items-center bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-base rounded-lg text-sm px-6 py-2.5 text-center">
              <svg class="w-6 h-6 text-green-50 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd" />
              </svg>
              Confirmar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    class ValidadorFormulario {
      constructor(formulario) {
        this.formulario = formulario;
        this.formulario.addEventListener('submit', e => this.validarFormulario(e));
        this.agregarListenersEntrada();
      }

      agregarListenersEntrada() {
        // Solo letras
        const inputsSoloTexto = this.formulario.querySelectorAll('input.soloTexto');
        inputsSoloTexto.forEach(input => {
          input.addEventListener('input', () => {
            // Eliminar todo lo que no sea letras (mayúsculas, minúsculas, espacios y acentos)
            input.value = input.value.replace(/[^a-zA-ZÁÉÍÓÚáéíóúñÑ\s]/g, '');
          });
        });

        // Solo números
        const inputsSoloNumeros = this.formulario.querySelectorAll('input.soloNumeros');
        inputsSoloNumeros.forEach(input => {
          input.addEventListener('input', () => {
            // Eliminar todo lo que no sean dígitos
            input.value = input.value.replace(/[^\d]/g, '');
          });
        });
      }

      validarFormulario(evento) {
        const campos = this.formulario.querySelectorAll('input, select, textarea');
        let esValido = true;

        campos.forEach(campo => {
          const valor = campo.value.trim();
          const clases = campo.classList;
          campo.classList.remove('invalido');
          campo.setCustomValidity(''); // Limpiar mensaje anterior

          if (clases.contains('requerido') && !valor) {
            esValido = false;
            this.marcarInvalido(campo, 'Este campo es obligatorio');
          }

          if (clases.contains('soloTexto') && valor && !/^[a-zA-ZÁÉÍÓÚáéíóúñÑ\s]+$/.test(valor)) {
            esValido = false;
            this.marcarInvalido(campo, 'Solo letras permitidas');
          }

          if (clases.contains('soloNumeros') && valor && !/^\d+$/.test(valor)) {
            esValido = false;
            this.marcarInvalido(campo, 'Solo números permitidos');
          }
        });

        if (!esValido) {
          evento.preventDefault();
        }
      }

      marcarInvalido(campo, mensaje) {
        campo.classList.add('invalido');
        campo.setCustomValidity(mensaje);
        campo.reportValidity();
      }
    }

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
        backdropClasses: 'bg-gray-100/10 fixed inset-0 z-40',
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

    const ModalDC = initModal(
      'modal-DatosCliente', {
        placement: 'center'
      }, {
        id: 'modal-DatosCliente'
      }
    );

    // 1) Trae y parsea el XML
    async function fetchTablesFromXML(url) {
      const res = await fetch(url);
      if (!res.ok) throw new Error(`HTTP ${res.status}`);
      const xml = await res.text();

      const parser = new fxp.XMLParser({
        ignoreAttributes: true,
        ignoreNameSpace: true,
        trimValues: true,
        parseTagValue: false, // Mantiene los valores como strings
      });
      const parsedData = parser.parse(xml);
      const pd = parsedData.NewDataSet;
      let arr = pd.table || [];
      arr = Array.isArray(arr) ? arr : [arr];

      return arr.map(t => ({
        cp: t.d_codigo || '',
        colonia: t.d_asenta || ''
      }));
    }

    function renderColonias(tables, zip) {
      const sel = document.getElementById('colonia');
      sel.innerHTML = '';

      if (!zip) {
        sel.innerHTML = '<option value="" disabled>Introduce un CP válido</option>';
        return;
      }

      const zipClean = zip.trim();
      const matches = tables.filter(t => t.cp === zipClean);
      if (matches.length === 0) {
        sel.innerHTML = '<option value="" disabled>No se encontraron colonias</option>';
        return;
      }

      matches.sort((a, b) =>
        a.colonia.localeCompare(b.colonia, 'es', {
          sensitivity: 'base'
        })
      );

      matches.forEach(({
        colonia
      }) => {
        const opt = document.createElement('option');
        opt.value = colonia;
        opt.textContent = colonia;
        sel.appendChild(opt);
      });
    }

    async function init() {
      const baseXmlUrl = '<?= base_url('data/estados/Yucatan.xml') ?>';
      const xmlUrl = `${baseXmlUrl}?_=${Date.now()}`;
      const tables = await fetchTablesFromXML(xmlUrl);
      const zipInput = document.getElementById('zip-input');

      // Evento para entradas manuales
      zipInput.addEventListener('input', e => {
        const val = e.target.value.replace(/\D/g, '').slice(0, 5);
        e.target.value = val;
        renderColonias(tables, val);
      });

      // ✅ Si ya hay valor al cargar la página, poblar las colonias automáticamente
      const defaultZip = zipInput.value.replace(/\D/g, '').slice(0, 5);
      if (defaultZip.length === 5) {
        renderColonias(tables, defaultZip);
      }
    }

    const getCheckSVG = () => `<svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
    </svg>`;

    let currentStep = 1;
    const completedSteps = new Set();

    const cleanCompletedSteps = () => {
      // Eliminar pasos completados que sean mayores o iguales al paso actual
      completedSteps.forEach(step => {
        if (step >= currentStep) {
          completedSteps.delete(step);
        }
      });
    };

    const updateStepper = () => {
      const stepperItems = document.querySelectorAll('#stepper-datosPersonales li');

      stepperItems.forEach((item, index) => {
        const stepNumber = index + 1;
        const span = item.querySelector('span:first-child');
        if (!span) return;

        const div = span.querySelector('div:first-child');

        // Resetear todas las clases primero
        item.classList.remove('text-primary-600', 'text-primary-400', 'text-base');

        if (stepNumber === currentStep) {
          // Paso actual
          item.classList.add('text-primary-600', 'text-base');
          if (div) div.innerHTML = '';
        } else if (completedSteps.has(stepNumber)) {
          // Pasos completados
          item.classList.add('text-primary-400');
          if (div && !div.querySelector('svg')) {
            div.innerHTML = getCheckSVG();
          }
        } else {
          // Pasos futuros
          if (div) div.innerHTML = '';
        }
      });
    };

    const showStep = () => {
      const mostrarDatos = currentStep === 1 || currentStep === 3;
      const mostrarDireccion = currentStep === 2 || currentStep === 3;

      document.getElementById('accordion-head-datosC').classList.toggle('hidden', !mostrarDatos);
      document.getElementById('datosC').classList.toggle('hidden', !mostrarDatos);
      document.getElementById('accordion-head-direccionC').classList.toggle('hidden', !mostrarDireccion);
      document.getElementById('direccionC').classList.toggle('hidden', !mostrarDireccion);
    };

    const updateButtons = () => {
      document.getElementById('atras').classList.toggle('hidden', currentStep === 1);
      document.getElementById('siguiente').classList.toggle('hidden', currentStep === 3);
      document.getElementById('confirmar').classList.toggle('hidden', currentStep !== 3);
    };

    // Event Listeners
    document.getElementById('siguiente').addEventListener('click', () => {
      if (currentStep < 3) {
        completedSteps.add(currentStep);
        currentStep++;
        updateStepper();
        showStep();
        updateButtons();
      }
    });

    document.getElementById('atras').addEventListener('click', () => {
      if (currentStep > 1) {
        currentStep--;
        cleanCompletedSteps();
        updateStepper();
        showStep();
        updateButtons();
      }
    });

    const goToStep = (step) => {
      currentStep = step;
      cleanCompletedSteps();
      for (let i = 1; i < step; i++) {
        completedSteps.add(i);
      }
      updateStepper();
      showStep();
      updateButtons();
    };

    // Inicialización
    updateStepper();
    showStep();
    updateButtons();

    init().catch(console.error);
  </script>