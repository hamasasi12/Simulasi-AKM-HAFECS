@extends('layouts.studentsLayouts')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold mb-6 text-center">Ringkasan Hasil</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                            <div class="bg-blue-100 p-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
                                <div class="text-blue-800 text-lg font-semibold">Skor</div>
                                <div class="text-4xl font-bold mt-2">{{ $exam->score }}/{{ $totalQuestions }}</div>
                            </div>
                            
                            <div class="bg-green-100 p-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
                                <div class="text-green-800 text-lg font-semibold">Benar</div>
                                <div class="text-4xl font-bold mt-2">{{ $correctAnswers }}</div>
                            </div>
                            
                            <div class="bg-red-100 p-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
                                <div class="text-red-800 text-lg font-semibold">Salah</div>
                                <div class="text-4xl font-bold mt-2">{{ $wrongAnswers }}</div>
                            </div>
                            
                            <div class="bg-gray-100 p-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
                                <div class="text-gray-800 text-lg font-semibold">Tidak Dijawab</div>
                                <div class="text-4xl font-bold mt-2">{{ $unansweredQuestions }}</div>
                            </div>
                        </div>
                        
                        <div class="bg-gray-100 p-6 rounded-lg shadow-md mb-6">
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
                                    <div class="font-semibold">{{ $exam->created_at->format('d M Y, H:i') }} <span>WIB</span> </div>
                                </div>
                                <div>
                                    <div class="text-gray-600 mb-1">Waktu Mulai:</div>
                                    <div class="font-semibold">{{ $exam->start_time->format('H:i:s') }} <span>WIB</span></div>
                                </div>
                                <div>
                                    <div class="text-gray-600 mb-1">Waktu Selesai:</div>
                                    <div class="font-semibold">{{ $exam->end_time->format('H:i:s') }} <span>WIB</span></div>
                                </div>
                                <div>
                                    <div class="text-gray-600 mb-1">Durasi:</div>
                                    <div class="font-semibold">
                                        {{ ceil($exam->start_time->floatDiffInMinutes($exam->end_time)) }} menit
                                    </div>
                                </div>
                                <div>
                                    <div class="text-gray-600 mb-1">Nilai:</div>
                                    <div class="font-semibold text-lg">
                                        {{ number_format(($exam->score / $totalQuestions) * 100) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between mt-6">
                        <a href="{{ route('exams.index') }}" class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded transition duration-200">
                            Kembali ke Kategori
                        </a>
                        <a href="#" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded transition duration-200">
                            Lihat Detail Jawaban
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection