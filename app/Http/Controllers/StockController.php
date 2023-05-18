<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockFormRequest;
use App\Http\Resources\StockResource;
use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = Stock::all();

        return StockResource::collection($stocks);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StockFormRequest $request)
    {

        // create record
        $stock = Stock::create([
            'code' => $request->code,
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
        return new StockResource($stock);
    }


    public function update(Request $request, Stock $stock)
    {
        try {
            $stock = tap($stock)->update([
                'code' => $request->code,
                'serial_number' => $request->serial_number,
                'manufacture_date' => $request->manufacture_date,
                'item_id' => $request->item_id,
                'supplier_id' => $request->supplier_id,
            ]);

            return new StockResource($stock);
        } catch (\Exception $e) {
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
