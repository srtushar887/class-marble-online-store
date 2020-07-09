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
        // $this->call(UserSeeder::class);
//        factory(\App\category::class,10)->create();
//        factory(\App\tag::class,10)->create();
        factory(\App\product::class,200)->create();
    }
}
