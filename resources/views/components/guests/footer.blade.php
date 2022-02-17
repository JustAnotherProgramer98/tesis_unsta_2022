<footer class="relative bg-paleta_tesis_azul  pt-8 pb-6">
    <div class="container mx-auto flex flex-col flex-wrap items-center justify-between">
        <ul class="flex mx-auto text-black text-center justify-evenly">
            <li class="text-paleta_tesis_blanco p-2 cursor-pointer hover:underline">Terminos y Condiciones</li>
            <li class="text-paleta_tesis_blanco p-2 cursor-pointer hover:underline">Privacidad</li>
            <li class="text-paleta_tesis_blanco p-2 cursor-pointer hover:underline">Cookies</li>
        </ul>
        <ul class="flex mx-auto text-black text-center">
            <li class="p-2">
                <i class="text-2xl  text-paleta_tesis_blanco fab fa-facebook-f"></i>
            </li>
            <li class="p-2">
                <i class="text-2xl text-paleta_tesis_blanco  fab fa-instagram"></i>
            </li>
            <li class="p-2">
                <i class="text-2xl text-paleta_tesis_blanco fab fa-github"></i>
            </li>
        </ul>
        <p class="flex mx-auto text-paleta_tesis_blanco text-center">Sitio oficial - Turiste <span class="text-paleta_tesis_celeste">AR </span><br></p>
        <p class="mt-4 text-paleta_tesis_blanco text-center">{{  \Carbon\Carbon::now()->year }}</p>
    </div>
</footer>