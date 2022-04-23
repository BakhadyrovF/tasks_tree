<?php

namespace Database\Factories;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    private static $increment = 0;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $parentsId = range(1, 5);
        return [
            'title' => Helper::randomStr(10),
            'body' => Helper::randomStr(20),
            'is_completed' => 0,
            'user_id' => 1
        ];
    }
}
