<div class="px-3 pt-24 bg-primary-50">
  <div id="default-carousel" class="relative w-full justify-self-center" data-carousel="slide">

    <!-- Carousel wrapper -->
    <div class="relative my-4 h-40 sm:h-64 md:h-96 overflow-hidden rounded-lg">
      <?php foreach ($activa as $index => $promo) : ?>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <?= img([
            'src'   => base_url($promo['ValorImagen']),
            'alt'   => "Promoción " . ($index + 1),
            'class' => "absolute block rounded-lg  max-h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
          ]); ?>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
      <?php foreach ($activa as $index => $promo) : ?>
        <button type="button" class="w-3 h-3 rounded-full"
          aria-current="<?= $index === 0 ? 'true' : 'false'; ?>"
          aria-label="Slide <?= $index + 1; ?>"
          data-carousel-slide-to="<?= $index; ?>">
        </button>
      <?php endforeach; ?>
    </div>

    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
      <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-primary-800/40 group-hover:bg-primary-800/80 group-focus:ring-4 group-focus:ring-primary-800/40 group-focus:outline-none">
        <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
        </svg>
        <span class="sr-only">Anterior</span>
      </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
      <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-primary-800/40 group-hover:bg-primary-800/80 group-focus:ring-4 group-focus:ring-primary-800/40 group-focus:outline-none">
        <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
        </svg>
        <span class="sr-only">Siguiente</span>
      </span>
    </button>
  </div>
</div>