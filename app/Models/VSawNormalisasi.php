<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VSawNormalisasi extends Model
{
    use HasFactory;

    protected $table = "v_saw_normalisasis";

    public static function getData()
    {
        return self::all();
    }
}
