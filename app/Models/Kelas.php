<?php

namespace App\Models;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kelas';

    protected $fillable = [
        'nama_kelas',
        'kompetensi_keahlian'
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, "id_kelas");
    }
}
