<?php

namespace Database\Seeders;

use App\Models\ItemDetail;
use Illuminate\Database\Seeder;

class ItemDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemDetail::create([
            'item_id' => 99,
            'serial_number' => 5484932667,
            'id_seller' => null,
            'selling_price' => 10000,
            'purchase_price' => 9000,
        ]);
        
        ItemDetail::create([
            'item_id' => 999,
            'serial_number' => 8652592399,
            'id_seller' => null,
            'selling_price' => 15000,
            'purchase_price' => 12000,
        ]);

        ItemDetail::create([
            'item_id' => 9999,
            'serial_number' => 3439499689,
            'id_seller' => null,
            'selling_price' => 5000,
            'purchase_price' => 2000,
        ]);
    }
}
