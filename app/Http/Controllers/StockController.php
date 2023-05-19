<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\StockFormRequest;
use App\Http\Resources\StockResource;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Item;

use Exception;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //all records from stock
        $stocks = Stock::all();

        //return $stock;
        return StockResource::collection($stocks); // for 2 or more records
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StockFormRequest $request)
    {

        DB::beginTransaction();

        try {
            // create employee
            $stock = Stock::create([
                'code' => $request->code,
                'serial_number' => $request->serial_number,
                'manufacture_date' => $request->manufacture_date,
                'item_id' => $request->item_id,
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

        DB::commit();

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


    public function update(StockFormRequest $request, Stock $stock)
    {
        try {
            //update stock records
            
            $stock = tap($stock)->update([
                'code' => $request->code,
                'serial_number' => $request->serial_number,
                'manufacture_date' => $request->manufacture_date,
                'item_id' => $request->item_id,
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
        DB::beginTransaction();
        try {
            //delete record
            $item = Item::find($stock->item_id);

            $stock->delete();
            $item->delete();
        }catch (\Exception $e){
            //throw $th;
        DB::rollBack();

            return response()->json([
                'message' => 'Something Went Wrong on deletion'
            ], 500);
        }

        DB::commit();

        return response()->json([
            'message' => 'Successfully Deleted.'
        ], 204);
        //
    }
}