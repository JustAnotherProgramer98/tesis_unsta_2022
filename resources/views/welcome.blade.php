<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->
</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <!-- component -->
            <div class="w-10/12 md:w-7/12 lg:6/12 mx-auto relative py-20">
                <h1 class="text-3xl text-center font-bold text-blue-500">Timeline with Tailwindcss</h1>
                <div class="border-l-2 mt-10">
                    <!-- Card 1 -->
                    <div
                        class="transform transition cursor-pointer hover:-translate-y-2 ml-10 relative flex items-center px-6 py-4 bg-blue-600 text-white rounded mb-10 flex-col md:flex-row space-y-4 md:space-y-0">
                        <!-- Dot Follwing the Left Vertical Line -->
                        <div
                            class="w-5 h-5 bg-blue-600 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0">
                        </div>

                        <!-- Line that connecting the box with the vertical line -->
                        <div class="w-10 h-1 bg-blue-300 absolute -left-10 z-0"></div>

                        <!-- Content that showing in the box -->
                        <div class="flex-auto">
                            <h1 class="text-lg">Day 1</h1>
                            <h1 class="text-xl font-bold">Orientation and Briefing on Uniliver basics</h1>
                            <h3>Classroom</h3>
                        </div>
                        <a href="#" class="text-center text-white hover:text-gray-300">Download materials</a>
                    </div>

                    <!-- Card 2 -->
                    <div
                        class="transform transition cursor-pointer hover:-translate-y-2 ml-10 relative flex items-center px-6 py-4 bg-pink-600 text-white rounded mb-10 flex-col md:flex-row space-y-4 md:space-y-0">
                        <!-- Dot Follwing the Left Vertical Line -->
                        <div
                            class="w-5 h-5 bg-pink-600 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0">
                        </div>

                        <!-- Line that connecting the box with the vertical line -->
                        <div class="w-10 h-1 bg-pink-300 absolute -left-10 z-0"></div>

                        <!-- Content that showing in the box -->
                        <div class="flex-auto">
                            <h1 class="text-lg">Day 1</h1>
                            <h1 class="text-xl font-bold">Orientation and Briefing on Uniliver basics</h1>
                            <h3>Classroom</h3>
                        </div>
                        <a href="#" class="text-center text-white hover:text-gray-300">Download materials</a>
                    </div>

                    <!-- Card 3 -->
                    <div
                        class="transform transition cursor-pointer hover:-translate-y-2 ml-10 relative flex items-center px-6 py-4 bg-green-600 text-white rounded mb-10 flex-col md:flex-row space-y-4 md:space-y-0">
                        <!-- Dot Follwing the Left Vertical Line -->
                        <div
                            class="w-5 h-5 bg-green-600 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0">
                        </div>

                        <!-- Line that connecting the box with the vertical line -->
                        <div class="w-10 h-1 bg-green-300 absolute -left-10 z-0"></div>

                        <!-- Content that showing in the box -->
                        <div class="flex-auto">
                            <h1 class="text-lg">Day 1</h1>
                            <h1 class="text-xl font-bold">Orientation and Briefing on Uniliver basics</h1>
                            <h3>Classroom</h3>
                        </div>
                        <a href="#" class="text-center text-white hover:text-gray-300">Download materials</a>
                    </div>

                    <!-- Card 4 -->
                    <div
                        class="transform transition cursor-pointer hover:-translate-y-2 ml-10 relative flex items-center px-6 py-4 bg-purple-700	 text-white rounded mb-10 flex-col md:flex-row space-y-4 md:space-y-0">
                        <!-- Dot Follwing the Left Vertical Line -->
                        <div
                            class="w-5 h-5 bg-purple-600 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0">
                        </div>

                        <!-- Line that connecting the box with the vertical line -->
                        <div class="w-10 h-1 bg-purple-300 absolute -left-10 z-0"></div>

                        <!-- Content that showing in the box -->
                        <div class="flex-auto">
                            <h1 class="text-lg">Day 1</h1>
                            <h1 class="text-xl font-bold">Orientation and Briefing on Uniliver basics</h1>
                            <h3>Classroom</h3>
                        </div>
                        <a href="#" class="text-center text-white hover:text-gray-300">Download materials</a>
                    </div>

                    <!-- Card 5 -->
                    <div
                        class="transform transition cursor-pointer hover:-translate-y-2 ml-10 relative flex items-center px-6 py-4 bg-yellow-600 text-white rounded mb-10 flex-col md:flex-row">
                        <!-- Dot Follwing the Left Vertical Line -->
                        <div
                            class="w-5 h-5 bg-yellow-600 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 -mt-2 md:mt-0">
                        </div>

                        <!-- Line that connecting the box with the vertical line -->
                        <div class="w-10 h-1 bg-yellow-300 absolute -left-10 z-0"></div>

                        <!-- Content that showing in the box -->
                        <div class="flex-auto">
                            <h1 class="text-lg">Day 1</h1>
                            <h1 class="text-xl font-bold">Orientation and Briefing on Uniliver basics</h1>
                            <h3>Classroom</h3>
                        </div>
                        <a href="#" class="text-center text-white hover:text-gray-300">Download materials</a>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <br>
            <br>
            <!-- component -->
            <!-- MDI Icons -->
            <link rel="stylesheet" href="https://cdn.materialdesignicons.com/6.5.95/css/materialdesignicons.min.css">

            <!-- Page Container -->
            <div class="flex items-center justify-center min-h-screen bg-white py-48">
                <div class="flex flex-col">
                    <div class="flex flex-col mt-8">
                        <!-- Meet the Team -->
                        <div class="container max-w-7xl px-4">
                            <!-- Section Header -->
                            <div class="flex flex-wrap justify-center text-center mb-24">
                                <div class="w-full lg:w-6/12 px-4">
                                    <!-- Header -->
                                    <h1 class="text-gray-900 text-4xl font-bold mb-8">
                                        Meet the Team
                                    </h1>

                                    <!-- Description -->
                                    <p class="text-gray-700 text-lg font-light">
                                        With over 100 years of combined experience, we've got a well-seasoned team at
                                        the helm.
                                    </p>
                                </div>
                            </div>

                            <!-- Team Members -->
                            <div class="flex flex-wrap">
                                <!-- Member #1 -->
                                <div class="w-full md:w-6/12 lg:w-3/12 mb-6 px-6 sm:px-6 lg:px-4">
                                    <div class="flex flex-col">
                                        <!-- Avatar -->
                                        <a href="#">
                                            <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100"
                                                src="https://images.unsplash.com/photo-1634926878768-2a5b3c42f139?fit=clamp&w=400&h=400&q=80">
                                        </a>

                                        <!-- Details -->
                                        <div class="text-center mt-6">
                                            <!-- Name -->
                                            <h1 class="text-gray-900 text-xl font-bold mb-1">
                                                Tranter Jaskulski
                                            </h1>

                                            <!-- Title -->
                                            <div class="text-gray-700 font-light mb-2">
                                                Founder & Specialist
                                            </div>

                                            <!-- Social Icons -->
                                            <div
                                                class="flex items-center justify-center opacity-50 hover:opacity-100
                                    transition-opacity duration-300">
                                                <!-- Linkedin -->
                                                <a href="#" class="flex rounded-full hover:bg-indigo-50 h-10 w-10">
                                                    <i class="mdi mdi-linkedin text-indigo-500 mx-auto mt-2"></i>
                                                </a>

                                                <!-- Twitter -->
                                                <a href="#" class="flex rounded-full hover:bg-blue-50 h-10 w-10">
                                                    <i class="mdi mdi-twitter text-blue-300 mx-auto mt-2"></i>
                                                </a>

                                                <!-- Instagram -->
                                                <a href="#" class="flex rounded-full hover:bg-orange-50 h-10 w-10">
                                                    <i class="mdi mdi-instagram text-orange-400 mx-auto mt-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Member #2 -->
                                <div class="w-full md:w-6/12 lg:w-3/12 mb-6 px-6 sm:px-6 lg:px-4">
                                    <div class="flex flex-col">
                                        <!-- Avatar -->
                                        <a href="#">
                                            <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100"
                                                src="https://images.unsplash.com/photo-1634896941598-b6b500a502a7?fit=clamp&w=400&h=400&q=80">
                                        </a>

                                        <!-- Details -->
                                        <div class="text-center mt-6">
                                            <!-- Name -->
                                            <h1 class="text-gray-900 text-xl font-bold mb-1">
                                                Denice Jagna
                                            </h1>

                                            <!-- Title -->
                                            <div class="text-gray-700 font-light mb-2">
                                                Tired & M. Specialist
                                            </div>

                                            <!-- Social Icons -->
                                            <div
                                                class="flex items-center justify-center opacity-50 hover:opacity-100
                                    transition-opacity duration-300">
                                                <!-- Linkedin -->
                                                <a href="#" class="flex rounded-full hover:bg-indigo-50 h-10 w-10">
                                                    <i class="mdi mdi-linkedin text-indigo-700 mx-auto mt-2"></i>
                                                </a>

                                                <!-- Twitter -->
                                                <a href="#" class="flex rounded-full hover:bg-blue-50 h-10 w-10">
                                                    <i class="mdi mdi-twitter text-blue-400 mx-auto mt-2"></i>
                                                </a>

                                                <!-- Instagram -->
                                                <a href="#" class="flex rounded-full hover:bg-orange-50 h-10 w-10">
                                                    <i class="mdi mdi-instagram text-orange-400 mx-auto mt-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Member #3 -->
                                <div class="w-full md:w-6/12 lg:w-3/12 mb-6 px-6 sm:px-6 lg:px-4">
                                    <div class="flex flex-col">
                                        <!-- Avatar -->
                                        <a href="#">
                                            <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100"
                                                src="https://images.unsplash.com/photo-1634193295627-1cdddf751ebf?fit=clamp&w=400&h=400&q=80">
                                        </a>

                                        <!-- Details -->
                                        <div class="text-center mt-6">
                                            <!-- Name -->
                                            <h1 class="text-gray-900 text-xl font-bold mb-1">
                                                Kenji Milton
                                            </h1>

                                            <!-- Title -->
                                            <div class="text-gray-700 font-light mb-2">
                                                Team Memeber
                                            </div>

                                            <!-- Social Icons -->
                                            <div
                                                class="flex items-center justify-center opacity-50 hover:opacity-100
                                    transition-opacity duration-300">
                                                <!-- Linkedin -->
                                                <a href="#" class="flex rounded-full hover:bg-indigo-50 h-10 w-10">
                                                    <i class="mdi mdi-linkedin text-indigo-700 mx-auto mt-2"></i>
                                                </a>

                                                <!-- Twitter -->
                                                <a href="#" class="flex rounded-full hover:bg-blue-50 h-10 w-10">
                                                    <i class="mdi mdi-twitter text-blue-400 mx-auto mt-2"></i>
                                                </a>

                                                <!-- Instagram -->
                                                <a href="#" class="flex rounded-full hover:bg-orange-50 h-10 w-10">
                                                    <i class="mdi mdi-instagram text-orange-400 mx-auto mt-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Member #4 -->
                                <div class="w-full md:w-6/12 lg:w-3/12 mb-6 px-6 sm:px-6 lg:px-4">
                                    <div class="flex flex-col">
                                        <!-- Avatar -->
                                        <a href="#">
                                            <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100"
                                                src="https://images.unsplash.com/photo-1635003913011-95971abba560?fit=clamp&w=400&h=400&q=80">
                                        </a>

                                        <!-- Details -->
                                        <div class="text-center mt-6">
                                            <!-- Name -->
                                            <h1 class="text-gray-900 text-xl font-bold mb-1">
                                                Doesn't matter
                                            </h1>

                                            <!-- Title -->
                                            <div class="text-gray-700 font-light mb-2">
                                                Will be fired
                                            </div>

                                            <!-- Social Icons -->
                                            <div
                                                class="flex items-center justify-center opacity-50 hover:opacity-100
                                    transition-opacity duration-300">
                                                <!-- Linkedin -->
                                                <a href="#" class="flex rounded-full hover:bg-indigo-50 h-10 w-10">
                                                    <i class="mdi mdi-linkedin text-indigo-700 mx-auto mt-2"></i>
                                                </a>

                                                <!-- Twitter -->
                                                <a href="#" class="flex rounded-full hover:bg-blue-50 h-10 w-10">
                                                    <i class="mdi mdi-twitter text-blue-400 mx-auto mt-2"></i>
                                                </a>

                                                <!-- Instagram -->
                                                <a href="#" class="flex rounded-full hover:bg-orange-50 h-10 w-10">
                                                    <i class="mdi mdi-instagram text-orange-400 mx-auto mt-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="w-full flex gap-4 snap-x overflow-x-auto py-14">
                <div class="shrink-0 w-2/5">
                  <img src="https://images.unsplash.com/photo-1604999565976-8913ad2ddb7c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&h=160&q=80" />
                </div>
                <div class="shrink-0 w-2/5">
                  <img src="https://images.unsplash.com/photo-1540206351-d6465b3ac5c1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&h=160&q=80" />
                </div>
                <div class="shrink-0 w-2/5">
                  <img src="https://images.unsplash.com/photo-1622890806166-111d7f6c7c97?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&h=160&q=80" />
                </div>
                <div class="shrink-0 w-2/5">
                  <img src="https://images.unsplash.com/photo-1590523277543-a94d2e4eb00b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&h=160&q=80" />
                </div>
                <div class="shrink-0 w-2/5">
                  <img src="https://images.unsplash.com/photo-1575424909138-46b05e5919ec?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&h=160&q=80" />
                </div>
                <div class="shrink-0 w-2/5">
                  <img src="https://images.unsplash.com/photo-1559333086-b0a56225a93c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&h=160&q=80" />
                </div>
              </div>
              <br>
              <br>
              <br>
              <br>
        </div>
    </div>
</body>

</html>
