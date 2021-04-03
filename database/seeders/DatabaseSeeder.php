<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (glob(public_path('uploads/images/*/*.png')) as $file)
            unlink($file);

        $this->call(LaratrustSeeder::class);
        $this->call(EmployeeSeeder::class);
        \App\Models\Employee::factory(20)->create();
        \App\Models\User::factory(20)->create();
    }
}
