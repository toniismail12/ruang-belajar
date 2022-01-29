<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranKelas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    Public function getRouteKeyName()
    {
        return 'kode_daftar';
    }

    //koneksi ke tabel User, berdasarkan kolom tna_id yang sama dengan id di Tabel User
    Public function datakelas()
    {
        return $this->belongsTo(DaftarDataKelas::class, 'kelas_id');
    }

    Public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
