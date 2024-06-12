<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;
    protected $table = 'periodes';
    protected $fillable = [
        'periode',
        'deskripsi',
    ];

    public function paket()
    {
        return $this->hasMany(Paket::class, 'periode_id','id');
    }
}
