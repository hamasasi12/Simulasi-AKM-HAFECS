@extends('layouts.examLayouts')

@section('content')
    <div class="min-h-screen py-8">
        <a href="{{ route('students.jenjang.index') }}"
            class="inline-flex items-center bg-white text-gray-700 px-4 py-2.5 rounded-lg shadow-md hover:shadow-lg hover:bg-gray-50 transition-all duration-200 font-medium border border-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
        </a>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h1 class="text-2xl font-bold text-gray-900 mb-2">Edit Profile</h1>
                <p class="text-gray-600">Perbarui informasi profil Anda di bawah ini</p>
            </div>

            <!-- Form -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <form action="{{ route('students.profile.update') }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Informasi Siswa -->
                    <div class="border-b border-gray-200 pb-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Siswa</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama Siswa -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Siswa <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="name" name="name"
                                    value="{{ old('name', $user->nama_siswa ?? '') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror"
                                    placeholder="Masukkan nama lengkap siswa" required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Kelas -->
                            <div>
                                <label for="kelas" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kelas <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="kelas" name="kelas"
                                    value="{{ old('kelas', $user->kelas ?? '') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('kelas') border-red-500 @enderror"
                                    placeholder="Contoh: XII IPA 1" required>
                                @error('kelas')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Asal Sekolah -->
                            <div class="md:col-span-2">
                                <label for="asal_sekolah" class="block text-sm font-medium text-gray-700 mb-2">
                                    Asal Sekolah <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="asal_sekolah" name="asal_sekolah"
                                    value="{{ old('asal_sekolah', $user->asal_sekolah ?? '') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('asal_sekolah') border-red-500 @enderror"
                                    placeholder="Masukkan nama sekolah" required>
                                @error('asal_sekolah')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Jenjang Pendidikan -->
                            <div>
                                <label for="jenjang_pendidikan" class="block text-sm font-medium text-gray-700 mb-2">
                                    Jenjang Pendidikan <span class="text-red-500">*</span>
                                </label>
                                <select id="jenjang_pendidikan" name="jenjang_pendidikan"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('jenjang_pendidikan') border-red-500 @enderror"
                                    required>
                                    <option value="">Pilih Jenjang Pendidikan</option>
                                    <option value="SD"
                                        {{ old('jenjang_pendidikan', $user->jenjang_pendidikan ?? '') == 'SD' ? 'selected' : '' }}>
                                        SD</option>
                                    <option value="SMP"
                                        {{ old('jenjang_pendidikan', $user->jenjang_pendidikan ?? '') == 'SMP' ? 'selected' : '' }}>
                                        SMP</option>
                                    <option value="SMA"
                                        {{ old('jenjang_pendidikan', $user->jenjang_pendidikan ?? '') == 'SMA' ? 'selected' : '' }}>
                                        SMA</option>
                                    <option value="SMK"
                                        {{ old('jenjang_pendidikan', $user->jenjang_pendidikan ?? '') == 'SMK' ? 'selected' : '' }}>
                                        SMK</option>
                                </select>
                                @error('jenjang_pendidikan')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Jenis Kelamin -->
                            <div>
                                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-2">
                                    Jenis Kelamin <span class="text-red-500">*</span>
                                </label>
                                <select id="jenis_kelamin" name="jenis_kelamin"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('jenis_kelamin') border-red-500 @enderror"
                                    required>
                                    <option value="{{ $user->jenis_kelamin }}">{{ $user->jenis_kelamin }}</option>
                                    <option value="Laki-laki"
                                        {{ old('jenis_kelamin', $user->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan"
                                        {{ old('jenis_kelamin', $user->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Alamat -->
                    <div class="pb-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Alamat</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Provinsi -->
                            <div>
                                <label for="provinsi" class="block text-sm font-medium text-gray-700 mb-2">
                                    Provinsi <span class="text-red-500">*</span>
                                </label>
                                <select id="province" name="provinsi"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('provinsi') border-red-500 @enderror border-b-2 border-blue-200 bg-transparent focus:border-blue-500 text-gray-600 p-1 transition-colors duration-300 appearance-none cursor-pointer"
                                    required>
                                    <option value="">Select Province</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->name }}"
                                            {{ old('provinsi', $user->provinsi ?? '') == $province->name ? 'selected' : '' }}>
                                            {{ $province->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('provinsi')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Kabupaten -->
                            <div>
                                <label for="kabupaten" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kabupaten/Kota <span class="text-red-500">*</span>
                                </label>
                                <select id="regency" name="kabupaten" disabled
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('kabupaten') border-red-500 @enderror border-b-2 border-blue-200 bg-transparent focus:border-blue-500 text-gray-600 p-1 transition-colors duration-300 appearance-none cursor-pointer"
                                    required>
                                    <option value="">Select Regency/City</option>
                                </select>
                                @error('kabupaten')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Kecamatan -->
                            <div>
                                <label for="kecamatan" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kecamatan <span class="text-red-500">*</span>
                                </label>
                                <select id="district" name="kecamatan" disabled
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('kecamatan') border-red-500 @enderror border-b-2 border-blue-200 bg-transparent focus:border-blue-500 text-gray-600 p-1 transition-colors duration-300 appearance-none cursor-pointer"
                                    required>
                                    <option value="">Select District</option>
                                </select>
                                @error('kecamatan')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Kelurahan -->
                            <div>
                                <label for="kelurahan" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kelurahan/Desa <span class="text-red-500">*</span>
                                </label>
                                <select id="village" name="kelurahan" disabled
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('kelurahan') border-red-500 @enderror border-b-2 border-blue-200 bg-transparent focus:border-blue-500 text-gray-600 p-1 transition-colors duration-300 appearance-none cursor-pointer"
                                    required>
                                    <option value="">Select Village</option>
                                </select>
                                @error('kelurahan')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div
                        class="flex flex-col sm:flex-row sm:justify-end sm:space-x-4 space-y-3 sm:space-y-0 pt-6 border-t border-gray-200">
                        <button type="button" onclick="history.back()"
                            class="w-full sm:w-auto px-6 py-2 border border-gray-300 text-gray-700 bg-white rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                            Batal
                        </button>
                        <button type="submit"
                            class="w-full sm:w-auto px-6 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div id="success-alert" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-md shadow-lg z-50">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                </svg>
                {{ session('success') }}
            </div>
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('success-alert').style.display = 'none';
            }, 5000);
        </script>
    @endif

    <!-- Script jQuery - Dipindah ke luar kondisi success -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Add loading indicators
            const addLoadingState = (element) => {
                element.append('<span class="loading ml-2 text-blue-500">Loading...</span>');
            };

            const removeLoadingState = (element) => {
                element.find('.loading').remove();
            };

            // Function to populate existing data on page load
            function populateExistingData() {
                const existingProvince = "{{ old('provinsi', $user->provinsi ?? '') }}";
                const existingRegency = "{{ old('kabupaten', $user->kabupaten ?? '') }}";
                const existingDistrict = "{{ old('kecamatan', $user->kecamatan ?? '') }}";
                const existingVillage = "{{ old('kelurahan', $user->kelurahan ?? '') }}";

                if (existingProvince) {
                    $('#province').val(existingProvince).trigger('change');
                }
            }

            $('#province').change(function() {
                var provinceName = $(this).val();
                const regencySelect = $('#regency');
                const districtSelect = $('#district');
                const villageSelect = $('#village');

                // Reset dependent dropdowns
                regencySelect.prop('disabled', !provinceName).empty().append(
                    '<option value="">Select Regency/City</option>');
                districtSelect.prop('disabled', true).empty().append(
                    '<option value="">Select District</option>');
                villageSelect.prop('disabled', true).empty().append(
                    '<option value="">Select Village</option>');

                if (provinceName) {
                    addLoadingState(regencySelect.parent());

                    $.get('/regencies/' + encodeURIComponent(provinceName))
                        .done(function(data) {
                            $.each(data, function(key, value) {
                                regencySelect.append('<option value="' + value.name + '">' +
                                    value.name + '</option>');
                            });
                            removeLoadingState(regencySelect.parent());

                            // Select existing regency if available
                            const existingRegency = "{{ old('kabupaten', $user->kabupaten ?? '') }}";
                            if (existingRegency) {
                                regencySelect.val(existingRegency).trigger('change');
                            }
                        })
                        .fail(function(xhr, status, error) {
                            console.error('Error fetching regencies:', error);
                            removeLoadingState(regencySelect.parent());
                            alert('Gagal memuat data kabupaten. Silakan coba lagi.');
                        });
                }
            });

            $('#regency').change(function() {
                var regencyName = $(this).val();
                const districtSelect = $('#district');
                const villageSelect = $('#village');

                // Reset dependent dropdowns
                districtSelect.prop('disabled', !regencyName).empty().append(
                    '<option value="">Select District</option>');
                villageSelect.prop('disabled', true).empty().append(
                    '<option value="">Select Village</option>');

                if (regencyName) {
                    addLoadingState(districtSelect.parent());

                    $.get('/districts/' + encodeURIComponent(regencyName))
                        .done(function(data) {
                            $.each(data, function(key, value) {
                                districtSelect.append('<option value="' + value.name + '">' +
                                    value.name + '</option>');
                            });
                            removeLoadingState(districtSelect.parent());

                            // Select existing district if available
                            const existingDistrict = "{{ old('kecamatan', $user->kecamatan ?? '') }}";
                            if (existingDistrict) {
                                districtSelect.val(existingDistrict).trigger('change');
                            }
                        })
                        .fail(function(xhr, status, error) {
                            console.error('Error fetching districts:', error);
                            removeLoadingState(districtSelect.parent());
                            alert('Gagal memuat data kecamatan. Silakan coba lagi.');
                        });
                }
            });

            $('#district').change(function() {
                var districtName = $(this).val();
                const villageSelect = $('#village');

                villageSelect.prop('disabled', !districtName).empty().append(
                    '<option value="">Select Village</option>');

                if (districtName) {
                    addLoadingState(villageSelect.parent());

                    $.get('/villages/' + encodeURIComponent(districtName))
                        .done(function(data) {
                            $.each(data, function(key, value) {
                                villageSelect.append('<option value="' + value.name + '">' +
                                    value.name + '</option>');
                            });
                            removeLoadingState(villageSelect.parent());

                            // Select existing village if available
                            const existingVillage = "{{ old('kelurahan', $user->kelurahan ?? '') }}";
                            if (existingVillage) {
                                villageSelect.val(existingVillage);
                            }
                        })
                        .fail(function(xhr, status, error) {
                            console.error('Error fetching villages:', error);
                            removeLoadingState(villageSelect.parent());
                            alert('Gagal memuat data kelurahan. Silakan coba lagi.');
                        });
                }
            });

            // Initialize existing data on page load
            populateExistingData();
        });
    </script>
@endsection
