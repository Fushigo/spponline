<?php

namespace App\Models;

use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spp extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_spp';

    protected $fillable = [
        'tahun',
        'nominal'
    ];

    protected $guarded = [
        'id_spp'
    ];

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_pembayaran');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_siswa');
    }
}
