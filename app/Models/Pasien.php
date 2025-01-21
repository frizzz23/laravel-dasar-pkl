<?php
// app/Models/Pasien.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Import SoftDeletes

class Pasien extends Model
{   
    use HasFactory, SoftDeletes; // Tambahkan SoftDeletes ke trait

    protected $table = 'pasien';
    protected $guarded = [];

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'pasien_id');
    }
}
