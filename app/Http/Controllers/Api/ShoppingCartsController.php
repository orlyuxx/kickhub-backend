<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ShoppingCartsRequest;
use App\Models\ShoppingCarts;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use Illuminate\Http\Request;

class ShoppingCartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ShoppingCarts::all(); 
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
    public function store(ShoppingCartsRequest $request)
    {
        $validated = $request->validated();

        $cart = ShoppingCarts::create($validated);

        return response()->json([
            'message' => 'Item added to cart successfully!',
            'cart' => $cart
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $store = ShoppingCarts::findOrFail($id);
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
