<?php

// app/Models/TransaksiDetail.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_transaksi',
        'id_menu',
        'jumlah_pesanan',
        'harga',
        'sub_total',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
    public function transaksiDetails()
    {
        return $this->hasMany(TransaksiDetail::class, 'id_menu');
    }
}


