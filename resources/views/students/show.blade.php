@extends('layouts.examLayouts')

@section('content')
<div class="min-h-screen py-6">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Exam Header -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6 border border-gray-100">
            <div class="flex flex-col sm:flex-row justify-between items-center">
                <div class="mb-4 sm:mb-0">
                    <h2 class="text-3xl font-bold text-gray-800 mb-1">
                        {{ $exam->category->name }}
                    </h2>
                    <p class="text-gray-500 text-sm font-medium">Ujian Sertifikasi</p>
                </div>
                
                <div class="flex items-center space-x-4">
                    <div class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-semibold shadow-sm">
                        <span class="hidden sm:inline">Soal </span>{{ $questions->currentPage() }} dari {{ $totalQuestions }}
                    </div>
                    <div class="bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-semibold shadow-sm">
                        {{ $answeredQuestions }}/{{ $totalQuestions }} Terjawab
                    </div>
                </div>
            </div>
            
            <!-- Progress Bar -->
            <div class="mt-6">
                <div class="flex justify-between text-sm text-gray-600 mb-2">
                    <span>Progress</span>
                    <span>{{ round(($answeredQuestions / $totalQuestions) * 100) }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                    <div class="bg-gradient-to-r from-green-400 to-green-600 h-3 rounded-full transition-all duration-500"
                         style="width: {{ ($answeredQuestions / $totalQuestions) * 100 }}%"></div>
                </div>
            </div>
        </div>

        @if ($questions->count() > 0)
            @php
                $question = $questions->first();
                $userAnswer = $exam->questions()->where('questions.id', $question->id)->first()->pivot->user_answer ?? null;
            @endphp

            <!-- Question Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6 border border-gray-100">
                <!-- Question Header -->
                <div class="bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-800 px-6 py-4">
                    <h3 class="text-lg font-bold text-white flex items-center">
                        <span class="bg-white text-blue-700 rounded-full h-10 w-10 flex items-center justify-center mr-3 font-bold shadow-sm">
                            {{ $questions->currentPage() }}
                        </span>
                        Pertanyaan
                    </h3>
                </div>
                
                <!-- Question Content -->
                <div class="p-6">
                    <div class="prose prose-lg max-w-none mb-6">
                        <p class="text-gray-800 text-lg leading-relaxed">{!! $question->question_text !!}</p>
                    </div>

                    @if ($question->image)
                        <div class="mb-6 flex justify-center">
                            <div class="relative group">
                                <img src="{{ asset('/storage/' . $question->image) }}" alt="Gambar Soal" 
                                    class="max-w-full h-auto rounded-lg shadow-lg border border-gray-200 transition-transform duration-300 group-hover:scale-105">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 rounded-lg transition-all duration-300"></div>
                            </div>
                        </div>
                    @endif

                    <!-- Watermark -->
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center justify-center opacity-5 pointer-events-none">
                            <div class="text-gray-800 font-bold text-6xl transform select-none flex justify-center flex-col items-center">
                                <img src="{{ asset('./images/HRP.jpg') }}" alt="">
                                SIMULASI UJIAN
                            </div>
                        </div>

                        <form action="{{ route('exams.answer', $exam) }}" method="POST" id="answerForm">
                            @csrf
                            <input type="hidden" name="question_id" value="{{ $question->id }}">

                            <div class="space-y-4 mb-8">
                                @php
                                    $options = [
                                        'a' => $question->option_a,
                                        'b' => $question->option_b,
                                        'c' => $question->option_c,
                                        'd' => $question->option_d
                                    ];
                                @endphp

                                @foreach ($options as $key => $option)
                                    <div class="relative">
                                        <input type="radio" name="user_answer" id="answer_{{ $key }}" value="{{ $key }}"
                                            {{ $userAnswer == $key ? 'checked' : '' }} class="hidden peer">
                                        <label for="answer_{{ $key }}" 
                                            class="block w-full p-5 border-2 rounded-xl cursor-pointer transition-all duration-200 transform
                                            {{ $userAnswer == $key ? 'bg-blue-50 border-blue-500 scale-105 shadow-md' : '' }}
                                            peer-checked:bg-blue-50 peer-checked:border-blue-500 peer-checked:shadow-md ">
                                            <div class="flex items-center">
                                                <div class="h-8 w-8 rounded-full border-2 flex items-center justify-center mr-4 font-bold transition-all duration-200
                                                    {{ $userAnswer == $key ? 'bg-blue-500 text-white border-blue-500' : 'bg-gray-100 text-gray-600 border-gray-300' }}">
                                                    {{ strtoupper($key) }}
                                                </div>
                                                <span class="text-gray-700 text-lg flex-1">{{ $option }}</span>
                                                @if ($userAnswer == $key)
                                                    <div class="ml-4">
                                                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="flex flex-col sm:flex-row justify-between gap-4">
                                @if ($questions->currentPage() > 1)
                                    <a href="{{ $questions->previousPageUrl() }}"
                                        class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 px-6 rounded-lg transition duration-200 shadow-sm hover:shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        Soal Sebelumnya
                                    </a>
                                @else
                                    <div></div>
                                @endif

                                <div class="flex gap-3">
                                    @if ($questions->currentPage() < $totalQuestions)
                                        <input type="hidden" name="next_question" value="{{ $questions->currentPage() + 1 }}">
                                        <button type="submit"
                                            class="flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 shadow-sm hover:shadow-md">
                                            Simpan & Lanjut
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    @else
                                        <button type="submit"
                                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 shadow-sm hover:shadow-md">
                                            Simpan Jawaban
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Question Navigation -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <div class="p-6">
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-3 sm:mb-0">Navigasi Soal</h3>
                        
                        @if ($answeredQuestions > 0)
                            <form action="{{ route('exams.finish', $exam) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menyelesaikan ujian ini? Pastikan semua jawaban telah disimpan.')"
                                class="inline-block">
                                @csrf
                                <button type="submit"
                                    class="flex items-center bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 shadow-sm hover:shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Selesaikan Ujian
                                </button>
                            </form>
                        @endif
                    </div>

                    <!-- Legend -->
                    <div class="flex flex-wrap gap-4 mb-4 text-sm">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 bg-blue-600 rounded-lg"></div>
                            <span class="text-gray-600">Soal Aktif</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 bg-green-500 rounded-lg"></div>
                            <span class="text-gray-600">Sudah Dijawab</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 bg-gray-100 border-2 border-gray-300 rounded-lg"></div>
                            <span class="text-gray-600">Belum Dijawab</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-5 sm:grid-cols-8 md:grid-cols-10 lg:grid-cols-12 gap-3">
                        @for ($i = 1; $i <= $totalQuestions; $i++)
                            @php
                                $pageQuestion = $exam->questions()->skip($i - 1)->first();
                                $hasAnswer = $pageQuestion ? $pageQuestion->pivot->user_answer : null;
                                
                                if ($questions->currentPage() == $i) {
                                    $buttonClass = 'bg-blue-600 text-white ring-4 ring-blue-200 scale-110 shadow-lg';
                                } elseif ($hasAnswer) {
                                    $buttonClass = 'bg-green-500 hover:bg-green-600 text-white shadow-md hover:shadow-lg';
                                } else {
                                    $buttonClass = 'bg-gray-100 hover:bg-gray-200 text-gray-700 border-2 border-gray-300 hover:border-gray-400';
                                }
                            @endphp
                            <a href="{{ route('exams.show', ['exam' => $exam, 'page' => $i]) }}"
                                class="{{ $buttonClass }} font-bold h-12 w-12 flex items-center justify-center rounded-lg transition-all duration-200 transform hover:scale-105"
                                title="Soal {{ $i }}{{ $hasAnswer ? ' (Sudah dijawab)' : ' (Belum dijawab)' }}">
                                {{ $i }}
                            </a>
                        @endfor
                    </div>
                </div>
                
                <!-- Copyright Footer -->
                <div class="bg-gradient-to-r from-gray-50 to-blue-50 px-6 py-4 border-t border-gray-100">
                    <div class="text-center text-gray-500 text-sm">
                        © {{ date('Y') }} Sistem Ujian Sertifikasi. Hak Cipta Dilindungi.
                        <br>
                        <span class="text-xs text-gray-400 mt-1 inline-block">
                            Powered by WebDev_HAFECS - Developed with ❤️
                        </span>
                    </div>
                </div>
            </div>
        @else
            <!-- No Questions Available -->
            <div class="bg-white rounded-xl shadow-lg p-8 text-center border border-gray-100">
                <div class="max-w-md mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto text-gray-400 mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Tidak ada soal tersedia</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">Tidak ada soal tersedia untuk ujian ini. Silakan hubungi administrator atau coba lagi nanti.</p>
                    <a href="{{ route('exams.index') }}"
                        class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 shadow-sm hover:shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Daftar Ujian
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    // Auto-save functionality (optional enhancement)
    document.addEventListener('DOMContentLoaded', function() {
        const radioButtons = document.querySelectorAll('input[name="user_answer"]');
        const form = document.getElementById('answerForm');
        let saveTimeout;

        radioButtons.forEach(radio => {
            radio.addEventListener('change', function() {
                // Clear existing timeout
                if (saveTimeout) {
                    clearTimeout(saveTimeout);
                }
                
                // Set new timeout for auto-save (3 seconds after selection)
                saveTimeout = setTimeout(() => {
                    // You can implement auto-save here if needed
                    console.log('Auto-save triggered for answer:', this.value);
                }, 3000);
            });
        });

        // Add loading state to submit buttons
        if (form) {
            form.addEventListener('submit', function(e) {
                const submitButton = form.querySelector('button[type="submit"]');
                if (submitButton) {
                    submitButton.disabled = true;
                    submitButton.innerHTML = submitButton.innerHTML.replace(/Simpan/g, 'Menyimpan...');
                }
            });
        }
    });

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowRight') {
            const nextBtn = document.querySelector('button[type="submit"]');
            if (nextBtn && !nextBtn.disabled) {
                nextBtn.click();
            }
        } else if (e.key === 'ArrowLeft') {
            const prevBtn = document.querySelector('a[href*="page="]');
            if (prevBtn) {
                window.location.href = prevBtn.href;
            }
        }
    });
</script>
@endpush

@push('styles')
<style>
    /* Custom animations */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .animate-fadeIn {
        animation: fadeIn 0.5s ease-out;
    }

    .animate-pulse-subtle {
        animation: pulse 2s infinite;
    }

    /* Custom scrollbar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 8px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    /* Smooth transitions for all interactive elements */
    * {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
</style>
@endpush
@endsection