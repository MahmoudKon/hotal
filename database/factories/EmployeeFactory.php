<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition ()
    {
        $role = ['admin', 'manager', 'employee'];
        return [
            'username'    => $this->faker->unique()->userName(),
            'email'       => $this->faker->unique()->safeEmail(),
            'phone'       => $this->faker->unique()->phoneNumber(),
            'address'     => $this->faker->address(),
            'birthday'    => $this->faker->date('Y-m-d', '2000'),
            'personal_id' => $this->faker->unique()->ean13() . $this->faker->randomDigitNotNull(),
            'password'    => 123,
            'role'        => $role[rand(0,2)],
        ];
    }
}
