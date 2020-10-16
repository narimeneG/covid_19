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

        $user = new User();
        $user->nom = 'Bamrik';
        $user->prenom = 'ilyes';
        $user->email = 'lyas9111@yahoo.fr';
        $user->password = Hash::make('password');
        $user->com_id = '1';
        $user->pro_id = '2';
        $user->save();

        $user = new User();
        $user->nom = 'ayad';
        $user->prenom = 'fouad';
        $user->email = 'ayadinfermier@gmail.com';
        $user->password = Hash::make('password');
        $user->com_id = '8';
        $user->pro_id = '4';
        $user->save();

        $user = new User();
        $user->nom = 'azzaz ';
        $user->prenom = 'rachid';
        $user->email = 'rachid31A@yahoo.fr';
        $user->password = Hash::make('password');
        $user->com_id = '4';
        $user->pro_id = '11';
        $user->save();

        $user = new User();
        $user->nom = 'hassaine ';
        $user->prenom = 'djamal';
        $user->email = 'cabinetHssaineD@yahoo.fr';
        $user->password = Hash::make('password');
        $user->com_id = '9';
        $user->pro_id = '3';
        $user->save();

        $user = new User();
        $user->nom = 'bachiri';
        $user->prenom = 'karim';
        $user->email = 'krimoBa1970@yahoo.fr';
        $user->password = Hash::make('password');
        $user->com_id = '11';
        $user->pro_id = '5';
        $user->save();
        
        $user = new User();
        $user->nom = 'sahnoune';
        $user->prenom = 'faiza';
        $user->email = 'crecheSahnoun13@yahoo.fr';
        $user->password = Hash::make('password');
        $user->com_id = '10';
        $user->pro_id = '15';
        $user->save();
    }
}
