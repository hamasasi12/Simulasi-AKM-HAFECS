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
                    <span class="text-3xl font-bold text-gray-800">{{ $SD }}</span>
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
                    <span class="text-3xl font-bold text-gray-800">{{ $SMP }}</span>

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
                    <span class="text-3xl font-bold text-gray-800">{{ $SMA }}</span>

                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <!-- Activity Chart -->
        <div class="bg-white rounded-xl shadow-md p-6 lg:col-span-2">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold text-gray-800">Riwayat Pengguna</h3>
        <div class="flex space-x-2">
            <button class="px-3 py-1 bg-blue-100 text-blue-600 rounded-lg text-sm font-medium">Terbaru</button>
            <button class="px-3 py-1 bg-gray-100 text-gray-600 rounded-lg text-sm font-medium">Semua</button>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        @if($users->count() > 0)
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-50 border-b">
                        <th class="text-left px-4 py-3 text-sm font-semibold text-gray-600">No</th>
                        <th class="text-left px-4 py-3 text-sm font-semibold text-gray-600">Nama</th>
                        <th class="text-left px-4 py-3 text-sm font-semibold text-gray-600">Email</th>
                        <th class="text-left px-4 py-3 text-sm font-semibold text-gray-600">Kelas</th>
                        <th class="text-left px-4 py-3 text-sm font-semibold text-gray-600">Sekolah</th>
                        <th class="text-left px-4 py-3 text-sm font-semibold text-gray-600">Jenjang</th>
                        <th class="text-left px-4 py-3 text-sm font-semibold text-gray-600">Lokasi</th>
                        <th class="text-left px-4 py-3 text-sm font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                        <tr class="border-b hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $index + 1 }}</td>
                            <td class="px-4 py-3">
                                <div class="flex flex-col">
                                    <span class="text-sm font-medium text-gray-800">{{ $user->name }}</span>
                                    <span class="text-xs text-gray-500">{{ $user->nama_siswa ?? 'N/A' }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $user->email }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">
                                    {{ $user->kelas ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $user->asal_sekolah ?? 'N/A' }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">
                                    {{ $user->jenjang_pendidikan ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="text-xs text-gray-600">
                                    <div>{{ $user->kabupaten ?? 'N/A' }}, {{ $user->provinsi ?? 'N/A' }}</div>
                                    <div class="text-gray-400">{{ $user->kecamatan ?? 'N/A' }}, {{ $user->kelurahan ?? 'N/A' }}</div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex space-x-2">
                                    <button class="text-blue-600 hover:text-blue-800 text-sm">Detail</button>
                                    <button class="text-red-600 hover:text-red-800 text-sm">Hapus</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <!-- Pagination -->
            <div class="mt-4 flex justify-center">
                {{ $users->links() }}
            </div>
        @else
            <div class="h-64 w-full bg-gray-50 rounded-lg flex items-center justify-center">
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-2.239" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada data pengguna</h3>
                    <p class="mt-1 text-sm text-gray-500">Belum ada pengguna yang terdaftar dalam sistem.</p>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Modal Detail User (Optional) -->
<div id="userDetailModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-gray-900">Detail Pengguna</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="modalContent" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Content will be populated by JavaScript -->
            </div>
        </div>
    </div>
</div>

<script>
function showUserDetail(user) {
    const modal = document.getElementById('userDetailModal');
    const content = document.getElementById('modalContent');
    
    content.innerHTML = `
        <div class="space-y-3">
            <div>
                <label class="text-sm font-medium text-gray-500">Nama Lengkap</label>
                <p class="text-gray-900">${user.name || 'N/A'}</p>
            </div>
            <div>
                <label class="text-sm font-medium text-gray-500">Nama Siswa</label>
                <p class="text-gray-900">${user.nama_siswa || 'N/A'}</p>
            </div>
            <div>
                <label class="text-sm font-medium text-gray-500">Email</label>
                <p class="text-gray-900">${user.email || 'N/A'}</p>
            </div>
            <div>
                <label class="text-sm font-medium text-gray-500">Kelas</label>
                <p class="text-gray-900">${user.kelas || 'N/A'}</p>
            </div>
            <div>
                <label class="text-sm font-medium text-gray-500">Asal Sekolah</label>
                <p class="text-gray-900">${user.asal_sekolah || 'N/A'}</p>
            </div>
            <div>
                <label class="text-sm font-medium text-gray-500">Jenjang Pendidikan</label>
                <p class="text-gray-900">${user.jenjang_pendidikan || 'N/A'}</p>
            </div>
        </div>
        <div class="space-y-3">
            <div>
                <label class="text-sm font-medium text-gray-500">Jenis Kelamin</label>
                <p class="text-gray-900">${user.jenis_kelamin || 'N/A'}</p>
            </div>
            <div>
                <label class="text-sm font-medium text-gray-500">Provinsi</label>
                <p class="text-gray-900">${user.provinsi || 'N/A'}</p>
            </div>
            <div>
                <label class="text-sm font-medium text-gray-500">Kabupaten</label>
                <p class="text-gray-900">${user.kabupaten || 'N/A'}</p>
            </div>
            <div>
                <label class="text-sm font-medium text-gray-500">Kecamatan</label>
                <p class="text-gray-900">${user.kecamatan || 'N/A'}</p>
            </div>
            <div>
                <label class="text-sm font-medium text-gray-500">Kelurahan</label>
                <p class="text-gray-900">${user.kelurahan || 'N/A'}</p>
            </div>
            <div>
                <label class="text-sm font-medium text-gray-500">Token</label>
                <p class="text-gray-900 text-xs font-mono bg-gray-100 p-2 rounded">${user.token || 'N/A'}</p>
            </div>
        </div>
    `;
    
    modal.classList.remove('hidden');
}

function closeModal() {
    document.getElementById('userDetailModal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('userDetailModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});
</script>

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
  
@endsection
