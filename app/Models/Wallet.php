<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $table = 'wallets';
    protected $fillable = [
        'e_wallet',
        'nama_rek',
        'no_rek',
        'gambar',
    ];
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'pembayaran_id','id');
    }
}
