<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemDetail;
use Illuminate\Http\Request;

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
}
