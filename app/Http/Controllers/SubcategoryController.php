<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with('category')->get();
        return view('subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
        ]);

        Subcategory::create([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'slug' => Subcategory::generateSlug($validated['name']),
        ]);

        return redirect()->route('subcategories.index')->with('success', 'Subcategory created.');
    }

    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => "required|string|max:255",
        ]);

        $subcategory->category_id = $validated['category_id'];
        if ($validated['name'] !== $subcategory->name) {
            $subcategory->slug = Subcategory::generateSlug($validated['name']);
        }
        $subcategory->name = $validated['name'];
        $subcategory->save();

        return redirect()->route('subcategories.index')->with('success', 'Subcategory updated.');
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('subcategories.index')->with('success', 'Subcategory deleted.');
    }
}