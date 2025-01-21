<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resep extends Model
{
    use HasFactory;

    protected $table = 'resep';

    protected $fillable = [
        'kunjungan_id',
        'obat_id',
        'jumlah',
        'dosis'
    ];
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id');
    }
    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'kunjungan_id')->withTrashed();
    }
}
