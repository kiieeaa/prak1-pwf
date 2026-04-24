<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        // Mengambil semua data produk beserta relasi kategorinya dan user pembuatnya
        $products = Product::with(['category', 'user'])->get();
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function create()
    {
        // Mengambil semua kategori dari database untuk ditampilkan di dropdown form tambah produk
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        $validated['qty'] = $validated['quantity'];
        unset($validated['quantity']);

        try {
            Product::create($validated);
            return redirect()
                ->route('products.index')
                ->with('success', 'Product created successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Product store database error', [
                'message' => $e->getMessage(),
            ]);
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Database error while creating product.');
        } catch (\Throwable $e) {
            Log::error('Product store unexpected error', [
                'message' => $e->getMessage(),
            ]);
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Unexpected error occurred.');
        }
    }

    public function edit(Product $product)
    {
        // Mengambil semua kategori untuk pilihan edit
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();
        $validated['qty'] = $validated['quantity'];
        unset($validated['quantity']);

        try {
            $product->update($validated);

            return redirect()
                ->route('products.index')
                ->with('success', 'Product updated successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Product update database error', [
                'message' => $e->getMessage(),
            ]);
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Database error while updating product.');
        } catch (\Throwable $e) {
            Log::error('Product update unexpected error', [
                'message' => $e->getMessage(),
            ]);
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Unexpected error occurred.');
        }
    }
}
