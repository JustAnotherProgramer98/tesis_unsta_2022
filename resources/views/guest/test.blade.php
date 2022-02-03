<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.tailwindcss.com/"></script>
 <!-- component -->
 <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
<head>
    <meta charset="UTF-8">    
   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

        <section>
            <!-- component -->
            <p class="text-center text-4xl font-semibold py-4"><br> Por Categorias o Lugar Elegida</p>
            <div tabindex="0" class="focus:outline-none">
                <!-- Remove py-8 -->
                <div class="mx-auto container py-8">
                    <div class="flex flex-wrap items-center lg:justify-between justify-center">
                        <!-- Card 1 -->
                        @foreach ($experiences as $experience)
                        <div tabindex="0" class="focus:outline-none mx-2 w-72 xl:mb-0 mb-8">
                            <div>
                                <img src="https://images.unsplash.com/photo-1497493292307-31c376b6e479?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80" alt="">
                                <div>
                                    <h1 class="mt-3 text-gray-800 text-2xl font-bold my-2"> {{ $experience->title }} </h1>
                                    <p class="text-gray-700 mb-2"> {{ $experience->description }}</p>
                                    <div class="flex justify-between mt-4">
                                        <span class="font-thin text-sm">May 20th 2020</span>
                                        <span class="mb-2 text-gray-800 font-bold">Read more</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>    <!-- Card 1 Ends -->
                </div>
                
            </div>
            <script src="chrome-extension://kgejglhpjiefppelpmljglcjbhoiplfn/shadydom.js"></script>
            <script>
                if (!window.ShadyDOM) window.ShadyDOM = { force: true, noPatch: true };
            </script>
        </section>

<body>
                    
<main class="py-12 md:px-20 sm:px-14 px-6 border-b-2 border-gray-200 mb-5">
    <p class="text-center text-4xl font-semibold py-4">Por Categorias</p>
                    
    

    <div class="mt-6 md:flex space-x-6">
      
      @foreach ($experiences->take(4) as $experience)

        <template x-for="(image, index) in images">
            <figure class="h-96" x-show="currentIndex == index + 1" x-transition:enter="transition transform duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition transform duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">
            <img :src="image" alt="Image" class="absolute inset-0 z-10 h-full w-full object-cover opacity-70" />
            </figure>
        </template>

      <div>
        <img src="https://images.unsplash.com/photo-1497493292307-31c376b6e479?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80" alt="">
        <div>
          <h1 class="mt-3 text-gray-800 text-2xl font-bold my-2"> {{ $experience->title }} </h1>
          <p class="text-gray-700 mb-2"> {{ $experience->description }}</p>
          <div class="flex justify-between mt-4">
            <span class="font-thin text-sm">May 20th 2020</span>
            <span class="mb-2 text-gray-800 font-bold">Read more</span>
          </div>
        </div>
      </div>

        

      @endforeach
        <button @click="back()"
            class="absolute left-14 top-1/2 -translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md z-10 bg-gray-100 hover:bg-gray-200">
            <svg class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7">
                </path>
            </svg>
        </button>

        <button @click="next()"
            class="absolute right-14 top-1/2 translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md z-10 bg-gray-100 hover:bg-gray-200">
            <svg class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>

    </div>
  </main>

<article x-data="slider" class="relative w-full flex flex-shrink-0 overflow-hidden shadow-2xl">
    
        
            <figure class="h-96" x-show="currentIndex == index + 1" x-transition:enter="transition transform duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition transform duration-300" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
                <img :src="image" alt="Image" class="absolute inset-0 z-10 h-full w-full object-cover opacity-70" />
            </figure>
        
    
        <button @click="back()"
            class="absolute left-14 top-1/2 -translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md z-10 bg-gray-100 hover:bg-gray-200">
            <svg class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7">
                </path>
            </svg>
        </button>

        <button @click="next()"
            class="absolute right-14 top-1/2 translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md z-10 bg-gray-100 hover:bg-gray-200">
            <svg class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    

</article>




</body>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('slider', () => ({
            currentIndex: 1,
            images: [
                'https://source.unsplash.com/1600x900/?beach',
                'https://source.unsplash.com/1600x900/?cat',
                'https://source.unsplash.com/1600x900/?dog',
                'https://source.unsplash.com/1600x900/?lego',
                'https://source.unsplash.com/1600x900/?textures&patterns'
            ],
            back() {
                if (this.currentIndex > 1) {
                    this.currentIndex = this.currentIndex - 1;
                }
            },
            next() {
                if (this.currentIndex < this.images.length) {
                    this.currentIndex = this.currentIndex + 1;
                } else if (this.currentIndex <= this.images.length){
                    this.currentIndex = this.images.length - this.currentIndex + 1
                }
            },
        }))
    })
</script>

</html>