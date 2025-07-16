<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Oprec extends Model
{
    protected $primaryKey = 'id_oprec';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'oprec';

    protected $fillable = ['id_oprec', 'id_user', 'slug', 'nama', 'kelas', 'angkatan', 'cv', 'transkrip'];

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::upper(Str::random(5)) . "-" . Str::slug($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
