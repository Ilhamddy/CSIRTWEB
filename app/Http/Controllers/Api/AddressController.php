<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //address by user
        $address = $request->user()->addresses;

        $addressArray = $address->toArray();
        foreach ($addressArray as $addresss) {
            $addresss['user_id'] = (int)$addresss['user_id'];
            $addresss['is_default'] = (int)$addresss['is_default'];
        }

        return response()->json([
            'status' => 'success',
            'data' => $address
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //create address
        $validate = $request->validate([
            "name" => "required|min:3",
            "full_address" => "required|min:3",
            "prov_id" => "required",
            "city_id" => "required",
            "district_id" => "required",
            "postal_code" => "required",
            "phone" => "required",
            "user_id" => "string",
            "is_default" => "boolean",
        ]);
        $validate['user_id'] = $request->user()->id;

        $address = Address::create($validate);
        if ($address) {
            return response()->json([
                'status' => 'success',
                'message' => 'address saved',
            ], 201);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'failed to create address'
            ], 400);
        }
    }

    public function getDistrictById($id)
    {
        $districts = Address::where('district_id', $id)->get();
        return response()->json([
            'address' => $districts
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
