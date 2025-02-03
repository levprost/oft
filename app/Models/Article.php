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
        'place_id',
    ];
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
