<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = 'pakets';

    protected $fillable = [
        'kategori_produk_id',
        'penerbit_id',
        'periode_id',
        'name',
        'waktu_pengiriman',
        'harga_paket',
        'deskripsi',
        'gambar',
    ];

    public function kategori_produk()
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_produk_id', 'id');
    }
    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'penerbit_id', 'id');
    }
    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id', 'id');
    }
    public function detail_pemesanan()
    {
        return $this->hasMany(DetailPemesanan::class, 'detail_pemesanan_id','id');
    }
}
