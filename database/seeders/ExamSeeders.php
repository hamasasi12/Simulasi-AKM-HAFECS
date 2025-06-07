<?php

namespace Database\Seeders;

use App\Models\Exam;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExamSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::pluck('id')->toArray();
        $categories = Categories::pluck('id')->toArray();

        foreach (range(1, 50) as $i) {
            $startTime = Carbon::now()->subDays(rand(1, 30))->addMinutes(rand(0, 60));
            $endTime = (clone $startTime)->addMinutes(rand(30, 120));

            Exam::create([
                'user_id' => fake()->randomElement($users),
                'category_id' => fake()->randomElement($categories),
                'status' => fake()->randomElement(['started', 'finished']),
                'score' => fake()->numberBetween(0, 100),
                'start_time' => $startTime,
                'end_time' => $endTime,
            ]);
        }
    }
}
