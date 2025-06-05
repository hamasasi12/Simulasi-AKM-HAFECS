@extends('layouts.adminDashboardLayouts')

@section('content')
    <div class="max-w-5xl mx-auto px-4 pt-6 mt-4">
        <!-- Header with breadcrumb -->
        <div
            class="flex items-center justify-between p-4 mb-6 bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl shadow-lg">
            <a href="{{ route('admin.users.index') }}"
                class="inline-flex items-center px-4 py-2 rounded-lg bg-white text-blue-800 hover:bg-blue-50 transition-colors duration-200 shadow">
                <i class="mr-2 fa-solid fa-arrow-left-long"></i> Kembali
            </a>
            <h1 class="text-xl font-bold text-white sm:text-2xl">Detail Pengguna</h1>
            <div class="flex space-x-2">
                <a href=""
                    class="inline-flex items-center px-4 py-2 rounded-lg bg-yellow-500 text-white hover:bg-yellow-600 transition-colors duration-200 shadow">
                    <i class="mr-2 fa-solid fa-pen-to-square"></i> Edit
                </a>
                <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" class="inline"
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 rounded-lg bg-red-500 text-white hover:bg-red-600 transition-colors duration-200 shadow">
                        <i class="mr-2 fa-solid fa-trash"></i> Hapus
                    </button>
                </form>
            </div>
        </div>

        <!-- Main detail card -->
        <div class="bg-white border border-gray-100 rounded-xl shadow-md overflow-hidden">
            <!-- Card header -->
            <div class="bg-gradient-to-r from-gray-50 to-white p-4 border-b border-gray-100">
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Informasi Pengguna
                </h3>
            </div>

            <!-- Card body -->
            <div class="p-6">
                <div class="space-y-8">
                    <!-- User Information Section -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <div class="grid grid-cols-1 gap-6">
                            <!-- Basic Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">Nama Lengkap</h4>
                                    <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm">
                                        <p>{{ $user->name }}</p>
                                    </div>
                                </div>

                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">Email</h4>
                                    <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm">
                                        <p>{{ $user->email }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">Kelas</h4>
                                    <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm">
                                        <p>{{ $user->kelas }}</p>
                                    </div>
                                </div>

                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">Asal Sekolah</h4>
                                    <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm">
                                        <p>{{ $user->asal_sekolah }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">Jenjang Pendidikan</h4>
                                    <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm">
                                        <p>{{ $user->jenjang_pendidikan }}</p>
                                    </div>
                                </div>

                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">Token</h4>
                                    <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm">
                                        <p class="font-semibold text-red-500">{{ $user->token }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">Provinsi</h4>
                                    <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm">
                                        <p>{{ $user->provinsi }}</p>
                                    </div>
                                </div>

                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">Kabupaten</h4>
                                    <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm">
                                        <p>{{ $user->kabupaten }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">Kecamatan</h4>
                                    <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm">
                                        <p>{{ $user->kecamatan }}</p>
                                    </div>
                                </div>

                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">Kelurahan</h4>
                                    <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm">
                                        <p>{{ $user->kelurahan }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">Jenis Kelamin</h4>
                                    <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm">
                                        <p>{{ $user->jenis_kelamin }}</p>
                                    </div>
                                </div>

                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">Akun Dibuat Pada</h4>
                                    <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm">
                                        <p>{{ $user->created_at->format('d F Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Other Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">Jenis Kelamin</h4>
                                    <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm">
                                        <p>{{ $user->jenis_kelamin ?? '-' }}</p>
                                    </div>
                                </div>

                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">Token</h4>
                                    <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm">
                                        <p>{{ $user->token ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Add smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }
    </style>
@endsection
