<?php

namespace App\Http\Controllers;

use App\Http\Requests\Helper;
use App\Http\Requests\SupplierFormRequest;
use App\Http\Resources\SupplierResource;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Supplier;

use Exception;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //all record
        $suppliers = Supplier::all(); //select * from posts;

        // return $posts;
        return SupplierResource::collection($suppliers); // for 2 or more records
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierFormRequest $request)
    {

        // $request->validate([
        //     'description' => 'required|max:255',
        // ]);

        // create record`
        $supplier = Supplier::create([
            'name' => $request->name,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
        ]);

        return new SupplierResource($supplier);
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        // return $post;
        return new SupplierResource($supplier); //for 1 only
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        try {
            //   $supplier = Supplier::find($id);

            $supplier = tap($supplier)->update([
                'name' => $request->name,
                'address' => $request->address,
                'contact_number' => $request->contact_number,
            ]);

            return new SupplierResource($supplier);
        } catch (\Exception $e) {
            return ['error' => 'has error - ' . $e];
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        DB::beginTransaction();
        try {
            //delete record
            $item = Item::find($supplier->item_id);

            $supplier->delete();
        } catch (\Exception $e) {
            //throw $th
            DB::rollback();

            return response()->json([
                'message' => 'Something went wrong on deletion'
            ], 500);
        }

        DB::commit();

        return response()->json([
            'message' => 'Successfully Deleted.'
        ], 204);
    }
    //delete record

}
