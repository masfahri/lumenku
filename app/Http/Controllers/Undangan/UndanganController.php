<?php

namespace App\Http\Controllers\Undangan;

use App\Http\Controllers\Controller;
use App\Models\Undangan;
use Illuminate\Http\Request;

class UndanganController extends Controller
{
    public function index()
    {
        $undangan = new Undangan();
        dd($undangan::all());
    }
}
