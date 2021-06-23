<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use Illuminate\Http\Request;
use App\Models\PurchaseOrderItem;

class PurchaseOrderItemController extends Controller
{
    public function update($po_id, PurchaseOrderItem $purchaseOrderItem, Request $request)
    {
        try {
            $purchaseOrderItem = $purchaseOrderItem->where(array('po_id' => $po_id, 'item_id' => $request->item_id))->first();
            $purchaseOrderItem->notes = $request->notes;
            $purchaseOrderItem->qty = $request->qty;
            if($purchaseOrderItem->save()) {
                return $this->responseSuccessUpdate('Purchase Order Item', $purchaseOrderItem);
            }
        } catch (\Throwable $th) {
            return $this->responseFailDebug($th->getMessage(), $th->getLine());
        }
    }
    
    public function show($po_id, PurchaseOrderItem $purchaseOrderItem)
    {
        
    }
}
