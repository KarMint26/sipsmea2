<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VTopsisPembagi extends Model
{
    use HasFactory;

    protected $table = "v_topsis_pembagis";

    public static function getData()
    {
        return self::all();
    }
}
