<p # 📦 Inventory & Order Management System

Aplikasi ini adalah sistem sederhana untuk mengelola **produk (kategori produk)** dan **stok**, serta menyediakan fitur **order (pemesanan)** yang secara otomatis mempengaruhi jumlah stok.

---

## 🚀 Fitur Utama

### 1. Manajemen Produk

* Menampilkan daftar produk
* Menambah, mengedit, dan menghapus produk
* Menampilkan jumlah stok setiap produk

### 2. Manajemen Stok

* Tombol ➕ untuk menambah stok
* Tombol ➖ untuk mengurangi stok
* Validasi agar stok tidak minus

### 3. Order Produk

* Membuat pesanan produk
* Otomatis mengurangi stok saat order dibuat
* Membatalkan order → stok kembali bertambah
* Status order:

  * `pending`
  * `batal`

---

## 🧠 Cara Kerja Sistem

### 📌 Alur Stok

#### ➕ Tambah Stok

1. User klik tombol `+`
2. Sistem mengirim request ke controller
3. Controller:

   * mengambil data produk
   * menambah nilai `stock`
4. Data disimpan ke database

---

#### ➖ Kurangi Stok

1. User klik tombol `-`
2. Sistem:

   * cek apakah stok cukup
   * jika cukup → stok dikurangi
   * jika tidak → tampil error

---

### 🛒 Alur Order

#### ✅ Membuat Order

1. User memilih produk dan jumlah
2. Sistem validasi:

   * jumlah ≥ 1
   * stok mencukupi
3. Jika valid:

   * stok dikurangi
   * data order disimpan dengan status `pending`

---

#### ❌ Membatalkan Order

1. User klik tombol `Batal`
2. Sistem:

   * mengubah status order → `batal`
   * mengembalikan stok sesuai jumlah order

---

## 🗄️ Struktur Database

### Tabel `kategori_produks`

| Field         | Tipe      | Keterangan  |
| ------------- | --------- | ----------- |
| id            | bigint    | Primary key |
| nama_kategori | string    | Nama produk |
| stock         | integer   | Jumlah stok |
| created_at    | timestamp |             |
| updated_at    | timestamp |             |

---

### Tabel `orders`

| Field              | Tipe        | Keterangan       |
| ------------------ | ----------- | ---------------- |
| id                 | bigint      | Primary key      |
| kategori_produk_id | foreign key | Relasi ke produk |
| jumlah             | integer     | Jumlah order     |
| status             | enum        | pending / batal  |
| created_at         | timestamp   |                  |
| updated_at         | timestamp   |                  |

---

## 🔗 Relasi

* 1 Produk → Banyak Order
* Order terhubung ke produk melalui:

```
kategori_produk_id
```

---

## ⚙️ Teknologi yang Digunakan

* Laravel (Backend)
* Blade Template (Frontend)
* MySQL (Database)
* Bootstrap (UI)

---

## 📂 Struktur Penting

```
app/
 └── Http/Controllers/
     ├── ProductController.php
     └── OrderController.php

app/
 └── Models/
     ├── KategoriProduk.php
     └── Order.php

resources/views/
 ├── kategori-produk/
 └── order/
```

---

## 🧩 Komponen Utama

* `<x-stock-product />` → untuk kontrol stok
* `<x-kategori-produk.form-kategori-produk />` → form produk
* `<x-confirm-delete />` → hapus data

---

## ⚠️ Validasi Penting

* Stok tidak boleh negatif
* Order tidak bisa melebihi stok
* Pembatalan order mengembalikan stok

---

## 💡 Pengembangan Selanjutnya

* Status order `selesai`
* Notifikasi stok menipis
* Dashboard laporan
* AJAX tanpa reload
* Role user (admin / kasir)

---

## 👩‍💻 Author

Dibuat untuk pembelajaran sistem inventory dan manajemen stok berbasis Laravel.

---

## 📌 Kesimpulan

Aplikasi ini menghubungkan:

* **Produk**
* **Stok**
* **Order**

Dalam satu alur sederhana:

```
Order dibuat → stok berkurang
Order dibatalkan → stok kembali
```

Sehingga sistem tetap konsisten dan mudah dikontrol.
</p>

