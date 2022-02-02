<div id="sales" class="tabcontent hidden">
    <br>
    <div class="flex gap-4 my-4 ">
      <div class="relative w-1/2">
          <input type="text" class="w-full p-2 pl-8 rounded border border-gray-200 bg-gray-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Buscar ventas..." />
          <svg class="w-4 h-4 absolute left-2.5 top-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
          </svg>
      </div>
          <button style="margin-top: auto;margin-bottom: auto" id="button-popover" class="rounded-full border-2 border-blue-500 shadow-lg h-8 w-8" aria-describedby="tooltip">?</button>
          <div id="tooltip" role="tooltip"> Hace click en las primeras 3 columnas y mira el detalle de la venta
              <div id="arrow" data-popper-arrow></div>
          </div>
    </div>
    @include('components.host_experience_table')
</div>