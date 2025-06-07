@extends('layouts.adminDashboardLayouts')

@section('content')
    <div class="max-w-5xl mx-auto px-4 pt-6 mt-4">
        <!-- Header with breadcrumb -->
        <div class="flex items-center justify-between p-4 mb-6 bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl shadow-lg">
            <a href="{{ route('admin.users.index') }}"
                class="inline-flex items-center px-4 py-2 rounded-lg bg-white text-blue-800 hover:bg-blue-50 transition-colors duration-200 shadow">
                <i class="mr-2 fa-solid fa-arrow-left-long"></i> Kembali
            </a>
            <h1 class="text-xl font-bold text-white sm:text-2xl">Edit Data Siswa</h1>
        </div>

        <!-- Main form card -->
        <div class="bg-white border border-gray-100 rounded-xl shadow-md overflow-hidden">
            <!-- Card header -->
            <div class="bg-gradient-to-r from-gray-50 to-white p-4 border-b border-gray-100">
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Form Edit Siswa
                </h3>
            </div>

            <!-- Card body -->
            <div class="p-6">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-6">
                        <!-- User Information Section -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h4 class="font-bold text-lg text-gray-700 mb-4">Informasi Dasar</h4>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Nama Lengkap -->
                                <div>
                                    <label for="name" class="block font-medium text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                                    <input type="text" id="name" name="name" required
                                        class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition duration-200"
                                        placeholder="Masukkan nama lengkap"
                                        value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- School Information Section -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h4 class="font-bold text-lg text-gray-700 mb-4">Informasi Sekolah</h4>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Kelas -->
                                <div>
                                    <label for="kelas" class="block font-medium text-gray-700 mb-2">Kelas</label>
                                    <input type="text" id="kelas" name="kelas"
                                        class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition duration-200"
                                        placeholder="Contoh: 10 IPA 1"
                                        value="{{ old('kelas', $user->kelas) }}">
                                    @error('kelas')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Asal Sekolah -->
                                <div>
                                    <label for="asal_sekolah" class="block font-medium text-gray-700 mb-2">Asal Sekolah</label>
                                    <input type="text" id="asal_sekolah" name="asal_sekolah"
                                        class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition duration-200"
                                        placeholder="Nama sekolah asal"
                                        value="{{ old('asal_sekolah', $user->asal_sekolah) }}">
                                    @error('asal_sekolah')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Jenjang Pendidikan -->
                                <div>
                                    <label for="jenjang_pendidikan" class="block font-medium text-gray-700 mb-2">Jenjang Pendidikan</label>
                                    <select id="jenjang_pendidikan" name="jenjang_pendidikan"
                                        class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition duration-200">
                                        <option value="">Pilih Jenjang</option>
                                        <option value="SD" {{ old('jenjang_pendidikan', $user->jenjang_pendidikan) == 'SD' ? 'selected' : '' }}>SD</option>
                                        <option value="SMP" {{ old('jenjang_pendidikan', $user->jenjang_pendidikan) == 'SMP' ? 'selected' : '' }}>SMP</option>
                                        <option value="SMA" {{ old('jenjang_pendidikan', $user->jenjang_pendidikan) == 'SMA' ? 'selected' : '' }}>SMA</option>
                                    </select>
                                    @error('jenjang_pendidikan')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Token -->
                                <div>
                                    <label for="token" class="block font-medium text-gray-700 mb-2">Token</label>
                                    <input type="text" id="token" name="token"
                                        class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition duration-200"
                                        placeholder="Masukkan token (jika ada)"
                                        value="{{ old('token', $user->token) }}">
                                    @error('token')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Address Information Section -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h4 class="font-bold text-lg text-gray-700 mb-4">Informasi Alamat</h4>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Provinsi -->
                                <div>
                                    <label for="provinsi" class="block font-medium text-gray-700 mb-2">Provinsi <span class="text-red-500">*</span></label>
                                    <select id="province" name="provinsi"
                                        class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition duration-200">
                                        <option value="">Pilih Provinsi</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->name }}"
                                                {{ old('provinsi', $user->provinsi) == $province->name ? 'selected' : '' }}>
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
                                    <label for="kabupaten" class="block font-medium text-gray-700 mb-2">Kabupaten/Kota <span class="text-red-500">*</span></label>
                                    <select id="regency" name="kabupaten" disabled
                                        class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition duration-200">
                                        <option value="">Pilih Kabupaten/Kota</option>
                                    </select>
                                    @error('kabupaten')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Kecamatan -->
                                <div>
                                    <label for="kecamatan" class="block font-medium text-gray-700 mb-2">Kecamatan <span class="text-red-500">*</span></label>
                                    <select id="district" name="kecamatan" disabled
                                        class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition duration-200">
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                    @error('kecamatan')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Kelurahan -->
                                <div>
                                    <label for="kelurahan" class="block font-medium text-gray-700 mb-2">Kelurahan <span class="text-red-500">*</span></label>
                                    <select id="village" name="kelurahan" disabled
                                        class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition duration-200">
                                        <option value="">Pilih Kelurahan</option>
                                    </select>
                                    @error('kelurahan')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information Section -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h4 class="font-bold text-lg text-gray-700 mb-4">Informasi Tambahan</h4>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Jenis Kelamin -->
                                <div>
                                    <label for="jenis_kelamin" class="block font-medium text-gray-700 mb-2">Jenis Kelamin</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin"
                                        class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition duration-200">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Form actions -->
                        <div class="flex justify-end space-x-4 pt-6">
                            <button type="reset"
                                class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200 shadow">
                                Reset
                            </button>
                            <button type="submit"
                                class="px-6 py-3 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition-colors duration-200 shadow">
                                Update Data Siswa
                            </button>
                        </div>
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
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Add loading indicators
            const addLoadingState = (element) => {
                element.append('<span class="loading ml-2 text-blue-500">Memuat...</span>');
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
                    '<option value="">Pilih Kabupaten/Kota</option>');
                districtSelect.prop('disabled', true).empty().append(
                    '<option value="">Pilih Kecamatan</option>');
                villageSelect.prop('disabled', true).empty().append(
                    '<option value="">Pilih Kelurahan</option>');

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
                            console.error('Error fetching kabupaten:', error);
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
                    '<option value="">Pilih Kecamatan</option>');
                villageSelect.prop('disabled', true).empty().append(
                    '<option value="">Pilih Kelurahan</option>');

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
                            console.error('Error fetching kecamatan:', error);
                            removeLoadingState(districtSelect.parent());
                            alert('Gagal memuat data kecamatan. Silakan coba lagi.');
                        });
                }
            });

            $('#district').change(function() {
                var districtName = $(this).val();
                const villageSelect = $('#village');

                villageSelect.prop('disabled', !districtName).empty().append(
                    '<option value="">Pilih Kelurahan</option>');

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
                            console.error('Error fetching kelurahan:', error);
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