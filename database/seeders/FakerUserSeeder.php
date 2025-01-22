<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FakerUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = $this->command->getOutput()->ask('What is your email?');

        if($email === null)
        {
            $this->command->getOutput()->error("You have not provided an email.");
            return;
        }

        $password = $this->command->getOutput()->ask('What is your password?');

        if($password === null)
        {
            $this->command->getOutput()->error("You have not provided an password.");
            return;
        }

        $username = $this->command->getOutput()->ask('What is your username?');

        if($username === null)
        {
            $this->command->getOutput()->error("You have not provided an username.");
            return;
        }

        $user = User::where(['email' => $email])->first();
        if($user instanceof User)
        {
            $this->command->getOutput()->error("User with this email already exists.");
            return; //kod se ovde zaustavlja zbog ovog return;
        }


        User::create([
            'email' => $email,
            'password' => Hash::make($password),
            'name' => $username,
        ]);

        $this->command->getOutput()->info("User created successfully with username $username and email $email.");
    }
}
