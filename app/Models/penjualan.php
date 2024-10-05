<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;
    protected $table = 'penjualan';
    protected $primaryKey = 'id_penjualan';
    protected $fillable = [
        'nama_pelanggan',
        'harga',
        'stok',
    ];

    public function produk(){
        return $this->belongsTo(produk::class, 'id_produk', 'id_produk');
    }

    public function pelanggan(){
        return $this->belongsTo(pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }
}
