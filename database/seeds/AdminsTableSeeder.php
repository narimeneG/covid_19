<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin= new Admin();
        $admin->nom = 'guellil';
        $admin->prenom = 'narimen';
        $admin->username = 'guellil';
        $admin->job = 'web Developer';
        $admin->email = 'admin@gmail.com';
        $admin->password = Hash::make('password');
        $admin->image = 'uploads\admin\2.jpg';
        $admin->save();

        $admin= new Admin();
        $admin->nom = 'houbad';
        $admin->prenom = 'meriem';
        $admin->username = 'mimi';
        $admin->job = 'web Deseigner';
        $admin->email = 'admin1@gmail.com';
        $admin->password = Hash::make('password');
        $admin->image = 'uploads\admin\3.jpg';
        $admin->save();
    }
}
