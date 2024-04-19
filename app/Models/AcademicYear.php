<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'academic_year',
        'start_date',
        'end_date'
    ];

    public function peminatans()
    {
        return $this->hasMany(Peminatan::class, 'academic_year_id');
    }
}
