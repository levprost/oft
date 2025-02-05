<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'media',
        'type_media',
        'article_id',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
