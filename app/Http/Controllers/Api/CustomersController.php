<?php

namespace App\Http\Controllers\Api;

use App\Models\Customers;
use App\Http\Requests\CustomersRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Customers::all(); 
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
    public function store(CustomersRequest $request)
    {
        // Validate the incoming request data
        $validated = $request->validated();

        // Hash the password before storing it
        $validated['password'] = Hash::make($validated['password']);

        // Create a new customer record
        $customer = Customers::create($validated);

        // Return a success response
        return response()->json([
            'message' => 'Customer created successfully!',
            'customer' => $customer,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $category = Customers::findOrFail($id);
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
