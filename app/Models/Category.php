<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public $timestamps = false;

    protected $table = 'categorias';
    
    protected $fillable = [
        'name'
    ];

    public function obrasAudiovisuais()
    {
        return $this->hasMany(ObraAudiovisual::class, 'idCategoria');
    }

}
