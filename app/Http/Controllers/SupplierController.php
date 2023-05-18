<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierFormRequest;
use App\Http\Resources\SupplierResource;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Exception;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();
 
        return SupplierResource::collection($suppliers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierFormRequest $request)
    {
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
        return new SupplierResource($supplier);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        try
        {
            $supplier = tap($supplier)->update([
                'name' => $request->name,
                'address' => $request->address,
                'contact_number' => $request->contact_number,
            ]);

            return new SupplierResource($supplier);
        } catch(\Exception $e)
        {
            return ['error' => 'has error - ' . $e];
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
