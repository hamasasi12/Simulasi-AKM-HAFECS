@extends('layouts.studentsLayouts')

@section('content')
    <div class="py-8">
        <a href="{{ route('students.jenjang.index') }}"
            class="flex items-center text-gray-800 px-4 py-2 rounded hover:text-black transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="underline">Kembali</span>
        </a>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl">

                <div class="p-8">
                    <!-- Action Cards -->

                    @php
                        $latestExams = Auth::user()
                            ->exams()
                            ->where('status', 'finished')
                            ->with('category')
                            ->orderBy('created_at', 'desc')
                            ->limit(5)
                            ->get();
                    @endphp

                    @if ($latestExams->isNotEmpty())
                        <!-- Recent Exams Section -->
                        <div class="bg-white rounded-xl shadow-md overflow-hidden">
                            <div class="px-6 py-5 border-b border-gray-200 bg-gray-50">
                                <h3 class="text-xl font-bold text-gray-800">Hasil Ujian Terakhir</h3>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Kategori
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Tanggal
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Skor
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($latestExams as $exam)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex-shrink-0 h-8 w-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                            </svg>
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $exam->category->name }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">
                                                        {{ $exam->created_at->format('d M Y, H:i') }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @php
                                                        $percentage = ($exam->score / 30) * 100;
                                                        $scoreClass =
                                                            $percentage >= 70
                                                                ? 'text-green-600 bg-green-100'
                                                                : 'text-red-600 bg-red-100';
                                                    @endphp
                                                    <span
                                                        class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full {{ $scoreClass }}">
                                                        {{ $exam->score }}/30 ({{ number_format($percentage, 2) }}%)
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <a href="#"
                                                        class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 px-3 py-1 rounded-md transition duration-200">
                                                        Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                                <a href="#"
                                    class="text-indigo-600 hover:text-indigo-900 font-medium flex items-center justify-end">
                                    Lihat Semua Riwayat
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-blue-400 mb-4"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="text-lg font-medium text-blue-800 mb-2">Belum Ada Riwayat Ujian</h3>
                            <p class="text-blue-600 mb-4">Anda belum menyelesaikan ujian apapun. Mulai ujian pertama Anda
                                sekarang!</p>
                            <a href="{{ route('exams.index') }}"
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Mulai Ujian
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Token Modal -->
    <div id="tokenModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-md w-full mx-4 transform transition-all duration-300 scale-95 opacity-0"
            id="modalContent">
            <!-- Header with Icon -->
            <div class="text-center mb-6">
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-blue-100 mb-4">
                    <i class="fas fa-key text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Token Anda</h3>
                <p class="text-gray-600 text-sm">Token akses pribadi untuk login</p>
            </div>

            <!-- Warning Message -->
            <div class="bg-amber-50 border border-amber-200 rounded-lg p-4 mb-6">
                <div class="flex">
                    <i class="fas fa-exclamation-triangle text-amber-500 mt-0.5 mr-3"></i>
                    <div>
                        <p class="text-sm text-amber-800 font-medium mb-1">Penting!</p>
                        <p class="text-sm text-amber-700">Simpan token ini di tempat yang aman. Token ini digunakan untuk
                            login kembali ke akun Anda.</p>
                    </div>
                </div>
            </div>

            <!-- Token Display -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Token Akses</label>
                <div class="relative">
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 text-center">
                        <code id="tokenText"
                            class="text-gray-800 font-mono text-sm break-all">{{ Auth::user()->token }}</code>
                    </div>
                    <button id="copyToken"
                        class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 transition-colors duration-200">
                        <i class="fas fa-copy"></i>
                    </button>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3">
                <button id="copyTokenBtn"
                    class="flex-1 bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-4 rounded-lg transition-colors duration-200 flex items-center justify-center">
                    <i class="fas fa-copy mr-2"></i>
                    Salin Token
                </button>
                <button id="closeModal"
                    class="flex-1 bg-gray-600 hover:bg-gray-700 text-white font-medium py-3 px-4 rounded-lg transition-colors duration-200 flex items-center justify-center">
                    <i class="fas fa-times mr-2"></i>
                    Tutup
                </button>
            </div>

            <!-- Footer Note -->
            <div class="mt-6 text-center">
                <p class="text-xs text-gray-500">Jangan bagikan token ini kepada siapa pun</p>
            </div>
        </div>
    </div>

    <script>
        // Animation helper
        function showModal() {
            const modal = document.getElementById('tokenModal');
            const content = document.getElementById('modalContent');

            modal.classList.remove('hidden');

            // Trigger animation
            setTimeout(() => {
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function hideModal() {
            const modal = document.getElementById('tokenModal');
            const content = document.getElementById('modalContent');

            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Show the token modal only once
        window.onload = function() {
            const tokenShown = localStorage.getItem('token_{{ $token }}_shown');

            if (!tokenShown) {
                showModal();
                localStorage.setItem('token_{{ $token }}_shown', 'true');
            }
        };

        // Close modal events
        document.getElementById('closeModal').onclick = hideModal;

        // Close modal when clicking overlay
        document.getElementById('tokenModal').onclick = function(e) {
            if (e.target === this) {
                hideModal();
            }
        };

        // Copy functionality for both buttons
        function copyToken() {
            const tokenText = document.getElementById('tokenText').innerText;

            if (navigator.clipboard) {
                navigator.clipboard.writeText(tokenText).then(function() {
                    // Show success feedback
                    const copyBtn = document.getElementById('copyTokenBtn');
                    const originalText = copyBtn.innerHTML;
                    copyBtn.innerHTML = '<i class="fas fa-check mr-2"></i>Berhasil Disalin!';
                    copyBtn.classList.remove('bg-green-600', 'hover:bg-green-700');
                    copyBtn.classList.add('bg-green-500');

                    setTimeout(() => {
                        copyBtn.innerHTML = originalText;
                        copyBtn.classList.remove('bg-green-500');
                        copyBtn.classList.add('bg-green-600', 'hover:bg-green-700');
                    }, 2000);
                }, function() {
                    alert('Gagal menyalin token. Silakan salin secara manual.');
                });
            } else {
                // Fallback for older browsers
                const textArea = document.createElement('textarea');
                textArea.value = tokenText;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand('copy');
                document.body.removeChild(textArea);
                alert('Token berhasil disalin!');
            }
        }

        document.getElementById('copyToken').onclick = copyToken;
        document.getElementById('copyTokenBtn').onclick = copyToken;

        // Demo button (remove in production)
        document.getElementById('showModal').onclick = showModal;

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !document.getElementById('tokenModal').classList.contains('hidden')) {
                hideModal();
            }
        });
    </script>

@endsection
