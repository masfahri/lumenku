<?php

namespace Database\Seeders;

use App\Models\PurchaseOrderDetail;
use Illuminate\Database\Seeder;

class PurchaseOrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PurchaseOrderDetail::create([
            'po_id' => 9,
            'ppn'   => 10,
            'notes' => 'Phosfluorescently disintermediate vertical methodologies via multifunctional convergence. Globally administrate extensible e-markets after enterprise-wide networks. Collaboratively generate open-source growth strategies and high-payoff e-services. Uniquely drive premium.'
        ]);
        
        PurchaseOrderDetail::create([
            'po_id' => 99,
            'ppn'   => 10,
            'notes' => 'Globally repurpose proactive processes through empowered markets. Seamlessly strategize ubiquitous growth strategies vis-a-vis premier web-readiness. Holisticly harness excellent ROI vis-a-vis high standards in niches. Collaboratively.'
        ]);
        
        PurchaseOrderDetail::create([
            'po_id' => 999,
            'ppn'   => 10,
            'notes' => 'Intrinsicly restore parallel vortals for extensive benefits. Seamlessly build proactive e-services after innovative technology. Compellingly conceptualize adaptive applications through impactful services. Completely orchestrate business services.'
        ]);


    }
}
