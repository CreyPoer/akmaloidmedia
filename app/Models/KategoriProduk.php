<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    use HasFactory;

    protected $table = 'kategori_produks';
    protected $fillable = [
        'name',
        'deskripsi',
        'foto',
    ];

    public function paket()
    {
        return $this->hasMany(Paket::class, 'kategori_produk_id','id');
    }
}
