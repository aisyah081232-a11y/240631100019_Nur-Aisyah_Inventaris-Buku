<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';

    protected $allowedFields = [
        'judul_buku',
        'penulis',
        'kategori',
        'tahun_terbit',
        'penerbit'
    ];
}