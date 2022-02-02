<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
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
        $date = now()->subDays(random_int(1,1500))->toDateTimeString();
        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@app.com',
            'email_verified_at' => now(),
            'image' => set_avatar('Super Admin'),
            'password' =>Hash::make('123456789'), // password
            'remember_token' => Str::random(10),
        ]);
        $admin->assignRole('admin');

        for ($i = 1  ; $i <= 1000 ; $i++) {
            $name = $faker->name();
            $data[] = [
                'name' => $name,
                'email' => $faker->unique()->safeEmail(),
                'phone' => $faker->phoneNumber(),
                'email_verified_at' => now(),
                'image' => set_avatar($name),
                'password' =>Hash::make('123456789'), // password
                'remember_token' => Str::random(10),
                'created_at' => $date,
                'updated_at' => $date,
            ];
        }
        $chunks = array_chunk($data , 250);
        foreach ($chunks as $chunk){
            User::insert($chunk);
        }
        $this->command->info('users seeded Successfully');


    }
}
