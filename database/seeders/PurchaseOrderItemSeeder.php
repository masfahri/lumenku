<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PurchaseOrderItem;

class PurchaseOrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Purchase Order ID is 9
        PurchaseOrderItem::create([
            'po_id' => 9,
            'item_id' => 99,
            'notes' => 'Completely revolutionize backend convergence with standardized functionalities. Energistically initiate ethical relationships and fully researched channels. Continually incubate B2C.',
            'qty' => 1
        ]);
        
        PurchaseOrderItem::create([
            'po_id' => 9,
            'item_id' => 10018,
            'notes' => 'Globally formulate economically sound platforms whereas holistic channels. Objectively reintermediate low-risk high-yield e-services and error-free experiences. Intrinsicly incentivize.',
            'qty' => 1
        ]);
        // End Purchase Order ID is 9

        // Purchase Order ID is 99
        PurchaseOrderItem::create([
            'po_id' => 99,
            'item_id' => 999,
            'notes' => 'Enthusiastically reinvent future-proof value whereas intermandated interfaces. Distinctively synthesize orthogonal relationships whereas principle-centered outsourcing. Holisticly harness robust catalysts.',
            'qty' => 1
        ]);
        // End Purchase Order ID is 99

        // Purchase Order ID is 999
        PurchaseOrderItem::create([
            'po_id' => 999,
            'item_id' => 9999,
            'notes' => 'Distinctively incubate adaptive applications via an expanded array of best practices. Assertively cultivate bleeding-edge channels through clicks-and-mortar web.',
            'qty' => 1
        ]);

        PurchaseOrderItem::create([
            'po_id' => 999,
            'item_id' => 10020,
            'notes' => 'Distinctively incubate adaptive applications via an expanded array of best practices. Assertively cultivate bleeding-edge channels through clicks-and-mortar web.',
            'qty' => 1
        ]);

        PurchaseOrderItem::create([
            'po_id' => 999,
            'item_id' => 10022,
            'notes' => 'Distinctively incubate adaptive applications via an expanded array of best practices. Assertively cultivate bleeding-edge channels through clicks-and-mortar web.',
            'qty' => 1
        ]);
        // End Purchase Order ID is 999


    }
}
