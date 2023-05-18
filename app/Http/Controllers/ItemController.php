<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemFormRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //all record
        $item = Item::all(); //select * from posts;

        // return $posts;
        return ItemResource::collection($item); // for 2 or more records
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemFormRequest $request)
    {

        // $request->validate([
        //     'description' => 'required|max:255',
        // ]);

        // create record`
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

    /**
     * Update the specified resource in storage.
     */
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
            return ['error' => 'has error - '.$e];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete record
    }
}
