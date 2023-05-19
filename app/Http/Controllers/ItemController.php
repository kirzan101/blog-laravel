<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemFormRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $item = Item::all(); //select * from items;
        return ItemResource::collection($item); // for 2 or more records
    }
    public function store(ItemFormRequest $request)
    {
        $item = Item::create([
            'description' => $request->description,
            'brand' => $request->brand,
            'model' => $request->model,
            'department_id' => $request->department_id,
            'supplier_id' => $request->supplier_id,
        ]);
        return new ItemResource($item);
    }
    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        // return $post;
        return new ItemResource($item); //for 1 only
    }
    public function update(Request $request, Item $item)
    {
        try {
            // $item = Item::find($item);
            $item = tap($item)->update([
                'description' => $request->description,
                'brand' => $request->brand,
                'model' => $request->model,
                'department_id' => $request->department,
                'supplier_id' => $request->supplier,
            ]);
            return new ItemResource($item);
        } catch (\Exception $e) {
            return ['error' => 'has error - ' . $e];
        }
    }
    public function destroy(string $id)
    {
    }
}
