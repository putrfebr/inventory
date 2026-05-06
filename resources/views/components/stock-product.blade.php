<div class="d-flex align-items-center gap-1">

    <!-- Minus -->
    <form action="{{ url('/produk/'.$kategoriProduk->id.'/kurang-stock') }}" method="POST">
        @csrf
        <input type="hidden" name="jumlah" value="1">
        <button>-</button>
    </form>

    <!-- Stock -->
    <span>{{ $kategoriProduk->stock ?? 0 }}</span>

    <!-- Plus -->
    <form action="{{ url('/produk/'.$kategoriProduk->id.'/tambah-stock') }}" method="POST">
        @csrf
        <input type="hidden" name="jumlah" value="1">
        <button>+</button>
    </form>

</div>