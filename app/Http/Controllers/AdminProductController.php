<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Tampilkan daftar produk (halaman admin)
     */
    public function index()
    {
        $products = Product::orderBy('name')->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Halaman tambah produk
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Simpan produk baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'size_range'  => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'image'       => 'nullable|image|max:2048', // opsional upload gambar
        ]);

        // upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $stored = $request->file('image')->store('products', 'public');
            $imagePath = 'storage/' . $stored;
        }

        // simpan ke database
        Product::create([
            'name'        => $request->name,
            'size_range'  => $request->size_range,
            'description' => $request->description,
            'price'       => $request->price,
            'image_path'  => $imagePath,
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Halaman edit produk
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update produk
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'size_range'  => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'image'       => 'nullable|image|max:2048',
        ]);

        $imagePath = $product->image_path;

        // upload gambar baru jika ada
        if ($request->hasFile('image')) {
            $stored = $request->file('image')->store('products', 'public');
            $imagePath = 'storage/' . $stored;
        }

        // update database
        $product->update([
            'name'        => $request->name,
            'size_range'  => $request->size_range,
            'description' => $request->description,
            'price'       => $request->price,
            'image_path'  => $imagePath,
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Hapus produk
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
