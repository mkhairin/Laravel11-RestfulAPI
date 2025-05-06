<?php

namespace App\Http\Controllers\Api;
use App\Models\Item;
use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // function menampilkan data
    public function index() {
        return ItemResource::collection(Item::all())->additional([
            'status' => 'success',
            'code' => 200
        ]);
    }
}
