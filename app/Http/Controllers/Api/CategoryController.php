<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Retrieve all categories
     */
    public function index()
    {
        return response()->json(Category::all());
    }

    /**
     * Create a new category
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:categories',
            'description' => 'nullable|string',
        ]);

        $category = Category::create($validated);

        return response()->json($category, 201);
    }

    /**
     * Retrieve details of a single category
     */
    public function show(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Update an existing category
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
        ]);

        $category->update($validated);

        return response()->json($category);
    }

    /**
     * Delete a category
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully'], 200);
    }

    /**
     * Get all categories associated with a product
     */
    public function productCategories(Product $product)
    {
        return response()->json($product->categories);
    }
}
