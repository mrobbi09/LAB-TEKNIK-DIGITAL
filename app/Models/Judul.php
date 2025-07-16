<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Judul extends Model
{
    protected $primaryKey = 'id_judul';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'judul';

    protected $fillable = ['id_judul', 'slug', 'id_praktikum', 'nama_judul', 'modul'];

    public function setNamaJudulAttribute($value)
    {
        $this->attributes['nama_judul'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function praktikum()
    {
        return $this->belongsTo(Praktikum::class, 'id_praktikum');
    }

    public function tugasPendahuluan()
    {
        return $this->hasOne(TugasPendahuluan::class, 'id_judul');
    }

    public function tugasAkhir()
    {
        return $this->hasOne(TugasAkhir::class, 'id_judul');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_judul');
    }
}
