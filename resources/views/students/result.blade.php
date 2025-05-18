@extends('layouts.studentsLayouts')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-8">
                        <h3 class="text-xl font-bold mb-4">Ringkasan Hasil</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                            <div class="bg-blue-50 p-4 rounded-lg shadow">
                                <div class="text-blue-800 text-lg font-bold">Skor</div>
                                <div class="text-3xl font-bold mt-2">{{ $exam->score }}/{{ $totalQuestions }}</div>
                            </div>
                            
                            <div class="bg-green-50 p-4 rounded-lg shadow">
                                <div class="text-green-800 text-lg font-bold">Benar</div>
                                <div class="text-3xl font-bold mt-2">{{ $correctAnswers }}</div>
                            </div>
                            
                            <div class="bg-red-50 p-4 rounded-lg shadow">
                                <div class="text-red-800 text-lg font-bold">Salah</div>
                                <div class="text-3xl font-bold mt-2">{{ $wrongAnswers }}</div>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg shadow">
                                <div class="text-gray-800 text-lg font-bold">Tidak Dijawab</div>
                                <div class="text-3xl font-bold mt-2">{{ $unansweredQuestions }}</div>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 p-6 rounded-lg shadow mb-6">
                            <div class="flex justify-between items-center mb-4">
                                <h4 class="text-lg font-bold">Informasi Ujian</h4>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <div class="text-gray-600 mb-1">Kategori:</div>
                                    <div class="font-semibold">{{ $exam->category->name }}</div>
                                </div>
                                <div>
                                    <div class="text-gray-600 mb-1">Tanggal Ujian:</div>
                                    <div class="font-semibold">{{ $exam->created_at->format('d M Y, H:i') }}</div>
                                </div>
                                <div>
                                    <div class="text-gray-600 mb-1">Waktu Mulai:</div>
                                    <div class="font-semibold">{{ $exam->start_time->format('H:i:s') }}</div>
                                </div>
                                <div>
                                    <div class="text-gray-600 mb-1">Waktu Selesai:</div>
                                    <div class="font-semibold">{{ $exam->end_time->format('H:i:s') }}</div>
                                </div>
                                <div>
                                    <div class="text-gray-600 mb-1">Durasi:</div>
                                    <div class="font-semibold">
                                        {{ $exam->start_time->diffInMinutes($exam->end_time) }} menit
                                    </div>
                                </div>
                                <div>
                                    <div class="text-gray-600 mb-1">Nilai:</div>
                                    <div class="font-semibold text-lg">
                                        {{ number_format(($exam->score / $totalQuestions) * 100, 2) }}%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('exams.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Kembali ke Kategori
                        </a>
                        <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{-- <a href="{{ route('results.show', $exam) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> --}}
                            Lihat Detail Jawaban
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection