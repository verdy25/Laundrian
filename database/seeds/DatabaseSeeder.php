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
        // $this->call(UsersTableSeeder::class);

        DB::table('types')->insert([
            'type' => 'kiloan'
        ]);

        DB::table('types')->insert([
            'type' => 'satuan'
        ]);

        DB::table('members')->insert([
            'nama' => 'verdy',
            'hp' => '0895601673628'
        ]);

        DB::table('payment_status')->insert([
            'status' => 'lunas'
        ]);

        DB::table('payment_status')->insert([
            'status' => 'belum lunas'
        ]);
        
    }
}
