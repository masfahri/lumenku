<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(ItemsTableSeeder::class);
        // $this->call(ItemDetailTableSeeder::class);
        // $this->call(PurchaseOrderSeeder::class);
        // $this->call(PurchaseOrderDetailSeeder::class);
        $this->call(PurchaseOrderItemSeeder::class);
    }
}
