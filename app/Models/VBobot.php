<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VBobot extends Model
{
    use HasFactory;

    protected $table = "v_bobot";

    public static function getData()
    {
        return self::all();
    }
}
