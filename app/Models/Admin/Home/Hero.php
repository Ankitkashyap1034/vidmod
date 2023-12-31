<?php

namespace App\Models\Admin\Home;

use App\Models\Admin\Language;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $table = 'home_hero';
    protected $primarykey = 'id';
    protected $fillable = [
        'title',
        'sub_title',
        'button_text',
        'hero_description',
        'lang_prefix',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class, 'lang_prefix');
    }
}
