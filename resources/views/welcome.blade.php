@extends('layouts.LandingPageLayouts')

@section('content')
    {{-- Navbar --}}
    <header class="mb-20">
        <nav class="fixed w-full z-20 top-0 start-0 bg-gradient-to-r from-blue-700 to-blue-500 shadow-lg">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-3 px-6">
                <!-- Logo dengan efek hover -->
                <a href="#" class="flex items-center space-x-3 group">
                    <div
                        class="relative overflow-hidden rounded-md transition-all duration-300 transform group-hover:scale-105">
                        <img src="images/HRP.jpg" class="h-12 transition-all duration-300" alt="HRP HAFECS Logo">
                        <div class="absolute inset-0 bg-blue-400 opacity-0 group-hover:opacity-20 transition-opacity"></div>
                    </div>
                    <div class="flex flex-col">
                        <span
                            class="text-2xl font-bold text-white transition-all duration-300 group-hover:text-yellow-300">HAFECS</span>
                        <span class="text-sm text-blue-100 transition-all duration-300 group-hover:text-white">Research &
                            Publication</span>
                    </div>
                </a>

                <!-- Hamburger Menu Button dengan animasi -->
                <button id="menu-toggle"
                    class="lg:hidden text-white focus:outline-none hover:bg-blue-600 p-2 rounded-lg transition-all duration-300 transform hover:scale-110">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                        </path>
                    </svg>
                </button>

                <!-- Desktop Menu dengan efek hover  -->
                <div class="hidden lg:flex lg:items-center lg:space-x-6 text-sm font-medium" id="menu">
                    <a href="#beranda"
                        class="text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-all duration-300 transform hover:scale-105 hover:shadow-md relative overflow-hidden group">
                        <span class="relative z-10">Beranda</span>
                        <div
                            class="absolute bottom-0 left-0 w-0 h-1 bg-yellow-300 group-hover:w-full transition-all duration-300">
                        </div>
                    </a>
                    <a href="#pengertian"
                        class="text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-all duration-300 transform hover:scale-105 hover:shadow-md relative overflow-hidden group">
                        <span class="relative z-10">Pengertian</span>
                        <div
                            class="absolute bottom-0 left-0 w-0 h-1 bg-yellow-300 group-hover:w-full transition-all duration-300">
                        </div>
                    </a>
                    <a href="#pendaftaran"
                        class="text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-all duration-300 transform hover:scale-105 hover:shadow-md relative overflow-hidden group">
                        <span class="relative z-10">Pendaftaran</span>
                        <div
                            class="absolute bottom-0 left-0 w-0 h-1 bg-yellow-300 group-hover:w-full transition-all duration-300">
                        </div>
                    </a>
                    <a href="#video"
                        class="text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-all duration-300 transform hover:scale-105 hover:shadow-md relative overflow-hidden group">
                        <span class="relative z-10">Video</span>
                        <div
                            class="absolute bottom-0 left-0 w-0 h-1 bg-yellow-300 group-hover:w-full transition-all duration-300">
                        </div>
                    </a>
                    <a href="#galeri"
                        class="text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-all duration-300 transform hover:scale-105 hover:shadow-md relative overflow-hidden group">
                        <span class="relative z-10">Galeri</span>
                        <div
                            class="absolute bottom-0 left-0 w-0 h-1 bg-yellow-300 group-hover:w-full transition-all duration-300">
                        </div>
                    </a>
                    <a href="#faq"
                        class="text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-all duration-300 transform hover:scale-105 hover:shadow-md relative overflow-hidden group">
                        <span class="relative z-10">FAQ</span>
                        <div
                            class="absolute bottom-0 left-0 w-0 h-1 bg-yellow-300 group-hover:w-full transition-all duration-300">
                        </div>
                    </a>
                    <a href="login"
                        class="text-white py-2 px-4 rounded-lg bg-yellow-400 hover:bg-yellow-300 text-blue-900 font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-md">
                        Login
                    </a>

                </div>
            </div>

            <!-- Mobile Menu dengan animasi -->
            <div id="mobile-menu"
                class="hidden lg:hidden flex flex-col items-center space-y-3 py-4 bg-blue-800 border-t border-blue-400 text-sm font-medium">
                <a href="#beranda"
                    class="text-white py-2 px-6 w-4/5 rounded-lg hover:bg-blue-600 hover:text-yellow-300 transition-all duration-300 transform hover:scale-105 hover:shadow-lg text-center">Beranda</a>
                <a href="#pengertian"
                    class="text-white py-2 px-6 w-4/5 rounded-lg hover:bg-blue-600 hover:text-yellow-300 transition-all duration-300 transform hover:scale-105 hover:shadow-lg text-center">Pengertian</a>
                <a href="#pendaftaran"
                    class="text-white py-2 px-6 w-4/5 rounded-lg hover:bg-blue-600 hover:text-yellow-300 transition-all duration-300 transform hover:scale-105 hover:shadow-lg text-center">Pendaftaran</a>
                <a href="#video"
                    class="text-white py-2 px-6 w-4/5 rounded-lg hover:bg-blue-600 hover:text-yellow-300 transition-all duration-300 transform hover:scale-105 hover:shadow-lg text-center">Video</a>
                <a href="#galeri"
                    class="text-white py-2 px-6 w-4/5 rounded-lg hover:bg-blue-600 hover:text-yellow-300 transition-all duration-300 transform hover:scale-105 hover:shadow-lg text-center">Galeri</a>
                <a href="#faq"
                    class="text-white py-2 px-6 w-4/5 rounded-lg hover:bg-blue-600 hover:text-yellow-300 transition-all duration-300 transform hover:scale-105 hover:shadow-lg text-center">FAQ</a>
                <a href="login"
                    class="text-white py-2 px-4 rounded-lg bg-yellow-400 hover:bg-yellow-300 text-blue-900 font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-md">
                    Login
                </a>

            </div> 

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const menuToggle = document.getElementById('menu-toggle');
                    const mobileMenu = document.getElementById('mobile-menu');

                    menuToggle.addEventListener('click', function() {
                        mobileMenu.classList.toggle('hidden');
                        // Tambahkan efek animasi ketika toggle menu
                        if (!mobileMenu.classList.contains('hidden')) {
                            mobileMenu.style.animation = 'fadeIn 0.3s ease-in-out';
                        } else {
                            mobileMenu.style.animation = 'fadeOut 0.3s ease-in-out';
                        }
                    });
                });

                // Tambahkan CSS animasi untuk toggle menu
                const style = document.createElement('style');
                style.textContent = `
                    @keyframes fadeIn {
                        from { opacity: 0; transform: translateY(-20px); }
                        to { opacity: 1; transform: translateY(0); }
                    }
                    @keyframes fadeOut {
                        from { opacity: 1; transform: translateY(0); }
                        to { opacity: 0; transform: translateY(-20px); }
                    }
                `;
                document.head.appendChild(style);
            </script>
        </nav>
    </header>
    {{-- End Navbar --}}

    {{-- Home --}}
    <main id="beranda" class="w-full px-5 py-16 bg-gray-50">
        <div class="container mx-auto max-w-7xl view grid grid-cols-12 transition-all duration-500 ease-in-out mb-14 gap-6">
            <div class="col-span-12 lg:col-span-7 p-5 transform transition-all duration-500 hover:translate-y-2">
                <div class="animate-fadeIn">
                    <h1 class="text-6xl font-extrabold leading-tight mt-2 transition-all duration-300">
                        <span
                            class="text-blue-600 hover:text-blue-700 inline-block transform hover:scale-110 transition-all duration-300">Program
                            Literasi</span>
                        <span
                            class="text-amber-500 hover:text-amber-600 inline-block transform hover:scale-110 transition-all duration-300">dan</span><br>
                        <span
                            class="text-blue-600 hover:text-blue-700 inline-block transform hover:scale-110 transition-all duration-300">Numerasi</span>
                        <span
                            class="text-amber-500 hover:text-amber-600 inline-block transform hover:scale-110 transition-all duration-300">untuk
                            Anak-Anak</span>
                    </h1>
                    <p
                        class="text-xl text-gray-700 mt-6 leading-relaxed transform transition-all duration-500 hover:translate-x-2">
                        Membantu anak-anak mengembangkan kemampuan membaca, menulis, dan berhitung dengan cara yang
                        menyenangkan dan interaktif.
                    </p>
                </div>
                <div class="flex flex-wrap my-8 gap-6">
                    <a href="#coba"
                        class="bg-gradient-to-r from-blue-600 to-blue-800 text-white px-8 py-4 rounded-full shadow-lg text-xl font-bold hover:shadow-xl transition-all duration-300 hover:scale-110 active:scale-95 transform hover:-rotate-2 flex items-center">
                        <span>Coba Sekarang</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                    <a href="#pelajari"
                        class="bg-amber-500 text-white px-8 py-4 rounded-full shadow-lg text-xl font-bold hover:shadow-xl transition-all duration-300 hover:scale-110 active:scale-95 transform hover:rotate-2">
                        Pelajari Lebih Lanjut
                    </a>
                </div>

                <div class="flex flex-wrap items-center gap-6 mt-12">
                    <div class="w-48 h-auto transform transition-all duration-500 hover:scale-110">
                        <img src="images/logo.png" alt="HAFECS Logo" class="w-full h-auto" />
                    </div>
                    <div class="w-48 h-auto transform transition-all duration-500 hover:scale-110">
                        <img src="images/HRP.jpg" alt="HRP Logo" class="w-full h-auto" />
                    </div>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-5 relative flex items-center justify-center">

                <div
                    class="absolute top-0 right-0 w-full h-full border-4 border-dashed border-amber-400 rounded-full animate-spin-slow">
                </div>


                <div
                    class="absolute top-4 right-4 transform transition-all duration-500 hover:scale-125 hover:-translate-y-2 z-10">
                    <div
                        class="bg-blue-600 text-white px-8 py-4 rounded-full shadow-lg text-xl font-bold cursor-pointer hover:bg-blue-700 active:bg-blue-800 active:scale-95 transition-all duration-300">
                        Belajar
                    </div>
                </div>
                <div
                    class="absolute bottom-4 left-1/2 transform -translate-x-1/2 transition-all duration-500 hover:scale-125 hover:translate-y-2 z-10">
                    <div
                        class="bg-amber-500 text-white px-8 py-4 rounded-full shadow-lg text-xl font-bold cursor-pointer hover:bg-amber-600 active:bg-amber-700 active:scale-95 transition-all duration-300">
                        Bermain
                    </div>
                </div>


                <div
                    class="w-64 h-64 bg-white rounded-full flex items-center justify-center shadow-xl transform hover:rotate-12 transition-all duration-500 z-0 overflow-hidden">
                    <img src="images/5.jpg" alt="Literasi dan Numerasi"
                        class="w-full h-full object-cover transition-all duration-500 hover:scale-110" />
                </div>
            </div>
        </div>

        <style>
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes float {
                0% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-20px);
                }

                100% {
                    transform: translateY(0px);
                }
            }

            .animate-fadeIn {
                animation: fadeIn 1s ease-out;
            }

            .animate-float {
                animation: float 6s ease-in-out infinite;
            }

            .animate-spin-slow {
                animation: spin 15s linear infinite;
            }

            @keyframes spin {
                from {
                    transform: rotate(0deg);
                }

                to {
                    transform: rotate(360deg);
                }
            }
        </style>
    </main>
    {{-- <main id="home" class="w-full px-4 sm:px-5 py-8 sm:py-16 bg-gray-50">
        <div
            class="container mx-auto max-w-7xl view grid grid-cols-1 md:grid-cols-12 transition-all duration-500 ease-in-out mb-8 sm:mb-14 gap-4 sm:gap-6">
            <!-- Text Content - Full width on mobile, 7/12 on large screens -->
            <div class="col-span-1 md:col-span-12 lg:col-span-7 p-3 sm:p-5 transform transition-all duration-500 hover:translate-y-2">
                <div class="animate-fadeIn">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight mt-2 transition-all duration-300">
                        <span
                            class="text-blue-600 hover:text-blue-700 inline-block transform hover:scale-110 transition-all duration-300">Program
                            Literasi</span>
                        <span
                            class="text-amber-500 hover:text-amber-600 inline-block transform hover:scale-110 transition-all duration-300">dan</span><br>
                        <span
                            class="text-blue-600 hover:text-blue-700 inline-block transform hover:scale-110 transition-all duration-300">Numerasi</span>
                        <span
                            class="text-amber-500 hover:text-amber-600 inline-block transform hover:scale-110 transition-all duration-300">untuk
                            Anak-Anak</span>
                    </h1>
                    <p
                        class="text-base sm:text-lg md:text-xl text-gray-700 mt-4 sm:mt-6 leading-relaxed transform transition-all duration-500 hover:translate-x-2">
                        Membantu anak-anak mengembangkan kemampuan membaca, menulis, dan berhitung dengan cara yang
                        menyenangkan dan interaktif.
                    </p>
                </div>
                <div class="flex flex-wrap my-6 sm:my-8 gap-3 sm:gap-6">
                    <a href="#daftar"
                        class="bg-gradient-to-r from-blue-600 to-blue-800 text-white px-5 sm:px-8 py-3 sm:py-4 rounded-full shadow-lg text-base sm:text-xl font-bold hover:shadow-xl transition-all duration-300 hover:scale-110 active:scale-95 transform hover:-rotate-2 flex items-center">
                        <span>Daftar Sekarang</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 ml-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                    <a href="#pelajari"
                        class="bg-amber-500 text-white px-5 sm:px-8 py-3 sm:py-4 rounded-full shadow-lg text-base sm:text-xl font-bold hover:shadow-xl transition-all duration-300 hover:scale-110 active:scale-95 transform hover:rotate-2">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
                
                <div class="flex flex-wrap items-center gap-4 sm:gap-6 mt-8 sm:mt-12">
                    <div class="w-32 sm:w-40 md:w-48 h-auto transform transition-all duration-500 hover:scale-110">
                        <img src="images/logo.png" alt="HAFECS Logo" class="w-full h-auto" />
                    </div>
                    <div class="w-32 sm:w-40 md:w-48 h-auto transform transition-all duration-500 hover:scale-110">
                        <img src="images/HRP.jpg" alt="HRP Logo" class="w-full h-auto" />
                    </div>
                </div>
            </div>
    
            <!-- Image Content - Full width on mobile, 5/12 on large screens -->
            <div class="col-span-1 md:col-span-12 lg:col-span-5 relative flex items-center justify-center min-h-[250px] sm:min-h-[300px] md:min-h-[400px] mt-6 lg:mt-0">
                
                <!-- Animated border circle -->
                <div
                    class="absolute top-0 right-0 w-full h-full border-4 border-dashed border-amber-400 rounded-full animate-spin-slow">
                </div>
    
                <!-- Action buttons -->
                <div
                    class="absolute top-2 sm:top-4 right-2 sm:right-4 transform transition-all duration-500 hover:scale-125 hover:-translate-y-2 z-10">
                    <div
                        class="bg-blue-600 text-white px-4 sm:px-6 md:px-8 py-2 sm:py-3 md:py-4 rounded-full shadow-lg text-sm sm:text-base md:text-xl font-bold cursor-pointer hover:bg-blue-700 active:bg-blue-800 active:scale-95 transition-all duration-300">
                        Belajar
                    </div>
                </div>
                <div
                    class="absolute bottom-2 sm:bottom-4 left-1/2 transform -translate-x-1/2 transition-all duration-500 hover:scale-125 hover:translate-y-2 z-10">
                    <div
                        class="bg-amber-500 text-white px-4 sm:px-6 md:px-8 py-2 sm:py-3 md:py-4 rounded-full shadow-lg text-sm sm:text-base md:text-xl font-bold cursor-pointer hover:bg-amber-600 active:bg-amber-700 active:scale-95 transition-all duration-300">
                        Bermain
                    </div>
                </div>
    
                <!-- Central image circle -->
                <div
                    class="w-48 h-48 sm:w-56 sm:h-56 md:w-64 md:h-64 bg-white rounded-full flex items-center justify-center shadow-xl transform hover:rotate-12 transition-all duration-500 z-0 overflow-hidden">
                    <img src="images/5.jpg" alt="Literasi dan Numerasi"
                        class="w-full h-full object-cover transition-all duration-500 hover:scale-110" />
                </div>
            </div>
        </div>
    
        <style>
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
    
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
    
            @keyframes float {
                0% {
                    transform: translateY(0px);
                }
    
                50% {
                    transform: translateY(-20px);
                }
    
                100% {
                    transform: translateY(0px);
                }
            }
    
            .animate-fadeIn {
                animation: fadeIn 1s ease-out;
            }
    
            .animate-float {
                animation: float 6s ease-in-out infinite;
            }
    
            .animate-spin-slow {
                animation: spin 15s linear infinite;
            }
    
            @keyframes spin {
                from {
                    transform: rotate(0deg);
                }
    
                to {
                    transform: rotate(360deg);
                }
            }
        </style>
    </main> --}}
    {{-- Home --}}

    {{-- Pengertian Literasi Dan Numenisasi --}}
    <section id="pengertian" class="w-full px-5 py-16 bg-gray-50 relative overflow-hidden">

        <div class="absolute top-8 left-5 w-6 h-6 bg-blue-300 rounded-full opacity-70 animate-pulse"></div>
        <div class="absolute top-0 right-1/4 w-24 h-24 bg-blue-200 rounded-full opacity-50 animate-bounce"
            style="animation-duration: 6s;"></div>
        <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-yellow-100 rounded-full opacity-40 animate-pulse"
            style="animation-duration: 7s;"></div>
        <div class="absolute bottom-1/3 left-1/4 w-16 h-16 bg-blue-100 rounded-full opacity-30 animate-pulse"
            style="animation-duration: 8s;"></div>


        <div class="max-w-5xl mx-auto text-center relative z-10">
            <div
                class="inline-block px-4 py-1 rounded-full bg-blue-200 text-blue-800 mb-4 text-sm font-medium transform transition-transform hover:scale-105 hover:shadow-md cursor-pointer">
                Konsep Dasar
            </div>
            <h2 class="text-4xl sm:text-5xl font-bold mb-2 tracking-tight">
                Pengertian <span class="text-blue-600 relative">
                    Literasi
                    <span
                        class="absolute bottom-0 left-0 w-full h-1 bg-blue-400 transform origin-left scale-x-0 transition-transform group-hover:scale-x-100"></span>
                </span> dan <span class="text-yellow-500 relative">
                    Numerasi
                    <span
                        class="absolute bottom-0 left-0 w-full h-1 bg-yellow-400 transform origin-left scale-x-0 transition-transform group-hover:scale-x-100"></span>
                </span>
            </h2>

            <div
                class="w-16 h-1 bg-gradient-to-r from-blue-500 to-yellow-500 mt-3 mb-6 mx-auto transform transition-all duration-300 hover:w-32 hover:h-2">
            </div>

            <p class="text-gray-700 max-w-3xl mx-auto text-lg mb-16">
                Memahami konsep dasar yang menjadi fondasi pendidikan anak-anak kita untuk
                masa depan yang lebih cerah
            </p>
        </div>


        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-8">

            <div
                class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 transform hover:-translate-y-2 group relative overflow-hidden">

                <div
                    class="absolute inset-0 bg-gradient-to-br from-blue-50 to-blue-100 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                </div>


                <div
                    class="absolute -inset-1 bg-gradient-to-r from-blue-400 to-blue-500 rounded-lg blur opacity-0 group-hover:opacity-10 transition duration-700">
                </div>

                <div class="relative">
                    <div class="flex items-center mb-6">
                        <div
                            class="bg-blue-100 p-3 rounded-xl shadow-md transform transition-transform group-hover:rotate-6 group-hover:scale-110 group-hover:bg-blue-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold ml-4 transition-all duration-300 group-hover:text-blue-600">Literasi
                        </h3>
                    </div>

                    <p class="text-gray-700 mb-6 transition-all duration-300 group-hover:text-gray-800">
                        Literasi adalah kemampuan untuk membaca, menulis, berbicara, dan
                        memahami bahasa. Ini mencakup kemampuan untuk mengidentifikasi,
                        memahami, menafsirkan, menciptakan, berkomunikasi, dan menghitung
                        menggunakan bahan cetak dan tertulis.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div
                            class="flex items-center p-3 bg-gray-50 rounded-xl hover:bg-blue-50 hover:shadow-md transition-all duration-300 transform hover:scale-105 cursor-pointer">
                            <div
                                class="bg-blue-100 p-2 rounded-full group-hover:bg-blue-200 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                            <span
                                class="ml-3 text-sm font-medium group-hover:text-blue-700 transition-colors duration-300">Pemahaman
                                Bacaan</span>
                        </div>
                        <div
                            class="flex items-center p-3 bg-gray-50 rounded-xl hover:bg-blue-50 hover:shadow-md transition-all duration-300 transform hover:scale-105 cursor-pointer">
                            <div
                                class="bg-blue-100 p-2 rounded-full group-hover:bg-blue-200 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </div>
                            <span
                                class="ml-3 text-sm font-medium group-hover:text-blue-700 transition-colors duration-300">Ekspresi
                                Tertulis</span>
                        </div>
                        <div
                            class="flex items-center p-3 bg-gray-50 rounded-xl hover:bg-blue-50 hover:shadow-md transition-all duration-300 transform hover:scale-105 cursor-pointer">
                            <div
                                class="bg-blue-100 p-2 rounded-full group-hover:bg-blue-200 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                            </div>
                            <span
                                class="ml-3 text-sm font-medium group-hover:text-blue-700 transition-colors duration-300">Komunikasi
                                Lisan</span>
                        </div>
                        <div
                            class="flex items-center p-3 bg-gray-50 rounded-xl hover:bg-blue-50 hover:shadow-md transition-all duration-300 transform hover:scale-105 cursor-pointer">
                            <div
                                class="bg-blue-100 p-2 rounded-full group-hover:bg-blue-200 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                            </div>
                            <span
                                class="ml-3 text-sm font-medium group-hover:text-blue-700 transition-colors duration-300">Berpikir
                                Kritis</span>
                        </div>
                    </div>
                </div>
            </div>


            <div
                class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 transform hover:-translate-y-2 group relative overflow-hidden">

                <div
                    class="absolute inset-0 bg-gradient-to-br from-yellow-50 to-yellow-100 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                </div>


                <div
                    class="absolute -inset-1 bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-lg blur opacity-0 group-hover:opacity-10 transition duration-700">
                </div>

                <div class="relative">
                    <div class="flex items-center mb-6">
                        <div
                            class="bg-yellow-100 p-3 rounded-xl shadow-md transform transition-transform group-hover:rotate-6 group-hover:scale-110 group-hover:bg-yellow-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold ml-4 transition-all duration-300 group-hover:text-yellow-600">
                            Numerasi</h3>
                    </div>

                    <p class="text-gray-700 mb-6 transition-all duration-300 group-hover:text-gray-800">
                        Numerasi adalah kemampuan untuk memahami dan menggunakan
                        angka dan konsep matematika dalam kehidupan sehari-hari. Ini
                        mencakup kemampuan untuk memecahkan masalah, berpikir secara
                        logis, dan mengaplikasikan konsep matematika.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div
                            class="flex items-center p-3 bg-gray-50 rounded-xl hover:bg-yellow-50 hover:shadow-md transition-all duration-300 transform hover:scale-105 cursor-pointer">
                            <div
                                class="bg-yellow-100 p-2 rounded-full group-hover:bg-yellow-200 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <span
                                class="ml-3 text-sm font-medium group-hover:text-yellow-700 transition-colors duration-300">Berhitung
                                Dasar</span>
                        </div>
                        <div
                            class="flex items-center p-3 bg-gray-50 rounded-xl hover:bg-yellow-50 hover:shadow-md transition-all duration-300 transform hover:scale-105 cursor-pointer">
                            <div
                                class="bg-yellow-100 p-2 rounded-full group-hover:bg-yellow-200 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span
                                class="ml-3 text-sm font-medium group-hover:text-yellow-700 transition-colors duration-300">Pemecahan
                                Masalah</span>
                        </div>
                        <div
                            class="flex items-center p-3 bg-gray-50 rounded-xl hover:bg-yellow-50 hover:shadow-md transition-all duration-300 transform hover:scale-105 cursor-pointer">
                            <div
                                class="bg-yellow-100 p-2 rounded-full group-hover:bg-yellow-200 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <span
                                class="ml-3 text-sm font-medium group-hover:text-yellow-700 transition-colors duration-300">Penalaran
                                Logis</span>
                        </div>
                        <div
                            class="flex items-center p-3 bg-gray-50 rounded-xl hover:bg-yellow-50 hover:shadow-md transition-all duration-300 transform hover:scale-105 cursor-pointer">
                            <div
                                class="bg-yellow-100 p-2 rounded-full group-hover:bg-yellow-200 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <span
                                class="ml-3 text-sm font-medium group-hover:text-yellow-700 transition-colors duration-300">Aplikasi
                                Matematika</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tambahkan script untuk animasi tambahan saat sentuh di perangkat mobile -->
        <script>
            // Deteksi sentuhan untuk perangkat mobile
            document.querySelectorAll('.group').forEach(card => {
                card.addEventListener('touchstart', function() {
                    this.classList.add('active');
                    // Tambahkan kelas active untuk efek sentuh
                    this.style.transform = 'scale(0.98) translateY(-5px)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 300);
                });
            });

            // Animasi untuk ikon-ikon saat disentuh
            document.querySelectorAll('.rounded-xl').forEach(item => {
                item.addEventListener('touchstart', function() {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = 'scale(1.05)';
                        setTimeout(() => {
                            this.style.transform = '';
                        }, 150);
                    }, 150);
                });
            });
        </script>
    </section>
    {{-- <section class="w-full px-4 sm:px-5 py-12 sm:py-16 bg-gray-50 relative overflow-hidden">
        <!-- Background elements -->
        <div class="absolute top-8 left-5 w-6 h-6 bg-blue-300 rounded-full opacity-70 animate-pulse"></div>
        <div class="absolute top-0 right-1/4 w-12 sm:w-24 h-12 sm:h-24 bg-blue-200 rounded-full opacity-50 float-animation"></div>
        <div class="absolute -bottom-10 -right-10 w-20 sm:w-40 h-20 sm:h-40 bg-yellow-100 rounded-full opacity-40 animate-pulse" style="animation-duration: 7s;"></div>
        <div class="absolute bottom-1/3 left-1/4 w-8 sm:w-16 h-8 sm:h-16 bg-blue-100 rounded-full opacity-30 animate-pulse" style="animation-duration: 8s;"></div>
        
        <!-- Header section -->
        <div class="max-w-5xl mx-auto text-center relative z-10">
            <div class="inline-block px-4 py-1 rounded-full bg-blue-200 text-blue-800 mb-4 text-xs sm:text-sm font-medium transform transition-transform hover:scale-105 hover:shadow-md cursor-pointer">
                Konsep Dasar
            </div>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-2 tracking-tight px-2">
                Pengertian <span class="text-blue-600 relative group">
                    Literasi
                    <span class="absolute bottom-0 left-0 w-full h-1 bg-blue-400 transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                </span> dan <span class="text-yellow-500 relative group">
                    Numerasi
                    <span class="absolute bottom-0 left-0 w-full h-1 bg-yellow-400 transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                </span>
            </h2>
            
            <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-yellow-500 mt-3 mb-6 mx-auto transform transition-all duration-300 hover:w-32 hover:h-2"></div>
            
            <p class="text-gray-700 max-w-3xl mx-auto text-base sm:text-lg mb-8 sm:mb-16 px-4">
                Memahami konsep dasar yang menjadi fondasi pendidikan anak-anak kita untuk 
                masa depan yang lebih cerah
            </p>
        </div>
    
        <!-- Cards container -->
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 px-4">
            
            <!-- Literasi card -->
            <div class="bg-white p-6 sm:p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 transform hover:-translate-y-2 group relative overflow-hidden">
                
                <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-blue-100 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <!-- Glow effect -->
                <div class="absolute -inset-1 bg-gradient-to-r from-blue-400 to-blue-500 rounded-lg blur opacity-0 group-hover:opacity-10 transition duration-700"></div>
                
                <div class="relative">  
                    <div class="flex items-center mb-6">
                        <div class="bg-blue-100 p-2 sm:p-3 rounded-xl shadow-md transform transition-transform group-hover:rotate-6 group-hover:scale-110 group-hover:bg-blue-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold ml-4 transition-all duration-300 group-hover:text-blue-600">Literasi</h3>
                    </div>
                    
                    <p class="text-gray-700 mb-6 transition-all duration-300 group-hover:text-gray-800 text-sm sm:text-base">
                        Literasi adalah kemampuan untuk membaca, menulis, berbicara, dan 
                        memahami bahasa. Ini mencakup kemampuan untuk mengidentifikasi, 
                        memahami, menafsirkan, menciptakan, berkomunikasi, dan menghitung 
                        menggunakan bahan cetak dan tertulis.
                    </p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                        <div class="flex items-center p-2 sm:p-3 bg-gray-50 rounded-xl hover:bg-blue-50 hover:shadow-md transition-all duration-300 transform hover:scale-105 cursor-pointer">
                            <div class="bg-blue-100 p-1 sm:p-2 rounded-full group-hover:bg-blue-200 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                            <span class="ml-2 sm:ml-3 text-xs sm:text-sm font-medium group-hover:text-blue-700 transition-colors duration-300">Pemahaman Bacaan</span>
                        </div>
                        <div class="flex items-center p-2 sm:p-3 bg-gray-50 rounded-xl hover:bg-blue-50 hover:shadow-md transition-all duration-300 transform hover:scale-105 cursor-pointer">
                            <div class="bg-blue-100 p-1 sm:p-2 rounded-full group-hover:bg-blue-200 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </div>
                            <span class="ml-2 sm:ml-3 text-xs sm:text-sm font-medium group-hover:text-blue-700 transition-colors duration-300">Ekspresi Tertulis</span>
                        </div>
                        <div class="flex items-center p-2 sm:p-3 bg-gray-50 rounded-xl hover:bg-blue-50 hover:shadow-md transition-all duration-300 transform hover:scale-105 cursor-pointer">
                            <div class="bg-blue-100 p-1 sm:p-2 rounded-full group-hover:bg-blue-200 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                            </div>
                            <span class="ml-2 sm:ml-3 text-xs sm:text-sm font-medium group-hover:text-blue-700 transition-colors duration-300">Komunikasi Lisan</span>
                        </div>
                        <div class="flex items-center p-2 sm:p-3 bg-gray-50 rounded-xl hover:bg-blue-50 hover:shadow-md transition-all duration-300 transform hover:scale-105 cursor-pointer">
                            <div class="bg-blue-100 p-1 sm:p-2 rounded-full group-hover:bg-blue-200 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                            </div>
                            <span class="ml-2 sm:ml-3 text-xs sm:text-sm font-medium group-hover:text-blue-700 transition-colors duration-300">Berpikir Kritis</span>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Numerasi card -->
            <div class="bg-white p-6 sm:p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 transform hover:-translate-y-2 group relative overflow-hidden">
                
                <div class="absolute inset-0 bg-gradient-to-br from-yellow-50 to-yellow-100 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <!-- Glow effect -->
                <div class="absolute -inset-1 bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-lg blur opacity-0 group-hover:opacity-10 transition duration-700"></div>
                
                <div class="relative">  
                    <div class="flex items-center mb-6">
                        <div class="bg-yellow-100 p-2 sm:p-3 rounded-xl shadow-md transform transition-transform group-hover:rotate-6 group-hover:scale-110 group-hover:bg-yellow-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold ml-4 transition-all duration-300 group-hover:text-yellow-600">Numerasi</h3>
                    </div>
                    
                    <p class="text-gray-700 mb-6 transition-all duration-300 group-hover:text-gray-800 text-sm sm:text-base">
                        Numerasi adalah kemampuan untuk memahami dan menggunakan 
                        angka dan konsep matematika dalam kehidupan sehari-hari. Ini 
                        mencakup kemampuan untuk memecahkan masalah, berpikir secara 
                        logis, dan mengaplikasikan konsep matematika.
                    </p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                        <div class="flex items-center p-2 sm:p-3 bg-gray-50 rounded-xl hover:bg-yellow-50 hover:shadow-md transition-all duration-300 transform hover:scale-105 cursor-pointer">
                            <div class="bg-yellow-100 p-1 sm:p-2 rounded-full group-hover:bg-yellow-200 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <span class="ml-2 sm:ml-3 text-xs sm:text-sm font-medium group-hover:text-yellow-700 transition-colors duration-300">Berhitung Dasar</span>
                        </div>
                        <div class="flex items-center p-2 sm:p-3 bg-gray-50 rounded-xl hover:bg-yellow-50 hover:shadow-md transition-all duration-300 transform hover:scale-105 cursor-pointer">
                            <div class="bg-yellow-100 p-1 sm:p-2 rounded-full group-hover:bg-yellow-200 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="ml-2 sm:ml-3 text-xs sm:text-sm font-medium group-hover:text-yellow-700 transition-colors duration-300">Pemecahan Masalah</span>
                        </div>
                        <div class="flex items-center p-2 sm:p-3 bg-gray-50 rounded-xl hover:bg-yellow-50 hover:shadow-md transition-all duration-300 transform hover:scale-105 cursor-pointer">
                            <div class="bg-yellow-100 p-1 sm:p-2 rounded-full group-hover:bg-yellow-200 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <span class="ml-2 sm:ml-3 text-xs sm:text-sm font-medium group-hover:text-yellow-700 transition-colors duration-300">Penalaran Logis</span>
                        </div>
                        <div class="flex items-center p-2 sm:p-3 bg-gray-50 rounded-xl hover:bg-yellow-50 hover:shadow-md transition-all duration-300 transform hover:scale-105 cursor-pointer">
                            <div class="bg-yellow-100 p-1 sm:p-2 rounded-full group-hover:bg-yellow-200 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <span class="ml-2 sm:ml-3 text-xs sm:text-sm font-medium group-hover:text-yellow-700 transition-colors duration-300">Aplikasi Matematika</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            @media (max-width: 640px) {
                .card-container {
                    grid-template-columns: 1fr;
                }
            }
            
            /* Add smooth scrolling */
            html {
                scroll-behavior: smooth;
            }
            
            /* Animation keyframes for floating animation */
            @keyframes float {
                0% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
                100% { transform: translateY(0px); }
            }
            
            .float-animation {
                animation: float 6s ease-in-out infinite;
            }
        </style>
        <script>
            // Enhanced mobile touch interactions
            document.addEventListener('DOMContentLoaded', function() {
                // Touch interactions for cards
                document.querySelectorAll('.group').forEach(card => {
                    card.addEventListener('touchstart', function() {
                        this.classList.add('active');
                        this.style.transform = 'scale(0.98) translateY(-5px)';
                        setTimeout(() => {
                            this.style.transform = '';
                        }, 300);
                    });
                });
        
                // Touch interactions for feature items
                document.querySelectorAll('.rounded-xl').forEach(item => {
                    item.addEventListener('touchstart', function() {
                        this.style.transform = 'scale(0.95)';
                        setTimeout(() => {
                            this.style.transform = 'scale(1.05)';
                            setTimeout(() => {
                                this.style.transform = '';
                            }, 150);
                        }, 150);
                    });
                });
            });
        </script>
    </section> --}}
    {{-- End Pengertian Literasi Dan Numenisasi --}}

    {{-- Mengapa Literasi dan Numerasi Penting? --}}
    <section class="w-full px-5 py-16 bg-gray-50">
        <div class="max-w-5xl mx-auto text-center">
            <h2
                class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-amber-500 mb-2 animate-pulse">
                Mengapa Literasi dan Numerasi Penting?</h2>
            <div class="w-40 h-1 bg-gradient-to-r from-blue-600 to-amber-500 mx-auto rounded-full"></div>
        </div>

        <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8 mt-10">
            <!-- Fondasi Pendidikan -->
            <div
                class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-3xl shadow-md transition-all duration-500 ease-in-out hover:scale-105 hover:shadow-2xl hover:rotate-1 hover:-translate-y-2 cursor-pointer group relative overflow-hidden">
                <div class="absolute inset-0 bg-blue-600 opacity-0 group-hover:opacity-10 transition-opacity duration-500">
                </div>
                <div class="mb-5 relative z-10">
                    <div
                        class="bg-gradient-to-r from-blue-600 to-blue-700 p-4 rounded-xl shadow-lg w-16 h-16 flex items-center justify-center transform transition-transform duration-500 group-hover:rotate-12 group-hover:scale-110 group-active:scale-95">
                        <svg class="w-8 h-8 text-white transition-transform duration-500 group-hover:animate-pulse"
                            fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
                            </path>
                        </svg>
                    </div>
                    <h3
                        class="text-2xl font-bold text-gray-800 mt-6 transition-all duration-300 group-hover:text-blue-700 group-hover:translate-x-2">
                        Fondasi Pendidikan</h3>
                </div>
                <p class="text-gray-700 text-lg transition-all duration-300 group-hover:text-blue-900">
                    Menjadi dasar untuk semua pembelajaran di masa depan dan kesuksesan akademis.
                </p>
                <div class="w-0 h-1 bg-blue-600 mt-4 transition-all duration-500 group-hover:w-full rounded-full"></div>
            </div>

            <!-- Keterampilan Hidup -->
            <div
                class="bg-gradient-to-br from-amber-50 to-amber-100 p-8 rounded-3xl shadow-md transition-all duration-500 ease-in-out hover:scale-105 hover:shadow-2xl hover:rotate-1 hover:-translate-y-2 cursor-pointer group relative overflow-hidden">
                <div
                    class="absolute inset-0 bg-amber-500 opacity-0 group-hover:opacity-10 transition-opacity duration-500">
                </div>
                <div class="mb-5 relative z-10">
                    <div
                        class="bg-gradient-to-r from-amber-500 to-amber-600 p-4 rounded-xl shadow-lg w-16 h-16 flex items-center justify-center transform transition-transform duration-500 group-hover:rotate-12 group-hover:scale-110 group-active:scale-95">
                        <svg class="w-8 h-8 text-white transition-transform duration-500 group-hover:animate-pulse"
                            fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
                            </path>
                        </svg>
                    </div>
                    <h3
                        class="text-2xl font-bold text-gray-800 mt-6 transition-all duration-300 group-hover:text-amber-600 group-hover:translate-x-2">
                        Keterampilan Hidup</h3>
                </div>
                <p class="text-gray-700 text-lg transition-all duration-300 group-hover:text-amber-900">
                    Membantu anak-anak mengatasi tantangan sehari-hari dan membuat keputusan yang tepat.
                </p>
                <div class="w-0 h-1 bg-amber-500 mt-4 transition-all duration-500 group-hover:w-full rounded-full"></div>
            </div>

            <!-- Masa Depan Cerah -->
            <div
                class="bg-gradient-to-br from-blue-100 to-blue-200 p-8 rounded-3xl shadow-md transition-all duration-500 ease-in-out hover:scale-105 hover:shadow-2xl hover:rotate-1 hover:-translate-y-2 cursor-pointer group relative overflow-hidden">
                <div class="absolute inset-0 bg-blue-700 opacity-0 group-hover:opacity-10 transition-opacity duration-500">
                </div>
                <div class="mb-5 relative z-10">
                    <div
                        class="bg-gradient-to-r from-blue-700 to-blue-800 p-4 rounded-xl shadow-lg w-16 h-16 flex items-center justify-center transform transition-transform duration-500 group-hover:rotate-12 group-hover:scale-110 group-active:scale-95">
                        <svg class="w-8 h-8 text-white transition-transform duration-500 group-hover:animate-pulse"
                            fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
                            </path>
                        </svg>
                    </div>
                    <h3
                        class="text-2xl font-bold text-gray-800 mt-6 transition-all duration-300 group-hover:text-blue-800 group-hover:translate-x-2">
                        Masa Depan Cerah</h3>
                </div>
                <p class="text-gray-700 text-lg transition-all duration-300 group-hover:text-blue-900">
                    Mempersiapkan anak-anak untuk karir dan kesuksesan di era digital.
                </p>
                <div class="w-0 h-1 bg-blue-700 mt-4 transition-all duration-500 group-hover:w-full rounded-full"></div>
            </div>
        </div>

        <script>
            // Add touch interaction for mobile devices
            document.querySelectorAll('.group').forEach(card => {
                card.addEventListener('touchstart', function() {
                    this.classList.add('scale-105', '-translate-y-2', 'rotate-1', 'shadow-2xl');
                    setTimeout(() => {
                        this.classList.remove('scale-105', '-translate-y-2', 'rotate-1', 'shadow-2xl');
                    }, 800);
                });
            });
        </script>
    </section>
    {{-- End Mengapa Literasi dan Numerasi Penting? --}}

    {{-- Alur Pendaftaran --}}
    <section id="pendaftaran" class="w-full max-w-6xl mx-auto px-5 py-16">
        <div class="text-center mb-16 transform transition-all duration-700 hover:scale-105">
            <div class="flex justify-center mb-6">
                <div
                    class="h-16 w-16 bg-blue-600 rounded-full flex items-center justify-center shadow-lg transform transition-transform duration-500 hover:rotate-12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
            <h1 class="text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-blue-800 mb-4">
                Alur Pendaftaran Program</h1>
            <p class="text-gray-600 mt-3 text-lg">Ikuti langkah-langkah sederhana berikut untuk mendaftarkan anak Anda</p>
        </div>

        <div class="relative">
            <!-- Timeline Line -->
            <div
                class="hidden md:block absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-gradient-to-b from-blue-400 via-blue-600 to-blue-800 rounded-full">
            </div>

            <!-- Step 1 -->
            <div class="flex flex-col md:flex-row mb-20 relative group">
                <div class="md:w-1/2 md:pr-8">
                    <div
                        class="bg-white p-6 rounded-xl shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 hover:rotate-1 border-l-4 border-blue-600">
                        <div class="flex items-center">
                            <div
                                class="mr-4 bg-blue-100 p-3 rounded-lg transform group-hover:rotate-12 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3
                                    class="text-xl font-semibold text-blue-600 flex items-center group-hover:text-blue-800 transition-colors duration-300">
                                    Isi Formulir Pendaftaran
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 ml-2 text-blue-600 group-hover:translate-x-1 transition-transform duration-300"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </h3>
                                <p class="text-gray-500 mt-2 group-hover:text-gray-700 transition-colors duration-300">
                                    Lengkapi formulir pendaftaran online dengan data anak dan orang tua/wali.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="hidden md:flex absolute left-1/2 top-6 transform -translate-x-1/2 items-center justify-center w-10 h-10 rounded-full bg-blue-600 text-white font-bold z-10 shadow-lg group-hover:scale-110 transition-transform duration-300">
                    1</div>
                <div class="md:w-1/2"></div>
            </div>

            <!-- Step 2 -->
            <div class="flex flex-col md:flex-row mb-20 relative group">
                <div class="md:w-1/2"></div>
                <div
                    class="hidden md:flex absolute left-1/2 top-6 transform -translate-x-1/2 items-center justify-center w-10 h-10 rounded-full bg-blue-600 text-white font-bold z-10 shadow-lg group-hover:scale-110 transition-transform duration-300">
                    2</div>
                <div class="md:w-1/2 md:pl-8">
                    <div
                        class="bg-white p-6 rounded-xl shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 hover:rotate-1 border-r-4 border-blue-600">
                        <div class="flex items-center">
                            <div
                                class="mr-4 bg-blue-100 p-3 rounded-lg transform group-hover:rotate-12 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3
                                    class="text-xl font-semibold text-blue-600 group-hover:text-blue-800 transition-colors duration-300">
                                    Pilih Jadwal Tes</h3>
                                <p class="text-gray-500 mt-2 group-hover:text-gray-700 transition-colors duration-300">
                                    Pilih jadwal tes kemampuan awal yang sesuai dengan ketersediaan waktu anak.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="flex flex-col md:flex-row mb-20 relative group">
                <div class="md:w-1/2 md:pr-8">
                    <div
                        class="bg-white p-6 rounded-xl shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 hover:rotate-1 border-l-4 border-blue-600">
                        <div class="flex items-center">
                            <div
                                class="mr-4 bg-blue-100 p-3 rounded-lg transform group-hover:rotate-12 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <div>
                                <h3
                                    class="text-xl font-semibold text-blue-600 flex items-center group-hover:text-blue-800 transition-colors duration-300">
                                    Ikuti Tes Kemampuan
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 ml-2 text-blue-600 group-hover:translate-x-1 transition-transform duration-300"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </h3>
                                <p class="text-gray-500 mt-2 group-hover:text-gray-700 transition-colors duration-300">Anak
                                    mengikuti tes kemampuan awal untuk menentukan level pembelajaran yang sesuai.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="hidden md:flex absolute left-1/2 top-6 transform -translate-x-1/2 items-center justify-center w-10 h-10 rounded-full bg-blue-600 text-white font-bold z-10 shadow-lg group-hover:scale-110 transition-transform duration-300">
                    3</div>
                <div class="md:w-1/2"></div>
            </div>

            <!-- Step 4 -->
            <div class="flex flex-col md:flex-row mb-20 relative group">
                <div class="md:w-1/2"></div>
                <div
                    class="hidden md:flex absolute left-1/2 top-6 transform -translate-x-1/2 items-center justify-center w-10 h-10 rounded-full bg-blue-600 text-white font-bold z-10 shadow-lg group-hover:scale-110 transition-transform duration-300">
                    4</div>
                <div class="md:w-1/2 md:pl-8">
                    <div
                        class="bg-white p-6 rounded-xl shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 hover:rotate-1 border-r-4 border-blue-600">
                        <div class="flex items-center">
                            <div
                                class="mr-4 bg-blue-100 p-3 rounded-lg transform group-hover:rotate-12 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div>
                                <h3
                                    class="text-xl font-semibold text-blue-600 group-hover:text-blue-800 transition-colors duration-300">
                                    Mulai Program Pembelajaran</h3>
                                <p class="text-gray-500 mt-2 group-hover:text-gray-700 transition-colors duration-300">Anak
                                    memulai program pembelajaran sesuai dengan jadwal yang telah ditentukan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-16">
            <button
                class="bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-medium py-4 px-10 rounded-full transition-all duration-300 transform hover:scale-105 hover:shadow-xl flex items-center group">
                Coba Sekarang
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>
        </div>
    </section>
    {{-- <section class="w-full max-w-6xl mx-auto px-4 sm:px-6 py-8 sm:py-16">
        <div class="text-center mb-8 sm:mb-16 transform transition-all duration-700 hover:scale-105">
            <div class="flex justify-center mb-4 sm:mb-6">
                <div class="h-12 w-12 sm:h-16 sm:w-16 bg-blue-600 rounded-full flex items-center justify-center shadow-lg transform transition-transform duration-500 hover:rotate-12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 sm:h-10 sm:w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-blue-800 mb-2 sm:mb-4">Alur Pendaftaran Program</h1>
            <p class="text-gray-600 mt-2 sm:mt-3 text-base sm:text-lg">Ikuti langkah-langkah sederhana berikut untuk mendaftarkan anak Anda</p>
        </div>
    
        <div class="relative">
            <!-- Timeline Line (only visible on md and up) -->
            <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-gradient-to-b from-blue-400 via-blue-600 to-blue-800 rounded-full"></div>
            
            <!-- Mobile timeline line (only visible on small screens) -->
            <div class="absolute md:hidden left-4 sm:left-8 top-0 bottom-0 w-1 bg-gradient-to-b from-blue-400 via-blue-600 to-blue-800 rounded-full"></div>
    
            <!-- Step 1 -->
            <div class="flex flex-col md:flex-row mb-8 sm:mb-12 md:mb-20 relative group">
                <!-- Mobile number indicator (only visible on small screens) -->
                <div class="flex md:hidden absolute left-4 sm:left-8 transform -translate-x-1/2 items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white font-bold z-10 shadow-lg group-hover:scale-110 transition-transform duration-300">1</div>
                
                <div class="pl-10 sm:pl-16 md:pl-0 md:w-1/2 md:pr-8">
                    <div class="bg-white p-4 sm:p-6 rounded-xl shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 md:hover:-translate-y-3 hover:rotate-1 border-l-4 border-blue-600">
                        <div class="flex items-center">
                            <div class="mr-4 bg-blue-100 p-2 sm:p-3 rounded-lg transform group-hover:rotate-12 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg sm:text-xl font-semibold text-blue-600 flex items-center group-hover:text-blue-800 transition-colors duration-300">
                                    Isi Formulir Pendaftaran
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 ml-2 text-blue-600 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </h3>
                                <p class="text-gray-500 mt-2 text-sm sm:text-base group-hover:text-gray-700 transition-colors duration-300">Lengkapi formulir pendaftaran online dengan data anak dan orang tua/wali.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Desktop number indicator (only visible on md and up) -->
                <div class="hidden md:flex absolute left-1/2 top-6 transform -translate-x-1/2 items-center justify-center w-10 h-10 rounded-full bg-blue-600 text-white font-bold z-10 shadow-lg group-hover:scale-110 transition-transform duration-300">1</div>
                <div class="md:w-1/2"></div>
            </div>
    
            <!-- Step 2 -->
            <div class="flex flex-col md:flex-row mb-8 sm:mb-12 md:mb-20 relative group">
                <!-- Mobile number indicator -->
                <div class="flex md:hidden absolute left-4 sm:left-8 transform -translate-x-1/2 items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white font-bold z-10 shadow-lg group-hover:scale-110 transition-transform duration-300">2</div>
                
                <div class="md:w-1/2"></div>
                <!-- Desktop number indicator -->
                <div class="hidden md:flex absolute left-1/2 top-6 transform -translate-x-1/2 items-center justify-center w-10 h-10 rounded-full bg-blue-600 text-white font-bold z-10 shadow-lg group-hover:scale-110 transition-transform duration-300">2</div>
                <div class="pl-10 sm:pl-16 md:pl-8 md:w-1/2">
                    <div class="bg-white p-4 sm:p-6 rounded-xl shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 md:hover:-translate-y-3 hover:rotate-1 border-r-4 border-blue-600">
                        <div class="flex items-center">
                            <div class="mr-4 bg-blue-100 p-2 sm:p-3 rounded-lg transform group-hover:rotate-12 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg sm:text-xl font-semibold text-blue-600 group-hover:text-blue-800 transition-colors duration-300">Pilih Jadwal Tes</h3>
                                <p class="text-gray-500 mt-2 text-sm sm:text-base group-hover:text-gray-700 transition-colors duration-300">Pilih jadwal tes kemampuan awal yang sesuai dengan ketersediaan waktu anak.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Step 3 -->
            <div class="flex flex-col md:flex-row mb-8 sm:mb-12 md:mb-20 relative group">
                <!-- Mobile number indicator -->
                <div class="flex md:hidden absolute left-4 sm:left-8 transform -translate-x-1/2 items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white font-bold z-10 shadow-lg group-hover:scale-110 transition-transform duration-300">3</div>
                
                <div class="pl-10 sm:pl-16 md:pl-0 md:w-1/2 md:pr-8">
                    <div class="bg-white p-4 sm:p-6 rounded-xl shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 md:hover:-translate-y-3 hover:rotate-1 border-l-4 border-blue-600">
                        <div class="flex items-center">
                            <div class="mr-4 bg-blue-100 p-2 sm:p-3 rounded-lg transform group-hover:rotate-12 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg sm:text-xl font-semibold text-blue-600 flex items-center group-hover:text-blue-800 transition-colors duration-300">
                                    Ikuti Tes Kemampuan
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 ml-2 text-blue-600 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </h3>
                                <p class="text-gray-500 mt-2 text-sm sm:text-base group-hover:text-gray-700 transition-colors duration-300">Anak mengikuti tes kemampuan awal untuk menentukan level pembelajaran yang sesuai.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Desktop number indicator -->
                <div class="hidden md:flex absolute left-1/2 top-6 transform -translate-x-1/2 items-center justify-center w-10 h-10 rounded-full bg-blue-600 text-white font-bold z-10 shadow-lg group-hover:scale-110 transition-transform duration-300">3</div>
                <div class="md:w-1/2"></div>
            </div>
    
            <!-- Step 4 -->
            <div class="flex flex-col md:flex-row mb-8 sm:mb-12 md:mb-20 relative group">
                <!-- Mobile number indicator -->
                <div class="flex md:hidden absolute left-4 sm:left-8 transform -translate-x-1/2 items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white font-bold z-10 shadow-lg group-hover:scale-110 transition-transform duration-300">4</div>
                
                <div class="md:w-1/2"></div>
                <!-- Desktop number indicator -->
                <div class="hidden md:flex absolute left-1/2 top-6 transform -translate-x-1/2 items-center justify-center w-10 h-10 rounded-full bg-blue-600 text-white font-bold z-10 shadow-lg group-hover:scale-110 transition-transform duration-300">4</div>
                <div class="pl-10 sm:pl-16 md:pl-8 md:w-1/2">
                    <div class="bg-white p-4 sm:p-6 rounded-xl shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 md:hover:-translate-y-3 hover:rotate-1 border-r-4 border-blue-600">
                        <div class="flex items-center">
                            <div class="mr-4 bg-blue-100 p-2 sm:p-3 rounded-lg transform group-hover:rotate-12 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg sm:text-xl font-semibold text-blue-600 group-hover:text-blue-800 transition-colors duration-300">Mulai Program Pembelajaran</h3>
                                <p class="text-gray-500 mt-2 text-sm sm:text-base group-hover:text-gray-700 transition-colors duration-300">Anak memulai program pembelajaran sesuai dengan jadwal yang telah ditentukan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="flex justify-center mt-8 sm:mt-16">
            <button class="bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-medium py-3 sm:py-4 px-6 sm:px-10 rounded-full transition-all duration-300 transform hover:scale-105 hover:shadow-xl flex items-center group">
                <span class="text-sm sm:text-base">Coba Sekarang</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>
        </div>
    </section> --}}
    {{-- End Alur Pendaftaran --}}

    {{-- Gallery --}}
    <section id="galeri" class="relative max-w-7xl mx-auto px-4 py-12 overflow-hidden bg-">
        <!-- Header Section -->
        <div class="text-center mb-12 transform transition-all duration-500 hover:scale-105">
            <span
                class="inline-block bg-gradient-to-r from-blue-100 to-blue-200 text-blue-800 px-4 py-1.5 rounded-full text-sm font-medium shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                Dokumentasi Kegiatan
            </span>
            <h2
                class="text-4xl font-bold bg-gradient-to-r from-blue-700 to-yellow-500 bg-clip-text text-transparent mt-3 relative group">
                Galeri Kegiatan
                <span
                    class="absolute -bottom-2 left-1/2 w-0 h-1 bg-gradient-to-r from-blue-600 to-yellow-500 group-hover:w-48 transition-all duration-300 transform -translate-x-1/2"></span>
            </h2>
            <p class="text-blue-800 mt-6 max-w-2xl mx-auto transition-all duration-300 hover:text-blue-900">
                Lihat dokumentasi kegiatan literasi dan numerasi yang telah kami lakukan
            </p>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Gallery Item 1 -->
            <div
                class="group relative rounded-xl overflow-hidden shadow-lg transition-all duration-300 transform hover:-translate-y-2 hover:shadow-xl bg-white">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-blue-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                    <div
                        class="p-4 text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="font-bold">Kegiatan Literasi</h3>
                        <p class="text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                            Siswa membaca bersama di perpustakaan</p>
                    </div>
                </div>
                <div class="aspect-square overflow-hidden">
                    <img src="images/1.jpg" alt="Kegiatan 1"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
            </div>

            <!-- Gallery Item 2 -->
            <div
                class="group relative rounded-xl overflow-hidden shadow-lg transition-all duration-300 transform hover:-translate-y-2 hover:shadow-xl bg-white">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-blue-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                    <div
                        class="p-4 text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="font-bold">Kegiatan Numerasi</h3>
                        <p class="text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                            Belajar matematika dengan alat peraga</p>
                    </div>
                </div>
                <div class="aspect-square overflow-hidden">
                    <img src="images/2.jpg" alt="Kegiatan 2"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
            </div>

            <!-- Gallery Item 3 -->
            <div
                class="group relative rounded-xl overflow-hidden shadow-lg transition-all duration-300 transform hover:-translate-y-2 hover:shadow-xl bg-white">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-blue-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                    <div
                        class="p-4 text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="font-bold">Diskusi Kelompok</h3>
                        <p class="text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                            Siswa berdiskusi dalam kelompok kecil</p>
                    </div>
                </div>
                <div class="aspect-square overflow-hidden">
                    <img src="images/3.jpg" alt="Kegiatan 3"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
            </div>

            <!-- Gallery Item 4 -->
            <div
                class="group relative rounded-xl overflow-hidden shadow-lg transition-all duration-300 transform hover:-translate-y-2 hover:shadow-xl bg-white">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-blue-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                    <div
                        class="p-4 text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="font-bold">Presentasi Proyek</h3>
                        <p class="text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                            Siswa mempresentasikan hasil proyek</p>
                    </div>
                </div>
                <div class="aspect-square overflow-hidden">
                    <img src="images/4.jpg" alt="Kegiatan 4"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
            </div>
        </div>
    </section>
    {{-- End Gallery --}}

    {{-- Vidio --}}
    <section id="video" class="max-w-7xl mx-auto px-4 md:px-8 py-20 bg- overflow-hidden">

        <div class="absolute -top-20 -left-20 w-64 h-64 bg-blue-300 rounded-full opacity-20 blur-3xl animate-pulse"></div>
        <div class="absolute top-1/2 -right-32 w-80 h-80 bg-indigo-300 rounded-full opacity-20 blur-3xl animate-pulse"
            style="animation-delay: 2s;"></div>
        <div class="absolute -bottom-40 left-1/3 w-72 h-72 bg-purple-300 rounded-full opacity-20 blur-3xl animate-pulse"
            style="animation-delay: 4s;"></div>


        <div
            class="max-w-4xl mx-auto text-center mb-16 relative z-10 transform transition-all duration-700 hover:scale-102">
            <h2
                class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-blue-700 via-indigo-600 to-purple-700 bg-clip-text text-transparent leading-tight mb-6 relative">
                Video Hafecs
                <span
                    class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-gradient-to-r from-amber-400 to-amber-600 rounded-full"></span>
            </h2>
            <p class="text-lg md:text-xl text-gray-700 font-medium max-w-2xl mx-auto mt-6">
                Tonton video-video menarik tentang program literasi dan numerasi kami
            </p>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 mb-12">

            <!-- Video 1 -->
            <div
                class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border-t-4 border-amber-500">
                <div class="relative h-56 md:h-64 overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10 flex items-end justify-center pb-6">
                        <button
                            class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-full flex items-center space-x-1 transform translate-y-8 group-hover:translate-y-0 transition-transform duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Putar Video</span>
                        </button>
                    </div>
                    <iframe class="w-full h-full group-hover:scale-110 transition-transform duration-700"
                        src="https://www.youtube.com/embed/Jn7vuXLozJI" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="p-6 bg-gradient-to-br from-white to-blue-50">
                    <h3
                        class="text-xl font-bold text-blue-800 mb-3 group-hover:text-amber-600 transition-colors duration-300">
                        Belajar Numerasi yang Menyenangkan</h3>
                    <p class="text-gray-600 mb-4">Metode belajar berhitung yang menyenangkan untuk anak-anak.</p>
                    <div class="flex justify-between items-center">
                        <a href="https://www.youtube.com/watch?v=Jn7vuXLozJI" target="_blank"
                            class="text-amber-600 hover:text-amber-500 font-medium flex items-center transition-colors duration-300 group relative">
                            <span class="relative z-10">Tonton Sekarang</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 ml-1 transition-transform duration-300 group-hover:translate-x-1"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span
                                class="absolute bottom-0 left-0 w-0 h-0.5 bg-amber-500 group-hover:w-full transition-all duration-300"></span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Video 2 -->
            <div
                class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border-t-4 border-amber-500">
                <div class="relative h-56 md:h-64 overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10 flex items-end justify-center pb-6">
                        <button
                            class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-full flex items-center space-x-1 transform translate-y-8 group-hover:translate-y-0 transition-transform duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Putar Video</span>
                        </button>
                    </div>
                    <iframe class="w-full h-full group-hover:scale-110 transition-transform duration-700"
                        src="https://www.youtube.com/embed/Jn7vuXLozJI" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="p-6 bg-gradient-to-br from-white to-blue-50">
                    <h3
                        class="text-xl font-bold text-blue-800 mb-3 group-hover:text-amber-600 transition-colors duration-300">
                        Belajar Numerasi yang Menyenangkan</h3>
                    <p class="text-gray-600 mb-4">Metode belajar berhitung yang menyenangkan untuk anak-anak.</p>
                    <div class="flex justify-between items-center">
                        <a href="https://www.youtube.com/watch?v=Jn7vuXLozJI" target="_blank"
                            class="text-amber-600 hover:text-amber-500 font-medium flex items-center transition-colors duration-300 group relative">
                            <span class="relative z-10">Tonton Sekarang</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 ml-1 transition-transform duration-300 group-hover:translate-x-1"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span
                                class="absolute bottom-0 left-0 w-0 h-0.5 bg-amber-500 group-hover:w-full transition-all duration-300"></span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Video 3 -->
            <div
                class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border-t-4 border-amber-500">
                <div class="relative h-56 md:h-64 overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10 flex items-end justify-center pb-6">
                        <button
                            class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-full flex items-center space-x-1 transform translate-y-8 group-hover:translate-y-0 transition-transform duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Putar Video</span>
                        </button>
                    </div>
                    <iframe class="w-full h-full group-hover:scale-110 transition-transform duration-700"
                        src="https://www.youtube.com/embed/Jn7vuXLozJI" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="p-6 bg-gradient-to-br from-white to-blue-50">
                    <h3
                        class="text-xl font-bold text-blue-800 mb-3 group-hover:text-amber-600 transition-colors duration-300">
                        Belajar Numerasi yang Menyenangkan</h3>
                    <p class="text-gray-600 mb-4">Metode belajar berhitung yang menyenangkan untuk anak-anak.</p>
                    <div class="flex justify-between items-center">
                        <a href="https://www.youtube.com/watch?v=Jn7vuXLozJI" target="_blank"
                            class="text-amber-600 hover:text-amber-500 font-medium flex items-center transition-colors duration-300 group relative">
                            <span class="relative z-10">Tonton Sekarang</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 ml-1 transition-transform duration-300 group-hover:translate-x-1"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span
                                class="absolute bottom-0 left-0 w-0 h-0.5 bg-amber-500 group-hover:w-full transition-all duration-300"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <div class="text-center">
            <a href="#"
                class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 text-white font-medium rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 group">
                <span>Lihat Semua Video</span>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 ml-2 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>


        <div class="hidden md:block absolute top-20 right-10 w-12 h-12 bg-yellow-300 rounded-full opacity-40 animate-bounce"
            style="animation-duration: 6s; animation-delay: 1s;"></div>
        <div class="hidden md:block absolute bottom-20 left-10 w-8 h-8 bg-pink-300 rounded-full opacity-30 animate-bounce"
            style="animation-duration: 8s;"></div>
    </section>
    {{-- End Vidio --}}

    {{-- Kolom Data Peserta --}}
    <section id="coba" class="w-full px-5 py-16 bg-gray-50 relative overflow-hidden">
        <!-- Animated background elements -->
        <div class="absolute top-8 left-5 w-6 h-6 bg-blue-300 rounded-full opacity-70 animate-pulse"></div>
        <div class="absolute top-0 right-1/4 w-24 h-24 bg-blue-200 rounded-full opacity-50 animate-bounce"
            style="animation-duration: 6s;"></div>
        <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-yellow-100 rounded-full opacity-40 animate-pulse"
            style="animation-duration: 7s;"></div>
        <div class="absolute bottom-1/3 left-1/4 w-16 h-16 bg-blue-100 rounded-full opacity-30 animate-pulse"
            style="animation-duration: 8s;"></div>

        <div class="max-w-lg mx-auto text-center relative z-10 mb-8">
            <div
                class="inline-block px-4 py-1 rounded-full bg-blue-500 text-white mb-4 text-sm font-medium transform transition-transform hover:scale-105 hover:shadow-lg cursor-pointer">
                Bergabunglah Sekarang
            </div>
            <h2 class="text-4xl font-bold mb-2 tracking-tight text-blue-600">
                Coba Program
            </h2>
            <p class="text-gray-700 text-md mb-6">
                Isi formulir di bawah ini untuk mencoba program Literasi dan Numerasi
            </p>

            <div
                class="w-16 h-1 bg-gradient-to-r from-blue-500 to-yellow-500 mt-1 mb-6 mx-auto transform transition-all duration-300 hover:w-32 hover:h-2">
            </div>
        </div>

        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div
                class="max-w-lg mx-auto bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 p-6 mb-8 transform hover:-translate-y-1 border border-blue-50">
                <h3 class="text-2xl font-bold text-blue-600 mb-6 text-center">Isi Dulu Formulir Kamu</h3>
                <!-- Nama Lengkap -->
                <div
                    class="mb-4 p-4 bg-blue-50 rounded-2xl hover:bg-blue-100 transition-all duration-300 transform hover:scale-102 hover:shadow-md group">
                    <div class="flex items-center">
                        <div
                            class="bg-blue-500 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center mr-3 group-hover:bg-blue-600 transition-colors duration-300 transform group-hover:rotate-6 group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="flex flex-col flex-1 relative">
                            <label class="text-sm text-blue-700 mb-1 font-medium">Nama Lengkap</label>
                            <input type="text" placeholder="Masukkan nama lengkap" name="nama_siswa"
                                class="border-b-2 border-blue-200 bg-transparent focus:outline-none focus:border-blue-500 text-gray-600 p-1 transition-colors duration-300">
                            <div
                                class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-500 transition-all duration-300 group-hover:w-full">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kelas -->
                <div
                    class="mb-4 p-4 bg-blue-50 rounded-2xl hover:bg-blue-100 transition-all duration-300 transform hover:scale-102 hover:shadow-md group">
                    <div class="flex items-center">
                        <div
                            class="bg-blue-500 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center mr-3 group-hover:bg-blue-600 transition-colors duration-300 transform group-hover:rotate-6 group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </div>
                        <div class="flex flex-col flex-1 relative">
                            <label class="text-sm text-blue-700 mb-1 font-medium">Kelas</label>
                            <input type="text" placeholder="Contoh: 5A" name="kelas"
                                class="border-b-2 border-blue-200 bg-transparent focus:outline-none focus:border-blue-500 text-gray-600 p-1 transition-colors duration-300">
                            <div
                                class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-500 transition-all duration-300 group-hover:w-full">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Asal Sekolah -->
                <div
                    class="mb-4 p-4 bg-yellow-50 rounded-2xl hover:bg-yellow-100 transition-all duration-300 transform hover:scale-102 hover:shadow-md group">
                    <div class="flex items-center">
                        <div
                            class="bg-yellow-500 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center mr-3 group-hover:bg-yellow-600 transition-colors duration-300 transform group-hover:rotate-6 group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div class="flex flex-col flex-1 relative">
                            <label class="text-sm text-yellow-700 mb-1 font-medium">Asal Sekolah</label>
                            <input type="text" placeholder="Nama sekolah" name="asal_sekolah"
                                class="border-b-2 border-yellow-200 bg-transparent focus:outline-none focus:border-yellow-500 text-gray-600 p-1 transition-colors duration-300">
                            <div
                                class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Jenjang Pendidikan --}}
                <div
                    class="mb-4 p-4 bg-yellow-50 rounded-2xl hover:bg-yellow-100 transition-all duration-300 transform hover:scale-102 hover:shadow-md group">
                    <div class="flex items-center">
                        <div
                            class="bg-yellow-500 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center mr-3 group-hover:bg-yellow-600 transition-colors duration-300 transform group-hover:rotate-6 group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div class="flex flex-col flex-1 relative">
                            <label class="text-sm text-yellow-700 mb-1 font-medium">Jenjang Pendidikan</label>
                            <select name="jenjang_pendidikan"
                                class="border-b-2 border-yellow-200 bg-transparent focus:outline-none focus:border-yellow-500 text-gray-600 p-1 transition-colors duration-300 appearance-none cursor-pointer">
                                <option value="" disabled selected>Pilih Jenjang Pendidikan</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                            </select>
                            <div class="absolute right-2 bottom-3 pointer-events-none text-yellow-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                            <div
                                class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Provinsi --}}
                <div
                    class="mb-4 p-4 bg-blue-50 rounded-2xl hover:bg-blue-100 transition-all duration-300 transform hover:scale-102 hover:shadow-md group cursor-pointer">
                    <div class="flex items-center">
                        <div
                            class="bg-blue-500 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center mr-3 group-hover:bg-blue-600 transition-colors duration-300 transform group-hover:rotate-6 group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex flex-col flex-1 relative">
                            <label class="text-sm text-blue-700 mb-1 font-medium">Provinsi</label>
                            <select id="province" name="provinsi"
                                class="border-b-2 border-blue-200 bg-transparent focus:outline-none focus:border-blue-500 text-gray-600 p-1 transition-colors duration-300 appearance-none cursor-pointer">
                                <option value="{{ old('provinsi') }}" selected>
                                    {{ old('provinsi') ? old('provinsi') : 'Select Province' }}</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->name }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                            <div class="absolute right-2 bottom-3 pointer-events-none text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 text-blue-500 transform transition-transform group-hover:rotate-180"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                            <div
                                class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-500 transition-all duration-300 group-hover:w-full">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- REGENCY/KABUPATEN --}}
                <div
                    class="mb-4 p-4 bg-blue-50 rounded-2xl hover:bg-blue-100 transition-all duration-300 transform hover:scale-102 hover:shadow-md group cursor-pointer">
                    <div class="flex items-center">
                        <div
                            class="bg-blue-500 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center mr-3 group-hover:bg-blue-600 transition-colors duration-300 transform group-hover:rotate-6 group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex flex-col flex-1 relative">
                            <label class="text-sm text-blue-700 mb-1 font-medium">Kabupaten</label>
                            <select id="regency" name="kabupaten" disabled
                                class="border-b-2 border-blue-200 bg-transparent focus:outline-none focus:border-blue-500 text-gray-600 p-1 transition-colors duration-300 appearance-none cursor-pointer">
                                <option value="" selected disabled>Select Regency/City</option>
                            </select>
                            <div class="absolute right-2 bottom-3 pointer-events-none text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 text-blue-500 transform transition-transform group-hover:rotate-180"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                            <div
                                class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-500 transition-all duration-300 group-hover:w-full">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- DISTRICT/KECAMATAN --}}
                <div
                    class="mb-4 p-4 bg-blue-50 rounded-2xl hover:bg-blue-100 transition-all duration-300 transform hover:scale-102 hover:shadow-md group cursor-pointer">
                    <div class="flex items-center">
                        <div
                            class="bg-blue-500 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center mr-3 group-hover:bg-blue-600 transition-colors duration-300 transform group-hover:rotate-6 group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex flex-col flex-1 relative">
                            <label class="text-sm text-blue-700 mb-1 font-medium">Kecamatan</label>
                            <select id="district" name="kecamatan" disabled
                                class="border-b-2 border-blue-200 bg-transparent focus:outline-none focus:border-blue-500 text-gray-600 p-1 transition-colors duration-300 appearance-none cursor-pointer">
                                <option value="" selected disabled>Select District</option>
                            </select>
                            <div class="absolute right-2 bottom-3 pointer-events-none text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 text-blue-500 transform transition-transform group-hover:rotate-180"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                            <div
                                class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-500 transition-all duration-300 group-hover:w-full">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Village/kelurahan --}}
                <div
                    class="mb-4 p-4 bg-blue-50 rounded-2xl hover:bg-blue-100 transition-all duration-300 transform hover:scale-102 hover:shadow-md group cursor-pointer">
                    <div class="flex items-center">
                        <div
                            class="bg-blue-500 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center mr-3 group-hover:bg-blue-600 transition-colors duration-300 transform group-hover:rotate-6 group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex flex-col flex-1 relative">
                            <label class="text-sm text-blue-700 mb-1 font-medium">Kelurahan</label>
                            <select id="village" name="kelurahan" disabled
                                class="border-b-2 border-blue-200 bg-transparent focus:outline-none focus:border-blue-500 text-gray-600 p-1 transition-colors duration-300 appearance-none cursor-pointer">
                                <option value="" selected disabled>Select District</option>
                            </select>
                            <div class="absolute right-2 bottom-3 pointer-events-none text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 text-blue-500 transform transition-transform group-hover:rotate-180"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                            <div
                                class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-500 transition-all duration-300 group-hover:w-full">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jenis Kelamin -->
                <div
                    class="mb-6 p-4 bg-blue-50 rounded-2xl hover:bg-blue-100 transition-all duration-300 transform hover:scale-102 hover:shadow-md group">
                    <div class="flex items-center">
                        <div
                            class="bg-blue-500 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center mr-3 group-hover:bg-blue-600 transition-colors duration-300 transform group-hover:rotate-6 group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="flex flex-col flex-1">
                            <label class="text-sm text-blue-700 mb-2 font-medium">Jenis Kelamin</label>
                            <div class="flex items-center space-x-6">
                                <!-- Laki-laki option -->
                                <label class="flex items-center cursor-pointer group/radio">
                                    <div class="relative flex items-center">
                                        <input type="radio" name="jenis_kelamin" value="L"
                                            class="appearance-none w-5 h-5 border-2 border-blue-300 rounded-full checked:border-blue-500 checked:border-4 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-300">
                                    </div>
                                    <span
                                        class="ml-2 text-gray-600 group-hover/radio:text-blue-600 transition-colors duration-300">Laki-laki</span>
                                </label>

                                <!-- Perempuan option -->
                                <label class="flex items-center cursor-pointer group/radio">
                                    <div class="relative flex items-center">
                                        <input type="radio" name="jenis_kelamin" value="P"
                                            class="appearance-none w-5 h-5 border-2 border-blue-300 rounded-full checked:border-blue-500 checked:border-4 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-300">
                                    </div>
                                    <span
                                        class="ml-2 text-gray-600 group-hover/radio:text-blue-600 transition-colors duration-300">Perempuan</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <button
                    class="w-full bg-gradient-to-r from-blue-500 to-yellow-500 text-white py-3 rounded-full text-lg font-medium flex items-center justify-center transform transition-all duration-300 hover:shadow-xl hover:translate-y-1 active:translate-y-0 relative overflow-hidden group"
                    type="submit">
                    <span
                        class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300"></span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 mr-2 transition-transform duration-300 group-hover:rotate-12" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="relative z-10">Kirim Pendaftaran</span>
                </button>
            </div>
        </form>


        <!-- JavaScript for animations -->


        <script>
            // Radio button animations
            document.getElementById('male').addEventListener('change', function() {
                if (this.checked) {
                    document.getElementById('male-dot').style.opacity = '1';
                    document.getElementById('male-dot').style.transform = 'scale(1)';
                    document.getElementById('female-dot').style.opacity = '0';
                    document.getElementById('female-dot').style.transform = 'scale(0)';
                }
            });

            document.getElementById('female').addEventListener('change', function() {
                if (this.checked) {
                    document.getElementById('female-dot').style.opacity = '1';
                    document.getElementById('female-dot').style.transform = 'scale(1)';
                    document.getElementById('male-dot').style.opacity = '0';
                    document.getElementById('male-dot').style.transform = 'scale(0)';
                }
            });

            // Mobile touch animations
            document.querySelectorAll('.group').forEach(element => {
                element.addEventListener('touchstart', function() {
                    this.classList.add('scale-98');
                    setTimeout(() => {
                        this.classList.remove('scale-98');
                    }, 200);
                });
            });

            // Button touch animation
            const submitButton = document.querySelector('button');
            submitButton.addEventListener('touchstart', function() {
                this.style.transform = 'translateY(2px)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 200);
            });
        </script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#province').change(function() {
                    var provinceName = $(this).val();

                    $('#regency').prop('disabled', !provinceName);
                    $('#district').prop('disabled', true);
                    $('#village').prop('disabled', true);
                    $('#regency').empty().append('<option value="">Pilih Kabupaten/Kota</option>');
                    $('#district').empty().append('<option value="">Pilih Kecamatan</option>');
                    $('#village').empty().append('<option value="">Pilih Kelurahan</option>');

                    if (provinceName) {
                        $.get('/regencies/' + provinceName, function(data) {
                            $.each(data, function(key, value) {
                                $('#regency').append('<option value="' + value.name + '">' +
                                    value.name + '</option>');
                            });
                        }).fail(function() {
                            console.error(
                                'Error fetching regencies');
                        });
                    }
                });

                $('#regency').change(function() {
                    var regencyName = $(this).val();

                    $('#district').prop('disabled', !regencyName);
                    $('#village').prop('disabled', true);
                    $('#district').empty().append('<option value="">Pilih Kecamatan</option>');
                    $('#village').empty().append('<option value="">Pilih Kelurahan</option>');

                    if (regencyName) {
                        $.get('/districts/' + regencyName, function(data) {
                            $.each(data, function(key, value) {
                                $('#district').append('<option value="' + value.name + '">' +
                                    value.name + '</option>');
                            });
                        }).fail(function() {
                            console.error(
                                'Error fetching districts'); // Ganti alert dengan console.error
                        });
                    }
                });

                $('#district').change(function() {
                    var districtName = $(this).val();

                    $('#village').prop('disabled', !districtName);
                    $('#village').empty().append('<option value="">Pilih Kelurahan</option>');

                    if (districtName) {
                        $.get('/villages/' + districtName, function(data) {
                            $.each(data, function(key, value) {
                                $('#village').append('<option value="' + value.name + '">' +
                                    value.name + '</option>');
                            });
                        }).fail(function() {
                            console.error(
                                'Error fetching villages'); // Ganti alert dengan console.error
                        });
                    }
                });
            });
        </script>

    </section>
    {{-- <section class="w-full min-h-screen px-5 py-16 bg-gradient-to-br from-blue-50 to-indigo-50 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
            <!-- Animated blobs -->
            <div class="absolute top-8 left-5 w-32 h-32 bg-gradient-to-r from-blue-300 to-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-50 animate-blob"></div>
            <div class="absolute top-0 right-1/4 w-48 h-48 bg-gradient-to-r from-yellow-200 to-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-40 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-10 -right-10 w-56 h-56 bg-gradient-to-r from-purple-200 to-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-40 animate-blob animation-delay-4000"></div>
            <div class="absolute bottom-1/3 left-1/4 w-40 h-40 bg-gradient-to-r from-teal-200 to-teal-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-6000"></div>
            
            <!-- Particle effect -->
            <div id="particles-js" class="absolute inset-0 z-0"></div>
            
            <!-- Grid pattern -->
            <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
        </div>
        
        <div class="max-w-xl mx-auto text-center relative z-10 mb-10">
            <div class="inline-block px-5 py-2 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white mb-6 text-sm font-medium transform transition-transform hover:scale-105 hover:shadow-xl cursor-pointer group">
                <span class="inline-block group-hover:animate-pulse">Bergabunglah Sekarang</span>
                <span class="inline-block ml-2 transform group-hover:translate-x-1 transition-transform">→</span>
            </div>
            <h2 class="text-5xl font-extrabold mb-4 tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-blue-600 via-indigo-500 to-purple-600 animate-gradient-text">
                Daftar Program
            </h2>
            <p class="text-gray-700 text-lg mb-6 max-w-md mx-auto">
                Isi formulir di bawah ini untuk mendaftar program Literasi dan Numerasi
            </p>
            
            <div class="w-20 h-1.5 bg-gradient-to-r from-blue-500 via-purple-500 to-yellow-500 mt-1 mb-6 mx-auto transform transition-all duration-500 hover:w-40 rounded-full hover:h-2"></div>
        </div>
    
        <div class="max-w-xl mx-auto relative">
            <!-- Card decoration elements -->
            <div class="absolute -top-6 -left-6 w-12 h-12 bg-yellow-400 rounded-lg shadow-lg transform -rotate-12 z-0"></div>
            <div class="absolute -bottom-6 -right-6 w-12 h-12 bg-purple-500 rounded-full shadow-lg z-0"></div>
            <div class="absolute top-1/4 -right-10 w-8 h-8 bg-blue-400 rounded-lg shadow-lg transform rotate-12 z-0"></div>
            <div class="absolute bottom-1/4 -left-10 w-8 h-8 bg-teal-400 rounded-full shadow-lg z-0"></div>
            
            <!-- Main Form Card -->
            <div class="bg-white backdrop-filter backdrop-blur-lg bg-opacity-80 rounded-3xl shadow-2xl hover:shadow-3xl transition-all duration-500 p-8 mb-8 transform hover:-translate-y-2 border border-blue-50 relative z-10 form-card">
                <div class="absolute -top-3 left-1/2 transform -translate-x-1/2 px-6 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm rounded-full font-medium">
                    Program Literasi &amp; Numerasi
                </div>
                
                <h3 class="text-3xl font-bold text-center mb-8 mt-4 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">Formulir Pendaftaran</h3>
                
                <form id="registrationForm" class="space-y-6">
                    <!-- Nama Lengkap -->
                    <div class="form-group">
                        <div class="input-container">
                            <div class="icon-container bg-gradient-to-r from-blue-500 to-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div class="input-wrapper">
                                <input type="text" id="nama" placeholder=" " required>
                                <label for="nama">Nama Lengkap</label>
                                <div class="input-line"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Kelas -->
                    <div class="form-group">
                        <div class="input-container">
                            <div class="icon-container bg-gradient-to-r from-indigo-500 to-purple-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </div>
                            <div class="input-wrapper">
                                <input type="text" id="kelas" placeholder=" " required>
                                <label for="kelas">Kelas</label>
                                <div class="input-line"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Asal Sekolah -->
                    <div class="form-group">
                        <div class="input-container">
                            <div class="icon-container bg-gradient-to-r from-purple-500 to-pink-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div class="input-wrapper">
                                <input type="text" id="sekolah" placeholder=" " required>
                                <label for="sekolah">Asal Sekolah</label>
                                <div class="input-line"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Kabupaten/Kota -->
                    <div class="form-group">
                        <div class="input-container">
                            <div class="icon-container bg-gradient-to-r from-pink-500 to-yellow-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="input-wrapper">
                                <input type="text" id="kabupaten" placeholder=" " required>
                                <label for="kabupaten">Kabupaten/Kota</label>
                                <div class="input-line"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Provinsi -->
                    <div class="form-group">
                        <div class="input-container">
                            <div class="icon-container bg-gradient-to-r from-yellow-500 to-teal-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="input-wrapper dropdown-wrapper">
                                <select id="provinsi" required>
                                    <option value="" disabled selected></option>
                                    <option value="aceh">Aceh</option>
                                    <option value="sumut">Sumatera Utara</option>
                                    <option value="sumbar">Sumatera Barat</option>
                                    <option value="riau">Riau</option>
                                    <option value="jambi">Jambi</option>
                                    <option value="sumsel">Sumatera Selatan</option>
                                    <option value="bengkulu">Bengkulu</option>
                                    <option value="lampung">Lampung</option>
                                    <option value="jakarta">DKI Jakarta</option>
                                    <option value="jabar">Jawa Barat</option>
                                </select>
                                <label for="provinsi">Provinsi</label>
                                <div class="input-line"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Jenis Kelamin -->
                    <div class="form-group">
                        <div class="flex items-center mb-2">
                            <div class="icon-container bg-gradient-to-r from-blue-500 to-teal-500 mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <label class="text-sm text-gray-700 font-medium">Jenis Kelamin</label>
                        </div>
                        <div class="flex justify-center space-x-10">
                            <label class="gender-option">
                                <input type="radio" name="gender" value="male" class="hidden">
                                <div class="gender-selector">
                                    <div class="gender-icon male">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="7" r="5"></circle>
                                            <path d="M12 12v10"></path>
                                            <path d="M9 18h6"></path>
                                        </svg>
                                    </div>
                                    <span>Laki-laki</span>
                                </div>
                            </label>
                            <label class="gender-option">
                                <input type="radio" name="gender" value="female" class="hidden">
                                <div class="gender-selector">
                                    <div class="gender-icon female">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="8" r="5"></circle>
                                            <path d="M12 13v8"></path>
                                            <path d="M8 18h8"></path>
                                        </svg>
                                    </div>
                                    <span>Perempuan</span>
                                </div>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn">
                        <span class="submit-btn-content">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Kirim Pendaftaran</span>
                        </span>
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Success Popup -->
        <div id="successPopup" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 opacity-0 pointer-events-none transition-opacity duration-300">
            <div class="bg-white rounded-2xl p-8 max-w-md w-full transform scale-75 transition-transform duration-300">
                <div class="w-20 h-20 mx-auto mb-4 bg-green-100 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-500 animate-success-check" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-center text-gray-800 mb-2">Pendaftaran Berhasil!</h3>
                <p class="text-center text-gray-600 mb-6">Terima kasih telah mendaftar program Literasi dan Numerasi. Kami akan menghubungi Anda segera.</p>
                <button id="closePopup" class="w-full py-3 bg-gradient-to-r from-green-500 to-teal-500 text-white rounded-lg font-medium hover:shadow-lg transition-all duration-300">
                    Tutup
                </button>
            </div>
        </div>
        
        <style>
            @keyframes blob {
              0%, 100% { transform: scale(1) translate(0, 0); }
              25% { transform: scale(1.1) translate(20px, 15px); }
              50% { transform: scale(1) translate(0, 0); }
              75% { transform: scale(0.9) translate(-20px, 15px); }
            }
            
            .animate-blob {
              animation: blob 15s infinite;
            }
            
            .animation-delay-2000 {
              animation-delay: 2s;
            }
            
            .animation-delay-4000 {
              animation-delay: 4s;
            }
            
            .animation-delay-6000 {
              animation-delay: 6s;
            }
            
            @keyframes gradient-text {
              0%, 100% { background-position: 0% 50%; }
              50% { background-position: 100% 50%; }
            }
            
            .animate-gradient-text {
              background-size: 200% auto;
              animation: gradient-text 4s linear infinite;
            }
            
            .bg-grid-pattern {
              background-image: 
                linear-gradient(to right, rgba(100, 100, 100, 0.1) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(100, 100, 100, 0.1) 1px, transparent 1px);
              background-size: 20px 20px;
            }
            
            /* Form Styling */
            .form-group {
              position: relative;
              margin-bottom: 8px;
            }
            
            .input-container {
              display: flex;
              align-items: center;
              background-color: rgba(255, 255, 255, 0.7);
              border-radius: 12px;
              padding: 4px;
              box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
              transition: all 0.3s ease;
            }
            
            .input-container:hover, .input-container:focus-within {
              background-color: white;
              box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
              transform: translateY(-2px);
            }
            
            .icon-container {
              width: 48px;
              height: 48px;
              border-radius: 10px;
              display: flex;
              align-items: center;
              justify-content: center;
              color: white;
              margin-right: 12px;
              transition: all 0.3s ease;
            }
            
            .input-container:hover .icon-container,
            .input-container:focus-within .icon-container {
              transform: rotate(5deg) scale(1.1);
            }
            
            .input-wrapper {
              position: relative;
              flex: 1;
            }
            
            .input-wrapper input,
            .input-wrapper select {
              width: 100%;
              padding: 12px 0;
              border: none;
              background: transparent;
              outline: none;
              font-size: 16px;
              color: #333;
              font-weight: 500;
            }
            
            .input-wrapper label {
              position: absolute;
              left: 0;
              top: 50%;
              transform: translateY(-50%);
              color: #6b7280;
              font-size: 14px;
              pointer-events: none;
              transition: all 0.3s ease;
            }
            
            .input-wrapper input:focus + label,
            .input-wrapper input:not(:placeholder-shown) + label,
            .input-wrapper select:focus + label,
            .input-wrapper select:valid + label {
              top: 0;
              font-size: 12px;
              color: #3b82f6;
            }
            
            .input-line {
              position: absolute;
              bottom: 0;
              left: 0;
              width: 0;
              height: 2px;
              background: linear-gradient(to right, #3b82f6, #8b5cf6);
              transition: width 0.3s ease;
            }
            
            .input-wrapper input:focus ~ .input-line,
            .input-wrapper select:focus ~ .input-line {
              width: 100%;
            }
            
            /* Gender selector styling */
            .gender-option {
              cursor: pointer;
            }
            
            .gender-selector {
              display: flex;
              flex-direction: column;
              align-items: center;
              padding: 10px;
              border-radius: 12px;
              transition: all 0.3s ease;
            }
            
            .gender-icon {
              width: 60px;
              height: 60px;
              border-radius: 50%;
              background-color: #f3f4f6;
              display: flex;
              align-items: center;
              justify-content: center;
              margin-bottom: 8px;
              transition: all 0.3s ease;
            }
            
            .gender-icon svg {
              width: 30px;
              height: 30px;
              stroke: #6b7280;
              transition: all 0.3s ease;
            }
            
            .gender-option input:checked + .gender-selector {
              background-color: rgba(59, 130, 246, 0.1);
            }
            
            .gender-option input:checked + .gender-selector .gender-icon.male {
              background: linear-gradient(to right, #3b82f6, #2563eb);
            }
            
            .gender-option input:checked + .gender-selector .gender-icon.female {
              background: linear-gradient(to right, #ec4899, #db2777);
            }
            
            .gender-option input:checked + .gender-selector .gender-icon svg {
              stroke: white;
            }
            
            .gender-option:hover .gender-selector {
              background-color: rgba(59, 130, 246, 0.05);
            }
            
            .gender-option:hover .gender-icon {
              transform: scale(1.05);
            }
            
            /* Submit button styling */
            .submit-btn {
              width: 100%;
              position: relative;
              overflow: hidden;
              background: linear-gradient(to right, #3b82f6, #8b5cf6, #ec4899);
              background-size: 200% auto;
              padding: 16px;
              border-radius: 50px;
              color: white;
              font-weight: 600;
              font-size: 18px;
              transition: all 0.5s ease;
              margin-top: 12px;
              border: none;
              cursor: pointer;
            }
            
            .submit-btn:hover {
              background-position: right center;
              box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
              transform: translateY(-3px);
            }
            
            .submit-btn:active {
              transform: translateY(0);
            }
            
            .submit-btn-content {
              display: flex;
              align-items: center;
              justify-content: center;
              position: relative;
              z-index: 10;
            }
            
            .submit-btn::after {
              content: "";
              position: absolute;
              top: 50%;
              left: 50%;
              width: 10px;
              height: 10px;
              background: rgba(255, 255, 255, 0.3);
              border-radius: 50%;
              transform: translate(-50%, -50%) scale(0);
              opacity: 0;
              transition: all 0.5s ease;
            }
            
            .submit-btn:hover::after {
              transform: translate(-50%, -50%) scale(20);
              opacity: 0.3;
            }
            
            /* Success animation */
            @keyframes success-check {
              0% { stroke-dasharray: 0, 100; }
              50% { stroke-dasharray: 50, 100; }
              100% { stroke-dasharray: 100, 100; }
            }
            
            .animate-success-check {
              stroke-dasharray: 100;
              stroke-dashoffset: 0;
              animation: success-check 1s ease-in-out forwards;
            }
            
            /* Form card hover effect */
            .form-card {
              transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            }
            
            .form-card:hover {
              transform: translateY(-5px) rotateZ(0.5deg);
            }
            
            /* Dropdown styling */
            .dropdown-wrapper select {
              appearance: none;
              cursor: pointer;
            }
            
            .dropdown-wrapper {
              position: relative;
            }
            
            .dropdown-wrapper::after {
              content: '▼';
              position: absolute;
              right: 10px;
              top: 50%;
              transform: translateY(-50%);
              color: #6b7280;
              font-size: 12px;
              pointer-events: none;
              transition: all 0.3s ease;
            }
            
            .dropdown-wrapper:hover::after,
            .dropdown-wrapper:focus-within::after {
              color: #3b82f6;
              transform: translateY(-50%) rotate(180deg);
            }
            
            /* Responsive adjustments */
            @media (max-width: 640px) {
              .icon-container {
                width: 40px;
                height: 40px;
              }
              
              .icon-container svg {
                width: 20px;
                height: 20px;
              }
              
              .gender-icon {
                width: 50px;
                height: 50px;
              }
            }
        </style>
        
        <script>
            // Form validation and submission
            document.getElementById('registrationForm').addEventListener('submit', function(event) {
                event.preventDefault();
                
                // Add form submission animation
                const btn = document.querySelector('.submit-btn');
                btn.innerHTML = '<div class="flex items-center justify-center"><div class="animate-spin rounded-full h-5 w-5 border-t-2 border-b-2 border-white mr-2"></div> Memproses...</div>';
                
                // Simulate form submission delay
                setTimeout(function() {
                    // Show success popup
                    const popup = document.getElementById('successPopup');
                    popup.classList.remove('opacity-0', 'pointer-events-none');
                    popup.querySelector('div').classList.remove('scale-75');
                    popup.querySelector('div').classList.add('scale-100');
                    
                    // Reset form
                    document.getElementById('registrationForm').reset();
                    btn.innerHTML = '<span class="submit-btn-content"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg><span>Kirim Pendaftaran</span></span>';
                }, 1500);
            });
            
            // Close success popup
            document.getElementById('closePopup').addEventListener('click', function() {
                const popup = document.getElementById('successPopup');
                popup.querySelector('div').classList.remove('scale-100');
                popup.querySelector('div').classList.add('scale-75');
                setTimeout(function() {
                    popup.classList.add('opacity-0', 'pointer-events-none');
                }, 300);
            });
            
            // Add some interactive effects
            document.querySelectorAll('.input-container').forEach(container => {
                container.addEventListener('mouseenter', function() {
                    this.classList.add('pulse');
                    setTimeout(() => this.classList.remove('pulse'), 1000);
                });
            });
            
            // Create floating particles effect
            function createParticles() {
                const particlesContainer = document.getElementById('particles-js');
                const particleCount = 30;
                
                for (let i = 0; i < particleCount; i++) {
                    const particle = document.createElement('div');
                    const size = Math.random() * 5 + 2;
                    
                    // Random position
                    const posX = Math.random() * 100;
                    const posY = Math.random() * 100;
                    
                    // Random color (blue, purple, teal)
                    const colors = ['rgba(59, 130, 246, 0.3)', 'rgba(139, 92, 246, 0.3)', 'rgba(20, 184, 166, 0.3)'];
                    const color = colors[Math.floor(Math.random() * colors.length)];
                    
                    // Random animation duration
                    const duration = Math.random() * 20 + 10;
                    
                    // Apply styles
                    particle.style.cssText = `
                        position: absolute;
                        width: ${size}px;
                        height: ${size}px;
                        left: ${posX}%;
                        top: ${posY}%;
                        background-color: ${color};
                        border-radius: 50%;
                        filter: blur(1px);
                        opacity: 0.7;
                        animation: floatParticle ${duration}s linear infinite;
                    `;
                    
                    particlesContainer.appendChild(particle);
                }
            }
            
            // Animation for floating particles
            const style = document.createElement('style');
            style.textContent = `
                @keyframes floatParticle {
                    0% { transform: translateY(0) rotate(0deg); }
                    50% { transform: translateY(-40px) rotate(180deg); }
                    100% { transform: translateY(0) rotate(360deg); }
                }
            `;
            document.head.appendChild(style);
            
            // Initialize particles
            window.addEventListener('load', createParticles);
            
            // Input focus effects
            document.querySelectorAll('input, select').forEach(input => {
                input.addEventListener('focus', function() {
                    this.closest('.input-container').classList.add('ring-2', 'ring-blue-300', 'ring-offset-2');
                });
                
                input.addEventListener('blur', function() {
                    this.closest('.input-container').classList.remove('ring-2', 'ring-blue-300', 'ring-offset-2');
                });
            });
            
            // Add ripple effect to buttons
            function addRippleEffect(button) {
                button.addEventListener('click', function(e) {
                    const x = e.clientX - e.target.getBoundingClientRect().left;
                    const y = e.clientY - e.target.getBoundingClientRect().top;
                    
                    const ripple = document.createElement('span');
                    ripple.classList.add('ripple');
                    ripple.style.left = `${x}px`;
                    ripple.style.top = `${y}px`;
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => ripple.remove(), 600);
                });
            }
            
            // Add ripple to buttons
            document.querySelectorAll('button').forEach(button => {
                addRippleEffect(button);
            });
            
            // Animated background grid effect
            function createGrid() {
                const gridContainer = document.querySelector('.bg-grid-pattern');
                const gridSize = 20;
                const rows = Math.ceil(window.innerHeight / gridSize);
                const cols = Math.ceil(window.innerWidth / gridSize);
                
                for (let i = 0; i < rows * cols; i++) {
                    const dot = document.createElement('div');
                    dot.classList.add('grid-dot');
                    
                    const row = Math.floor(i / cols);
                    const col = i % cols;
                    
                    dot.style.cssText = `
                        position: absolute;
                        width: 2px;
                        height: 2px;
                        border-radius: 50%;
                        background-color: rgba(100, 100, 100, 0.2);
                        top: ${row * gridSize}px;
                        left: ${col * gridSize}px;
                        transition: transform 0.3s ease, opacity 0.3s ease;
                    `;
                    
                    gridContainer.appendChild(dot);
                }
            }
            
            // Interactive hover effect on the form card
            const formCard = document.querySelector('.form-card');
            formCard.addEventListener('mousemove', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                // Calculate the tilt
                const tiltX = (y / rect.height - 0.5) * 5;
                const tiltY = -(x / rect.width - 0.5) * 5;
                
                // Apply the tilt effect
                this.style.transform = `perspective(1000px) rotateX(${tiltX}deg) rotateY(${tiltY}deg) translateY(-5px)`;
                
                // Change highlight based on mouse position
                const highlight = `radial-gradient(circle at ${x}px ${y}px, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 60%)`;
                this.style.backgroundImage = highlight;
            });
            
            formCard.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(-5px) rotateZ(0.5deg)';
                this.style.backgroundImage = 'none';
            });
        </script>
    </section> --}}
    {{-- End Kolom Data Peserta --}}

    {{-- FAQ --}}
    <section id="faq" class="w-full px-5 py-16 bg-gray-50 shadow-lg">
        <!-- Header -->
        <div class="text-center mb-10">
            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                Pertanyaan Umum
            </span>
            <h2 class="text-3xl font-bold text-black mt-3">
                Frequently Asked Questions
            </h2>
            <p class="text-gray-900 mt-2">
                Temukan jawaban untuk pertanyaan yang sering diajukan tentang program TLC
            </p>
        </div>
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl shadow-sm">


            <!-- FAQ List -->
            <div class="space-y-4 text-left">
                <div
                    class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md active:scale-95">
                    <h3 class="text-blue-700 font-medium flex justify-between items-center">
                        Apa itu program Teaching and Learning Certification (TLC)?
                        <span class="faq-icon transition-transform duration-300">▼</span>
                    </h3>
                    <p class="faq-answer hidden mt-2 text-gray-600">
                        Program Teaching and Learning Certification (TLC) adalah program sertifikasi yang dirancang
                        untuk meningkatkan kompetensi guru dalam mengajar secara efektif.
                    </p>
                </div>

                <div
                    class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md active:scale-95">
                    <h3 class="text-blue-700 font-medium flex justify-between items-center">
                        Berapa lama durasi program TLC?
                        <span class="faq-icon transition-transform duration-300">▼</span>
                    </h3>
                    <p class="faq-answer hidden mt-2 text-gray-600">
                        Durasi program TLC bervariasi tergantung modul yang diambil, namun rata-rata berlangsung selama
                        3-6 bulan.
                    </p>
                </div>

                <div
                    class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md active:scale-95">
                    <h3 class="text-blue-700 font-medium flex justify-between items-center">
                        Apakah sertifikat TLC diakui secara resmi?
                        <span class="faq-icon transition-transform duration-300">▼</span>
                    </h3>
                    <p class="faq-answer hidden mt-2 text-gray-600">
                        Ya, sertifikat TLC diakui oleh berbagai lembaga pendidikan dan institusi profesional.
                    </p>
                </div>

                <div
                    class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md active:scale-95">
                    <h3 class="text-blue-700 font-medium flex justify-between items-center">
                        Bagaimana metode pembelajaran dalam program TLC?
                        <span class="faq-icon transition-transform duration-300">▼</span>
                    </h3>
                    <p class="faq-answer hidden mt-2 text-gray-600">
                        Program TLC menggunakan metode blended learning yang menggabungkan pembelajaran online dan tatap
                        muka.
                    </p>
                </div>

                <div
                    class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md active:scale-95">
                    <h3 class="text-blue-700 font-medium flex justify-between items-center">
                        Siapa saja yang dapat mengikuti program TLC?
                        <span class="faq-icon transition-transform duration-300">▼</span>
                    </h3>
                    <p class="faq-answer hidden mt-2 text-gray-600">
                        Program ini terbuka untuk semua pendidik, baik guru baru maupun yang berpengalaman.
                    </p>
                </div>

                <div
                    class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md active:scale-95">
                    <h3 class="text-blue-700 font-medium flex justify-between items-center">
                        Apakah ada prasyarat untuk mengikuti program TLC?
                        <span class="faq-icon transition-transform duration-300">▼</span>
                    </h3>
                    <p class="faq-answer hidden mt-2 text-gray-600">
                        Tidak ada prasyarat khusus, namun pengalaman mengajar sebelumnya akan menjadi nilai tambah.
                    </p>
                </div>
            </div>
        </div>

        <!-- Script untuk Interaktif FAQ -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let faqItems = document.querySelectorAll(".faq-item");

                faqItems.forEach(item => {
                    item.addEventListener("click", function() {
                        let answer = this.querySelector(".faq-answer");
                        let icon = this.querySelector(".faq-icon");

                        // Tutup semua jawaban yang lain sebelum membuka yang diklik
                        document.querySelectorAll(".faq-answer").forEach(ans => {
                            if (ans !== answer) {
                                ans.classList.add("hidden");
                                ans.style.opacity = "0";
                                ans.parentElement.querySelector(".faq-icon").style.transform =
                                    "rotate(0deg)";
                            }
                        });

                        if (answer.classList.contains("hidden")) {
                            answer.classList.remove("hidden");
                            answer.style.opacity = "1";
                            icon.style.transform = "rotate(180deg)";
                        } else {
                            answer.classList.add("hidden");
                            answer.style.opacity = "0";
                            icon.style.transform = "rotate(0deg)";
                        }
                    });
                });
            });
        </script>
    </section>
    {{-- End FAQ --}}

    {{-- Footer --}}
    {{-- <footer class="bg-blue-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Column 1: Logo and Description -->
            <div>
                <h2 class="flex items-center text-xl font-bold mb-4">
                    <span class="text-amber-500 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </span>
                    LiterasiNumerasi
                </h2>
                <p class="text-gray-300 mb-6">
                    Program literasi dan numerasi untuk membantu anak-anak mengembangkan kemampuan membaca, menulis, dan
                    berhitung dengan cara yang menyenangkan.
                </p>
                <!-- Social Media Icons -->
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-300 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-facebook" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-instagram" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-youtube" viewBox="0 0 16 16">
                            <path
                                d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-twitter" viewBox="0 0 16 16">
                            <path
                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Column 2: Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4 text-amber-500">Tautan Cepat</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-white">Beranda</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Pengertian</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Pendaftaran</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Video</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Galeri</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">FAQ</a></li>
                </ul>
            </div>

            <!-- Column 3: Our Programs -->
            <div>
                <h3 class="text-lg font-semibold mb-4 text-amber-500">Program Kami</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-white">Program Literasi Dasar</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Program Numerasi Dasar</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Program Literasi Lanjutan</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Program Numerasi Lanjutan</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Kelas Khusus</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Kelas Liburan</a></li>
                </ul>
            </div>

            <!-- Column 4: Contact Us -->
            <div>
                <h3 class="text-lg font-semibold mb-4 text-amber-500">Hubungi Kami</h3>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-500 mr-2 flex-shrink-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Jl. Pendidikan No. 123, Jakarta Selatan, Indonesia</span>
                    </li>
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-500 mr-2 flex-shrink-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span>+62 812 3456 7890</span>
                    </li>
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-500 mr-2 flex-shrink-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>info@literasinumerasi.id</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="max-w-7xl mx-auto px-4 pt-8 mt-8 border-t border-blue-800 text-center">
            <p class="text-gray-400">© 2025 Program Literasi dan Numerasi. Hak Cipta Dilindungi.</p>
        </div>
    </footer> --}}
    <footer class="bg-gradient-to-r from-blue-700 to-blue-900 text-white py-10 relative">
        <!-- Accent color bar at top -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-yellow-400 via-orange-500 to-yellow-500"></div>

        <!-- Background pattern -->
        <div class="absolute inset-0 opacity-5">
            <div
                class="w-full h-full bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNiAxOGMzLjMxNCAwIDYtMi42ODYgNi02cy0yLjY4Ni02LTYtNmMtMy4zMTQgMC02IDIuNjg2LTYgNnMyLjY4NiA2IDYgNnptMCAwIiBzdHJva2U9IiNmZmYiIHN0cm9rZS1vcGFjaXR5PSIuNSIvPjxwYXRoIGQ9Ik0yNCAzNmMzLjMxNCAwIDYtMi42ODYgNi02cy0yLjY4Ni02LTYtNmMtMy4zMTQgMC02IDIuNjg2LTYgNnMyLjY4NiA2IDYgNnptMCAwIiBzdHJva2U9IiNmZmYiIHN0cm9rZS1vcGFjaXR5PSIuNSIvPjwvZz48L3N2Zz4=')]">
            </div>
        </div>

        <div class="container max-w-6xl mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand - Column 1 -->
                <div class="space-y-3 transform transition-all duration-300 hover:scale-105">
                    <div class="flex flex-col items-start mb-4">
                        <h2 class="text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-blue-800 mb-1"
                            style="text-shadow: 1px 1px 2px rgba(255,255,255,0.2);">
                            <span class="text-white">H</span><span
                                class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 via-orange-500 to-yellow-500">A</span><span
                                class="text-white">FECS</span>
                        </h2>
                        <p class="text-yellow-400 italic text-sm">Nurturing Mind, Enriching Knowledge</p>
                    </div>
                    <p class="text-gray-200 leading-relaxed mb-4 text-sm">
                        Membangun fondasi kuat untuk masa depan anak-anak Indonesia melalui kemampuan literasi dan numerasi
                        yang menyenangkan.
                    </p>
                    <div class="flex space-x-3 mt-3">
                        <a href="#"
                            class="w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-800 hover:from-yellow-400 hover:to-orange-500 rounded-lg flex items-center justify-center transition-all duration-300 hover:rotate-6 shadow-lg hover:shadow-xl">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-800 hover:from-yellow-400 hover:to-orange-500 rounded-lg flex items-center justify-center transition-all duration-300 hover:rotate-6 shadow-lg hover:shadow-xl">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-800 hover:from-yellow-400 hover:to-orange-500 rounded-lg flex items-center justify-center transition-all duration-300 hover:rotate-6 shadow-lg hover:shadow-xl">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-800 hover:from-yellow-400 hover:to-orange-500 rounded-lg flex items-center justify-center transition-all duration-300 hover:rotate-6 shadow-lg hover:shadow-xl">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Program - Column 2 -->
                <div class="md:flex md:justify-center">
                    <div class="space-y-3">
                        <h2
                            class="text-xl font-bold mb-5 border-b-2 border-yellow-400 pb-2 inline-block transform transition-all duration-300 hover:scale-105">
                            Program</h2>
                        <ul class="space-y-3 text-sm">
                            <li class="group">
                                <a href="#"
                                    class="flex items-center space-x-2 text-gray-200 hover:text-yellow-400 transition-colors duration-300">
                                    <div
                                        class="w-2 h-2 bg-yellow-400 transform rotate-45 group-hover:rotate-90 transition-transform duration-300">
                                    </div>
                                    <span
                                        class="transform group-hover:translate-x-2 transition-transform duration-300">Literasi
                                        Dasar</span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#"
                                    class="flex items-center space-x-2 text-gray-200 hover:text-yellow-400 transition-colors duration-300">
                                    <div
                                        class="w-2 h-2 bg-yellow-400 transform rotate-45 group-hover:rotate-90 transition-transform duration-300">
                                    </div>
                                    <span
                                        class="transform group-hover:translate-x-2 transition-transform duration-300">Numerasi
                                        Dasar</span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#"
                                    class="flex items-center space-x-2 text-gray-200 hover:text-yellow-400 transition-colors duration-300">
                                    <div
                                        class="w-2 h-2 bg-yellow-400 transform rotate-45 group-hover:rotate-90 transition-transform duration-300">
                                    </div>
                                    <span
                                        class="transform group-hover:translate-x-2 transition-transform duration-300">Program
                                        Intensif</span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#"
                                    class="flex items-center space-x-2 text-gray-200 hover:text-yellow-400 transition-colors duration-300">
                                    <div
                                        class="w-2 h-2 bg-yellow-400 transform rotate-45 group-hover:rotate-90 transition-transform duration-300">
                                    </div>
                                    <span
                                        class="transform group-hover:translate-x-2 transition-transform duration-300">Kelas
                                        Khusus</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Tautan - Column 3 -->
                <div class="md:flex md:justify-center">
                    <div class="space-y-3">
                        <h2
                            class="text-xl font-bold mb-5 border-b-2 border-yellow-400 pb-2 inline-block transform transition-all duration-300 hover:scale-105">
                            Tautan</h2>
                        <ul class="space-y-3 text-sm">
                            <li class="group">
                                <a href="#"
                                    class="flex items-center space-x-2 text-gray-200 hover:text-yellow-400 transition-colors duration-300">
                                    <div
                                        class="w-2 h-2 bg-yellow-400 transform rotate-45 group-hover:rotate-90 transition-transform duration-300">
                                    </div>
                                    <span
                                        class="transform group-hover:translate-x-2 transition-transform duration-300">Beranda</span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#"
                                    class="flex items-center space-x-2 text-gray-200 hover:text-yellow-400 transition-colors duration-300">
                                    <div
                                        class="w-2 h-2 bg-yellow-400 transform rotate-45 group-hover:rotate-90 transition-transform duration-300">
                                    </div>
                                    <span
                                        class="transform group-hover:translate-x-2 transition-transform duration-300">Tentang</span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#"
                                    class="flex items-center space-x-2 text-gray-200 hover:text-yellow-400 transition-colors duration-300">
                                    <div
                                        class="w-2 h-2 bg-yellow-400 transform rotate-45 group-hover:rotate-90 transition-transform duration-300">
                                    </div>
                                    <span
                                        class="transform group-hover:translate-x-2 transition-transform duration-300">Pendaftaran</span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#"
                                    class="flex items-center space-x-2 text-gray-200 hover:text-yellow-400 transition-colors duration-300">
                                    <div
                                        class="w-2 h-2 bg-yellow-400 transform rotate-45 group-hover:rotate-90 transition-transform duration-300">
                                    </div>
                                    <span
                                        class="transform group-hover:translate-x-2 transition-transform duration-300">Galeri</span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#"
                                    class="flex items-center space-x-2 text-gray-200 hover:text-yellow-400 transition-colors duration-300">
                                    <div
                                        class="w-2 h-2 bg-yellow-400 transform rotate-45 group-hover:rotate-90 transition-transform duration-300">
                                    </div>
                                    <span
                                        class="transform group-hover:translate-x-2 transition-transform duration-300">FAQ</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Kontak - Column 4 -->
                <div class="space-y-5">
                    <h2
                        class="text-xl font-bold mb-5 border-b-2 border-yellow-400 pb-2 inline-block transform transition-all duration-300 hover:scale-105">
                        Kontak</h2>
                    <ul class="space-y-4 text-sm">
                        <li class="group flex items-start">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-blue-600 to-blue-800 group-hover:from-yellow-400 group-hover:to-orange-500 rounded-lg flex items-center justify-center mr-3 flex-shrink-0 transition-all duration-300 group-hover:rotate-6 shadow-lg group-hover:shadow-xl">
                                <i class="fas fa-map-marker-alt text-white group-hover:animate-pulse"></i>
                            </div>
                            <span class="text-gray-200 group-hover:text-yellow-400 transition-colors duration-300">
                                Jl. Pendidikan No. 123, Jakarta Pusat, Indonesia
                            </span>
                        </li>
                        <li class="group flex items-center">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-blue-600 to-blue-800 group-hover:from-yellow-400 group-hover:to-orange-500 rounded-lg flex items-center justify-center mr-3 flex-shrink-0 transition-all duration-300 group-hover:rotate-6 shadow-lg group-hover:shadow-xl">
                                <i class="fas fa-phone-alt text-white group-hover:animate-pulse"></i>
                            </div>
                            <span class="text-gray-200 group-hover:text-yellow-400 transition-colors duration-300">
                                +62 123 4567 890
                            </span>
                        </li>
                        <li class="group flex items-center">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-blue-600 to-blue-800 group-hover:from-yellow-400 group-hover:to-orange-500 rounded-lg flex items-center justify-center mr-3 flex-shrink-0 transition-all duration-300 group-hover:rotate-6 shadow-lg group-hover:shadow-xl">
                                <i class="fas fa-envelope text-white group-hover:animate-pulse"></i>
                            </div>
                            <span class="text-gray-200 group-hover:text-yellow-400 transition-colors duration-300">
                                research@hafecs.id
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-8 pt-4 border-t border-blue-600 text-center">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-300 text-sm">© 2025 HAFECS Research & Publication. All rights reserved.</p>
                    <div class="mt-3 md:mt-0 space-x-2">
                        <a href="#"
                            class="text-gray-300 text-sm hover:text-yellow-400 transition-colors duration-300">Kebijakan
                            Privasi</a>
                        <span class="text-gray-500">|</span>
                        <a href="#"
                            class="text-gray-300 text-sm hover:text-yellow-400 transition-colors duration-300">Syarat &
                            Ketentuan</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- FontAwesome Script untuk Icon -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" crossorigin="anonymous"></script>
    </footer>
    {{-- end Footer --}}
@endsection
