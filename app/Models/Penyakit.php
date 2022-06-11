<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Penyakit extends Model
{
    protected $table = 'penyakit';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama', 'detail', 'foto',
    ];

    public static function boot()
    {
        parent::boot();

        static::deleted(function (Penyakit $item) {
            Storage::delete($item->foto);
        });

        static::updated(function (Penyakit $item) {
            if ($item->foto != $item->getOriginal('foto')) {
                Storage::delete($item->getOriginal('foto'));
            }
        });
    }
}
