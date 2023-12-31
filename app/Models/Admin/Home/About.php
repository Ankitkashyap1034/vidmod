<?php

namespace App\Models\Admin\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'home_about';
    protected $primarykey = 'id';
    protected $fillable = [
        'title',
        'description',
    ];

}
