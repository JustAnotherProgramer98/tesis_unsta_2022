<div id="comment_experience" class="hidden modal-comment">
    <form style="width: 50%;" class="modal-content-comment animate bg-paleta_tesis_blanco border border-gray-500" action="{{ route('sale.experiencie.comment') }}" method="POST">
        @csrf
        <input id="comment_experience_id" type="hidden" name="experience_id">
        <input id="comment_sale_id" type="hidden" name="sale_id">
        <div class="imgcontainer relative">
            <span style="top:-50px;right: -30px;"
                onclick="document.getElementById('comment_experience').style.display='none'"
                class="absolute text-6xl text-gray-500 cursor-pointer hover:text-red-400"
                title="Close Modal">&times;</span>
            <img loading="lazy" src="{{ asset('images/Turistear3.png') }}" alt="Turistear Comenta la experiencia"
                title="Priede-Ramis - Estudio Jurídico">
            <h2 class="text-lg text-paleta_tesis_azul ml-24">Contanos como la pasaste en <span class="text-blue-500 underline" id="experience_name_on_comment"></span>!</h2>
        </div>
        <p style="margin-top: 10px;text-align: center;color: white;font-weight:lighter;">Inicio de sesion</p>
        <div class="container-comment">
            <label class="text-paleta_tesis_azul italic mb-4">Comentario</label>
            <textarea name="comment"
                class="bg-gray-400 field_class text-paleta_tesis_azul border-b-2 border-b-paleta_tesis_azul focus:outline-none"
                style="margin-bottom: 20px;resize: none" id="" cols="30" rows="10"
                placeholder="Deja tu comentario aqui"></textarea>
            <label class="text-paleta_tesis_azul italic mb-4">Estrellas</label>
            <p class="clasificacion text-left">
                <input id="radio1" type="radio" class="input-stars" name="stars_number" value="5"><label
                    style="font-size: 40px;" class="label-stars label-stars-tag" for="radio1">★</label>
                <input id="radio2" type="radio" class="input-stars" name="stars_number" value="4"><label
                    style="font-size: 40px;" class="label-stars label-stars-tag" for="radio2">★</label>
                <input id="radio3" type="radio" class="input-stars" name="stars_number" value="3"><label
                    style="font-size: 40px;" class="label-stars label-stars-tag" for="radio3">★</label>
                <input id="radio4" type="radio" class="input-stars" name="stars_number" value="2"><label
                    style="font-size: 40px;" class="label-stars label-stars-tag" for="radio4">★</label>
                <input id="radio5" type="radio" class="input-stars" name="stars_number" value="1"><label
                    style="font-size: 40px;" class="label-stars label-stars-tag" for="radio5">★</label>
            </p>
        </div>

        <button class="submit_class bg-paleta_tesis_azul text-white">Comentar</button>
    </form>
</div>
