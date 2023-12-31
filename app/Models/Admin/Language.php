<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Home\Hero;

class Language extends Model
{
    use HasFactory;

    protected $table = 'language';
    protected $primarykey = 'id';

    protected $fillable = [
        'prefix',
        'name',
        'status',
    ];

    public function hero()
    {
        return $this->hasMany(Hero::class, 'prefix', 'lang_prefix');
    }
}
