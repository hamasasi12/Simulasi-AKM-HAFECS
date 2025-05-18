@extends('layouts.adminDashboardLayouts')

@section('content')
    <div class="p-6 bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl shadow-lg mb-6 mt-16">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-white mb-2">Selamat Datang, Admin!</h1>
                <p class="text-blue-100">Kelola dan pantau aktivitas platform  dari satu tempat</p>
            </div>
            <div class="mt-4 md:mt-0">
                <span class="bg-blue-900 bg-opacity-50 text-white px-4 py-2 rounded-lg">
                    <i class="fas fa-calendar-alt mr-2"></i>{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
                </span>
            </div>
        </div>
    </div>


    <!-- Stats Overview Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- Asesi Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-5 bg-gradient-to-r from-purple-500 to-purple-700">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold text-white">Jenjang SD</h3>
                    <div class="bg-white bg-opacity-30 p-3 rounded-full">
                        <i class="fas fa-user-graduate text-white text-xl"></i>
                    </div>
                </div>
            </div>
            <div class="p-5">
                <div class="flex items-center">
                    <span class="text-3xl font-bold text-gray-800">#</span>

                </div>
            </div>
        </div>

        <!-- Asesor Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-5 bg-gradient-to-r from-blue-500 to-blue-700">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold text-white">Jenjang SMP</h3>
                    <div class="bg-white bg-opacity-30 p-3 rounded-full">
                        <i class="fas fa-user-graduate text-white text-xl"></i>
                    </div>
                </div>
            </div>
            <div class="p-5">
                <div class="flex items-center">
                    <span class="text-3xl font-bold text-gray-800">#</span>

                </div>
            </div>
        </div>

        <!-- Admin Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-5 bg-gradient-to-r from-orange-500 to-orange-700">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold text-white">Jenjang SMA/SMK</h3>
                    <div class="bg-white bg-opacity-30 p-3 rounded-full">
                        <i class="fas fa-user-graduate text-white text-xl"></i>
                    </div>
                </div>
            </div>
            <div class="p-5">
                <div class="flex items-center">
                    <span class="text-3xl font-bold text-gray-800">#</span>

                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <!-- Activity Chart -->
        <div class="bg-white rounded-xl shadow-md p-6 lg:col-span-2">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-gray-800">Aktivitas Pengguna</h3>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 bg-blue-100 text-blue-600 rounded-lg text-sm font-medium">Minggu Ini</button>
                    <button class="px-3 py-1 bg-gray-100 text-gray-600 rounded-lg text-sm font-medium">Bulan Ini</button>
                </div>
            </div>
            <div class="h-64 w-full bg-gray-50 rounded-lg flex items-center justify-center">
                <!-- Placeholder for chart -->
                <p class="text-gray-400">Grafik aktivitas pengguna akan ditampilkan di sini</p>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Aktivitas Terbaru</h3>
            <div class="space-y-4">
                <div class="flex items-start">
                    <div class="bg-green-100 p-2 rounded-full mr-3">
                        <i class="fas fa-user-plus text-green-600"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium">Pendaftaran baru</p>
                        <p class="text-xs text-gray-500">5 menit yang lalu</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-blue-100 p-2 rounded-full mr-3">
                        <i class="fas fa-certificate text-blue-600"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium">Sertifikasi selesai</p>
                        <p class="text-xs text-gray-500">1 jam yang lalu</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-purple-100 p-2 rounded-full mr-3">
                        <i class="fas fa-comment-alt text-purple-600"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium">Pesan baru</p>
                        <p class="text-xs text-gray-500">3 jam yang lalu</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-yellow-100 p-2 rounded-full mr-3">
                        <i class="fas fa-exclamation-triangle text-yellow-600"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium">Peringatan sistem</p>
                        <p class="text-xs text-gray-500">5 jam yang lalu</p>
                    </div>
                </div>
            </div>
            <button class="w-full mt-4 text-sm text-blue-600 hover:text-blue-800">Lihat semua aktivitas</button>
        </div>
    </div>

    <!-- Statistik Sertifikasi dan Tabel Pengguna Terbaru -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <!-- Statistik Sertifikasi -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Status Sertifikasi</h3>
            <div class="space-y-4">
                <!-- Sertifikasi Selesai -->
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-sm font-medium text-gray-700">Selesai</span>
                        <span class="text-sm font-medium text-gray-700">65%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 65%"></div>
                    </div>
                </div>

                <!-- Sertifikasi Dalam Proses -->
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-sm font-medium text-gray-700">Dalam Proses</span>
                        <span class="text-sm font-medium text-gray-700">25%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-yellow-500 h-2.5 rounded-full" style="width: 25%"></div>
                    </div>
                </div>

                <!-- Sertifikasi Belum Dimulai -->
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-sm font-medium text-gray-700">Belum Dimulai</span>
                        <span class="text-sm font-medium text-gray-700">10%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-gray-400 h-2.5 rounded-full" style="width: 10%"></div>
                    </div>
                </div>
            </div>

            <div class="mt-6 pt-4 border-t border-gray-200">
                <h4 class="text-sm font-semibold text-gray-800 mb-3">Distribusi Level</h4>
                <div class="grid grid-cols-3 gap-2 text-center">
                    <div class="bg-blue-50 p-2 rounded-lg">
                        <span class="block text-xl font-bold text-blue-600">42%</span>
                        <span class="text-xs text-gray-600">Level A</span>
                    </div>
                    <div class="bg-purple-50 p-2 rounded-lg">
                        <span class="block text-xl font-bold text-purple-600">35%</span>
                        <span class="text-xs text-gray-600">Level B</span>
                    </div>
                    <div class="bg-green-50 p-2 rounded-lg">
                        <span class="block text-xl font-bold text-green-600">23%</span>
                        <span class="text-xs text-gray-600">Level C</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Pengguna Terbaru -->
        {{-- @livewire('asesi-table') --}}
    </div>
@endsection
