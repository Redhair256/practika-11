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
        // $this->call(UsersTableSeeder::class);

        $this->call(LinksTableSeeder::class);
        $this->call(ClicksTableSeeder::class);
        $this->call(VisitorsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    
    }
}
