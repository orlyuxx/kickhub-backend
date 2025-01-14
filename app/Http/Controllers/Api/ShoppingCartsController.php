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
        //validate incoming request
        $validated = $request->validated();

        //calculate line total based on product_price and quantity
        $validated['line_total'] = number_format($validated['product_price'] * $validated['quantity'], 2, '.', '');

        //set default value for 'is_checked_out' if not provided (it will be null)
        $validated['is_checked_out'] ??= false;

        //create a new cart item with the calculated line_total and other details
        $cart = ShoppingCarts::create($validated);
        
        //return a success response with the created cart
        return response()->json([
            'message' => 'Item added to cart successfully!',
            'cart' => $cart
        ]);
    }

    public function updateQuantity(ShoppingCartsRequest $request, $cart_id)
    {
        // Validate the incoming data
        $validated = $request->validated();

        // Find the shopping cart item by cart_id
        $cart = ShoppingCarts::find($cart_id);
    
        if (!$cart) {
            return response()->json([
                'message' => 'Cart item not found.'
            ], 404);
        }
    
        // Check if the cart item is already checked out
        if ($cart->is_checked_out) {
            return response()->json([
                'message' => 'This cart item has already been checked out and cannot be updated.'
            ], 400);
        }
    
        // Update the quantity and recalculate the line total
        $cart->quantity = $validated['quantity'];
        $cart->line_total = $cart->quantity * $cart->product_price;  // Use product_price directly from the cart table
    
        // Save the updated cart item
        $cart->save();
    
        // Return success response
        return response()->json([
            'message' => 'Cart item updated successfully!',
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
