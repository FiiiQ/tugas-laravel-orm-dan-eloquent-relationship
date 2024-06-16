<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();

        return view('products.index')->with('products', $data);
    }


    public function create(Request $request, User $user)
    {
        return view('products.create', ['user' => $user]);
    }

    public function store(Request $request, User $user)
    {
        if (!$request->filled('gambar')) {
            return redirect()->back()->with('error', 'Error, Field Gambar wajib diisi');
        } else if (!$request->filled('nama')) {
            return redirect()->back()->with('error', 'Error, Field Nama wajib diisi');
        } else if (!$request->filled('berat')) {
            return redirect()->back()->with('error', 'Error, Field Berat wajib diisi');
        } else if (!$request->filled('harga')) {
            return redirect()->back()->with('error', 'Error, Field Harga wajib diisi');
        } else if (!$request->filled('stok')) {
            return redirect()->back()->with('error', 'Error, Field Stok wajib diisi');
        } else if (!$request->kondisi === 0) {
            return redirect()->back()->with('error', 'Error, Field Kondisi wajib diisi');
        } else if (!$request->filled('deskripsi')) {
            return redirect()->back()->with('error', 'Error, Field Deskripsi wajib diisi');
        }

        Product::create([
            'user_id' => $user->id,
            'gambar' => $request->gambar,
            'nama' => $request->nama,
            'berat' => $request->berat,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kondisi' => $request->kondisi,
            'deskripsi' => $request->deskripsi,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('admin.index', ['user' => $user->id])->with('success', 'Produk berhasil dibuat');
    }


    public function edit(Request $request, User $user, Product $product)
    {
        return view('products.edit', ['product' => $product, 'user' => $user]);
    }

    public function update(Request $request, User $user, Product $product)
    {
        if (!$request->filled('gambar')) {
            return redirect()->back()->with('error', 'Error. Field Gambar wajib diisi.');
        } else if (!$request->filled('nama')) {
            return redirect()->back()->with('error', 'Error. Field Nama wajib diisi.');
        } else if (!$request->filled('berat')) {
            return redirect()->back()->with('error', 'Error. Field Berat wajib diisi.');
        } else if (!$request->filled('harga')) {
            return redirect()->back()->with('error', 'Error. Field Harga wajib diisi.');
        } else if (!$request->filled('stok')) {
            return redirect()->back()->with('error', 'Error. Field Stok wajib diisi.');
        } else if (!$request->kondisi === 0) {
            return redirect()->back()->with('error', 'Error. Field Kondisi wajib diisi.');
        } else if (!$request->filled('deskripsi')) {
            return redirect()->back()->with('error', 'Error. Field Deskripsi wajib diisi.');
        }

        if ($product->user_id === $user->id) {
            $product->gambar = $request->gambar;
            $product->nama = $request->nama;
            $product->berat = $request->berat;
            $product->harga = $request->harga;
            $product->stok = $request->stok;
            $product->kondisi = $request->kondisi;
            $product->deskripsi = $request->deskripsi;
            $product->save();
        }

        return redirect()->route('admin.index', ['user' => $user->id])->with('message', 'Produk berhasil diperbarui');
    }


    public function delete(Request $request, User $user, Product $product)
    {
        if ($product->user_id === $user->id) {
            $product->delete();
        }

        return redirect()->back()->with('status', 'Produk berhasil dihapus');
    }
}
