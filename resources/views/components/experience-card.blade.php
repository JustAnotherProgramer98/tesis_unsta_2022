<div class="transition ease-in-out duration-110  hover:-translate-y-1 hover:scale-110 cursor-pointer rounded-md shadow-2xl hover:shadow-dark-400/80 hover:shadow-2xl bg-paleta_tesis_blanco hover:bg-blue-200   shadow-gray-200 hover:shadow-dark-400/80 ">
    <a href="{{ route('guest.product',$experiencie) }}">
        @if ($experiencie->images->first())
        <div class="w-full rounded-t-md min-h-40 {{ $experiencie->images->first() ? '' : 'bg-paleta_tesis_gris' }}">
            <img class="aspect-video bg-cover w-full rounded-t-md h-64" src="{{asset('storage/'.$experiencie->images->first()->url)}}" />
        </div>
        @else
        <div class="w-full rounded-t-md min-h-40 {{ $experiencie->images->first() ? '' : 'bg-paleta_tesis_gris' }}">
            <img class="aspect-video bg-cover w-full rounded-t-md min-h-40" src="{{asset('images/Turistear.png')}}" />
        </div>
        @endif
    </a>
      <div class="p-4">
          <p class="text-paleta_tesis_gris: font-normal text-base">Categoria: 
            @foreach ($experiencie->categories as $category) 
            <span class="text-paleta_tesis_celeste"> {{ $category->title }}  @if ($loop->last) @else -@endif </span> 
            @endforeach
            </p>                              
          <p class=" text-2xl  py-2">{{ $experiencie->title }}</p>
          <p class="font-light text-gray-700 text-justify line-clamp-3">{{ Str::limit($experiencie->description, 50, '...') }}</p>
          <div class="flex flex-wrap mt-10 space-x-4 align-bottom">
            @if ($experiencie->host->images->first())
              <img class="w-10 h-10 rounded-full" src="{{asset('storage/'.$experiencie->host->images->first()->url)}}" />
            @else
              <img class="w-10 h-10 rounded-full" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="Profile picture">
            @endif
              <div class="flex flex-col space-y-0">
                <p class="font-semibold text-base">{{$experiencie->host->name.' '.$experiencie->host->surname}}</p>
                  <p class="{{$experiencie->status == 1 ? 'cursor-default px-2 my-6 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100' : ''}} font-semibold text-base">Anfitrion  {{$experiencie->status == 1 ? 'validado' : 'sin validar'}}</p>
              </div>
          </div>
      </div>
  </div>