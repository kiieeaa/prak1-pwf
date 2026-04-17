<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['kategoris', 'user'])->get();
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();
        $kategoriName = $validated['kategori'] ?? null;
        unset($validated['kategori']);

        $validated['user_id'] = Auth::id();
        $validated['qty'] = $validated['quantity'];
        unset($validated['quantity']);

        try {
            $product = Product::create($validated);
            if ($kategoriName) {
                $product->kategoris()->create(['name' => $kategoriName]);
            }
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
        return view('products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();
        $kategoriName = $validated['kategori'] ?? null;
        unset($validated['kategori']);

        $validated['qty'] = $validated['quantity'];
        unset($validated['quantity']);

        try {
            $product->update($validated);
            
            if ($kategoriName) {
                $product->kategoris()->delete();
                $product->kategoris()->create(['name' => $kategoriName]);
            } elseif ($request->has('kategori') && empty($kategoriName)) {
                $product->kategoris()->delete();
            }

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
