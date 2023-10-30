<?php

namespace App\Models;

use App\Models\Spp;
use App\Models\Siswa;
use App\Models\Petugas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pembayaran';
    protected $fillable = [
        'id_siswa',
        'id_petugas',
        'tgl_bayar',
        'bulan_bayar',
        'tahun_bayar',
        'id_spp',
        'jumlah_bayar',
        'status'
    ];

    protected $guarded = [
        'id_pembayaran',
    ];

    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, "id_siswa");
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, "id_petugas");
    }
}
