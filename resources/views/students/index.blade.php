@extends('layouts.studentsLayouts')

@section('content')
     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p class="mb-6">Selamat datang di platform sertifikasi. Silakan pilih salah satu menu di bawah ini untuk memulai.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-blue-100 p-6 rounded-lg shadow">
                            <h3 class="text-lg font-bold mb-2">Mulai Ujian</h3>
                            <p class="text-gray-600 mb-4">Pilih kategori ujian dan mulai mengerjakan soal sertifikasi.</p>
                            <a href="{{ route('exams.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                                Mulai Ujian
                            </a>
                        </div>

                        <div class="bg-green-100 p-6 rounded-lg shadow">
                            <h3 class="text-lg font-bold mb-2">Riwayat Ujian</h3>
                            <p class="text-gray-600 mb-4">Lihat hasil dan detail ujian yang telah Anda selesaikan.</p>
                            <a href="#" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block">
                                Lihat Riwayat
                            </a>
                        </div>

                        <div class="bg-purple-100 p-6 rounded-lg shadow">
                            <h3 class="text-lg font-bold mb-2">Profil</h3>
                            <p class="text-gray-600 mb-4">Perbarui informasi akun dan pengaturan profil Anda.</p>
                            <a href="#" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded inline-block">
                                Edit Profil
                            </a>
                        </div>
                    </div>

                    @php
                        $latestExams = Auth::user()->exams()
                            ->where('status', 'finished')
                            ->with('category')
                            ->orderBy('created_at', 'desc')
                            ->limit(5)
                            ->get();
                    @endphp

                    @if($latestExams->isNotEmpty())
                        <div class="mt-8">
                            <h3 class="text-lg font-bold mb-4">Hasil Ujian Terakhir</h3>
                            
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Kategori
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Tanggal
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Skor
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($latestExams as $exam)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">{{ $exam->category->name }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">{{ $exam->created_at->format('d M Y, H:i') }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                        {{ $exam->score }}/30 ({{ number_format(($exam->score / 30) * 100, 2) }}%)
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <a href="#" class="text-blue-600 hover:text-blue-900">
                                                        Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="mt-4 text-right">
                                <a href="#" class="text-blue-600 hover:text-blue-900">
                                    Lihat Semua Riwayat
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

