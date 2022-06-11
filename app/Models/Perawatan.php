<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Perawatan extends Model
{
    protected $table = 'perawatan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_kucing', 'foto', 'ciri_ciri', 'perawatan',
    ];

    public static function boot()
    {
        parent::boot();

        static::deleted(function (Perawatan $item) {
            Storage::delete($item->foto);
        });

        static::updated(function (Perawatan $item) {
            if ($item->foto != $item->getOriginal('foto')) {
                Storage::delete($item->getOriginal('foto'));
            }
        });
    }
}
