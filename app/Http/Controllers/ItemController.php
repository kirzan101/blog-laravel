<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemFormRequest;
use App\Models\Department;
use App\Models\Item;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();

        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $departments = Department::all();

        return view('items.create', compact('suppliers', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemFormRequest $request)
    {
        Item::create([
            'description' => $request->description,
            'brand' => $request->brand,
            'model' => $request->model,
            'department_id' => $request->department_id,
            'supplier_id' => $request->supplier_id,
        ]);

        return redirect('/items')->with('message', 'Successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        $suppliers = Supplier::all();
        $departments = Department::all();

        return view('items.show', compact('item', 'suppliers', 'departments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $suppliers = Supplier::all();
        $departments = Department::all();


        return view('items.edit', compact('item', 'suppliers', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemFormRequest $request, Item $item)
    {
        $item = tap($item)->update([
            'description' => $request->description,
            'brand' => $request->brand,
            'model' => $request->model,
            'department_id' => $request->department_id,
            'supplier_id' => $request->supplier_id,
        ]);

        return redirect('/items')->with('message', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect('/items')->with('message', 'Successfully Deleted.');
    }
}
