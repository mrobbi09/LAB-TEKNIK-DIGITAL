<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Jadwal extends Model
{
    protected $primaryKey = 'id_jadwal';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'jadwal';

    protected $fillable = ['id_jadwal', 'tanggal_waktu', 'id_kelompok', 'id_judul', 'slug'];

    public function setTanggalWaktuAttribute($value)
    {
        $this->attributes['tanggal_waktu'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'id_kelompok');
    }

    public function judul()
    {
        return $this->belongsTo(Judul::class, 'id_judul');
    }
}
