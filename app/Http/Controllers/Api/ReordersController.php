<?php

namespace App\Http\Controllers\Api;

use App\Models\Reorders;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReordersRequest;
use Illuminate\Http\Request;

class ReordersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Reorders::all(); 
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
    public function store(ReordersRequest $request)
    {

        $validated = $request->validated();

        // Create a new product
        $reorder = Reorders::create($validated);

        // Return the response with the created reorder data
        return response()->json([
            'message' => 'Reorder successfully created!',
            'data' => $reorder
        ], 201); // 201 Created status code
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $product = Reorders::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
