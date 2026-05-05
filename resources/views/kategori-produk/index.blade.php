@extends('layouts.kaia')
@section('page_title', $pageTitle)
@section('content')
    <div class="card">
        <div class="card-body py-5">
            <div>
                <x-kategori-produk.form-kategori-produk />
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 15px">No</th>
                        <th>Nama Produk</th>
                        <th class="text-center" style="width: 100px">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse   ($kategori as $index => $item)
                     <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td></td>
                     </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Data Produk Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection