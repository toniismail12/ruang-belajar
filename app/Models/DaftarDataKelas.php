<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarDataKelas extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    Public function getRouteKeyName()
    {
        return 'kode_kelas';
    }

    //koneksi ke tabel User, berdasarkan kolom tna_id yang sama dengan id di Tabel User
    Public function pendaftarankelas()
    {
        return $this->hasMany(PendaftaranKelas::class);
    }


}
