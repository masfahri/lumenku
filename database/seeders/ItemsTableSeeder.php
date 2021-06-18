<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'id'          => 99,
            'item_name'   => 'Item A',
            'item_description' => 'Appropriately formulate client-focused intellectual capital before cross-platform communities. Distinctively syndicate sticky core competencies without high-quality web services. Distinctively productivate proactive meta-services without resource sucking relationships.',
            'item_image'  => 'https://loremflickr.com/640/360',
            'item_rate'   => 0.0,
            '_meta'       => '{}',
        ]);
        
        Item::create([
            'id'          => 999,
            'item_name'   => 'Item B',
            'item_description' => 'Distinctively incubate B2C resources without bleeding-edge materials. Synergistically simplify sustainable schemas before market positioning potentialities. Collaboratively underwhelm professional strategic theme areas whereas parallel ROI. Enthusiastically.',
            'item_image'  => 'https://loremflickr.com/640/360',
            'item_rate'   => 0.0,
            '_meta'       => '{}',
        ]);
        
        Item::create([
            'id'          => 9999,
            'item_name' => 'Item C',
            'item_description' => 'Interactively repurpose future-proof e-commerce rather than professional content. Credibly incentivize client-centered strategic theme areas before efficient ROI. Conveniently predominate low-risk high-yield materials and optimal meta-services.',
            'item_image'  => 'https://loremflickr.com/640/360',
            'item_rate'   => 0.0,
            '_meta'       => '{}',
        ]);
    }
}
