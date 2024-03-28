<?php

namespace App\Http\Controllers;

use App\Models\progression;
use App\Models\User;
use App\Http\Requests\StoreprogressionRequest;
use App\Http\Requests\UpdateprogressionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        
        $user_id = Auth::id();
        
        $progression = Progression::create([
            'user_id' => $user_id,
            'poids' => $validatedData['poids'],
            'height' => $validatedData['height'],
            'biceps' => $validatedData['biceps'],
            'mollet' => $validatedData['mollet'],
        ]);
        
        return response()->json(['message' => 'Progression created successfully']);
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

    public function update(Request $request, Progression $progression)
    {
        if ($request->method() == 'PUT') { 
        $validatedData = $request->validate([
            'poids' => 'required',
            'height' => 'required',
            'biceps' => 'required',
            'mollet' => 'required',

        ]);
        
        $user_id = Auth::id();
        
            $progression->update([
                'user_id' => $user_id,
                'poids' => $validatedData['poids'],
                'height' => $validatedData['height'],
                'biceps' => $validatedData['biceps'],
                'mollet' => $validatedData['mollet'],
            ]);

        } else {

            $validatedData = $request->validate([
                'status' => 'required',
            ]);
            $progression->update([
                'status' => $validatedData['status'],
            ]);
        }
        
        return response()->json(['message' => 'Progression mise à jour avec succès']);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(progression $progression)
    {
        $progression->delete();
        return response()->json(["message" => "progression deleted"]);
    }
}
