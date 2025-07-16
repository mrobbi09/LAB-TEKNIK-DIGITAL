<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TugasPendahuluan extends Model
{
    protected $primaryKey = 'id_tp';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'tugas_pendahuluan';

    protected $fillable = ['id_tp', 'id_judul', 'soal_tp', 'slug'];

    public function setSoalTpAttribute($value)
    {
        $this->attributes['soal_tp'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function judul()
    {
        return $this->belongsTo(Judul::class, 'id_judul');
    }
}
