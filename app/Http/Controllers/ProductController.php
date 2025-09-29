<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with('products')->get();
        return view('products.index', compact('subcategories'));
    }

    public function create()
    {
        
        $categories = Category::with('subcategories')->get();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'subcategory_id'=> 'required|exists:subcategories,id',
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'image'         => 'nullable|image|max:2048',
            'old_price'     => 'nullable|numeric|min:0',
            'new_price'     => 'required|numeric|min:0',
        ]);

        if (!Subcategory::where('id', $validated['subcategory_id'])->where('category_id', $validated['category_id'])->exists()) {
            return back()->withErrors(['subcategory_id' => 'The selected subcategory does not belong to the selected category'])->withInput();
        }

        $slug = Product::generateSlug($validated['name']);

        $product = new Product();
        $product->category_id = $validated['category_id'];
        $product->subcategory_id = $validated['subcategory_id'];
        $product->name = $validated['name'];
        $product->slug = $slug;
        $product->description = $validated['description'] ?? null;
        $product->old_price = $validated['old_price'] ?? null;
        $product->new_price = $validated['new_price'];

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::with('subcategories')->get();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'subcategory_id'=> 'required|exists:subcategories,id',
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'image'         => 'nullable|image|max:2048',
            'old_price'     => 'nullable|numeric|min:0',
            'new_price'     => 'required|numeric|min:0',
        ]);

        
        if (!Subcategory::where('id', $validated['subcategory_id'])->where('category_id', $validated['category_id'])->exists()) {
            return back()->withErrors(['subcategory_id' => 'The selected subcategory does not belong to the selected category'])->withInput();
        }

        if ($validated['name'] !== $product->name) {
            $product->slug = Product::generateSlug($validated['name']);
        }

        $product->category_id = $validated['category_id'];
        $product->subcategory_id = $validated['subcategory_id'];
        $product->name = $validated['name'];
        $product->description = $validated['description'] ?? null;
        $product->old_price = $validated['old_price'] ?? null;
        $product->new_price = $validated['new_price'];

        if ($request->hasFile('image')) {
            // delete previous
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted.');
    }
}