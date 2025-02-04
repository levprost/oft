<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_place',
        'address_place',
        'latitude_place',
        'longitude_place',
        'article_id',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
