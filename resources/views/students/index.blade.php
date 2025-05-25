@extends('layouts.studentsLayouts')

@section('content')
    <div class="min-h-screen flex items-center justify-center py-8 px-4">
        <div class="w-full max-w-7xl">
            <div class="bg-white overflow-hidden shadow-md rounded-xl">
                <div class="p-8">
                    <!-- Welcome Section -->
                    <div class="mb-10">
                        <h2 class="text-lg lg:text-2xl font-bold lg:font-bold text-gray-700 mb-2">
                            Selamat Datang, <span class="text-blue-800">{{ Auth::user()->name }}!</span>
                        </h2>
                    </div>

                    <!-- Action Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                        <!-- Exam Card -->
                        <div
                            class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden">
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-xl font-bold text-blue-800">Mulai Ujian</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                                <p class="text-gray-600 mb-6">Pilih kategori ujian dan mulai mengerjakan soal simulasi AKM.
                                </p>
                                <a href="{{ route('exams.index') }}"
                                    class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-4 rounded-lg text-center transition duration-300">
                                    Mulai Ujian
                                </a>
                            </div>
                        </div>

                        <!-- History Card -->
                        <div
                            class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden">
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-xl font-bold text-green-800">Riwayat Ujian</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2M15 11v4M12 11v4M9 11v4" />
                                    </svg>
                                </div>
                                <p class="text-gray-600 mb-6">Lihat hasil dan detail ujian yang telah Anda selesaikan.</p>
                                <a href="{{ route('students.jenjang.history.index') }}"
                                    class="block w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2.5 px-4 rounded-lg text-center transition duration-300">
                                    Lihat Riwayat
                                </a>
                            </div>
                        </div>

                        <!-- Profile Card -->
                        <div
                            class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden">
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-xl font-bold text-purple-800">Profil</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <p class="text-gray-600 mb-6">Perbarui informasi akun dan pengaturan profil Anda.</p>
                                <a href="#"
                                    class="block w-full bg-purple-600 hover:bg-purple-700 text-white font-medium py-2.5 px-4 rounded-lg text-center transition duration-300">
                                    Edit Profil
                                </a>
                            </div>
                        </div>
                    </div>
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
