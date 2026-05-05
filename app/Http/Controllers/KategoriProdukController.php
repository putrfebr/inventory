<?php

namespace App\Http\Controllers;
use App\Models\KategoriProduk;
use App\Models\storeKategoriProdukRequest;


class KategoriProdukController extends Controller
{
    public $pageTitle = 'Produk';
    public function index () {
        $pageTitle = $this->pageTitle;
        $query = KategoriProduk::query();
        $kategori = $query->paginate(10);
        return view ('kategori-produk.index', compact('pageTitle', 'kategori'));
    }
    public function store(storeKategoriProdukRequest $request) {}
}
