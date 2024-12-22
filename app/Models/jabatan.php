<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatan';
    public $timestamps = true;
    protected $fillable = [
        'jabatan',
        'kode_jabatan',
    ];

    public function pejabat(): HasMany
    {
        return $this->hasMany(pejabat::class);
    }
}
