<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User; // atau Student, kalau lo punya model Student
use Faker\Factory as Faker;

class StudentSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); 

        foreach (range(1, 20) as $i) {
            $user = User::create([
                'name' => $faker->userName,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), 
                'token' => 'HRP_' . Str::random(10),
                'kelas' => $faker->randomElement(['10 IPA 1', '11 IPS 2', '12 IPA 3']),
                'asal_sekolah' => $faker->company . ' High School',
                'jenjang_pendidikan' => $faker->randomElement(['SD', 'SMP', 'SMA']),
                'provinsi' => $faker->state,
                'kabupaten' => $faker->city,
                'kelurahan' => $faker->streetName,
                'kecamatan' => $faker->streetSuffix,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
            ]);

            switch ($user->jenjang_pendidikan) {
                case 'SD':
                    $user->assignRole('SD');
                    break;
                case 'SMP':
                    $user->assignRole('SMP');
                    break;
                case 'SMA':
                    $user->assignRole('SMA');
                    break;
            }
        }
    }
}
