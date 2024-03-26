<?php

namespace App\Http\Controllers;

use App\Models\progression;
use App\Http\Requests\StoreprogressionRequest;
use App\Http\Requests\UpdateprogressionRequest;

class ProgressionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(["msg" => "test"]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(progression $progression)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(progression $progression)
    {
        //
    }
}
