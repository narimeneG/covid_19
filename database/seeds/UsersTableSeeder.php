<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->nom = 'Guellil';
        $user->prenom = 'Narimene';
        $user->email = 'guellil@gmail.com';
        $user->password = Hash::make('password');
        $user->image = 'uploads\users\2.jpg';
        $user->com_id = '1';
        $user->pro_id = '8';
        $user->save();

        $user = new User();
        $user->nom = 'Houbad';
        $user->prenom = 'Meriem';
        $user->email = 'Houbad@gmail.com';
        $user->password = Hash::make('password');
        $user->com_id = '1';
        $user->pro_id = '3';
        $user->save();

        $user = new User();
        $user->nom = 'Malti';
        $user->prenom = 'Nihel';
        $user->email = 'malti@gmail.com';
        $user->password = Hash::make('password');
        $user->image = 'uploads\users\1.jpg';
        $user->com_id = '9';
        $user->pro_id = '9';
        $user->save();
    }
}
