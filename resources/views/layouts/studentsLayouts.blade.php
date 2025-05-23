<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-...your-integrity-hash..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('images/HRP-icon.jpg') }}" type="image/png">
    @stack('ckeditor')
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-800">
    <header>
        <nav
            class="fixed top-0 z-50 w-full bg-gradient-to-r from-blue-700 to-indigo-800 dark:bg-gray-800 dark:border-gray-700">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">

                    {{-- logo TLC start --}}
                    <div class="flex items-center justify-start rtl:justify-end">
                        {{-- <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                            aria-controls="logo-sidebar" type="button"
                            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-kuning focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="#ffffff" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                                </path>
                            </svg>
                        </button> --}}
                        <div class="flex items-center gap-2 ms-2 md:me-24">
                            <img src="{{ asset('images/HRP-icon.jpg') }}" class="h-10 w-10 rounded-md" alt="HRP Icon" />
                            <p class="ml-2 text-white text-lg font-semibold tracking-wide hidden md:block ">
                                Simulasi Jenjang {{ Auth::user()->getRoleNames()->first() }}
                            </p>

                        </div>
                    </div>
                    {{-- logo TLC end --}}

                    <div class="flex items-center">
                        <div class="flex items-center ms-3">
                            {{-- user foto start --}}
                            <div class="flex items-center space-x-4 pr-4">
                                <!-- Tombol Profile -->
                                <button id="showModal"
                                    class="flex items-center space-x-2 py-1 px-2 text-sm bg-gray-800 rounded-md hover:bg-gray-700 focus:ring-4 focus:ring-indigo-500 dark:focus:ring-gray-600 transition-all duration-300 ease-in-out"
                                    aria-expanded="false">
                                    <span class="sr-only">Open user menu</span>
                                    <div class="text-left">
                                        <p class="text-sm text-white">
                                            {{-- <span>Welcome,</span> --}}
                                            {{ Auth::user()->token }}
                                        </p>
                                    </div>
                                </button>

                                <!-- Tombol Logout -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="flex items-center px-3 py-2 text-sm bg-red-600 text-white font-medium rounded-md hover:bg-red-700 transition-all">
                                        <i class="fa-solid fa-right-from-bracket md:mr-2"></i> 
                                        <p class="hidden md:block ">Logout</p>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </nav>
    </header>

    <main>
        <!-- main content here -->
        <div class="p-4 mt-8">
            @yield('content')
        </div>
    </main>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    @stack('scripts')
    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>
