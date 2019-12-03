<?php

use App\Package;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PemasukanTablesSeeder extends Seeder
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
            $member_id = $faker_id->numberBetween($min = 1, $max = 50);
            $package_id = $faker_id->numberBetween($min = 1, $max = 5);
            $pcs = $faker_id->numberBetween($min = 1, $max = 10);
            $package = Package::find($package_id);
            $cost = $package->harga * $pcs;
            $transaksi = "Laundry ID".$member_id;
            $created_at = Carbon::now()->subDays(rand(1,28))->subMonth(rand(1,12))->format('Y-m-d H:i:s');

            DB::table('launders')->insert([
                'member_id' => $member_id,
                'package_id' => $package_id,
                'pcs' => $pcs,
                'cost' => $cost,
                'created_at' => $created_at,
                'updated_at' => $created_at
            ]);

            DB::table('transactions')->insert([
                'transaksi' => 'M'.$i,
                'pengeluaran' => 0,
                'pemasukan' => $cost,
                'created_at' => $created_at,
                'updated_at' => $created_at
           ]);
        }
    }
}
