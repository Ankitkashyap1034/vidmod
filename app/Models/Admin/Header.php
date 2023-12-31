<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;

    protected $table = 'header';
    protected $primarykey = 'id';

    protected $fillable = [
        'logo'
    ];
}
