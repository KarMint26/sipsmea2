<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VTopsisHasil extends Model
{
    use HasFactory;

    protected $table = "v_topsis_hasils";

    public static function getData()
    {
        return self::all();
    }
}
