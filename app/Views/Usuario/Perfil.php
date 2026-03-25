<div class="bg-white min-h-screen">
  <div class="mb-4 border-b border-primary-200">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-primary-800 hover:text-primary-900" data-tabs-inactive-classes="text-primary-400 hover:text-primary-600 border-primary-100 hover:border-primary-300" role="tablist">
      <li class="me-2" role="presentation">
        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="perfil-styled-tab" data-tabs-target="#styled-perfil" type="button" role="tab" aria-controls="perfil" aria-selected="false">Datos de perfil</button>
      </li>
      <li class="me-2" role="presentation">
        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-primary-600 hover:border-primary-300" id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">General</button>
      </li>
      <li class="me-2" role="presentation">
        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-primary-600 hover:border-primary-300" id="settings-styled-tab" data-tabs-target="#styled-settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Seguridad y privacidad</button>
      </li>
      <li role="presentation">
        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-primary-600 hover:border-primary-300" id="contacts-styled-tab" data-tabs-target="#styled-contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Pagos</button>
      </li>
    </ul>
  </div>
  <div id="default-styled-tab-content">
    <div class="hidden p-4 rounded-lg h-screen" id="styled-perfil" role="tabpanel" aria-labelledby="perfil-tab">
      <div class="p-4">
        <span class="block text-lg text-center text-primary-800 truncate"><?= esc($email) ?></span>
      </div>
      <div class="flex justify-center">
        <div>
          <label class="flex items-center justify-end">
            <svg class="w-7 h-7 text-primary-900 cursor-pointer" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
            </svg>
            <input
              id="subirPerfilF"
              type="file"
              accept=".jpg,.jpeg,.png,.svg,.webp"
              class="hidden" />
          </label>
          <div class="relative w-60 h-60 overflow-hidden bg-primary-900 border-1 rounded-full">
            <?php
            //dd($direccionCliente['data'][0]);
            $userId    = esc($IDCliente ?? 0);
            $email     = esc($email ?? '');
            $avatarSrc = getUserAvatarUrl((int)$IDCliente, (int)$PerfilF);
            ?>
            <div class="relative w-60 h-60 overflow-hidden bg-primary-900 border rounded-full">
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
                  loading="lazy"
                  width="240"
                  height="240">
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="p-10 flex flex-col gap-y-10 md:mx-20 my-5">
        <div id="trigger-datosPers" class="cursor-pointer border border-gray-200 rounded-lg shadow-md w-full h-auto hover:bg-gray-50 transform transition-transform duration-300 hover:scale-101 hover:shadow-xl py-5 px-10 flex justify-between items-center">
          <div>
            <h2 class="mb-3 text-xl font-semibold text-primary-900">Datos personales</h2>
            <div class="flex gap-7 text-sm md:text-lg">
              <ul class="max-w-md space-y-1 text-primary-400 list-disc list-inside">
                <li>
                  Nombre
                </li>
                <li>
                  Apellidos
                </li>
                <li>
                  Año de nacimiento
                </li>
              </ul>
              <ul class="max-w-md space-y-1 text-primary-400 list-disc list-inside">
                <li>
                  Celular
                </li>
                <li>
                  Genero
                </li>
              </ul>
            </div>
          </div>
          <div>
            <svg class="w-30 h-30 text-primary-400 text-sm md:text-lg" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M7 2a2 2 0 0 0-2 2v1a1 1 0 0 0 0 2v1a1 1 0 0 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H7Zm3 8a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm-1 7a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3 1 1 0 0 1-1 1h-6a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
            </svg>
          </div>
        </div>
        <div id="trigger-direccion" class="cursor-pointer border border-gray-200 rounded-lg shadow-md w-full h-auto hover:bg-gray-50 transform transition-transform duration-300 hover:scale-101 hover:shadow-xl py-5 px-10 flex justify-between items-center">
          <div>
            <h2 class="mb-3 text-xl font-semibold text-primary-900">Mis direcciones</h2>
            <div class="flex gap-7 text-sm md:text-lg">
              <ul class="max-w-md space-y-1 text-primary-400 list-disc list-inside">
                <li>
                  Calle
                </li>
                <li>
                  Codigo postal
                </li>
                <li>
                  Colonia
                </li>
              </ul>
              <ul class="max-w-md space-y-1 text-primary-400 list-disc list-inside">
                <li>
                  Numero exterior
                </li>
                <li>
                  Numero interior
                </li>
                <li>
                  Tipo de vivienda
                </li>
              </ul>
              <ul class="max-w-md space-y-1 text-primary-400 list-disc list-inside">
                <li>
                  Referencias
                </li>
              </ul>
            </div>
          </div>
          <div>
            <svg class="w-30 h-30 text-primary-400 text-sm md:text-lg" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z" />
            </svg>
          </div>
        </div>
      </div>
    </div>
    <div class="hidden p-4 rounded-lg h-screen" id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
    </div>
    <div class="hidden p-4 rounded-lg h-screen" id="styled-settings" role="tabpanel" aria-labelledby="settings-tab">
    </div>
    <div class="hidden p-4 rounded-lg h-screen" id="styled-contacts" role="tabpanel" aria-labelledby="contacts-tab">
    </div>
  </div>
</div>

<div id="modalPerfilF" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-auto">
    <div class="relative bg-primary-50 rounded-lg shadow-sm dark:bg-gray-700">
      <button type="button" class="cerrarModal absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-primary-50" data-modal-hide="modalPerfilF">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Cerrar</span>
      </button>
      <div class="p-4 md:p-5 text-center">
        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Tu imagen</h3>
        <div>
          <?= img([
            'id' => "croppie-image",
            'src'   => "",
            'alt'   => esc($email),
            'class' => ""
          ]); ?>
        </div>
        <button id="subirImagen" type="button" data-modal-hide="modalPerfilF" class="text-primary-50 bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-500 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-green-600">
          Subir
        </button>
        <button data-modal-hide="modalPerfilF" type="button" class="cerrarModal py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-primary-50 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-primary-50 dark:hover:bg-gray-700">Cancelar</button>
      </div>
    </div>
  </div>
</div>



<script>
  // Constantes y elementos del DOM
  const MODAL_ID = 'modalPerfilF';
  const INPUT_ID = 'subirPerfilF';
  const CLOSE_MODAL_CLASS = 'cerrarModal';
  const MAX_FILE_SIZE = 10 * 1024 * 1024; // 10MB
  const ALLOWED_FILE_TYPES = ['image/jpeg', 'image/jpg', 'image/png', 'image/svg', 'image/webp'];

  const modal = new Modal(document.getElementById(MODAL_ID));
  const fileInput = document.getElementById(INPUT_ID);
  const croppieImage = document.getElementById('croppie-image');
  const uploadButton = document.getElementById('subirImagen');

  let croppieInstance = null;

  // Inicializar Croppie en la etiqueta img
  const initCroppie = () => {
    croppieInstance = new Croppie(croppieImage, {
      viewport: {
        width: 400,
        height: 400,
        type: 'circle'
      },
      boundary: {
        width: 500,
        height: 500
      },
      showZoomer: true,
      enableExif: true,
    });
  };

  // Funciones de validación
  const isFileSizeValid = (file) => file.size <= MAX_FILE_SIZE;
  const isFileTypeValid = (file) => ALLOWED_FILE_TYPES.includes(file.type);

  // Funciones de utilidad
  const showError = (message) => {
    alert(message);
    fileInput.value = '';
  };

  const loadImageToCroppie = (file) => {
    const reader = new FileReader();
    reader.onload = (e) => {
      croppieInstance.bind({
        url: e.target.result // Cargar imagen en Croppie
      });
    };
    reader.readAsDataURL(file);
  };

  const handleFileSelection = () => {
    const [file] = fileInput.files;

    if (!file) return;

    if (!isFileSizeValid(file)) {
      return showError('El archivo debe pesar menos de 10MB.');
    }

    if (!isFileTypeValid(file)) {
      return showError('Solo se permiten imágenes JPG, PNG o SVG.');
    }

    loadImageToCroppie(file);
    modal.show();
  };

  const handleCloseModal = (event) => {
    const closeElement = event.target.closest(`.${CLOSE_MODAL_CLASS}`);
    if (closeElement) {
      modal.hide();
      fileInput.value = '';
      croppieInstance.destroy();
      initCroppie(); // Reiniciar para futuras cargas
    }
  };

  const handleCrop = async () => {
    try {
      uploadButton.disabled = true;
      document.body.classList.add('cursor-wait');

      const blob = await croppieInstance.result({
        type: 'blob',
        format: 'webp',
        quality: .9,
        size: 'original'
      });

      const nombreImagen = <?= json_encode(esc($IDCliente)) ?>;
      const formData = new FormData();
      formData.append('imagen', new File([blob], `${nombreImagen}.webp`, {
        type: 'image/webp',
        lastModified: Date.now()
      }));
      formData.append('nombreImagen', nombreImagen);

      const abortController = new AbortController();
      const uploadTimeout = setTimeout(
        () => abortController.abort(new Error('Timeout')),
        15_000
      );

      if (!navigator.onLine) throw new Error('Offline');

      const respuesta = await subirImagen(formData, {
        signal: abortController.signal
      });

      clearTimeout(uploadTimeout);
      modal.hide();
      window.location.replace(`${window.location.pathname}?_t=${Date.now()}`);

    } catch (error) {
      const mensaje = error.name === 'AbortError' ?
        'La conexión está tardando demasiado. Verifica tu green' :
        error.message.includes('Failed to fetch') || error.message.includes('Offline') ?
        'Error de conexión. Verifica tu internet' :
        `Error al subir la imagen: ${error.message}`;
      alert(mensaje);
    } finally {
      uploadButton.disabled = false;
      document.body.classList.remove('cursor-wait');
    }
  };

  const subirImagen = async (formData, options = {}) => {
    try {
      const response = await fetch('<?= site_url('perfil/subirimagen') ?>', {
        method: 'POST',
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          ...options.headers
        },
        body: formData,
        ...options
      });

      if (!response.ok) {
        const errorData = await response.json().catch(() => ({}));
        throw new Error(errorData.message || `Error HTTP: ${response.status}`);
      }

      return await response.json();
    } catch (error) {
      throw new Error(error.message || 'Error de comunicación con el servidor');
    }
  };

  // Event listeners
  document.addEventListener('DOMContentLoaded', () => {
    initCroppie();
    fileInput.addEventListener('change', handleFileSelection);
    uploadButton.addEventListener('click', handleCrop);
    setTimeout(() => {
      history.replaceState(null, '', window.location.pathname);
    }, 500);

    document.addEventListener('click', handleCloseModal);

    const datosPersBtn = document.querySelector('#trigger-datosPers');
    if (!datosPersBtn) return;

    datosPersBtn.addEventListener('click', e => {
      e.preventDefault();
      goToStep(1);
      ModalDC.show();
    });

    const direccionBtn = document.querySelector('#trigger-direccion');
    if (!direccionBtn) return;

    direccionBtn.addEventListener('click', e => {
      e.preventDefault();
      goToStep(2);
      ModalDC.show();
    });

    new ValidadorFormulario(document.getElementById('informacionCliente'));

  });
</script>