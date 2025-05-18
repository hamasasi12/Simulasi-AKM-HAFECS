@extends('layouts.studentsLayouts')

@section('content')
    <div class="flex justify-between items-center mt-10">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ujian') }} - {{ $exam->category->name }}
        </h2>
        <div class="text-gray-500">
            Soal {{ $questions->currentPage() }} dari {{ $totalQuestions }}
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($questions->count() > 0)
                        @php
                            $question = $questions->first();
                            $userAnswer =
                                $exam->questions()->where('questions.id', $question->id)->first()->pivot->user_answer ??
                                null;
                        @endphp

                        <div class="mb-8">
                            <h3 class="text-lg font-bold mb-4">Soal {{ $questions->currentPage() }}</h3>
                            <p class="text-gray-800 mb-4">{!! $question->question_text !!}</p>

                            @if ($question->image)
                                <div class="mb-4">
                                    <img src="{{ asset('/storage/' . $question->image) }}" alt="Gambar Soal"
                                        class="max-w-md">
                                </div>
                            @endif

                            <form action="{{ route('exams.answer', $exam) }}" method="POST">
                                @csrf
                                <input type="hidden" name="question_id" value="{{ $question->id }}">

                                <div class="space-y-4 mb-6">
                                    <div class="flex items-center">
                                        <input type="radio" name="user_answer" id="answer_a" value="a"
                                            {{ $userAnswer == 'a' ? 'checked' : '' }} class="mr-2">
                                        <label for="answer_a" class="text-gray-700">A. {{ $question->option_a }}</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" name="user_answer" id="answer_b" value="b"
                                            {{ $userAnswer == 'b' ? 'checked' : '' }} class="mr-2">
                                        <label for="answer_b" class="text-gray-700">B. {{ $question->option_b }}</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" name="user_answer" id="answer_c" value="c"
                                            {{ $userAnswer == 'c' ? 'checked' : '' }} class="mr-2">
                                        <label for="answer_c" class="text-gray-700">C. {{ $question->option_c }}</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" name="user_answer" id="answer_d" value="d"
                                            {{ $userAnswer == 'd' ? 'checked' : '' }} class="mr-2">
                                        <label for="answer_d" class="text-gray-700">D. {{ $question->option_d }}</label>
                                    </div>
                                    {{-- <div class="flex items-center">
                                        <input type="radio" name="user_answer" id="answer_e" value="e"
                                            {{ $userAnswer == 'e' ? 'checked' : '' }} class="mr-2">
                                        <label for="answer_e" class="text-gray-700">E. {{ $question->option_e }}</label>
                                    </div> --}}
                                </div>

                                <div class="flex justify-between">
                                    @if ($questions->currentPage() > 1)
                                        <a href="{{ $questions->previousPageUrl() }}"
                                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                            Soal Sebelumnya
                                        </a>
                                    @else
                                        <div></div>
                                    @endif

                                    <div>
                                        @if ($questions->currentPage() < $totalQuestions)
                                            <input type="hidden" name="next_question"
                                                value="{{ $questions->currentPage() + 1 }}">
                                            <button type="submit"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Simpan & Lanjut
                                            </button>
                                        @else
                                            <button type="submit"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                                Simpan
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="mt-8 border-t pt-6">
                            <div class="flex justify-between items-center">
                                <div class="text-gray-600">
                                    Soal terjawab: {{ $answeredQuestions }} dari {{ $totalQuestions }}
                                </div>

                                @if ($answeredQuestions > 0)
                                    <form action="{{ route('exams.finish', $exam) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menyelesaikan ujian ini? Pastikan semua jawaban telah disimpan.')">
                                        @csrf
                                        <button type="submit"
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                            Selesaikan Ujian
                                        </button>
                                    </form>
                                @endif
                            </div>

                            <div class="mt-4 grid grid-cols-10 gap-2">
                                @for ($i = 1; $i <= $totalQuestions; $i++)
                                    @php
                                        $pageQuestion = $exam
                                            ->questions()
                                            ->skip($i - 1)
                                            ->first();
                                        $hasAnswer = $pageQuestion ? $pageQuestion->pivot->user_answer : null;
                                        $buttonClass = $hasAnswer
                                            ? 'bg-green-500 hover:bg-green-700 text-white'
                                            : 'bg-gray-200 hover:bg-gray-300 text-gray-700';
                                    @endphp
                                    <a href="{{ route('exams.show', ['exam' => $exam, 'page' => $i]) }}"
                                        class="{{ $buttonClass }} font-bold py-2 px-3 rounded text-center {{ $questions->currentPage() == $i ? 'ring-2 ring-blue-500' : '' }}">
                                        {{ $i }}
                                    </a>
                                @endfor
                            </div>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-600">Tidak ada soal tersedia untuk ujian ini.</p>
                            <a href="{{ route('exams.index') }}"
                                class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Kembali ke Daftar Kategori
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
