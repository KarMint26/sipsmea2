<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VTopsisAlternatifSolusiIdeal extends Model
{
    use HasFactory;

    protected $table = "v_topsis_alternatif_solusi_ideals";

    public static function getData()
    {
        return self::all();
    }
}
