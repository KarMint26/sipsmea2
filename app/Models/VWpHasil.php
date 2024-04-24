<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VWpHasil extends Model
{
    use HasFactory;

    protected $table = "v_wp_hasils";

    public static function getData()
    {
        return self::all();
    }
}
