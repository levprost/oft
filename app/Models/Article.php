<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_article',
        'content_article',
        'type_article',
        'content2_article',
        'section_article',
        'media_id',
    ];

    public function places()
    {
        return $this->hasMany(Place::class);
    }
    public function media()
    {
        return $this->hasMany(Media::class);
    }
}
