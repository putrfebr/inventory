<?php

namespace App\Http\Controllers;
use App\Models\KategoriProduk;
use App\Http\Requests\storeKategoriProdukRequest;


class KategoriProdukController extends Controller
{
    public $pageTitle = 'Produk';
    public function index () {
        $pageTitle = $this->pageTitle;
        $perPage = request()->query('perPage') ?? 10;
        $search = request()->query('search');
        $query = KategoriProduk::query();
        if ($search) {
            // $query->where('nama_kategori', 'like', '%' . $search . '%');
            $query->where('nama_kategori', $search);
        }
        $kategori = $query->paginate($perPage)->appends(request()->query());
        confirmDelete('Hapus data Produk tidak dapat dibatalkan, lanjutkan ?');
        return view ('kategori-produk.index', compact('pageTitle', 'kategori'));
    }
    public function store(storeKategoriProdukRequest $request) {
        KategoriProduk::create([
            'nama_kategori' => $request->nama_kategori
        ]);
        toast()->success('Produk baru berhasil ditambahkan');
        return redirect()->route('master-data.kategori-produk.index');
    }
    public function update(storeKategoriProdukRequest $request, KategoriProduk $kategoriProduk) {
        $kategoriProduk->nama_kategori = $request->nama_kategori;
        $kategoriProduk->save();
        toast()->success('Produk Baru berhasil diubah');
        return redirect()->route('master-data.kategori-produk.index');
    }
    public function destroy(KategoriProduk $kategoriProduk){
     $kategoriProduk->delete();
     toast()->success('Kategori Produk berhasil dihapus');
     return redirect()->route('master-data.kategori-produk.index');
    }
    
}
