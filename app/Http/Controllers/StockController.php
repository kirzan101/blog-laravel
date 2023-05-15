<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockFormRequest;
use App\Http\Resources\StockResource;
use Illuminate\Http\Request;
use App\Models\Stock;
use Exception;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //all record
        $stock = Stock::all(); //select all from stock;

        //return $stock;
        return StockResource::collection($stock); // for 2 or more records
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StockFormRequest $request)
    {

        // create record
        $stock = Stock::create([
            'serial_number' => $request->serial_number,
            'manufacture_date' => $request->manufacture_date,
            'item_id' => $request->item_id,
            'supplier_id' => $request->supplier_id,
        ]);

        return new StockResource($stock);
    }


    /**
     * Show the form for creating a new resource.
     */
    
     public function show(Stock $stock)
     {
         // return $stock;
         return new StockResource($stock); //for 1 only
     }
 

    public function update(Request $request, Stock $stock)
    {
        try
        {
        //update stock records
        // $stock = Stock::find($id);
        // dd($stock);

        $stock = tap($stock)->update([
            'serial_number' => $request->serial_number,
            'manufacture_date' => $request->manufacture_date,
            'item_id' => $request->item_id,
            'supplier_id' => $request->supplier_id
        ]);

        return new StockResource($stock);
    } catch(\Exception $e)
    {
        return ['error' => 'has error - ' . $e];
    }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
