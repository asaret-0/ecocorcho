<div class="h-screen">
  <section class="bg-primary-700 h-full">
    <div class=" flex flex-col items-center justify-center px-6 py-8 h-screen lg:py-0">
      <div>
        <div id="alertaRegistro" class="hidden flex items-center p-4 mb-4 text-sm font-light text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
          <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
          </svg>
          <span class="sr-only">Info</span>
          <div class="flex">
            <p id="textoError" class="font-medium">Hubo un problema en el registro.</p>
          </div>
        </div>
      </div>
      <a href="<?= base_url() ?>" class="flex items-center mb-6 text-2xl font-semibold text-primary-200">
        <svg width="130" viewBox="0 0 390 267">
          <g id="SvgjsG10015" featurekey="symbolFeature-0" transform="matrix(1.365231956734165,0,0,1.365231956734165,80.30687602215252,-3.7004145823100316)" fill="currentColor">
            <path xmlns="http://www.w3.org/2000/svg" fill="" d="M83.96 17.36q.99 0 1.95.58 34.41 21.18 47.55 29.17a3.7 3.69 15.7 0 1 1.77 3.15q.02 7.05.04 28.48.02 21.42.01 28.48a3.7 3.69-15.8 0 1-1.77 3.15q-13.13 8.01-47.5 29.24-.95.59-1.95.59t-1.95-.58q-34.41-21.18-47.55-29.17a3.7 3.69 15.7 0 1-1.77-3.15q-.02-7.05-.04-28.48-.02-21.42-.01-28.48a3.7 3.69-15.8 0 1 1.77-3.15q13.12-8.01 47.5-29.24.95-.59 1.95-.59m.02 14.83q.76 0 1.28.32 17.53 10.72 34.87 21.35a.43.43 0 0 0 .44 0l6.41-4a.11.11 0 0 0 0-.19q-16.99-10.48-42.72-26.18-.11-.07-.28-.07t-.28.07Q57.98 39.21 40.99 49.7a.11.11 0 0 0 0 .19l6.42 3.99a.43.43 0 0 0 .44 0Q65.18 43.24 82.7 32.51q.52-.32 1.28-.32M84 47.28q.85.01 1.38.33 8.88 5.41 22.3 13.76a.41.4 43.8 0 0 .41 0l6.6-4.12a.11.11 0 0 0 0-.19q-16.2-10.04-30.54-18.68-.02-.01-.08-.02h-.15q-.06.01-.08.02Q69.5 47.02 53.3 57.06a.11.11 0 0 0 0 .19l6.6 4.12a.41.4-43.8 0 0 .41 0q13.42-8.35 22.3-13.76.53-.33 1.39-.33M65.85 64.55a.33.33 0 0 0 0 .56l18.08 11.13a.33.33 0 0 0 .34 0l17.98-11.21a.33.33 0 0 0 0-.56L84.18 53.34a.33.33 0 0 0-.34 0zm63.33 10.18a.31.31 0 0 0 .48-.26l.03-19.26a.31.31 0 0 0-.47-.27l-15.66 9.61a.31.31 0 0 0 0 .53zM38.91 55.15a.34.34 0 0 0-.52.3l.1 19.06a.34.34 0 0 0 .52.29l15.66-9.62a.34.34 0 0 0-.01-.58zm3.75 24.01a.31.31 0 0 0 .01.52l38.37 23.65a.31.31 0 0 0 .47-.27V81.48a.31.31 0 0 0-.15-.26L60.4 68.3a.31.31 0 0 0-.32 0zm65.37-10.95a.33.33 0 0 0-.34 0L87.23 80.96a.33.33 0 0 0-.16.28v21.55a.33.33 0 0 0 .5.28l37.85-23.6a.33.33 0 0 0 0-.56zm-20.96 63.74a.32.32 0 0 0 .49.28l41.97-26.17a.32.32 0 0 0 .15-.27V83.98a.32.32 0 0 0-.49-.27l-41.97 26.17a.32.32 0 0 0-.15.27zm-48.63-25.86a.32.32 0 0 0 .15.27l42.44 26.16a.32.32 0 0 0 .49-.27v-21.84a.32.32 0 0 0-.15-.27L38.93 83.97a.32.32 0 0 0-.49.27z"></path>
          </g>
          <g id="SvgjsG10016" featurekey="nameFeature-0" transform="matrix(1.3535252755101594,0,0,1.3535252755101594,17.72607744678537,191.70355831613514)" fill="currentColor">
            <path d="M1.68 40 l0 -27.4 l20.04 0 l0 5.6 l-13.84 0 l0 5.16 l12.8 0 l0 5.44 l-12.8 0 l0 5.6 l13.88 0 l0 5.6 l-20.08 0 z M39.218 17.8 c-4.64 0 -8.16 3.72 -8.16 8.44 c0 4.84 3.52 8.52 8.36 8.52 c3.36 0 5.92 -1.76 7.48 -4.44 l4.84 3.36 c-2.64 4.32 -6.68 6.88 -12.24 6.88 c-8.44 0 -14.76 -6.28 -14.76 -14.32 c0 -7.96 6.28 -14.2 14.6 -14.2 c5.4 0 9.68 2.24 12.28 6.84 l-4.92 3.4 c-1.6 -2.64 -4 -4.48 -7.48 -4.48 z M68.876 40.56 c-8 0 -14.52 -6.12 -14.52 -14.24 c0 -8.16 6.52 -14.28 14.52 -14.28 c8.2 0 14.52 6.12 14.52 14.24 c0 8.16 -6.32 14.28 -14.52 14.28 z M68.876 34.8 c4.64 0 8.2 -3.68 8.2 -8.52 c0 -4.76 -3.56 -8.48 -8.2 -8.48 s-8.2 3.72 -8.2 8.52 s3.56 8.48 8.2 8.48 z M100.81400000000001 17.8 c-4.64 0 -8.16 3.72 -8.16 8.44 c0 4.84 3.52 8.52 8.36 8.52 c3.36 0 5.92 -1.76 7.48 -4.44 l4.84 3.36 c-2.64 4.32 -6.68 6.88 -12.24 6.88 c-8.44 0 -14.76 -6.28 -14.76 -14.32 c0 -7.96 6.28 -14.2 14.6 -14.2 c5.4 0 9.68 2.24 12.28 6.84 l-4.92 3.4 c-1.6 -2.64 -4 -4.48 -7.48 -4.48 z M130.472 40.56 c-8 0 -14.52 -6.12 -14.52 -14.24 c0 -8.16 6.52 -14.28 14.52 -14.28 c8.2 0 14.52 6.12 14.52 14.24 c0 8.16 -6.32 14.28 -14.52 14.28 z M130.472 34.8 c4.64 0 8.2 -3.68 8.2 -8.52 c0 -4.76 -3.56 -8.48 -8.2 -8.48 s-8.2 3.72 -8.2 8.52 s3.56 8.48 8.2 8.48 z M159.33 18.28 l-4.56 0 l0 7.32 l4.36 0 c2.68 0 4.32 -1.52 4.32 -3.64 s-1.36 -3.68 -4.12 -3.68 z M154.77 30.68 l0 9.32 l-6.2 0 l0 -27.4 l11.68 0 c5.84 0 9.44 3.76 9.44 9.12 c0 4.28 -2.84 7.84 -7.48 8.76 l8.72 9.52 l-8.08 0 z M187.86800000000002 17.8 c-4.64 0 -8.16 3.72 -8.16 8.44 c0 4.84 3.52 8.52 8.36 8.52 c3.36 0 5.92 -1.76 7.48 -4.44 l4.84 3.36 c-2.64 4.32 -6.68 6.88 -12.24 6.88 c-8.44 0 -14.76 -6.28 -14.76 -14.32 c0 -7.96 6.28 -14.2 14.6 -14.2 c5.4 0 9.68 2.24 12.28 6.84 l-4.92 3.4 c-1.6 -2.64 -4 -4.48 -7.48 -4.48 z M221.446 40 l0 -10.72 l-11.6 0 l0 10.72 l-6.2 0 l0 -27.4 l6.2 0 l0 11 l11.6 0 l0 -11 l6.2 0 l0 27.4 l-6.2 0 z M245.744 40.56 c-8 0 -14.52 -6.12 -14.52 -14.24 c0 -8.16 6.52 -14.28 14.52 -14.28 c8.2 0 14.52 6.12 14.52 14.24 c0 8.16 -6.32 14.28 -14.52 14.28 z M245.744 34.8 c4.64 0 8.2 -3.68 8.2 -8.52 c0 -4.76 -3.56 -8.48 -8.2 -8.48 s-8.2 3.72 -8.2 8.52 s3.56 8.48 8.2 8.48 z"></path>
          </g>
        </svg>
      </a>
      <div class="w-full bg-primary-300 rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
        <div class="p-6 space-y-4 md:space-y-6 ">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-primary-900 md:text-2xl">
            Crea una cuenta
          </h1>
          <form id="registroCliente" method="POST" class="space-y-4 md:space-y-6" action="">
            <div>
              <label for="email" class="block mb-2 text-sm font-medium text-primary-900 ">Tu email</label>
              <input type="email" name="email" id="email" class="bg-primary-50 border border-primary-300 text-primary-900 text-sm rounded-lg focus:ring-primary-600 placeholder-primary-300 focus:border-primary-600 block w-full p-2.5" placeholder="Correo electrónico" required="">
              <div id="alerta-email" class="hidden pt-3 text-sm text-red-700 rounded-lg bg-transparent" role="alert">
                <span class="font-medium">Correo electrónico no válido.</span>
              </div>
            </div>
            <div>
              <label for="password" class="block mb-2 text-sm font-medium text-primary-900">Contraseña&nbsp;<button data-popover-target="popover-description" data-popover-placement="right" type="button"> <svg class="shrink-0 inline w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 -1 20 26">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                  </svg><span class="sr-only">Show information</span></button></label>
              <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-primary-800 transition-opacity duration-300 bg-primary-100 border border-gray-200 rounded-lg shadow-xs opacity-0 w-auto">
                <div class="p-3 space-y-2">
                  <span class="">Asegúrate de que:</span>
                  <ul class="m-2 font-light list-disc list-inside">
                    <li>Minimo 8 caracteres.</li>
                    <li>Al menos una mayuscula y minuscula.</li>
                    <li>Un numero.</li>
                    <li>Incluir un caracter especial(. ! @ # ? _).</li>
                  </ul>
                </div>
                <div data-popper-arrow></div>
              </div>
              <input type="password" name="password" id="password" placeholder="••••••••" class="bg-primary-50 border border-primary-300 text-primary-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 placeholder-primary-300 block w-full p-2.5" required="">
            </div>
            <div>
              <label for="confirmPassword" class="block mb-2 text-sm font-medium text-primary-900">Confirmar contraseña</label>
              <input type="password" name="confirmPassword" id="confirmPassword" placeholder="••••••••" class="bg-primary-50 border border-primary-300 text-primary-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 placeholder-primary-300 block w-full p-2.5" required="">
              <div id="alerta-password" class="hidden pt-3 text-sm text-red-700 rounded-lg bg-transparent" role="alert">
                <span class="font-medium">Las contraseñas no coinciden.</span>
              </div>
            </div>
            <div class="flex items-start">
              <div class="flex items-center h-5">
                <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-primary-300 rounded bg-primary-50 focus:ring-3 text-primary-800 focus:ring-primary-300" required="">
              </div>
              <div class="ml-3 text-sm">
                <label for="terms" class="font-light text-primary-700">Acepto los <a class="font-medium text-primary-900 hover:underline" href="#">Terminos y Condiciones</a></label>
                <div id="alerta-terms" class="hidden pt-3 text-sm text-red-700 rounded-lg bg-transparent" role="alert">
                  <span class="font-medium">Debes aceptar los términos y condiciones.</span>
                </div>
              </div>
            </div>
            <button id="btnForm" type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Crear cuenta</button>
            <p class="text-sm font-light text-primary-700">
              ¿Ya tienes una cuenta? <a href="<?= site_url('login/') ?>" class="font-medium text-primary-900 hover:underline">Inicia sesión aqui</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
  class FormValidator {
    constructor(formId) {
      this.form = document.getElementById(formId);
      this.fields = {
        email: {
          input: document.getElementById('email'),
          alert: document.getElementById('alerta-email'),
          regex: /^(?!.*\.\.)[A-Za-z0-9._%+-]{1,64}@[A-Za-z0-9-]{1,63}(\.[A-Za-z]{2,})+$/,
          dependents: [],
          allowSpace: false
        },
        password: {
          input: document.getElementById('password'),
          regex: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])(?!.*\s).{8,64}$/,
          dependents: ['confirmPassword'],
          allowSpace: false
        },
        confirmPassword: {
          input: document.getElementById('confirmPassword'),
          alert: document.getElementById('alerta-password'),
          dependents: [],
          allowSpace: false
        },
        terms: {
          input: document.getElementById('terms'),
          alert: document.getElementById('alerta-terms'),
          required: true
        }
      };

      this.init();
    }

    init() {
      Object.entries(this.fields).forEach(([fieldName, field]) => {
        if (!field.input) {
          console.error(`Campo ${fieldName} no tiene elemento input.`);
          return;
        }

        // Bloquear espacio si no está permitido
        if (field.input.type !== 'checkbox' && field.input.type !== 'radio') {
          field.input.addEventListener('keydown', (e) => {
            if (e.key === ' ' && !field.allowSpace) {
              e.preventDefault();
            }
          });
        }

        // Eventos para validación
        if (field.input.type === 'checkbox' || field.input.type === 'radio') {
          field.input.addEventListener('change', () => this.validateField(fieldName));
        } else {
          field.input.addEventListener('input', () => this.validateField(fieldName));
          field.input.addEventListener('blur', () => this.validateField(fieldName));
        }
      });

      // Validación inicial
      //Object.keys(this.fields).forEach(fieldName => this.validateField(fieldName));
    }

    validateField(fieldName) {
      const field = this.fields[fieldName];
      let isValid = false;

      if (fieldName === 'confirmPassword') {
        isValid = this.validateConfirmPassword();
      } else if (fieldName === 'terms') {
        isValid = field.input.checked;
      } else {
        isValid = this.validateWithRegex(field, fieldName);
      }

      isValid ? this.setValid(field.input, fieldName) : this.showError(field.input, fieldName);

      // Validar dependientes (si existen)
      (field.dependents || []).forEach(dependent => this.validateField(dependent));

      return isValid;
    }

    validateWithRegex(field, fieldName) { // Añade fieldName como parámetro
      const value = field.input.value.trim();
      if (!field.regex.test(value)) {
        this.showError(field.input, fieldName); // Pasa fieldName a showError
        return false;
      }
      return true;
    }

    validateConfirmPassword() {
      const password = this.fields.password.input.value;
      const confirmPassword = this.fields.confirmPassword.input.value.trim();

      if (confirmPassword === '' || password !== confirmPassword) {
        return false;
      }
      return true;
    }

    showError(input, fieldName) {
      const field = this.fields[fieldName];
      input.classList.add('border-red-700', 'border-2');
      input.classList.remove('border-green-700');

      // Mostrar alerta si existe
      if (field.alert) {
        field.alert.classList.remove('hidden');
      }
    }

    clearAllErrors() {
      Object.values(this.fields).forEach(field => {
        field.input.classList.remove('border-red-700', 'border-green-700', 'border-2');
        if (field.alert) {
          field.alert.classList.add('hidden');
        }
      });
    }

    setValid(input, fieldName) {
      const field = this.fields[fieldName];
      input.classList.remove('border-red-700');
      input.classList.add('border-green-700', 'border-2');

      // Ocultar alerta si existe
      if (field.alert) {
        field.alert.classList.add('hidden');
      }
    }

    validateForm() {
      this.clearAllErrors();
      return Object.keys(this.fields).every(fieldName => this.validateField(fieldName));
    }

    resetForm() {
      this.form.reset();
      this.clearAllErrors();

      // Reset manual de todos los campos
      Object.values(this.fields).forEach(field => {
        if (field.input.type === 'checkbox' || field.input.type === 'radio') {
          field.input.checked = false;
        } else {
          field.input.value = '';
        }
        field.input.blur(); // Remover foco si está activo
      });
    }

    getFormData() {
      return {
        email: this.fields.email.input.value.trim(),
        password: this.fields.password.input.value.trim()
      };
    }
  }

  const alertaRegistro = document.getElementById('alertaRegistro');
  const textoError = document.getElementById('textoError');
  let hideAlertTimeout;

  const startHideAlertTimeout = (element, time = 5000) => {
    if (hideAlertTimeout) clearTimeout(hideAlertTimeout);
    hideAlertTimeout = setTimeout(() => {
      element.classList.add('hidden');
    }, time);
  };

  document.addEventListener('DOMContentLoaded', () => {
    const formRegistro = new FormValidator('registroCliente');
    formRegistro.resetForm(); // Usa el nuevo método

    formRegistro.form.addEventListener('submit', async (e) => {
      e.preventDefault();
      if (!formRegistro.validateForm()) return;

      const submitButton = formRegistro.form.querySelector('button[type="submit"]');
      const originalText = submitButton.textContent;

      try {
        submitButton.disabled = true;
        submitButton.textContent = 'Registrando...';

        const formData = formRegistro.getFormData();
        const response = await registrarCliente(formData); // <-- Esta función debe manejar el "success: false"

        formRegistro.form.reset();
        formRegistro.clearAllErrors();

        if (response.success) {
          if (hideAlertTimeout) clearTimeout(hideAlertTimeout);
          if (response.redirect) {
            // Esperar 100ms para asegurar que se guardó en sessionStorage
            setTimeout(() => {
              window.location.href = response.redirect;
            }, 100);
          }
        } else {
          textoError.textContent = response.message;
          alertaRegistro.classList.remove('hidden');
          startHideAlertTimeout(alertaRegistro, 3000);
          formRegistro.form.reset();
          formRegistro.clearAllErrors();
        }
      } catch (error) {
        textoError.textContent = error.message;
        alertaRegistro.classList.remove('hidden');
        startHideAlertTimeout(alertaRegistro, 3000);
        formRegistro.form.reset();
        formRegistro.clearAllErrors();
      } finally {
        submitButton.disabled = false;
        submitButton.textContent = originalText;
      }
    });
  });

  async function registrarCliente(datos) {
    const response = await fetch('<?= site_url('registro/registrarcliente') ?>', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        // '<?= csrf_header() ?>': '<?= csrf_hash() ?>'
      },
      body: JSON.stringify(datos)
    });

    const data = await response.json(); // Siempre parsea la respuesta

    // Si el servidor devuelve success: false
    if (!data.success) {
      throw new Error(data.message || 'Error desconocido');
    }

    // Guardar el email con clave única
    if (data.email) {
      const timestamp = Date.now();
      const storageKey = `reg_cliente_${timestamp}`;

      // Guardar ambos valores
      sessionStorage.setItem(storageKey, data.email); // ¡Sin JSON.stringify!
      sessionStorage.setItem('last_reg_cliente_key', storageKey);
    }

    return data;
  }
</script>