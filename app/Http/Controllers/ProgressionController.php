<?php

namespace App\Http\Controllers;

use App\Models\progression;
use App\Models\User;
use App\Http\Requests\StoreprogressionRequest;
use App\Http\Requests\UpdateprogressionRequest;

class ProgressionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progression = Progression::all(); 
        return response()->json($progression);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreprogressionRequest $request)
    {
        $validatedData = $request->validated();
        
        $progression = Progression::create([
            'user_id' => 1,
            'poids' => $validatedData['poids'],
            'height' => $validatedData['height'],
            'biceps' => $validatedData['biceps'],
            'mollet' => $validatedData['mollet'],
        ]);
        
        return response()->json(['message' => 'Progression created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(progression $progression)
    {
        return response()->json($progression);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(progression $progression)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateprogressionRequest $request, progression $progression)
    {
        $validatedData = $request->validated();
        
        $progression->update([
            'user_id' => 1,
            'poids' => $validatedData['poids'],
            'height' => $validatedData['height'],
            'biceps' => $validatedData['biceps'],
            'mollet' => $validatedData['mollet'],
        ]);
        
        return response()->json(['message' => 'Progression created successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(progression $progression)
    {
        //
    }
}
