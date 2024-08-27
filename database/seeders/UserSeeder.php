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
            ],
            [
                'firstName' => 'Vincent',
                'lastName' => 'Jeannin',
                'email' => 'vincent@jeannin.ch',
                'email_verified_at' => now(),
                'password' => '$2y$12$rzcOkZ8WCgkJXsDP74KgiuM/6RhxidZKue4kAu.mEs.S/uzOSTjTy',
                'isAdmin' => false,
                'hasNewsletter' => false,
            ],
            [
                'firstName' => 'Sarah',
                'lastName' => 'Jeannin',
                'email' => 'sarah@jeannin.ch',
                'email_verified_at' => now(),
                'password' => '$2y$10$Pv5gn3tgCbPKenKx7H1/xuYSoMEtoAkVAdK0utLBa35voveXYRLl6',
                'isAdmin' => true,
                'hasNewsletter' => false,
            ],
            [
                'firstName' => 'Dupond',
                'lastName' => 'Dupont',
                'email' => 'dupond@dupont.be',
                'email_verified_at' => now(),
                'password' => '$2y$10$wRTUawtt1fgXAKHPDHT5LewOlGibY8xhNABEWYJhUD0ntG9EWJ8nW',
                'isAdmin' => true,
                'hasNewsletter' => false,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
