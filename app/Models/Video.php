<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title', 'description', 'slug', 'youtube_id', 'image', 'featured', 'activated'
    ];

    public function obrasAudiovisuais()
    {
        return $this->hasMany(ObraAudiovisual::class, 'idVideo');
    }
    
}
