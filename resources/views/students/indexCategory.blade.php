@extends('layouts.studentsLayouts')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($categories as $category)
                        <div class="bg-gray-50 rounded-lg shadow-md p-6">
                            <h3 class="text-lg font-bold mb-2">{{ $category->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ $category->description }}</p>
                            <p class="text-sm text-gray-500 mb-4">Jumlah Soal: 30 soal pilihan ganda</p>
                            
                            {{-- Cek apakah ada ujian yang belum selesai --}}
                            @php
                                $unfinishedExam = \App\Models\Exam::where('user_id', auth()->id())
                                    ->where('category_id', $category->id)
                                    ->where('status', 'started')
                                    ->first();
                            @endphp
                            
                            @if($unfinishedExam)
                                <a href="{{ route('exams.continue', $unfinishedExam) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded inline-block">
                                    Lanjutkan Ujian
                                </a>
                            @else
                                <form action="{{ route('exams.start') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Mulai Ujian
                                    </button>
                                </form>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection