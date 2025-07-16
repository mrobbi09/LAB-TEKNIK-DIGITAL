<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kelompok extends Model
{
    protected $primaryKey = 'id_kelompok';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'kelompok';

    protected $fillable = ['id_kelompok', 'nama_kelompok', 'slug'];

    public function setNamaKelompokAttribute($value)
    {
        $this->attributes['nama_kelompok'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_jadwal');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'id_kelompok');
    }
}
