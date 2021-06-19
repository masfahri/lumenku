<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderDetail;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{

    public function index(PurchaseOrder $purchaseOrder)
    {
        return $purchaseOrder::with('Detail', 'Items.item')->get();
    }

    public function store(Request $request, PurchaseOrder $purchaseOrder, PurchaseOrderDetail $purchaseOrderDetail)
    {
        if (empty($request->no_po) OR empty($request->date_po) OR empty($request->ref) OR empty($request->customer) OR empty($request->item)) {
            return $this->responseFail('Please Fill the Field');
        }

        try {
            $purchaseOrder->no_po = $request->no_po;
            $purchaseOrder->date_po = $request->date_po;
            $purchaseOrder->ref = $request->ref;
            $purchaseOrder->customer = json_encode($request->customer);
            $purchaseOrder->item = json_encode($request->item);
            if ($purchaseOrder->save()) {
                $purchaseOrderDetail->po_id = $purchaseOrder->id;
                return $this->responseSuccessStore('Purchase Order', $purchaseOrder);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
