<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kunjungan extends Model
{   
    use HasFactory, SoftDeletes;
    
    protected $table = 'kunjungan';
    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'tanggal_kunjungan',
        'diagnosa'
    ];
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id')->withTrashed();
    }
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }
    public function resep()
    {
        return $this->hasMany(Resep::class, 'kunjungan_id');
    }
    
}
