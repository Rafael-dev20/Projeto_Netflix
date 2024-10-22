<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diretor extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    protected $table = 'diretores';

    public $timestamps = false;

    // Relacionamento com ObrasAudiovisuais
    public function obrasAudiovisuais()
    {
        return $this->hasMany(ObraAudiovisual::class, 'idDiretor');
    }
}
