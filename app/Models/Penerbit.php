<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;
    protected $table = 'penerbits';
    protected $fillable = [
        'name',
        'alamat',
        'deskripsi',
        'logo',
    ];

    public function paket()
    {
        return $this->hasMany(Paket::class, 'penerbit_id','id');
    }
}
