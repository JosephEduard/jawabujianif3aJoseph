<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Anggota;
use App\Models\Buku;

class Pinjam extends Model
{
    use HasFactory;

    protected $table = 'pinjams';

    protected $fillable = [
        'nopinjam',
        'idanggota',
        'kodebuku',
        'tanggal_pinjam',
        'tanggal_kembali',
        'denda',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'idanggota', 'idanggota');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'kodebuku', 'kodebuku');
    }
}
