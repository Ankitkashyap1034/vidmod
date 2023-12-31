<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $table = 'footer';
    protected $primarykey = 'id';

    protected $fillable = [
        'footer_color',
        'contact_email',
    ];
}
