<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TugasAkhir extends Model
{
    protected $primaryKey = 'id_ta';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'tugas_akhir';

    protected $fillable = ['id_ta', 'id_judul', 'soal_ta'];

    public function setSoalTaAttribute($value)
    {
        $this->attributes['soal_ta'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function judul()
    {
        return $this->belongsTo(Judul::class, 'id_judul');
    }
}
