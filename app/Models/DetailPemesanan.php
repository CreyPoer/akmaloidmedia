<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    use HasFactory;
    protected $table = 'detail_pemesanans';
    protected $fillable = [
        'paket_id',
        'start_langganan',
        'end_langganan',
        'lama_langganan',
        'total_pengiriman',
        'sub_total',
        'order_code',
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id', 'id');
    }

}
