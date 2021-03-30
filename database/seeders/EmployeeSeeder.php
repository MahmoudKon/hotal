<?php

namespace Database\Seeders;

use App\Models\Employee;
use Faker\Factory;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $super_admin = Employee::create([
            'image'       => 'employee.jpg',
            'username'    => 'super_admin',
            'email'       => 'super_admin@app.com',
            'phone'       => '333333333333',
            'address'     => 'Egypt',
            'birthday'    => $faker->date('Y-m-d', '2000'),
            'personal_id' => '22222222222222',
            'emp_id'      => '11111111',
            'password'    => bcrypt(123),
        ]);
        $super_admin->attachRole('super_admin');

        $admin = Employee::create([
            'image'       => 'employee.jpg',
            'username'    => 'admin',
            'email'       => 'admin@app.com',
            'phone'       => '444444444444',
            'address'     => 'Egypt',
            'birthday'    => $faker->date('Y-m-d', '2000'),
            'personal_id' => '55555555555555',
            'emp_id'      => '66666666',
            'created_by'  => 1,
            'password'    => bcrypt(123),
        ]);
        $admin->attachRole('admin');

        $manager = Employee::create([
            'image'       => 'employee.jpg',
            'username'    => 'manager',
            'email'       => 'manager@app.com',
            'phone'       => '777777777777',
            'address'     => 'Egypt',
            'birthday'    => $faker->date('Y-m-d', '2000'),
            'personal_id' => '88888888888888',
            'emp_id'      => '99999999',
            'created_by'  => 1,
            'password'    => bcrypt(123),
        ]);
        $manager->attachRole('manager');

        $emp = Employee::create([
            'image'       => 'employee.jpg',
            'username'    => 'employee',
            'email'       => 'employee@app.com',
            'phone'       => '123123123123',
            'address'     => 'Egypt',
            'birthday'    => $faker->date('Y-m-d', '2000'),
            'personal_id' => '12312312312312',
            'emp_id'      => '12312312',
            'created_by'  => 1,
            'password'    => bcrypt(123),
        ]);
        $emp->attachRole('employee');

        for ($i = 0; $i < 20; $i++) {
            $normal = Employee::create([
                'image'       => $faker->image(public_path('uploads/images/employees'), 200, 200, 'Employees', false),
                'username'    => $faker->unique()->userName(),
                'email'       => $faker->unique()->safeEmail(),
                'phone'       => $faker->unique()->phoneNumber(),
                'address'     => $faker->address(),
                'birthday'    => $faker->date('Y-m-d', '2000'),
                'personal_id' => $faker->unique()->ean13() . $faker->randomDigitNotNull(),
                'emp_id'      => $faker->unique()->ean8(),
                'created_by'  => 1,
            'password'        => bcrypt(123),
            ]);
            $normal->attachRole('employee');
        }
    }
}
