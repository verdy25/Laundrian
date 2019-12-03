<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PengeluaranTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker_id = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {
            $transaksi = $faker_id->sentence($nbWords = 6, $variableNbWords = true);
            $nominal = $faker_id->numberBetween($min = 1000, $max = 5000);
            $jumlah = $faker_id->numberBetween($min = 1, $max = 10);
            $created_at = Carbon::now()->subDays(rand(1,28))->subMonth(rand(1,12))->format('Y-m-d H:i:s');

            DB::table('managements')->insert([
                'nama' => $transaksi,
                'jumlah' => $jumlah,
                'nominal' => $nominal,
                'created_at' => $created_at,
                'updated_at' => $created_at
            ]);

            DB::table('transactions')->insert([
                'transaksi' => 'K'.$i,
                'pengeluaran' => $jumlah * $nominal,
                'pemasukan' => 0,
                'created_at' => $created_at,
                'updated_at' => $created_at
           ]);
        }
    }
}
