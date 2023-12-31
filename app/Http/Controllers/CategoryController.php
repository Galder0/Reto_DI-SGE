<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Incidence;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories',
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show',['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->name = $request->input('name');
        $category->updated_at = now();
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Get all associated incidences
        $incidences = $category->incidences;

        // Set category_id to null for each associated incidence
        // $incidences->each(function ($incidence) {
        //     $incidence->update(['category_id' => null]);
        // });

        // Delete the category
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
