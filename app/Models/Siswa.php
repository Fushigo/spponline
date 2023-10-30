<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Pembayaran;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'id_siswa';

    protected $fillable = [
        "nisn",
        "nis",
        "nama",
        "alamat",
        "no_telp",
        'id_kelas',
        'id_spp'
    ];

    protected $guarded = [
        'id_siswa'
    ];

    public function getAuthPassword()
    {
        return $this->nama;
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_pembayaran');
    }
}
