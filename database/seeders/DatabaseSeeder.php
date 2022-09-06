<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Actions\Fortify\CreateNewUser;

class DatabaseSeeder extends Seeder
{


    public function __construct()
    {
        $this->createNewUser = new CreateNewUser();
        $this->user = new User();
    }


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $initialUsers = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.lk',
                'password' => '123456789',
                'password_confirmation' => '123456789',
            ]
        ];

        foreach ($initialUsers as $user) {
            $admin = $this->user->getByEmail($user['email']);
            if (!$admin) {
                $this->createNewUser->create($user);
            }
        }
    }
}
