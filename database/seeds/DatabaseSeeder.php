<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminsTableSeeder::class,
            CategoriesTableSeeder::class,
            WilayasTableSeeder::class,
            CommunesTableSeeder::class,
            ProfessionsTableSeeder::class,
            SoursesTableSeeder::class,
            MaladiesTableSeeder::class,
            ChiffresTableSeeder::class,
            UsersTableSeeder::class,
            Citoyens_MaladiesTableSeeder::class,
            IdeesTableSeeder::class,
            SignalsTableSeeder::class,
            IformationsTableSeeder::class,
            LikesTableSeeder::class,
            Info_MaladiesTableSeeder::class,
            Info_wilayasTableSeeder::class,
            Info_professionsTableSeeder::class,
            FavorisTableSeeder::class,
        ]);
    }
}
