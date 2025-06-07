@extends('layouts.adminDashboardLayouts')

@push('scripts')
    <script src="//unpkg.com/alpinejs" defer></script>
@endpush

@section('content')
    <div class="p-4 bg-white rounded-lg mb-2">
        <nav class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mt-4 text-base">
            <!-- Breadcrumb -->
            <ol class="flex items-center space-x-1 text-indigo-600">
                <li><a href="{{ route('admin.dashboard.jenjang.sd.index') }}" class="hover:underline">SD</a></li>
                <li>/</li>
                <li><a href="{{ route('admin.dashboard.jenjang.smp.index') }}" class="hover:underline">SMP</a></li>
                <li>/</li>
                <li><a href="{{ route('admin.dashboard.jenjang.sma.index') }}" class="hover:underline">SMA</a></li>
            </ol>

            <!-- Search & Info -->
            <div class="flex flex-wrap items-center gap-3">
                <!-- Search -->
                <form action="#" method="GET" class="relative flex items-center space-x-2">
                    <div>
                        <input type="text" name="keyword"
                            class="pl-9 pr-3 py-2 rounded-md border border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Cari Exam...">
                        <div class="absolute left-2.5 top-2 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <select id="jenjang" name="jenjang"
                            class="py-2 rounded-md border border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Semua Kategori</option>
                            <option value="SD" {{ request('jenjang') == 'SD' ? 'selected' : '' }}>
                                SD
                            </option>
                            <option value="SMP" {{ request('jenjang') == 'SMP' ? 'selected' : '' }}>
                                SMP
                            </option>
                            <option value="SMA" {{ request('jenjang') == 'SMA' ? 'selected' : '' }}>
                                SMA
                            </option>
                        </select>
                    </div>
                    <div>
                        <select id="category" name="category"
                            class="py-2 rounded-md border border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">All Kategori</option>
                            @forelse ($categories as $id => $name)
                                <option value="{{ $id }}" {{ request('kategori') == $id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @empty
                                <option value="">All Kategori</option>
                            @endforelse

                        </select>
                    </div>
                    <button class="px-3 py-1.5 bg-blue-600 text-white text-sm rounded">
                        Filter
                    </button>
                </form>

                <!-- Total Soals -->
                <div class="text-gray-600 text-sm flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Total Exam : {{ $examCount }}
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-2">
                    {{-- <a href="#" data-popover-target="popover-addUser" data-popover-trigger="hover">
                        <button class="px-3 py-1.5 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700">
                            + Tambah Student
                        </button>
                    </a> --}}
                    <button class="px-3 py-1.5 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700"
                        data-popover-target="popover-exportImport" data-popover-trigger="hover">
                        Export
                    </button>
                </div>
            </div>
        </nav>
    </div>

    <!-- User Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-indigo-600 to-blue-500">
                    <thead class="bg-gradient-to-r from-indigo-600 to-blue-500">
                        <tr>
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                                No
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                                Nama
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                                Jenjang Pendidikan
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                                Category
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                                Skor
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                                Waktu Mulai
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                                Waktu Selesai
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                                Durasi Pengerjaan
                            </th>
                        </tr>
                    </thead>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($exam as $index)
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $index->user->name }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $index->user->jenjang_pendidikan }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $index->category->name }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ Str::ucfirst($index->status) }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $index->score }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $index->start_time ? $index->start_time->format('d M Y H:i') : '-' }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $index->end_time ? $index->end_time->format('d M Y H:i') : '-' }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                @if ($index->start_time && $index->end_time)
                                    {{ ceil($index->start_time->floatDiffInMinutes($index->end_time)) }} menit
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-4 py-3 text-center text-sm text-gray-500">
                                Tidak ada data siswa yang ditemukan.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $exam->links() }}
    </div>

    <!-- Popovers -->
    {{-- <div data-popover id="popover-addUser" role="tooltip"
        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
        <div class="px-3 py-2 bg-indigo-50 border-b border-gray-200 rounded-t-lg">
            <h3 class="font-semibold text-indigo-600">Tambah Student</h3>
        </div>
        <div class="px-3 py-2">
            <p>Tindakan ini akan menambahkan Student baru.</p>
        </div>
        <div data-popper-arrow></div>
    </div> --}}

    {{-- <div data-popover id="popover-exportImport" role="tooltip"
        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-lg opacity-0 transform scale-95 hover:scale-100 focus:scale-100">
        <div class="px-4 py-2 bg-blue-50 border-b border-gray-200 rounded-t-lg">
            <h3 class="font-semibold text-blue-600">Export Data Exam</h3>
        </div>
        <div class="px-4 py-2">
            <p class="text-gray-600 mb-4">Tindakan ini akan membuat file excel dari data soal.</p>
            <div class="flex space-x-2">
                <button
                    class="px-4 py-2 w-full bg-green-600 text-white text-sm font-medium rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                    Import
                </button>
            </div>
        </div>
        <div data-popper-arrow></div>
    </div> --}}

    <!-- Image Modal -->
    <div id="imageModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-4 rounded shadow relative max-w-md w-full">
            <button onclick="closeImageModal()" class="absolute top-2 right-2 text-gray-600 hover:text-black">✖</button>
            <img id="modalImage" src="" class="max-w-full h-auto rounded" alt="Gambar Soal">
        </div>
    </div>

    <script>
        function showImageModal(imageUrl) {
            const modal = document.getElementById('imageModal');
            const img = document.getElementById('modalImage');
            img.src = imageUrl;
            modal.classList.remove('hidden');
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.add('hidden');
        }
    </script>
@endsection
