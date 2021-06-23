<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use Illuminate\Support\Facades\DB;
use App\Models\PurchaseOrderDetail;

class PurchaseOrderController extends Controller
{

    public function index(PurchaseOrder $purchaseOrder)
    {
        $data['message'] = 'Success';
        $data['PurchaseOrder'] = $purchaseOrder::with('Detail', 'Items.item')->get();
        return $data;
    }

    public function store(Request $request, PurchaseOrder $purchaseOrder, PurchaseOrderDetail $purchaseOrderDetail, PurchaseOrderItem $purchaseOrderItem)
    {
        if (empty($request->no_po) OR empty($request->date_po) OR empty($request->ref) OR empty($request->customer) OR empty($request->item)) {
            return $this->responseFail('Please Fill the Field');
        }

        try {
            DB::beginTransaction();
            $purchaseOrder->no_po = $request->no_po;
            $purchaseOrder->date_po = $request->date_po;
            $purchaseOrder->ref = $request->ref;
            $purchaseOrder->customer = json_encode($request->customer);
            $purchaseOrder->item = '[]';
            $purchaseOrder->created_by = auth('api')->user()->id;
            
            if ($purchaseOrder->save()) {
                $purchaseOrderDetail->po_id = $purchaseOrder->id;
                $purchaseOrderDetail->notes = $request->detail_notes;
                $purchaseOrderDetail->ppn = empty($request->ppn) ? 0.0 : $request->ppn;
                $purchaseOrderDetail->pph = empty($request->pph) ? 0.0 : $request->pph;
                $purchaseOrderDetail->other_tax = json_encode($request->other_tax);

                if ($purchaseOrderDetail->save()) {
                    for ($i=0; $i < count($request->item['id']); $i++) { 
                        $purchaseOrderItem::create([
                            'po_id' => $purchaseOrder->id,
                            'item_id' => $request->item['id'][$i],
                            'qty' => $request->item['qty'][$i],
                            'notes' => $request->item['notes'][$i]
                        ]);
                    }
                }
                DB::commit();
                return $this->responseSuccessStore('Purchase Order', $purchaseOrder->with('Detail', 'Items.item')->find($purchaseOrder->id));
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->responseFail($th->getMessage());
        }
    }
}
