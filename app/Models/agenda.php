<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function pejabat(): BelongsTo
    {
        return $this->belongsTo(pejabat::class);
    }
}
