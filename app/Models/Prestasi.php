<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Prestasi extends Model
{
    protected $primaryKey = 'id_prestasi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'prestasi';

    protected $fillable = ['id_prestasi', 'id_user', 'judul_prestasi', 'slug', 'tanggal_prestasi', 'deskripsi_prestasi', 'gambar_prestasi'];

    public function setJudulPrestasiAttribute($value)
    {
        $this->attributes['judul_prestasi'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
