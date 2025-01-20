<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amount = $this->command->getOutput()->ask("Koliko korisnika zelis da kreiras?", 500);
        $password = $this->command->getOutput()->ask("Koju sifru zelis da stavis?", "1111");

        $faker = Factory::create();

        $this->command->getOutput()->progressStart($amount);

        for($i=0; $i<$amount; $i++)
        {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make($password),
            ]);

            $this->command->getOutput()->progressAdvance(1);
        }
        $this->command->getOutput()->progressFinish();
    }
}
