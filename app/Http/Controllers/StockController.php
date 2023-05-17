<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\StockFormRequest;
use App\Http\Resources\StockResource;
use Illuminate\Http\Request;
use App\Models\User;
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
        //all record
        $stocks = Stock::all(); //select all from stock;

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
            //Generate username
            $username = Helper::username($request);

            //Create Users
            $user = User::create([
                'email' => $request->email,
                'username' => $username,
                'password' => bcrypt($request->password),
                'user_group_id' => $request->user_group_id
            ]);

            // create employee
            $stock = Stock::create([
                'code' => $request->code,
                'serial_number' => $request->serial_number,
                'manufacture_date' => $request->manufacture_date,
                'item_id' => $request->item_id,
                'supplier_id' => $request->supplier_id
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


    public function update(Request $request, Stock $stock)
    {
        try {
            //update stock records
            // $stock = Stock::find($id);
            // dd($stock);

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