<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
            [
                'nama_paket' => 'cuci kering',
                'type_id' => 1,
                'harga' => 5000
            ],
            [
                'nama_paket' => 'cuci basah',
                'type_id' => 1,
                'harga' => 3500
            ],
            [
                'nama_paket' => 'cuci setrika',
                'type_id' => 1,
                'harga' => 6500
            ],
            [
                'nama_paket' => 'cuci jas',
                'type_id' => 2,
                'harga' => 5000
            ],
            [
                'nama_paket' => 'cuci karpet',
                'type_id' => 2,
                'harga' => 7500
            ],
        ]);
    }
}
