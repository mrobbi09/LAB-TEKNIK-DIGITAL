<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KebutuhanPraktikum extends Model
{
    protected $primaryKey = 'id_kbp';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'kebutuhan_praktikum';

    protected $fillable = ['id_kbp', 'slug', 'id_praktikum', 'lembar_asistensi', 'lembar_tp', 'format_margin', 'format_laprak', 'format_absen', 'link_software'];

    public function praktikum()
    {
        return $this->belongsTo(Praktikum::class, 'id_praktikum');
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if ($model->id_praktikum) {
                $praktikum = Praktikum::find($model->id_praktikum);
                if ($praktikum) {
                    $model->slug = Str::upper(Str::random(5)) . "-" . Str::slug($praktikum->nama_praktikum);
                }
            }
        });
    }
}
