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
                <form action="{{ route('admin.users.index') }}" method="GET" class="relative flex items-center space-x-2">
                    <div>
                        <input type="text" name="keyword"
                            class="pl-9 pr-3 py-2 rounded-md border border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Cari students...">
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
                    Total students : {{ $users->count() }}
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.users.create') }}" data-popover-target="popover-addUser" data-popover-trigger="hover">
                        <button class="px-3 py-1.5 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700">
                            + Tambah Student
                        </button>
                    </a>
                    <button class="px-3 py-1.5 border text-gray-600 text-sm rounded hover:bg-gray-50"
                        data-popover-target="popover-exportImport" data-popover-trigger="hover">
                        Export/Import
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
                    <tr>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            ID
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Nama Siswa
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Token
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Asal Sekolah
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Jenjang Pendidikan
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Jenis Kelamin
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($users as $index)
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $index->name }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $index->token }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $index->asal_sekolah }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $index->jenjang_pendidikan }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm">
                                @if (strtolower($index->jenis_kelamin) == 'laki-laki')
                                    <span
                                        class="inline-block px-3 py-1 text-blue-800 bg-blue-100 rounded-full font-semibold">
                                        {{ $index->jenis_kelamin }}
                                    </span>
                                @elseif(strtolower($index->jenis_kelamin) == 'perempuan')
                                    <span
                                        class="inline-block px-3 py-1 text-pink-800 bg-pink-100 rounded-full font-semibold">
                                        {{ $index->jenis_kelamin }}
                                    </span>
                                @else
                                    <span
                                        class="inline-block px-3 py-1 text-gray-700 bg-gray-200 rounded-full font-semibold">
                                        {{ $index->jenis_kelamin }}
                                    </span>
                                @endif
                            </td>


                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex space-x-2">
                                    <!-- View -->
                                    <a href="{{ route('admin.users.show', $index->id) }}"
                                        class="p-2 text-amber-600 bg-amber-50 rounded-md hover:bg-amber-100 transition-colors"
                                        title="View Details">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            <path fill-rule="evenodd"
                                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>

                                    <!-- Edit -->
                                    <a href="{{ route('admin.dashboard.jenjang.sd.edit', $index->id) }}"
                                        class="p-2 text-indigo-600 bg-indigo-50 rounded-md hover:bg-indigo-100 transition-colors"
                                        title="Edit User">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('admin.dashboard.jenjang.sd.delete', $index->id) }}"
                                        method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 text-red-600 bg-red-50 rounded-md hover:bg-red-100 transition-colors"
                                            title="Delete User">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
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
        <!-- Pagination links would go here -->
        {{-- {{ $users->links() }} --}}
    </div>

    <!-- Popovers -->
    <div data-popover id="popover-addUser" role="tooltip"
        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
        <div class="px-3 py-2 bg-indigo-50 border-b border-gray-200 rounded-t-lg">
            <h3 class="font-semibold text-indigo-600">Tambah Student</h3>
        </div>
        <div class="px-3 py-2">
            <p>Tindakan ini akan menambahkan Student baru.</p>
        </div>
        <div data-popper-arrow></div>
    </div>

    <div data-popover id="popover-exportImport" role="tooltip"
        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-lg opacity-0 transform scale-95 hover:scale-100 focus:scale-100">
        <div class="px-4 py-2 bg-blue-50 border-b border-gray-200 rounded-t-lg">
            <h3 class="font-semibold text-blue-600">Export Data Student</h3>
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
    </div>

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
