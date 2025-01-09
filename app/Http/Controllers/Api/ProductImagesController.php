<?php

namespace App\Http\Controllers\Api;

use App\Models\ProductImages;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImagesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all images from the product_images table
        $images = ProductImages::all();

        // Return the images as a response
        return response()->json([
            'message' => 'All images retrieved successfully!',
            'data' => $images,
        ]);
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
    public function store(ProductImagesRequest $request)
    {
        // Initialize an array to store uploaded image data
        $uploadedImages = [];

        // If multiple images are uploaded
        if ($request->hasFile('image') && is_array($request->file('image'))) {
            foreach ($request->file('image') as $image) {
                // Get the original file name
                $originalName = $image->getClientOriginalName();
                
                // Store the image in the 'public/product_images' folder with the original name
                $imagePath = $image->storeAs('product_images', $originalName, 'public');

                // Save image info to the database
                $uploadedImages[] = ProductImages::create([
                    'product_id' => $request->product_id,  // Optional: Store the product_id if provided
                    'name' => $request->name,  // Image name from form input
                    'image_url' => Storage::url($imagePath),  // URL of the stored image
                ]);
            }
        } else {
            // If only a single image is uploaded
            $image = $request->file('image');

            // Get the original file name
            $originalName = $image->getClientOriginalName();

            // Store the image in the 'public/product_images' folder with the original name
            $imagePath = $image->storeAs('product_images', $originalName, 'public');

            // Save image info to the database
            $uploadedImages[] = ProductImages::create([
                'product_id' => $request->product_id,  // Optional: Store the product_id if provided
                'name' => $request->name,  // Image name from form input
                'image_url' => Storage::url($imagePath),  // URL of the stored image
            ]);
        }

        // Return a response (e.g., success message or redirect)
        return response()->json([
            'message' => 'Images uploaded successfully!',
            'data' => $uploadedImages
        ]);
    }

    
    // Get images by product id
    public function getImagesByProduct($productId)
    {
        // Retrieve all images for a specific product
        $images = ProductImages::where('product_id', $productId)->get();

        // Return the images as a response
        return response()->json([
            'message' => 'Images retrieved successfully!',
            'data' => $images,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
