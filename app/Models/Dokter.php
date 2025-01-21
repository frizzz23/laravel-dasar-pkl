<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = 'dokter';
    protected $guarded = [];
    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'dokter_id');
    }
}
