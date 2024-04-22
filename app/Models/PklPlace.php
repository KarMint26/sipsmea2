<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PklPlace extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'telephone',
        'open_time',
        'link_gmaps',
        'image_url',
        'rating',
        'daya_tampung',
        'akses_jalan',
        'status'
    ];

    public function peminatans()
    {
        return $this->hasMany(Peminatan::class, 'pkl_place_id');
    }

    protected $casts = [
        'rating' => 'integer',
        'daya_tampung' => 'integer',
        'akses_jalan' => 'integer',
    ];
}
