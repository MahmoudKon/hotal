<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username'          => $this->faker->unique()->userName,
            'email'             => $this->faker->unique()->safeEmail,
            'phone'             => $this->faker->unique()->phoneNumber,
            'email_verified_at' => now(),
            'password'          => 123,
            'remember_token'    => Str::random(10),
            'personal_id'       => $this->faker->unique()->ean13() . $this->faker->randomDigitNotNull(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
