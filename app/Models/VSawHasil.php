<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VSawHasil extends Model
{
    use HasFactory;

    protected $table = "v_saw_hasils";

    public static function getData()
    {
        return self::all();
    }
}
