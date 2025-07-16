<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Galeri extends Model
{
    protected $primaryKey = 'id_galeri';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'galeri';

    protected $fillable = ['id_user', 'id_galeri', 'id_praktikum', 'judul', 'deskripsi', 'slug', 'url_gambar'];

    public function setJudulAttribute($value)
    {
        $this->attributes['judul'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function praktikum()
    {
        return $this->belongsTo(Praktikum::class, 'id_praktikum');
    }
}
