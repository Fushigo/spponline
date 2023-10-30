<?php

namespace App\Models;

use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'id_petugas';
    protected $table = 'petugas';

    protected $fillable = [
        "username",
        "password",
        "nama_petugas",
        "level",
    ];

    protected $guarded = [
        'id_petugas'
    ];

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_pembayaran');
    }
}
