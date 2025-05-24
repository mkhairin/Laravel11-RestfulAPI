<?php

namespace App\Http\Controllers\Api;

use App\Models\Item;
use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // function menampilkan data
    public function index()
    {
        return ItemResource::collection(Item::all())->additional([
            'status' => 'success',
            'code' => 200
        ]);
    }

    // function insert data ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);

        $items = Item::create($request->all());

        return (new ItemResource($items))->additional([
            'status' => 'success',
            'code' => 201,
            'message' => 'Barang berhasil ditambahkan'
        ]);
    }
}
