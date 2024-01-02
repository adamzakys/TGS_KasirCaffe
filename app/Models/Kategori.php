<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris'; // Sesuaikan dengan nama tabel yang benar
    protected $primaryKey = 'id_kategori'; // Sesuaikan dengan nama kolom kunci utama yang benar

    public function menus()
    {
        return $this->hasMany(Menu::class, 'id_kategori');
    }
}
