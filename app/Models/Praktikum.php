<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Praktikum extends Model
{
    protected $primaryKey = 'id_praktikum';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'praktikum';

    protected $fillable = [
        'id_praktikum', 'nama_praktikum', 'slug'
    ];

    public function setNamaPraktikumAttribute($value)
    {
        $this->attributes['nama_praktikum'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function judul()
    {
        return $this->hasMany(Judul::class, 'id_praktikum');
    }

    public function kebutuhanPraktikum()
    {
        return $this->hasOne(KebutuhanPraktikum::class, 'id_praktikum');
    }

    public function galeri()
    {
        return $this->hasMany(Galeri::class, 'id_praktikum');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'id_praktikum');
    }
}
