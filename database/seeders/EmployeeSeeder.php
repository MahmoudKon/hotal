<?php

namespace Database\Seeders;

use App\Models\Employee;
use Faker\Factory;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        Employee::create([
            'username'    => 'super_admin',
            'email'       => 'super_admin@app.com',
            'phone'       => '333333333333',
            'address'     => 'Egypt',
            'birthday'    => $faker->date('Y-m-d', '2000'),
            'personal_id' => '22222222222222',
            'password'    => 123,
            'role'        => 'super_admin',
        ]);
    }
}
