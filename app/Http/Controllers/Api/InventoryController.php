<?php

namespace App\Http\Controllers\Api;

use App\Models\Inventory;
use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryRequest;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Stores;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inventory::all();
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
    public function store(InventoryRequest $request)
    {
        $validated = $request->validated();

        $inventory = Inventory::create($validated);

        return response()->json([
            'message' => 'Product created successfully!',
            'product' => $inventory
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $inventory = Inventory::findOrFail($id);

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

     /**
     * Stock all products into a store's inventory with random prices.
     *
     * @param  int  $storeId
     * @return \Illuminate\Http\JsonResponse
     */
    public function bulkStock($storeId)
    {
        // Fetch all products grouped by name
        $productsGroupedByName = Products::all()->groupBy('name');

        $inventoryData = [];
        $prices = []; // Store generated prices for each product name

        foreach ($productsGroupedByName as $productName => $products) {
            // Generate a random price if not already generated for this name
            if (!isset($prices[$productName])) {
                $prices[$productName] = rand(2000, 15000); // Random price between 2000 and 15000
            }

            foreach ($products as $product) {
                $inventoryData[] = [
                    'store_id' => $storeId,
                    'product_id' => $product->product_id,
                    'vendor_id' => 15,
                    'quantity' => 20,
                    'price' => $prices[$productName],
                    'reorder_threshold' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Bulk insert inventory data
        Inventory::insert($inventoryData);

        return response()->json([
            'message' => 'All products have been stocked into the inventory successfully.',
            'store_id' => $storeId,
            'total_products' => count($inventoryData),
        ]);
    }


    /**
     * Retrieve inventory for a specific store.
     *
     * @param  int  $storeId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getInventoryByStore($storeId)
    {
        // Validate that the store exists
        $store = Stores::find($storeId);

        if (!$store) {
            return response()->json([
                'message' => 'Store not found.',
            ], 404);
        }

        // Retrieve inventory items for the given store_id
        $inventory = Inventory::where('store_id', $storeId)
            ->with(['product', 'vendor'])
            ->get();

        return response()->json([
            'store_id' => $storeId,
            'store_name' => $store->store_name,
            'inventory' => $inventory,
        ]);
    }
}
