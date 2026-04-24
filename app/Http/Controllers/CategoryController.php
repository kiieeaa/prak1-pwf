<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // Mengambil semua data kategori beserta jumlah produk yang terkait dengan masing-masing kategori
        $categories = Category::withCount('products')->get();
        // Mengirimkan data kategori tersebut ke view (halaman) categories.index
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat kategori baru
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // Memvalidasi data dari form: nama kategori wajib diisi, maksimal 255 karakter, dan tidak boleh sama (unique) di tabel categories
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        // Menyimpan data kategori yang sudah divalidasi ke dalam database
        Category::create($validated);

        // Mengarahkan kembali ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        // Menampilkan form edit dengan membawa data kategori yang akan diedit
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        // Memvalidasi input saat edit. Pengecualian unik untuk kategori yang sedang diedit agar namanya tidak bentrok dengan dirinya sendiri
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        // Mengupdate data kategori di database dengan data yang baru
        $category->update($validated);

        // Mengarahkan kembali ke halaman daftar kategori
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        // Menghapus data kategori dari database
        $category->delete();
        // Mengarahkan kembali ke halaman daftar kategori
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
