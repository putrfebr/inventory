<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriProduk;

class ProductController extends Controller
{
   
    public function tambahStock(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1'
        ]);

        $product = KategoriProduk::findOrFail($id);
        $product->stock += $request->jumlah;
        $product->save();

        return back()->with('success', 'Stock berhasil ditambah');
    }

    public function kurangStock(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1'
        ]);

        $product = KategoriProduk::findOrFail($id);

        if ($product->stock < $request->jumlah) {
            return back()->with('error', 'Stock tidak cukup');
        }

        $product->stock -= $request->jumlah;
        $product->save();

        return back()->with('success', 'Stock berhasil dikurangi');
    }
}