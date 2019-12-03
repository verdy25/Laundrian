<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MembersTableSeeder extends Seeder
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
            DB::table('members')->insert([
                'nama' => $faker_id->name,
                'hp' => $faker_id->phoneNumber
            ]);
        }
    }
}
