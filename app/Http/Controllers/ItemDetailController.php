<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemDetailController extends Controller
{
    public function update($id, Item $item, Request $request)
    {
        $item = $item->find($id)->with('Detail')->first();
        try {
            if ($item->Detail != null) {
                $item->Detail->serial_number = empty($request->serial_number) ? $item->Detail->serial_number : $request->serial_number;
                $item->Detail->selling_price = empty($request->selling_price) ? $item->Detail->selling_price : $request->selling_price;
                $item->Detail->purchase_price = empty($request->purchase_price) ? $item->Detail->purchase_price : $request->purchase_price;
                $item->Detail->item_quantity = empty($request->item_quantity) ? $item->Detail->item_quantity : $request->item_quantity;
                if ($item->Detail->save()) {
                    return $this->responseSuccessUpdate('Item Detail', $item);
                }
            }
        } catch (\Throwable $th) {
            return $this->responseFail($th->getMessage());
        }
    }

}
