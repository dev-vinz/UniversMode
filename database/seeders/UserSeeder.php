<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
    |*                           PUBLIC                            *|
    \* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'firstName' => 'Steeve',
                'lastName' => 'Jeannin',
                'email' => 'steeve@jeannin.ch',
                'email_verified_at' => now(),
                'password' => '$2y$10$kVCcL1RtTWNHRSLVM1ouxO5LExCvsbwJQ7.uc9LLosaxQMoXMpmuO',
                'isAdmin' => false,
                'hasNewsletter' => false,
                'remember_token' => Str::random(10),
            ],
            [
                'firstName' => 'Vincent',
                'lastName' => 'Jeannin',
                'email' => 'vincent@jeannin.ch',
                'email_verified_at' => now(),
                'password' => '$2y$10$Dbnj5PuK5YSo1F8Cl7B4Lu9MdNQrQV8mF9e3y5RL3uxP2jLpy9siK',
                'isAdmin' => false,
                'hasNewsletter' => false,
                'remember_token' => Str::random(10),
            ],
            [
                'firstName' => 'Sarah',
                'lastName' => 'Jeannin',
                'email' => 'sarah@jeannin.ch',
                'email_verified_at' => now(),
                'password' => '$2y$10$Pv5gn3tgCbPKenKx7H1/xuYSoMEtoAkVAdK0utLBa35voveXYRLl6',
                'isAdmin' => true,
                'hasNewsletter' => false,
                'remember_token' => Str::random(10),
            ],
            [
                'firstName' => 'Dupond',
                'lastName' => 'Dupont',
                'email' => 'dupond@dupont.be',
                'email_verified_at' => now(),
                'password' => '$2y$10$wRTUawtt1fgXAKHPDHT5LewOlGibY8xhNABEWYJhUD0ntG9EWJ8nW',
                'isAdmin' => true,
                'hasNewsletter' => false,
                'remember_token' => Str::random(10),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
