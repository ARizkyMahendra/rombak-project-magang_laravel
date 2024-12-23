<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agenda extends Model
{
    use HasFactory;
    protected $table = 'agenda';
    public $timestamps = true;
    protected $fillable = [
        'id_pejabat',
        'kegiatan',
        'lokasi',
        'tgl_mulai',
        'waktu',
    ];
}
