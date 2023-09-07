<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $date = now()->subDays(random_int(1, 1500))->toDateTimeString();
        $admin = User::updateOrCreate([
            'email'             => 'admin@app.com',
        ], [
            'name'              => 'Super Admin',
            'email_verified_at' => now(),
            'image'             => set_avatar('Super Admin'),
            'password'          => Hash::make('123456789'),     // password
            'remember_token'    => Str::random(10),
        ]);
        $admin->assignRole('admin');

        $this->command->info('users seeded Successfully');
    }
}
