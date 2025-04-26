<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('products')->insert([
                [
                    'name' => 'dien thoai',
                    'image' => 'hinh1',
                    'price' => 500,
                    'quantity' => 5,
                    'description' => 'dsafdfafdsfs',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);

        DB::table('products')->insert([
            [
                    'name' => 'Tu lanh',
                    'image' => 'hinh2',
                    'price' => 600,
                    'quantity' => 10,
                    'description' => 'fdagdsffasfsa',
                    'created_at' => now(),
                    'updated_at' => now(),
            ],
        ]);
        DB::table('products')->insert([
            [
                    'name' => 'lap top',
                    'image' => 'hinh3',
                    'price' => 900,
                    'quantity' => 8,
                    'description' => 'asfsdgfdgfdgfbfrtreterterg',
                    'created_at' => now(),
                    'updated_at' => now(),
            ],
        ]);
        DB::table('products')->insert([
            [
                    'name' => 'may lanh',
                    'image' => 'hinh4',
                    'price' => 300,
                    'quantity' => 7,
                    'description' => 'nidvnjdnfuehdndjhed',
                    'created_at' => now(),
                    'updated_at' => now(),
            ],
        ]);

    }
}