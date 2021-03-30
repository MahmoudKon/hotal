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
        return [
            'image'       => $this->faker->image(public_path('uploads/images/employees'), 200, 200, 'Employees', false),
            'username'    => $this->faker->unique()->userName(),
            'email'       => $this->faker->unique()->safeEmail(),
            'phone'       => $this->faker->unique()->phoneNumber(),
            'address'     => $this->faker->address(),
            'birthday'    => $this->faker->date('Y-m-d', '2000'),
            'personal_id' => $this->faker->unique()->ean13() . $this->faker->randomDigitNotNull(),
            'emp_id'      => $this->faker->unique()->ean8(),
            'created_by'  => 1,
        ];
    }
}
