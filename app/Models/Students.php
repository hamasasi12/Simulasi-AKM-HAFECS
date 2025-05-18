<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class Students extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'students';

    protected $fillable = [
        'nama_siswa',
        'kelas',
        'asal_sekolah',
        'provinsi',
        'kabupaten',
        'kelurahan',
        'kecamatan',
        'jenis_kelamin',
        'jenjang_pendidikan'
    ];
}
