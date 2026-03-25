<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <?= csrf_meta() ?> -->
  <title><?= esc($title) ?></title>
  <?= script_tag(base_url('croppie/croppie.js')); ?>
  <?= script_tag(base_url('croppie/exif.js')); ?>
  <?= link_tag(base_url('croppie/croppie.css')); ?>
  <?= script_tag("https://unpkg.com/drift-zoom/dist/Drift.min.js"); ?>
  <?= link_tag("https://unpkg.com/drift-zoom/dist/drift-basic.min.css"); ?>
  <?= script_tag('https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4'); ?>
  <style type="text/tailwindcss">
    @theme {
      --color-primary-50: rgb(251, 247, 241);
      --color-primary-100: rgb(247, 237, 221);
      --color-primary-200: rgb(237, 215, 187);
      --color-primary-300: rgb(226, 187, 143);
      --color-primary-400: rgb(213, 152, 98);
      --color-primary-500: rgb(204, 126, 67);
      --color-primary-600: rgb(190, 105, 56);
      --color-primary-700: rgb(158, 82, 48);
      --color-primary-800: rgb(127, 68, 45);
      --color-primary-900: rgb(103, 56, 39);
      --color-primary-950: rgb(32, 16, 11);
    }

    .cursor-wait {
      cursor: wait !important;
    }

    #precio-range {
      -webkit-appearance: none;
      appearance: none;
      width: 100%;
      height: 5px;
      background: transparent;
      position: relative;
      z-index: 10;
      /* Aseguramos que el slider no se superponga al tooltip */
    }

    /* Track (barra deslizante) */
    #precio-range::-webkit-slider-runnable-track {
      background: var(--color-primary-950);
      height: 5px;
      border-radius: 5px;
    }

    /* Thumb (círculo de selección) */
    #precio-range::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 20px;
      height: 20px;
      background: var(--color-primary-500);
      border-radius: 50%;
      cursor: pointer;
      position: relative;
      top: 50%;
      transform: translateY(-50%);
      z-index: 20;
      /* Aseguramos que el thumb esté encima del tooltip */
    }

    .drift-zoom-pane {
      z-index: 40 !important;
      background-color: transparent !important;
      box-shadow: 0 0 50px rgba(0, 0, 0, 0.1);
      border-radius: 0 !important;
      width: 20vw !important;
      height: 20vw !important;
    }

    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    input[type="search"]::-webkit-search-cancel-button {
      -webkit-appearance: none;
      appearance: none;
      display: none;
    }

  </style>
  <?= link_tag('https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css', 'stylesheet'); ?>
  <?= link_tag('https://fonts.googleapis.com', 'preconnect'); ?>
  <?= link_tag('https://fonts.gstatic.com', 'preconnect', '', '', '', false, '', ['crossorigin' => '']); ?>
  <?= link_tag('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap', 'stylesheet'); ?>
  <?= link_tag(base_url('imagenes/icon1.svg'), 'shorcut icon', 'image/ico'); ?>
</head>

<body class="font-[Lexend]">
  <?= script_tag('https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js'); ?>
  <?= script_tag('https://cdn.jsdelivr.net/npm/fast-xml-parser@5.2.2/lib/fxp.min.js'); ?>

  <script>
    window.addEventListener('pageshow', (event) => {
      // Si la página viene de la bfcache:
      if (event.persisted || window.performance.getEntriesByType('navigation')[0].type === 'back_forward') {
        // Opción A: recargar toda la página
        window.location.reload();
      }
    });
  </script>
</body>

</html>