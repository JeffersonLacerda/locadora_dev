<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(MediasTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(DistributorsTableSeeder::class);
        $this->call(MoviesTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
    }
}
