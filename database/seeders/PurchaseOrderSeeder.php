<?php

namespace Database\Seeders;

use App\Models\PurchaseOrder;
use Illuminate\Database\Seeder;

class PurchaseOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PurchaseOrder::create([
            'id' => 9,
            'no_po' => '2005-156/ALT-PO/V/2021',
            'date_po' => '2021-06-30',
            'ref'   => '0670/CDT/Q/05/2021R1',
            'customer' => json_encode(array(
                'company_name' => 'PT. Central Data Technologi',
                'company_address' => 'Centenial Tower 12th floor, Jl. Gatot Subroto, RT.2/RW.2, Kuningan, Karet Semanggi, Daerah Khusus Ibukota Jakarta 12950',
                'phone'     => '+62xxxx'
            ))
        ]);

        PurchaseOrder::create([
            'id' => 99,
            'no_po' => '2005-157/ALT-PO/V/2021',
            'date_po' => '2021-06-30',
            'ref'   => '001/CITS-PO/V/2021',
            'customer' => json_encode(array(
                'company_name' => 'CV. Cipta Integerasi Teknologi Solusi Indonesia',
                'company_address' => 'Gedung Atlantica, Jl. Kuningan Barat 7 Mampang Prapatan, Jakarta Selatan 12710',
                'phone'     => '021 - 5214447'
            ))
        ]);

        PurchaseOrder::create([
            'id' => 999,
            'no_po' => '2005-158/ALT-PO/V/2021',
            'date_po' => '2021-06-30',
            'ref'   => '0042/IF/EN/I/2021',
            'customer' => json_encode(array(
                'company_name' => 'PT. Exclusive Networks Indonesia',
                'company_address' => 'Gedung Menara Anugrah 18th, Jl. Mega Kuningan Lot. 8.6 - 8.7, Jakarta 12950',
                'phone'     => '021 - xxxxx'
            ))
        ]);
            

    }
}
