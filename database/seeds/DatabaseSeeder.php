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
        $this->call(ProductsTableSeeder::class);
        $this->call(SlideTableSeeder::class);
        $this->call(IconTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
