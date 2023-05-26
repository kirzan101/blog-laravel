<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockFormRequest;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = Stock::all();

        return view('stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($item_id)
    {
        return view('stocks.create', compact('item_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StockFormRequest $request)
    {
        Stock::create([
            'code' => $request->code,
            'serial_number' => $request->serial_number,
            'manufacture_date' => $request->manufacture_date,
            'item_id' => $request->item_id,
        ]);

        return redirect('/items/'. $request->item_id)->with('mesage', 'Succesfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        return view('stocks.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        return view('stocks.edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StockFormRequest $request, Stock $stock)
    {
        $stock = tap($stock)->update([
            'code' => $request->code,
            'serial_number' => $request->serial_number,
            'manufacture_date' => $request->manufacture_date,
            'item_id' => $request->item_id,
        ]);

        return redirect('/items/'. $request->item_id)->with('message', 'Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
       $item_id = $stock->item_id;
       $stock->delete();
       
       return redirect('/items/'. $item_id)->with('message', 'Successfully deleted');
    }
}
