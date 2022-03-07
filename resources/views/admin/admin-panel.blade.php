@extends('layouts.app')

@section('title_of_tab')
    <p class="text-paleta_tesis_celeste font-bold text-2xl">Panel de administracion</p>
@endsection

@section('content')


<div class="px-6 mx-auto grid dark:bg-gray-800">
    
    <!-- CTA -->
    <a target="_blank" class="my-6 flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-paleta_tesis_azul rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
        href="https://github.com/JustAnotherProgramer98/tesis_unsta_2022">
        <div class="flex items-center">
            <i class="text-2xl text-paleta_tesis_blanco fab fa-github"></i>
            <span class="ml-4">Ir al GitHub</span>
        </div>
    </a>
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <!-- Card -->
        <div class="border border-gray-200 flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Usuarios totales</p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ count($users) }}</p>
            </div>
        </div>
        <!-- Card -->
        <div class="border border-gray-200 flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Ganancias totales</p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">$ {{ $balance }}</p>
            </div>
        </div>
        <!-- Card -->
        <div class="border border-gray-200 flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Cantidad de experiencias</p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{count($experiences)}}</p>
            </div>
        </div>
        <!-- Card -->
        <div class="border border-gray-200 flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Emails de contacto</p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ count($contacts) }}</p>
            </div>
        </div>
    </div>

    <!-- Charts -->
    
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Estadisticas del sitio</h2>
    
    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <div class="border border-gray-200 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <canvas class="mx-auto" id="experiences_status_chart" style="width:100%;max-width:600px"></canvas>
        </div>
        <div class="border border-gray-200 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <canvas class="mx-auto" id="users_status_chart" style="width:100%;max-width:600px"></canvas>
        </div>
        <div class="border border-gray-200 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <canvas class="mx-auto" id="users_roles_chart" style="width:100%;max-width:600px"></canvas>
        </div>
        <div class="border border-gray-200 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <canvas class="mx-auto" id="best_five_users" style="width:100%;max-width:600px"></canvas>
        </div>
        <div class="border border-gray-200 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <canvas class="mx-auto" id="best_five_categories" style="width:100%;max-width:600px"></canvas>
        </div>
        <div class="border border-gray-200 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <canvas class="mx-auto" id="best_five_provinces" style="width:100%;max-width:600px"></canvas>
        </div>
    </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
    //Experiencias validadas y no validadas
    var xValues = ["Validadas", "No validadas",'Pendientes de aprobacion'];
    var yValues = [@json(count($experiences->where('status',1))), @json(count($experiences->where('status',0))), @json(count($experiences->where('status',2)))];
    var barColors = ["#c084fc","#4ade80","#34d399"];

    new Chart("experiences_status_chart", {
    type: "pie",
    data: {
        labels: xValues,
        datasets: [{
        backgroundColor: barColors,
        data: yValues
        }]
    },
    options: {
        title: {
        display: true,
        text: "Estados de las experiencias"
        }
    }
    });

    //Anfitriones validados y no validados
    var xValues_hosts = ["Validados", "No validados",'Pendientes de aprobacion'];
    var yValues_hosts = [@json(count($users->where('status',1))), @json(count($users->where('status',0))), @json(count($users->where('status',2)))];
    var barColors_hosts = ["#4ade80","#fa84be","#faf484"];

    new Chart("users_status_chart", {
    type: "pie",
    data: {
        labels: xValues_hosts,
        datasets: [{
        backgroundColor: barColors_hosts,
        data: yValues_hosts
        }]
    },
    options: {
        title: {
        display: true,
        text: "Distribucion de los usuarios"
        }
    }
    });

    //Roles de los usuarios
    var xValues_roles = ["Anfitriones", "Clientes",'Administradores'];
    var yValues_roles = [@json($host_count),@json($count_clients), @json($count_admins)];
    var barColors_roles = ["#DBE2EF","#3F72AF","#112D4E"];

    new Chart("users_roles_chart", {
    type: "pie",
    data: {
        labels: xValues_roles,
        datasets: [{
        backgroundColor: barColors_roles,
        data: yValues_roles
        }]
    },
    options: {
        title: {
        display: true,
        text: "Distribucion de los usuarios"
        }
    }
    });

    //Top 5 usuarios con mas compras
    var xValues_best_names = [@json($best_users_names[0])+' '+@json($best_users_surnames[0]),@json($best_users_names[1])+' '+@json($best_users_surnames[1]),@json($best_users_names[2])+' '+@json($best_users_surnames[2]),@json($best_users_names[3])+' '+@json($best_users_surnames[3]),@json($best_users_names[4])+' '+@json($best_users_surnames[4])];
    var yValues_best_values = [@json($best_users_sales[0]),@json($best_users_sales[1]),@json($best_users_sales[2]),@json($best_users_sales[3]),@json($best_users_sales[4])];
    var barColors_best_5 = ["#019267","#00C897","#FFD365",'#FDFFA9','#533E85'];

    new Chart("best_five_users", {
    type: "pie",
    data: {
        labels: xValues_best_names,
        datasets: [{
        backgroundColor: barColors_best_5,
        data: yValues_best_values
        }]
    },
    options: {
        title: {
        display: true,
        text: "Top 5 usuarios con mas compras"
        }
    }
    });

    //Top 5  provincias con mas experiencias
    var xValues_best_provinces = [@json($best_places[0]->city->province->name),@json($best_places[1]->city->province->name),@json($best_places[2]->city->province->name),@json($best_places[3]->city->province->name),@json($best_places[4]->city->province->name)];
    var yValues_best_provinces_values = [@json($best_categories[0]->experiences_count),@json($best_categories[1]->experiences_count),@json($best_categories[2]->experiences_count),@json($best_categories[3]->experiences_count),@json($best_categories[4]->experiences_count)];
    var barColors_best_5_provinces = ["#2B2E4A","#E84545","#903749",'#424874','#53354A'];

    new Chart("best_five_provinces", {
    type: "pie",
    data: {
        labels: xValues_best_provinces,
        datasets: [{
        backgroundColor: barColors_best_5_provinces,
        data: yValues_best_provinces_values
        }]
    },
    options: {
        title: {
        display: true,
        text: "Top 5 usuarios con mas compras"
        }
    }
    });

    //Top 5  categorias con mas experiencias
    
    var xValues_best_categories = [@json($best_categories[0]->title),@json($best_categories[1]->title),@json($best_categories[2]->title),@json($best_categories[3]->title),@json($best_categories[4]->title)];
    var yValues_best_categories_values = [@json($best_categories[0]->experiences_count),@json($best_categories[1]->experiences_count),@json($best_categories[2]->experiences_count),@json($best_categories[3]->experiences_count),@json($best_categories[4]->experiences_count)];
    var barColors_best_5_categories = ["#F9ED69","#B83B5E","#F08A5D",'#6A2C70','#364F6B'];

    new Chart("best_five_categories", {
    type: "pie",
    data: {
        labels: xValues_best_categories,
        datasets: [{
        backgroundColor: barColors_best_5_categories,
        data: yValues_best_categories_values
        }]
    },
    options: {
        title: {
        display: true,
        text: "Top 5  categorias con mas experiencias"
        }
    }
    });

</script>

@endsection
