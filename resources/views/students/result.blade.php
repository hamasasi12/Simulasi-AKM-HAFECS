@extends('layouts.studentsLayouts')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Status Kelulusan -->
            @php
                $scorePercentage = ($exam->score / $totalQuestions) * 100;
                $isPassed = $scorePercentage >= 66;
            @endphp
            
            <div class="mb-8 bg-gradient-to-r {{ $isPassed ? 'from-green-500 to-green-600' : 'from-red-500 to-red-600' }} text-white p-6 rounded-lg shadow-lg text-center">
                <div class="text-4xl font-bold mb-2">
                    {{ number_format($scorePercentage) }} point
                </div>
                <h2 class="text-2xl font-bold mb-2">
                    {{ $isPassed ? 'SELAMAT! ANDA LULUS' : 'MAAF, ANDA TIDAK LULUS' }}
                </h2>
                <p class="text-lg opacity-90">
                    {{ $isPassed ? 'Anda telah mencapai nilai kelulusan' : 'Nilai kelulusan minimum adalah 66 point' }}
                </p>
                
                @if(!$isPassed)
                    <div class="mt-4 bg-white bg-opacity-20 inline-block px-4 py-2 rounded-full text-sm font-medium">
                        Anda kurang {{ 66 - floor($scorePercentage) }} point untuk lulus
                    </div>
                @endif
            </div>

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
                                <span class="px-3 py-1 rounded-full text-sm font-medium {{ $isPassed ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $isPassed ? 'Lulus' : 'Tidak Lulus' }}
                                </span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <div class="text-gray-600 mb-1">Kategori:</div>
                                    <div class="font-semibold">{{ $exam->category->name }}</div>
                                </div>
                                <div>
                                    <div class="text-gray-600 mb-1">Tanggal Ujian:</div>
                                    <div class="font-semibold">{{ $exam->created_at->format('d M Y, H:i') }} WIB</div>
                                </div>
                                <div>
                                    <div class="text-gray-600 mb-1">Waktu Mulai:</div>
                                    <div class="font-semibold">{{ $exam->start_time->format('H:i:s') }} WIB</div>
                                </div>
                                <div>
                                    <div class="text-gray-600 mb-1">Waktu Selesai:</div>
                                    <div class="font-semibold">{{ $exam->end_time->format('H:i:s') }} WIB</div>
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
                                        {{ number_format($scorePercentage) }}
                                        <span class="text-sm ml-1 {{ $scorePercentage >= 66 ? 'text-green-600' : 'text-red-600' }}">
                                            (Min. 66)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Progress Bar Kelulusan -->
                    {{-- <div class="mb-8">
                        <div class="flex justify-between text-sm text-gray-600 mb-2">
                            <span>Persentase Kelulusan</span>
                            <span>{{ number_format($scorePercentage) }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-4 overflow-hidden">
                            <div class="h-4 rounded-full {{ $isPassed ? 'bg-green-500' : 'bg-red-500' }} relative"
                                 style="width: {{ $scorePercentage }}%">
                                <div class="absolute right-0 top-0 h-4 w-0.5 bg-white"></div>
                            </div>
                            <div class="relative -mt-4 -ml-2 w-0 h-0" style="left: 66%">
                                <div class="absolute w-0.5 h-6 bg-gray-600 -mt-1"></div>
                                <div class="absolute text-xs text-gray-600 -ml-4 mt-2 w-10">Batas Lulus</div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="flex flex-col sm:flex-row justify-between gap-4 mt-6">
                        <a href="{{ route('students.jenjang.index') }}" class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-3 px-6 rounded transition duration-200 text-center">
                            Kembali ke Halaman Utama
                        </a>
                        {{-- <a href="#" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-3 px-6 rounded transition duration-200 text-center">
                            Lihat Detail Jawaban
                        </a> --}}
                        @if(!$isPassed)
                            <a href="{{ route('instruction', $exam->category->id) }}" class="bg-purple-600 hover:bg-purple-800 text-white font-bold py-3 px-6 rounded transition duration-200 text-center">
                                Ujian Remidi
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection