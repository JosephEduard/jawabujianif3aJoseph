<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pinjam;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggotas';

    protected $primaryKey = 'idanggota';
    public $incrementing = false;      
    protected $keyType = 'string'; 

    protected $fillable = [
        'idanggota',
        'nama',
        'email',
        'notelp',
        'alamat',
        'jeniskelamin',
        'tgllahir',
    ];

    public function pinjam()
    {
        return $this->hasMany(Pinjam::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($anggota) {
            $anggota->idanggota = Anggota::generateIDAnggota();
        });
    }

    public static function generateIDAnggota()
    {
        $timestamp = now()->format('YmdHis');
        $randomNumber = rand(0, 999);

        return 'PUS' . $timestamp . $randomNumber;
    }
}
