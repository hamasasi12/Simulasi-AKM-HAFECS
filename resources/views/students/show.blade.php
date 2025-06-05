@extends('layouts.examLayouts')

@section('content')
    <div class="min-h-screen py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-6">
            <!-- Left Column - Question Content (70% width on large screens) -->
            <div class="lg:w-7/12">
                <!-- Exam Header -->


                @if ($questions->count() > 0)
                    @php
                        $question = $questions->first();
                        $userAnswer =
                            $exam->questions()->where('questions.id', $question->id)->first()->pivot->user_answer ??
                            null;
                    @endphp

                    <!-- Question Card -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6 border border-gray-200">
                        <!-- Question Header -->
                        <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
                            <h3 class="text-lg font-bold text-white flex items-center">
                                <span
                                    class="bg-white text-blue-700 rounded-full h-8 w-8 flex items-center justify-center mr-3 font-bold shadow-sm">
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
                                            class="max-w-full h-auto rounded-lg shadow-md border border-gray-200 transition-transform duration-300 group-hover:scale-[1.02] cursor-zoom-in"
                                            onclick="window.open(this.src, '_blank')">
                                    </div>
                                </div>
                            @endif

                            <!-- Answer Options -->
                            <form action="{{ route('exams.answer', $exam) }}" method="POST" id="answerForm">
                                @csrf
                                <input type="hidden" name="question_id" value="{{ $question->id }}">

                                <div class="space-y-3 mb-8">
                                    @php
                                        $options = [
                                            'a' => $question->option_a,
                                            'b' => $question->option_b,
                                            'c' => $question->option_c,
                                            'd' => $question->option_d,
                                            'e' => $question->option_e,
                                        ];
                                    @endphp

                                    @foreach ($options as $key => $option)
                                        @if ($option)
                                            <div class="flex items-center mb-2">
                                                <input type="radio" name="user_answer" id="answer_{{ $key }}"
                                                    value="{{ $key }}" {{ $userAnswer == $key ? 'checked' : '' }}
                                                    class="mr-2">
                                                <label for="answer_{{ $key }}"
                                                    class="text-gray-800 cursor-pointer">
                                                    {{ strtoupper($key) }}. {{ $option }}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>

                                <!-- Navigation Buttons -->
                                <div class="flex flex-col sm:flex-row justify-between gap-3">
                                    @if ($questions->currentPage() > 1)
                                        <a href="{{ $questions->previousPageUrl() }}"
                                            class="order-2 sm:order-1 flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2.5 px-5 rounded-lg transition duration-150 shadow-sm hover:shadow">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Sebelumnya
                                        </a>
                                    @else
                                        <div class="order-2 sm:order-1"></div>
                                    @endif

                                    <div class="order-1 sm:order-2 flex gap-3">
                                        @if ($questions->currentPage() < $totalQuestions)
                                            <input type="hidden" name="next_question"
                                                value="{{ $questions->currentPage() + 1 }}">
                                            <button type="submit"
                                                class="flex-1 sm:flex-none flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-6 rounded-lg transition duration-150 shadow-sm hover:shadow">
                                                Selanjutnya
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        @else
                                            <button type="submit"
                                                class="flex-1 sm:flex-none bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-6 rounded-lg transition duration-150 shadow-sm hover:shadow">
                                                Simpan Jawaban
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Right Column - Question Navigation (30% width on large screens) -->
            <div class="lg:w-5/12">
                <!-- Question Navigation Panel -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 sticky top-6">
                    <div class="p-5">
                        <div class="flex flex-col sm:flex-row justify-between items-center mb-5">
                            <h3 class="text-lg font-bold text-gray-800 mb-3 sm:mb-0">Navigasi Soal</h3>

                            @if ($answeredQuestions > 29)
                                <form action="{{ route('exams.finish', $exam) }}" method="POST" id="finishExamForm"
                                    class="inline-block">
                                    @csrf
                                    <button type="button" onclick="confirmFinish()"
                                        class="flex items-center bg-emerald-500 hover:bg-emerald-600 text-white font-semibold py-2.5 px-6 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Selesaikan Ujian
                                    </button>
                                </form>

                                <script>
                                    function confirmFinish() {
                                        Swal.fire({
                                            title: 'Konfirmasi Penyelesaian Ujian',
                                            text: "Apakah Anda yakin ingin menyelesaikan ujian ini? Pastikan semua jawaban telah disimpan.",
                                            icon: 'question',
                                            showCancelButton: true,
                                            confirmButtonText: 'Ya, Selesaikan!',
                                            cancelButtonText: 'Batal',
                                            customClass: {
                                                confirmButton: 'bg-emerald-500 hover:bg-emerald-600 text-white font-semibold px-4 py-2 rounded',
                                                cancelButton: 'bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded'
                                            },
                                            buttonsStyling: false // penting biar Tailwind-nya dipakai, bukan style default Swal
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                document.getElementById('finishExamForm').submit();
                                            }
                                        });
                                    }
                                </script>
                            @endif
                        </div>

                        <!-- Legend -->
                        <div class="flex flex-wrap gap-3 mb-4 text-xs">
                            <div class="flex items-center gap-1.5">
                                <div class="w-4 h-4 bg-blue-600 rounded-md"></div>
                                <span class="text-gray-600">Aktif</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <div class="w-4 h-4 bg-green-500 rounded-md"></div>
                                <span class="text-gray-600">Terjawab</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <div class="w-4 h-4 bg-gray-100 border border-gray-300 rounded-md"></div>
                                <span class="text-gray-600">Belum</span>
                            </div>
                            {{-- <div class="flex items-center gap-1.5">
                            <div class="w-4 h-4 bg-yellow-100 border border-yellow-400 rounded-md"></div>
                            <span class="text-gray-600">Ditandai</span>
                        </div> --}}
                        </div>

                        <!-- Question Grid -->
                        <div
                            class="grid grid-cols-5 sm:grid-cols-6 md:grid-cols-8 gap-2 max-h-96 overflow-y-auto custom-scrollbar p-1">
                            @for ($i = 1; $i <= $totalQuestions; $i++)
                                @php
                                    $pageQuestion = $exam
                                        ->questions()
                                        ->skip($i - 1)
                                        ->first();
                                    $hasAnswer = $pageQuestion ? $pageQuestion->pivot->user_answer : null;
                                    $isMarked = $pageQuestion ? $pageQuestion->pivot->is_marked : false;

                                    if ($questions->currentPage() == $i) {
                                        $buttonClass = 'bg-blue-600 text-white ring-2 ring-blue-300';
                                    } elseif ($isMarked) {
                                        $buttonClass =
                                            'bg-yellow-100 border-yellow-400 text-yellow-800 hover:bg-yellow-200';
                                    } elseif ($hasAnswer) {
                                        $buttonClass = 'bg-green-500 hover:bg-green-600 text-white';
                                    } else {
                                        $buttonClass =
                                            'bg-gray-100 hover:bg-gray-200 text-gray-700 border border-gray-300';
                                    }
                                @endphp
                                <a href="{{ route('exams.show', ['exam' => $exam, 'page' => $i]) }}"
                                    class="{{ $buttonClass }} font-medium h-9 w-full flex items-center justify-center rounded-md transition-colors duration-150 text-sm"
                                    title="Soal {{ $i }}{{ $hasAnswer ? ' (Sudah dijawab)' : ' (Belum dijawab)' }}">
                                    {{ $i }}
                                    @if ($isMarked)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 ml-0.5"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @endif
                                </a>
                            @endfor
                        </div>

                        <!-- Marking Controls -->
                        {{-- <div class="mt-5 pt-5 border-t border-gray-100">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Tandai soal untuk ditinjau ulang</span>
                            <button id="toggleMarkButton" class="flex items-center gap-1.5 text-sm font-medium text-gray-600 hover:text-blue-600 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                Tandai Soal Ini
                            </button>
                        </div>
                    </div> --}}
                    </div>

                    <!-- Exam Summary -->
                    <div class="bg-gray-50 px-5 py-4 border-t border-gray-200">
                        <div class="grid grid-cols-3 gap-3 text-center">
                            <div class="bg-white p-3 rounded-lg shadow-sm border border-gray-200">
                                <div class="text-sm text-gray-500">Total Soal</div>
                                <div class="text-lg font-bold text-gray-800">{{ $totalQuestions }}</div>
                            </div>
                            <div class="bg-white p-3 rounded-lg shadow-sm border border-gray-200">
                                <div class="text-sm text-gray-500">Terjawab</div>
                                <div class="text-lg font-bold text-green-600">{{ $answeredQuestions }}</div>
                            </div>
                            <div class="bg-white p-3 rounded-lg shadow-sm border border-gray-200">
                                <div class="text-sm text-gray-500">Belum</div>
                                <div class="text-lg font-bold text-red-600">{{ $totalQuestions - $answeredQuestions }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Help -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 mt-5">
                    <div class="bg-gray-50 px-5 py-3 border-b border-gray-200">
                        <h3 class="text-sm font-semibold text-gray-800">Bantuan Cepat</h3>
                    </div>
                    <div class="p-4">
                        <ul class="space-y-3 text-sm text-gray-600">
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Klik nomor soal untuk berpindah</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Gunakan tombol keyboard ← → untuk navigasi</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Klik gambar soal untuk memperbesar</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Timer functionality
            function startTimer(duration, display) {
                let timer = duration,
                    minutes, seconds;
                const interval = setInterval(function() {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    display.textContent = minutes + ":" + seconds;

                    if (--timer < 0) {
                        clearInterval(interval);
                        // Auto submit when time is up
                        document.querySelector('form[action="{{ route('exams.finish', $exam) }}"]').submit();
                    }
                }, 1000);
            }

            window.onload = function() {
                const examDuration = {{ $exam->duration ?? 60 }} * 60; // Convert minutes to seconds
                const display = document.querySelector('#examTimer');
                startTimer(examDuration, display);
            };

            // Mark question functionality
            document.getElementById('toggleMarkButton').addEventListener('click', function() {
                // Implement AJAX call to mark/unmark the current question
                console.log('Marking question {{ $questions->currentPage() }}');
                // You would typically make an AJAX call here to update the server
                this.classList.toggle('text-yellow-600');

                // Toggle star icon
                const icon = this.querySelector('svg');
                icon.classList.toggle('fill-yellow-400');
                icon.classList.toggle('text-yellow-600');
            });

            // Keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowRight' && {{ $questions->currentPage() }} < {{ $totalQuestions }}) {
                    document.getElementById('answerForm').submit();
                } else if (e.key === 'ArrowLeft' && {{ $questions->currentPage() }} > 1) {
                    window.location.href = "{{ $questions->previousPageUrl() }}";
                } else if (e.key >= 1 && e.key <= 9 && e.key <= {{ $totalQuestions }}) {
                    // Jump to question number pressed (1-9)
                    window.location.href = "{{ route('exams.show', ['exam' => $exam, 'page' => '']) }}/" + e.key;
                }
            });

            // Auto-save on answer selection
            document.querySelectorAll('input[name="user_answer"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    // You can implement auto-save here if desired
                    // For now, we'll just update the UI
                    const answerKey = this.value.toUpperCase();
                    console.log('Selected answer:', answerKey);
                });
            });
        </script>
    @endpush

    @push('styles')
        <style>
            /* Custom scrollbar for question navigation */
            .custom-scrollbar::-webkit-scrollbar {
                width: 6px;
                height: 6px;
            }

            .custom-scrollbar::-webkit-scrollbar-track {
                background: #f1f1f1;
                border-radius: 10px;
            }

            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: #c1c1c1;
                border-radius: 10px;
            }

            .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                background: #a8a8a8;
            }

            /* Smooth transitions */
            [type="radio"]:checked+label {
                transform: none;
                /* Disable scale effect on checked */
            }

            /* Responsive adjustments */
            @media (max-width: 1023px) {

                .lg\:w-7\/12,
                .lg\:w-5\/12 {
                    width: 100%;
                }
            }
        </style>
    @endpush
@endsection
