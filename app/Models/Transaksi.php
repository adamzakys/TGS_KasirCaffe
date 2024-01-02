<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'tanggal',
        'total_bayar',
    ];
    protected $primaryKey = 'id_transaksi';

    public function transaksiDetails()
    {
        return $this->hasMany(TransaksiDetail::class, 'id_transaksi');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
