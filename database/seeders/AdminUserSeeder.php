<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminUser::create([
            'name' => 'Kevin',
            'email' => 'kevinestrada@gmail.com',
            'password' => '$2y$10$PPsA8vO5ZwdbztOjqJsHOuTsO5ftYol/AvV6kWveB.0n7JhmP6bLy',
        ]);
    }
}
