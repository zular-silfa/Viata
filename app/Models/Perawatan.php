<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perawatan extends Model
{
    protected $table = 'perawatan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_kucing', 'foto', 'ciri_ciri', 'perawatan',
    ];
}
