<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemDetail;
use Illuminate\Http\Request;
use App\Services\ImageService;

class ItemController extends Controller
{
    public function index(Item $item)
    {
        $data = $item::with('detail')->get();
        return $data;
    }

    public function show(Item $item, $id)
    {
        return $item::with('detail')->find($id);
    }

    public function store(Request $request, Item $item)
    {
        $imageService = new ImageService();
        $itemDetail = new ItemDetail();
        try {
            if($request->hasFile('image')) {
                $item->SKU = $request->sku;
                $item->item_name = $request->item_name;
                $item->unit = $request->unit;
                $item->item_description = $request->item_description;
                $item->item_image = $imageService->handleStoreImage($request->file('image'), 'Items')['image_name'];
                $item->item_rate = 0;
                $item->_meta = '{}';

                if ($item->save()) {
                    $itemDetail->item_id = $item->id;
                    $itemDetail->save();
                    return $this->responseSuccessStore('Items', $item->with('detail')->where('id', $item->id)->get());
                };
            }
        } catch (\Throwable $th) {
            return $this->responseFail($th->getMessage());
        }
    }

    public function update($id, Item $item, Request $request)
    {
        try {
            $item = $item->findOrFail($id);
            $item->SKU = $request->sku;
            $item->item_name = $request->item_name;
            $item->item_description = $request->item_description;
            $item->unit = $request->unit;
            if ($item->save()) {
                return $this->responseSuccessUpdate('Items', $item);
            };
        } catch (\Throwable $th) {
            return $this->responseFail($th->getMessage());

        }
    }

    public function updateImage($id, Request $request, Item $item)
    {
        try {
            $imageService = new ImageService();
            $item = $item->findOrFail($id);
            $item->item_image = $imageService->handleUpdateImage($request->file('image'), $item->item_image)['image_name'];
            if ($item->save()) {
                return $this->responseSuccessUpdate('Items', $item);
            }
        } catch (\Throwable $th) {
            return $this->responseFail($th->getMessage());
        }
    }

    public function delete($id, Item $item)
    {
        try {
            $imageService = new ImageService();
            $item = $item->findOrFail($id);
            if ($item->item_image) {
                $imageService->handleDeleteImage($item->item_image);
                if ($item->delete()) {
                    return $this->responseSuccessDelete('Items');
                }
            }
        } catch (\Throwable $th) {
            return $this->responseFail($th->getMessage());
        }
    }
}
