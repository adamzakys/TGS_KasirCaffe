<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['nama_menu', 'harga_menu', 'id_kategori'];
    protected $primaryKey = 'id_menu';

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
