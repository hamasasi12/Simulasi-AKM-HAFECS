@extends('layouts.studentsLayouts')

@section('title', 'Instruksi Pengerjaan AKM')

@section('content')
    <div class="min-h-screen py-8 px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Header Card -->
            <div class="bg-white rounded-xl shadow-lg mb-6 overflow-hidden mt-8">
                <div class="bg-blue-600 px-4 py-2 text-white text-center">
                    <h1 class="text-2xl md:text-3xl font-bold mb-2">Instruksi Pengerjaan</h1>
                    <p class="text-blue-100">Baca dengan teliti sebelum memulai ujian</p>
                </div>

                <!-- Info Cards -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div class="bg-blue-50 rounded-lg p-4 text-center border border-blue-200">
                            <div class="text-2xl mb-2">⏱</div>
                            <div class="text-sm text-gray-600">Waktu</div>
                            <div class="text-lg font-bold text-blue-600">{{ $exam_duration ?? '60' }} Menit</div>
                        </div>
                        <div class="bg-green-50 rounded-lg p-4 text-center border border-green-200">
                            <div class="text-2xl mb-2">📝</div>
                            <div class="text-sm text-gray-600">Jumlah Soal</div>
                            <div class="text-lg font-bold text-green-600">{{ $total_questions ?? '30' }} Soal</div>
                        </div>
                        <div class="bg-purple-50 rounded-lg p-4 text-center border border-purple-200">
                            <div class="text-2xl mb-2">✅</div>
                            <div class="text-sm text-gray-600">Jenis</div>
                            <div class="text-lg font-bold text-purple-600">{{ $exam_type ?? 'Pilihan Ganda' }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Instructions Card -->
            <div class="bg-white rounded-xl shadow-lg mb-6">
                <div class="p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                        <span
                            class="bg-blue-600 text-white w-8 h-8 rounded-full flex items-center justify-center text-sm mr-3">!</span>
                        Petunjuk Penting
                    </h2>

                    <div class="space-y-4">
                        <!-- Petunjuk Umum -->
                        <div class="border-l-4 border-blue-500 pl-4 py-2">
                            <h3 class="font-semibold text-gray-800 mb-2">Sebelum Memulai:</h3>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Pastikan koneksi internet stabil</li>
                                <li>• Gunakan browser Chrome/Firefox terbaru</li>
                                <li>• Jangan tutup atau refresh halaman</li>
                                <li>• Pastikan baterai perangkat mencukupi</li>
                            </ul>
                        </div>

                        <!-- Cara Mengerjakan -->
                        <div class="border-l-4 border-green-500 pl-4 py-2">
                            <h3 class="font-semibold text-gray-800 mb-2">Cara Mengerjakan:</h3>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Baca soal dengan cermat</li>
                                <li>• Klik pilihan jawaban A, B, C, D atau E</li>
                                <li>• Gunakan tombol navigasi untuk berpindah soal</li>
                                <li>• Jawaban tersimpan otomatis</li>
                            </ul>
                        </div>

                        <!-- Peraturan -->
                        <div class="border-l-4 border-red-500 pl-4 py-2">
                            <h3 class="font-semibold text-gray-800 mb-2">Peraturan:</h3>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Kerjakan secara mandiri</li>
                                <li>• Dilarang membuka aplikasi lain</li>
                                {{-- <li>• Tidak diperbolehkan menggunakan kalkulator</li> --}}
                                <li>• Waktu berjalan otomatis dan tidak dapat dihentikan</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Warning -->
                    <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                        <div class="flex items-start">
                            <div class="text-yellow-600 mr-3 mt-1">⚠</div>
                            <div>
                                <h4 class="font-semibold text-yellow-800 mb-1">Perhatian!</h4>
                                <p class="text-sm text-yellow-700">
                                    Ujian akan berakhir otomatis saat waktu habis. Pastikan semua soal telah dijawab.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Agreement & Actions -->
            <div class="bg-white rounded-xl shadow-lg">
                <div class="p-6">
                    <form id="startExamForm" action="{{ route('exams.start') }}" method="POST">
                        @csrf
                        <input type="hidden" name="category_id" value="{{ $category_id }}">

                        <!-- Agreement Checkbox -->
                        <div class="mb-6">
                            <label class="flex items-start space-x-3 cursor-pointer">
                                <input type="checkbox" id="agreement" name="agreement" required
                                    class="mt-1 w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <span class="text-sm text-gray-700">
                                    Saya telah membaca dan memahami semua instruksi di atas, serta bersedia mengikuti
                                    peraturan ujian yang berlaku.
                                </span>
                            </label>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-3 justify-center">
                            <a href="#"
                                class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-center font-medium">
                                ← Kembali
                            </a>
                            <button type="submit" id="startBtn" disabled
                                class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 disabled:bg-gray-300 disabled:cursor-not-allowed transition-colors font-medium">
                                <span id="btnText">Mulai Ujian</span>
                                <span id="btnLoader" class="hidden">
                                    <svg class="inline w-4 h-4 mr-2 animate-spin" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                    Memulai...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const agreement = document.getElementById('agreement');
                const startBtn = document.getElementById('startBtn');
                const form = document.getElementById('startExamForm');
                const btnText = document.getElementById('btnText');
                const btnLoader = document.getElementById('btnLoader');

                // Enable/disable start button based on agreement checkbox
                agreement.addEventListener('change', function() {
                    startBtn.disabled = !this.checked;
                    startBtn.classList.toggle('bg-blue-600', this.checked);
                    startBtn.classList.toggle('hover:bg-blue-700', this.checked);
                    startBtn.classList.toggle('bg-gray-300', !this.checked);
                });

                // Handle form submission
                form.addEventListener('submit', function() {
                    if (agreement.checked) {
                        startBtn.disabled = true;
                        btnText.classList.add('hidden');
                        btnLoader.classList.remove('hidden');
                    }
                });

                // Auto-scroll to top on page load
                window.scrollTo(0, 0);
            });
        </script>
    @endpush
@endsection
