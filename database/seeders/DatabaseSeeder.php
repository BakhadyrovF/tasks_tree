<?php

namespace Database\Seeders;

use App\Helpers\Helper;
use App\Models\Task;
use Faker\Generator;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private static $increment = 0;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $i = 1;
        //? Root tasks
        Task::factory(5)->create();

        //? Child tasks - 1, count - 10
        while ($i <= 10) {
            Task::create([
                'title' => Helper::randomStr(5),
                'body' => Helper::randomStr(15),
                'is_completed' => 0,
                'parent_id' => random_int(1, 5),
                'user_id' => 1
            ]);
            $i++;
        }
        info($i);

        //? Child tasks - 2, count - 20
        while ($i >= 10 && $i < 30) {
            Task::create([
                'title' => Helper::randomStr(5),
                'body' => Helper::randomStr(15),
                'is_completed' => 0,
                'parent_id' => random_int(6, 15),
                'user_id' => 1
            ]);
            $i++;
        }

        //? Child tasks - 3, count - 50
        while ($i >= 30 && $i < 80) {
            Task::create([
                'title' => Helper::randomStr(5),
                'body' => Helper::randomStr(15),
                'is_completed' => 0,
                'parent_id' => random_int(16, 35),
                'user_id' => 1
            ]);
            $i++;
        }
    }
}
