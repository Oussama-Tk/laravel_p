<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoomResource;
use App\Models\chambre;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = chambre::paginate(10) ;

        return RoomResource::collection($rooms) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'price' => 'required|numeric',
            'is_available' => 'boolean'
        ]);

        $room = chambre::create($validatedData) ;
        
        return new RoomResource($room) ;
    }

    /**
     * Display the specified resource.
     */
    public function show(chambre $chambre)
    {
        return new RoomResource($chambre);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, chambre $chambre)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric',
            'is_available' => 'boolean'
        ]);

        $chambre->update($validatedData) ;

        return new RoomResource($chambre) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(chambre $chambre)
    {
        
    }
}
