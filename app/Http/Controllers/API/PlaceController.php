<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::all();
        return response()->json($places);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $place = new Place();
        $formFields = $request->validate([
            'name_place' => 'required|string',
            'address_place' => 'required|string',
            'latitude_place' => 'required|numeric',
            'longitude_place' => 'required|numeric',
            'article_id' => 'required|integer',	
        ]);
        $place->fill($formFields);
        $place->save();
        return response()->json($place);
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        return response()->json($place);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        $formFields = $request->validate([
            'name_place'    => 'sometimes|string|max:255',
            'address_place' => 'sometimes|string|max:500',
            'latitude_place' => 'sometimes|numeric',
            'longitude_place' => 'sometimes|numeric',
            'article_id'    => 'sometimes|integer|exists:articles,id',
        ]);
    
        $place->update($formFields);
    
        return response()->json(['message' => 'Lieu modifié avec succès'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        $place->delete();
        return response()->json('Lieu supprimé');
    }
}
