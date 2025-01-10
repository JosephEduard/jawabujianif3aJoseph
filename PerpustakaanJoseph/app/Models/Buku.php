<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pinjam;


class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus';

    protected $primaryKey = 'kodebuku';
    public $incrementing = false;      
    protected $keyType = 'string'; 

    protected $fillable = [
        'kodebuku', 
        'judulbuku',
        'coverbuku',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'genre',
        'stokbuku',
    ];

    public function pinjam()
    {
        return $this->hasMany(Pinjam::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($buku) {
            $buku->kodebuku = Buku::generateKodebuku();
        });
    }

    public static function generateKodebuku()
    {
        $timestamp = now()->format('YmdHis');
        $randomNumber = rand(0, 999);

        return 'BKU' . $timestamp . $randomNumber;
    }
}
