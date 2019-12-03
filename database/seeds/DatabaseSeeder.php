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
        $this->call(MembersTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(PackagesTableSeeder::class);
        $this->call(PemasukanTablesSeeder::class);
        $this->call(PengeluaranTablesSeeder::class);
    }
}
