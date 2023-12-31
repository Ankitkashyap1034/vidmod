<?php

namespace App\Models\Admin\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeHeroCommon extends Model
{
    use HasFactory;

    protected $table = 'hero_home_common';
    protected $primarykey = 'id';
    protected $fillable = [
        'hero_image',
        'color1',
        'color2',
        'color3',
    ];
}
