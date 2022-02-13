@extends('layouts.guest')
@section('content') 

    <!-- contacto -->
    <div class="flex items-center min-h-screen bg-gray-50">
        <div class="container mx-auto">
            <div class="mx-auto my-10 bg-white p-5 rounded-md shadow-sm">
                <div class="text-center">
                    <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-700">Contact Us</h1>
                    <p class="text-gray-400 dark:text-gray-400">Completa el formulario para contactarte por mensaje.</p>
                </div>
                <div class="m-7">
                    <form action="https://api.web3forms.com/submit" method="POST" id="form">

                        <input type="hidden" name="apikey" value="YOUR_ACCESS_KEY_HERE">
                        <input type="hidden" name="subject" value="New Submission from Web3Forms">
                        <input type="checkbox" name="botcheck" id="" style="display: none;">


                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Nombre Completo</label>
                            <input type="text" name="name" id="name" placeholder="John Doe" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Email</label>
                            <input type="email" name="email" id="email" placeholder="you@company.com" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                        </div>
                        <div class="mb-6">

                            <label for="phone" class="text-sm text-gray-600 dark:text-gray-400">Teléfono</label>
                            <input type="text" name="phone" id="phone" placeholder="+1 (555) 1234-567" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                        </div>
                        <div class="mb-6">
                            <label for="message" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Mensaje</label>

                            <textarea rows="5" name="message" id="message" placeholder="Your Message" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required></textarea>
                        </div>
                        <div class="mb-6">
                            <button type="submit" class="w-full px-3 py-4 text-white bg-gray-700 rounded-md focus:bg-indigo-600 focus:outline-none">Send Message</button>
                        </div>
                        <p class="text-base text-center text-gray-400" id="result">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Photos Team -->
    <section class="bg-white dark:bg-gray-700">
        <div class="container px-6 py-10 mx-auto">
            <div class="xl:flex xl:items-center xL:-mx-4">
                <div class="xl:w-1/2 xl:mx-4">
                    <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">Nuestro
                        Equipo</h1>

                    <p class="max-w-2xl mt-4 text-gray-500 dark:text-gray-300">
                        Somos dos alumnos cursando su último año de la carrera de Ingeniería Informática, de la Universidad del
                        Norte Santo Tomas de Aquino.
                        Este proyecto está diseñado como exposición para el proyecto final integrador. En el cual consta de satisfacer las necesidades de clientes a nivel mundial.

                    </p>
                </div>

                <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-0 xl:mx-4 xl:w-1/2 md:grid-cols-2">
                    <div>
                        <img class="object-cover rounded-xl h-64 w-full"
                            src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                            alt="">

                        <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white">Santiago
                            Evangelista</h1>

                        <p class="mt-2 text-gray-500 capitalize dark:text-gray-300">Full stack developer</p>
                    </div>

                    <div>
                        <img class="object-cover rounded-xl h-64 w-full"
                            src="https://images.unsplash.com/photo-1499470932971-a90681ce8530?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                            alt="">

                        <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white">Matias Nicolas
                            Morales</h1>

                        <p class="mt-2 text-gray-500 capitalize dark:text-gray-300">Graphic Designer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script>
const form = document.getElementById('form');
const result = document.getElementById('result');

form.addEventListener('submit', function(e) {
    const formData = new FormData(form);
    e.preventDefault();
    var object = {};
    formData.forEach((value, key) => {
        object[key] = value
    });
    var json = JSON.stringify(object);
    result.innerHTML = "Please wait..."

    fetch('https://api.web3forms.com/submit', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: json
        })
        .then(async (response) => {
            let json = await response.json();
            if (response.status == 200) {
                result.innerHTML = json.message;
                 result.classList.remove('text-gray-500');
                result.classList.add('text-green-500');
            } else {
                console.log(response);
                result.innerHTML = json.message;
                 result.classList.remove('text-gray-500');
                 result.classList.add('text-red-500');
            }
        })
        .catch(error => {
            console.log(error);
            result.innerHTML = "Something went wrong!";
        })
        .then(function() {
            form.reset();
            setTimeout(() => {
                result.style.display = "none"; 
            }, 5000);
        });
})
</script>
@endsection 