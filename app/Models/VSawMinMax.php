<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VSawMinMax extends Model
{
    use HasFactory;

    protected $table = "v_saw_min_maxes";

    public static function getData()
    {
        return self::all();
    }
}
