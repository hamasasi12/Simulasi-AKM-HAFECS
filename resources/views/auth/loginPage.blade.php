@extends('layouts.LandingPageLayouts')

{{-- @section('title', 'Teaching and Learning Certification') --}}

@section('content')
    <div class="bg-gray-700 min-h-screen w-full flex items-center justify-center p-4">
        <div class="bg-[#F4CC7C] shadow-xl rounded-3xl overflow-hidden w-full max-w-4xl flex flex-col md:flex-row">
            <!-- kiri Section -->
            <div class="hidden md:flex flex-col justify-center items-center w-full md:w-1/2 bg-gradient-to-br from-[#A6BFCF] to-[#2E4D69] p-10 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-full opacity-10">
                    <div class="absolute top-10 left-10 w-20 h-20 rounded-full bg-white"></div>
                    <div class="absolute bottom-20 right-10 w-32 h-32 rounded-full bg-white"></div>
                </div>

                <h1 class="text-4xl font-bold text-white text-center relative z-10 mb-4">Selamat Datang</h1>
                <p class="text-white text-center mb-8">Welcome to our platform</p>
                <div class="mt-6 w-44 h-44 flex items-center justify-center">
                    <img src="{{ asset('images/HRP.jpg') }}" alt="Logo" class="max-w-full rounded-lg">
                </div>
            </div>

            <!-- kanan Section -->
            <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center bg-white">
                <div class="md:hidden text-center mb-8">
                    <h1 class="text-3xl font-bold text-[#0C548C]">Admin Dashboard</h1>
                    <p class="text-[#5F809C] text-sm">Silahkan Login</p>
                </div>

                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-2xl font-bold text-[#2E4D69]">Masuk</h2>
                </div>

                <form action="{{ route('admin.login.process') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-6 group">
                        <label class="text-sm font-medium text-[#2E4D69] block mb-2">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-[#5F809C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="email" placeholder="your.email@example.com"
                                class="w-full pl-10 p-4 border border-[#5F809C] rounded-xl focus:ring-2 focus:ring-[#0C548C] focus:border-[#0C548C] transition"
                                required name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6 group">
                        <label class="text-sm font-medium text-[#2E4D69] block mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-[#5F809C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input type="password" placeholder="Your Password"
                                class="w-full pl-10 p-4 border border-[#5F809C] rounded-xl focus:ring-2 focus:ring-[#0C548C] focus:border-[#0C548C] transition"
                                name="password" required>
                            @error('password')
                                <div class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-between items-center mb-8">
                        {{-- <div class="flex items-center">
                            <input type="checkbox" id="remember" name="remember"
                                class="w-4 h-4 text-[#0C548C] border-gray-300 rounded focus:ring-[#0C548C]">
                            <label for="remember" class="ml-2 text-sm text-[#2E4D69]">Remember me</label>
                        </div> --}}
                        {{-- <a href="#" class="text-sm text-[#0C548C] hover:text-[#2E4D69] hover:underline transition">Lupa password?</a> --}}
                    </div>
                    @if (session('error'))
                        <div class="text-red-500 text-sm">
                            {{ session('error') }}
                        </div>
                    @endif


                    <button class="w-full bg-gradient-to-r from-[#0C548C] to-[#2E4D69] text-white py-4 rounded-xl hover:from-[#063B67] hover:to-[#1C3A58] transition shadow-lg transform hover:translate-y-0.5 hover:shadow-xl font-bold">
                        MASUK
                    </button>
                </form>

                {{-- <div class="relative flex items-center justify-center my-8">
                     <div class="absolute inset-0 flex items-center">
                         <div class="w-full border-t border-gray-300"></div>
                     </div>
                     <div class="relative px-4 bg-gray-50">
                         <p class="text-sm text-gray-500 font-medium">Atau Masuk Dengan</p>
                     </div>
                 </div> --}}

                {{-- <div class="flex justify-center mb-6">
                     <a href="#"
                    class="w-full flex items-center justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white hover:bg-gray-50 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M23.766 12.2764C23.766 11.4607 23.6999 10.6406 23.5588 9.83807H12.24V14.4591H18.7217C18.4528 15.9494 17.5885 17.2678 16.323 18.1056V21.104H20.19C22.4608 19.014 23.766 15.9274 23.766 12.2764Z"
                            fill="#4285F4" />
                        <path
                            d="M12.2401 24.0008C15.4766 24.0008 18.2059 22.9382 20.1945 21.1039L16.3276 18.1055C15.2517 18.8375 13.8627 19.252 12.2445 19.252C9.11388 19.252 6.45934 17.1399 5.50693 14.3003H1.5166V17.3912C3.55371 21.4434 7.7029 24.0008 12.2401 24.0008Z"
                            fill="#34A853" />
                        <path
                            d="M5.50253 14.3003C4.99987 12.8099 4.99987 11.1961 5.50253 9.70575V6.61481H1.51649C-0.18551 10.0056 -0.18551 14.0004 1.51649 17.3912L5.50253 14.3003Z"
                            fill="#FBBC04" />
                        <path
                            d="M12.2401 4.74966C13.9509 4.7232 15.6044 5.36697 16.8434 6.54867L20.2695 3.12262C18.1001 1.0855 15.2208 -0.034466 12.2401 0.000808666C7.7029 0.000808666 3.55371 2.55822 1.5166 6.61481L5.50264 9.70575C6.45505 6.86173 9.1096 4.74966 12.2401 4.74966Z"
                            fill="#EA4335" />
                    </svg>
                    Google
                </a>
                </div> --}}

                {{-- <p class="text-center text-sm text-[#2E4D69]">
                    Belum punya akun?
                    <a href="#"
                        class="text-[#0C548C] font-semibold hover:text-[#2E4D69] hover:underline transition">Daftar Sekarang</a>
                </p> --}}
            </div>
        </div>
    </div>
@endsection
