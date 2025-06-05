<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'kelas' => 'nullable|string|max:50',
            'asal_sekolah' => 'nullable|string|max:100', 
            'jenjang_pendidikan' => 'nullable|in:SD,SMP,SMA,SMK,Perguruan Tinggi',
            'provinsi' => 'nullable|string|max:100',
            'kabupaten' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'kelurahan' => 'nullable|string|max:100',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama lengkap wajib diisi',
            'kelas.required' => 'Kelas wajib diisi',
            'asal_sekolah.required' => 'Asal sekolah wajib diisi',
            'jenjang_pendidikan.required' => 'Jenjang pendidikan wajib dipilih',
            'jenjang_pendidikan.in' => 'Jenjang pendidikan tidak valid',
            'provinsi.required' => 'Provinsi wajib diisi',
            'kabupaten.required' => 'Kabupaten wajib diisi',
            'kecamatan.required' => 'Kecamatan wajib diisi',
            'kelurahan.required' => 'Kelurahan wajib diisi',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih',
            'jenis_kelamin.in' => 'Jenis kelamin tidak valid'
        ];
    }
}
