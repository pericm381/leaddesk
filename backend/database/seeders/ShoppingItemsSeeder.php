<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoppingItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['id' => 1, 'name' => 'Item 1', 'amount' => 10],
            ['id' => 2, 'name' => 'Item 2', 'amount' => 200],
            ['id' => 3, 'name' => 'Item 3', 'amount' => 4],
            ['id' => 4, 'name' => 'Item 4', 'amount' => 4134],
            ['id' => 5, 'name' => 'Item 5', 'amount' => 785],
        ];

        foreach ($items as $item) {
            DB::table('items')->insert([
                'id' => $item['id'],
                'name' => $item['name'],
                'amount' => $item['amount'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
