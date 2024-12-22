<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pejabat extends Model
{
    use HasFactory;
    protected $table = 'pejabat';
    public $timestamps = true;
    protected $fillable = [
        'id_jabatan',
        'nama',
        'periode_jabatan',
    ];

    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(jabatan::class);
    }
}
