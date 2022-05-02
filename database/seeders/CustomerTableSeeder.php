<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i =1; $i <= 10; $i++) {
            $customer = [
                'name' => 'ユーザー' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            \Illuminate\Support\Facades\DB::table('customers')->insert($customer);

        }
    }
}
