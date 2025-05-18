@extends('layouts.adminDashboardLayouts')


@push('ckeditor')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
@endpush

@section('content')
    <div class="max-w-5xl mx-auto px-4 pt-6 mt-4">
        <!-- Header with breadcrumb -->
        <div
            class="flex items-center justify-between p-4 mb-6 bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl shadow-lg">
            <a href="{{ route('admin.dashboard.jenjang.sma.index') }}"
                class="inline-flex items-center px-4 py-2 rounded-lg bg-white text-blue-800 hover:bg-blue-50 transition-colors duration-200 shadow">
                <i class="mr-2 fa-solid fa-arrow-left-long"></i> Kembali
            </a>
            <h1 class="text-xl font-bold text-white sm:text-2xl">Create Soal</h1>
        </div>

        <!-- Main form card -->
        <div class="bg-white border border-gray-100 rounded-xl shadow-md overflow-hidden">
            <!-- Form header -->
            <div class="bg-gradient-to-r from-gray-50 to-white p-2 border-b border-gray-100">
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                    Informasi Soal Jenjang SMA
                </h3>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form body -->
            <div class="p-2">
                <form action="{{ route('admin.dashboard.jenjang.sma.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <!-- Form fields in sections -->
                    <div class="space-y-8">
                        <!-- Personal Information Section -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="grid grid-cols-1 gap-6">
                                {{-- Kategori Level A --}}
                                <div>
                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-700">
                                        Kategori Soal Jenjang SMA
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 6h4v4H4V6zm6 0h4v4h-4V6zm6 0h4v4h-4V6zM4 12h4v4H4v-4zm6 0h4v4h-4v-4zm6 0h4v4h-4v-4z" />
                                            </svg>
                                        </div>
                                        <select id="category_id" name="category_id" onchange="showCustomInput()"
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option selected disabled>Pilih Kategori</option>
                                            <option value="5">SMA_LITERASI</option>
                                            <option value="6">SMA_NUMERASI</option>
                                        </select>
                                    </div>
                                    <x-input-error :messages="$errors->get('category_id')" class="mt-1 text-xs" />
                                </div>
                                {{-- <input type="text" hidden value="1" name="category_id"> --}}
                                    {{-- <x-input-error :messages="$errors->get('category_id')" class="mt-1 text-xs" /> --}}

                                <!-- text soal -->
                                <div>
                                    <div class="mb-4">
                                        <label for="description" class="block mb-2 text-sm font-medium text-gray-700">Text
                                            Soal</label>
                                        <textarea name="question_text" id="editor" rows="5"
                                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">{{ old('question_text') }}</textarea>
                                    </div>
                                    <x-input-error :messages="$errors->get('question_text')" class="mt-1 text-xs" />
                                </div>

                                {{-- gambar --}}
                                <div class="mb-4">
                                    <label for="image" class="block mb-2 text-sm font-medium text-gray-700">Gambar
                                        (Opsional)</label>
                                    <input type="file" name="image" id="image"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white focus:outline-none p-2.5">
                                    <x-input-error :messages="$errors->get('image')" class="mt-1 text-xs" />
                                </div>

                                <!-- Opsi A -->
                                <div>
                                    <label for="option_a" class="block mb-2 text-sm font-medium text-gray-700">
                                        Opsi A <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="option_a" id="option_a" required
                                        placeholder="Input option A"
                                        class="pl-3 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        value="{{ old('option_a') }}">
                                    <x-input-error :messages="$errors->get('option_a')" class="mt-1 text-xs" />
                                </div>

                                <!-- Opsi B -->
                                <div>
                                    <label for="option_b" class="block mb-2 text-sm font-medium text-gray-700">
                                        Opsi B <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="option_b" id="option_b" required
                                        placeholder="Input option B"
                                        class="pl-3 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        value="{{ old('option_b') }}">
                                    <x-input-error :messages="$errors->get('option_b')" class="mt-1 text-xs" />
                                </div>

                                <!-- Opsi C -->
                                <div>
                                    <label for="option_c" class="block mb-2 text-sm font-medium text-gray-700">
                                        Opsi C <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="option_c" id="option_c" required
                                        placeholder="Input option C"
                                        class="pl-3 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        value="{{ old('option_c') }}">
                                    <x-input-error :messages="$errors->get('option_c')" class="mt-1 text-xs" />
                                </div>

                                <!-- Opsi D -->
                                <div>
                                    <label for="option_d" class="block mb-2 text-sm font-medium text-gray-700">
                                        Opsi D <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="option_d" id="option_d" required
                                        placeholder="Input option D"
                                        class="pl-3 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        value="{{ old('option_d') }}">
                                    <x-input-error :messages="$errors->get('option_d')" class="mt-1 text-xs" />
                                </div>

                                <!-- Correct Answer -->
                                <div>
                                    <label for="correct_answer" class="block mb-2 text-sm font-medium text-gray-700">
                                        Jawaban Benar
                                    </label>
                                    <select id="correct_answer" name="correct_answer"
                                        class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option selected disabled>Pilih Jawaban Benar</option>
                                        <option value="a" {{ old('correct_answer') == 'a' ? 'selected' : '' }}>A
                                        </option>
                                        <option value="b" {{ old('correct_answer') == 'b' ? 'selected' : '' }}>B
                                        </option>
                                        <option value="c" {{ old('correct_answer') == 'c' ? 'selected' : '' }}>C
                                        </option>
                                        <option value="d" {{ old('correct_answer') == 'd' ? 'selected' : '' }}>D
                                        </option>
                                    </select>
                                    <x-input-error :messages="$errors->get('correct_answer')" class="mt-1 text-xs" />
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-center mt-8">
                        <button type="submit"
                            class="px-6 py-3 text-base font-medium text-white bg-gradient-to-r from-[#0C548C] to-[#2E4D69] rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Create Soal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <style>
        /* Add smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }
    </style>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
        if (performance.navigation.type === 2) {
            // If page is accessed via Back button, reload to clear session flash
            location.reload();
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
