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

<body>
    <header>
        <nav
            class="fixed top-0 z-50 w-full bg-gradient-to-r from-blue-700 to-indigo-800 dark:bg-gray-800 dark:border-gray-700">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">

                    {{-- logo TLC start --}}
                    <div class="flex items-center justify-start rtl:justify-end">
                        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                            aria-controls="logo-sidebar" type="button"
                            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-kuning focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="#ffffff" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                                </path>
                            </svg>
                        </button>
                        <div class="flex items-center gap-2 ms-2 md:me-24">
                            <img src="{{ asset('images/HRP-icon.jpg') }}" class="h-10 w-10 rounded-md" alt="HRP Icon" />
                            <p class="ml-2 text-white text-lg font-semibold tracking-wide">{{ $navTitle }}</p>
                        </div>
                    </div>
                    {{-- logo TLC end --}}

                    <div class="flex items-center">
                        <div class="flex items-center ms-3">
                            {{-- user foto start --}}
                            <div class="pr-2">
                                <button type="button"
                                    class="flex items-center space-x-2 py-1 px-2 text-sm bg-gray-800 rounded-md hover:bg-gray-700 focus:ring-4 focus:ring-indigo-500 dark:focus:ring-gray-600 transition-all duration-300 ease-in-out"
                                    aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                    <span class="sr-only">Open user menu</span>
                                    <!-- Image Profile -->
                                    {{-- @if (auth()->user()->hasRole('admin') && auth()->user()->adminsProfile && auth()->user()->adminsProfile->profile_image)
                                        <img src="{{ asset('storage/' . auth()->user()->adminsProfile->profile_image) }}"
                                            class="w-[40px] h-[40px] rounded-full object-cover shadow-md border-2 border-indigo-500 transform transition-all duration-300 ease-in-out hover:scale-105">
                                    @else
                                        <img src="{{ asset('assets/img/blank_profile.png') }}"
                                            class="w-[40px] h-[40px] rounded-full object-cover shadow-md border-2 border-gray-500 transform transition-all duration-300 ease-in-out hover:scale-105">
                                    @endif --}}

                                    <!-- User Email -->
                                    <div class="text-left">
                                        <p class="text-sm text-white">
                                            <span>Welcome,</span>
                                            {{ auth()->user()->name }}
                                        </p>
                                    </div>
                                </button>
                            </div>
                            {{-- user foto end --}}

                            {{-- toggle user menu start --}}
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow"
                                id="dropdown-user">
                                <div class="px-4 py-3" role="none">
                                    <p class="text-sm font-medium text-gray-900 truncate" role="none">
                                        {{ auth()->user()->email }}
                                    </p>
                                </div>
                                <ul class="py-1" role="none">
                                    {{-- <li>
                                        <a href="#"
                                            class="flex items-center px-4 py-2 text-sm text-gray-700 font-medium hover:bg-gray-100"
                                            role="menuitem">
                                            <i class="fa-solid fa-gear mr-2 text-gray-500"></i>
                                            Settings
                                        </a> --}}
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="flex items-center w-full text-left px-4 py-2 text-sm text-red-400 font-medium hover:bg-gray-100"
                                                role="menuitem">
                                                <i class="fa-solid fa-right-from-bracket mr-2 text-red-500"></i>
                                                Log Out
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            {{-- toggle user menu end --}}
                        </div>
                    </div>

                </div>
            </div>
        </nav>
    </header>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-gray-700 border-gray-200"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-700">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#FBCB04" viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.users.index') }}"
                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#FBCB04" viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="ms-3">Students</span>
                    </a>
                </li>

                {{-- <li>
                    <button
                        class="flex items-center w-full p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-700 group"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example" type="button">

                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#FBCB04" viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex justify-start ms-3 whitespace-nowrap">Users</span>
                        <div class="ml-auto">
                            <i class="fa-solid fa-angle-down"></i>
                        </div>
                    </button>

                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-red-500 hover:text-kuning dark:text-white dark:hover:bg-gray-700">
                                <i class="mr-2 fa-solid fa-user-graduate"></i>
                                <p>SD</p>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-red-500 hover:text-kuning dark:text-white dark:hover:bg-gray-700">
                                <i class="mr-2 fa-solid fa-chalkboard-teacher"></i>
                                <p>SMP</p>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-red-500 hover:text-kuning dark:text-white dark:hover:bg-gray-700">
                                <i class="mr-2 fa-solid fa-user-shield"></i>
                                <p>SMA</p>
                            </a>
                        </li>
                    </ul>

                </li> --}}

                <li>
                    <button
                        class="flex items-center w-full p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-700 group"
                        aria-controls="dropdown-level" data-collapse-toggle="dropdown-level" type="button">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="#FBCB04" viewBox="0 0 24 24">
                            <path d="M3 3h7v7H3V3zm11 0h7v7h-7V3zM3 14h7v7H3v-7zm11 0h7v7h-7v-7z" />
                        </svg>
                        <span class="flex justify-start ms-3 whitespace-nowrap">Jenjang</span>
                        <div class="ml-auto">
                            <i class="fa-solid fa-angle-down"></i>
                        </div>
                    </button>

                    <ul id="dropdown-level" class="hidden py-2 space-y-2">
                        {{-- Sd --}}
                        <li>
                            <a href="{{ route('admin.dashboard.jenjang.sd.index') }}"
                                class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-red-500 hover:text-kuning dark:text-white dark:hover:bg-gray-700">
                                <i class="mr-2 fa-solid fa-layer-group"></i>
                                <p>SD</p>
                            </a>
                        </li>
                        {{-- SMP --}}
                        <li>
                            <a href="{{ route('admin.dashboard.jenjang.smp.index') }}"
                                class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-red-500 hover:text-kuning dark:text-white dark:hover:bg-gray-700">
                                <i class="mr-2 fa-solid fa-layer-group"></i>
                                <p>SMP</p>
                            </a>
                        </li>

                        {{-- SMA --}}
                        <li>
                            <a href="{{ route('admin.dashboard.jenjang.sma.index') }}"
                                class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-red-500 hover:text-kuning dark:text-white dark:hover:bg-gray-700">
                                <i class="mr-2 fa-solid fa-layer-group"></i>
                                <p>SMA</p>
                            </a>
                        </li>

                        {{-- Settings --}}
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-red-500 hover:text-kuning dark:text-white dark:hover:bg-gray-700">
                                <i class="mr-2 fa-solid fa-solid fa-gear"></i>
                                <p>Settings</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('admin.exam.index') }}"
                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#FBCB04"
                            viewBox="0 0 24 24">
                            <path
                                d="M19 4h-1a1 1 0 1 0 0 2v11a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 1 0 0-2H3a1 1 0 0 0-1 1v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a1 1 0 0 0-1-1z" />
                            <path
                                d="M7 8h10a1 1 0 1 0 0-2H7a1 1 0 1 0 0 2zm0 4h10a1 1 0 1 0 0-2H7a1 1 0 1 0 0 2zm0 4h6a1 1 0 1 0 0-2H7a1 1 0 1 0 0 2z" />
                            <path d="M15 2H9a1 1 0 0 0-1 1v2h8V3a1 1 0 0 0-1-1z" />
                        </svg>
                        <span class="ms-3">Exam History</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

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
