<?php

namespace Database\Factories;

use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Schedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,5),
            'schedule_date' => $this->faker->date,
            'start_time' => $this->faker->time,
            'end_time' => $this->faker->time,
            'place' => $this->faker->numberBetween(0,2),
            'title' => $this->faker->randomLetter,
            'content' => $this->faker->randomLetter,
            'actual_time' => $this->faker->numberBetween(0,10)*15,
            'comment' => $this->faker->randomLetter,
            'delete_flag' => $this->faker->numberBetween(0,1),
        ];
    }
}
