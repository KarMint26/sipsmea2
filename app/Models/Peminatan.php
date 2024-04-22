<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'peminat',
        'pkl_place_id',
        'academic_year_id'
    ];

    public function pkl_place()
    {
        return $this->belongsTo(PklPlace::class, 'pkl_place_id');
    }

    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }

    public function alternatifs()
    {
        return $this->hasMany(Alternatif::class, 'peminatan_id');
    }

    protected $casts = [
        'peminat' => 'integer',
    ];
}
