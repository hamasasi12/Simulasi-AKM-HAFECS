@extends('layouts.studentsLayouts')

@section('content')
    <div class="py-12 bg-gradient-to-br">

        <a href="{{ route('students.jenjang.index') }}"
            class="inline-flex items-center bg-white text-gray-700 px-4 py-2.5 rounded-lg shadow-md hover:shadow-lg hover:bg-gray-50 transition-all duration-200 font-medium border border-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
        </a>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10 text-center">
                <h1 class="text-4xl font-extrabold text-gray-200 mb-2">Kategori Ujian</h1>
                <p class="text-gray-200 text-lg max-w-2xl mx-auto">Pilih kategori ujian yang ingin Anda ikuti berdasarkan
                    kategori dibawah ini!</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($categories as $category)
                    <div
                        class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                        <div class="h-3 bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-600"></div>
                        <div class="p-7">
                            <div class="flex items-start justify-between mb-5">
                                <h3
                                    class="text-2xl font-bold text-gray-700 group-hover:text-blue-600 transition-colors duration-300">
                                    {{ $category->name }}</h3>
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    30 Soal
                                </span>
                            </div>

                            <div class="bg-gray-50 rounded-xl p-4 mb-6">
                                <p class="text-gray-600 line-clamp-3">{{ $category->description }}</p>
                            </div>

                            <div class="flex items-center justify-between mb-6 bg-blue-50 rounded-lg p-3">
                                <div class="flex items-center">
                                    <div class="bg-blue-100 p-2 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-gray-700 ml-2">60 menit</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-blue-100 p-2 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-gray-700 ml-2">Pilihan Ganda</span>
                                </div>
                            </div>

                            {{-- Cek apakah ada ujian yang belum selesai --}}
                            @php
                                $unfinishedExam = \App\Models\Exam::where('user_id', auth()->id())
                                    ->where('category_id', $category->id)
                                    ->where('status', 'started')
                                    ->first();

                                $completedExams = \App\Models\Exam::where('user_id', auth()->id())
                                    ->where('category_id', $category->id)
                                    ->where('status', 'finished')
                                    ->count();
                            @endphp

                            @if ($completedExams > 0)
                                <div class="mb-5 bg-green-50 rounded-lg p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="bg-green-100 p-1.5 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <span class="text-sm font-medium text-gray-700 ml-2">Ujian selesai</span>
                                        </div>
                                        <span
                                            class="text-sm font-bold bg-green-100 text-green-800 px-2.5 py-0.5 rounded-full">{{ $completedExams }}x</span>
                                    </div>
                                </div>
                            @endif

                            <div class="flex flex-col sm:flex-row gap-3">
                                @if ($unfinishedExam)
                                    <a href="{{ route('exams.continue', $unfinishedExam) }}"
                                        class="w-full flex items-center justify-center bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-3 px-4 rounded-xl transition duration-300 shadow-md hover:shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Lanjutkan Ujian
                                    </a>
                                @else
                                    <form action="{{ route('exams.start') }}" method="POST" class="w-full">
                                        @csrf
                                        <input type="hidden" name="category_id" value="{{ $category->id }}">
                                        <button type="submit"
                                            class="w-full flex items-center justify-center bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium py-3 px-4 rounded-xl transition duration-300 shadow-md hover:shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Siap Mengikuti Simulasi
                                        </button>
                                    </form>
                                @endif

                                @if ($completedExams > 0)
                                    <a href="#"
                                        class="text-center flex items-center justify-center text-gray-700 hover:text-blue-600 border-2 border-gray-200 hover:border-blue-400 font-medium py-3 px-4 rounded-xl transition duration-300 bg-white shadow-sm hover:shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                        Lihat Hasil
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($categories->isEmpty())
                <div class="bg-white rounded-2xl shadow-lg p-10 text-center max-w-2xl mx-auto border border-gray-100">
                    <div class="bg-blue-50 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Belum Ada Kategori Ujian</h3>
                    <p class="text-gray-600 mb-6 text-lg">Saat ini belum ada kategori ujian yang tersedia. Silakan cek
                        kembali nanti.</p>
                    <a href="#"
                        class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-xl transition duration-300 shadow-md hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Muat Ulang
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
