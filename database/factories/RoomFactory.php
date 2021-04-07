<?php

namespace Database\Factories;

use App\Models\Floor;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number'        => $this->faker->unique()->ean8(),
            'info'          => $this->faker->text(400),
            'people_count'  => rand(1, 8),
            'price'         => $this->faker->randomFloat(2, 500000, 50000),
            'floor_id'      => Floor::inRandomOrder()->first()->id,
        ];
    }
}
