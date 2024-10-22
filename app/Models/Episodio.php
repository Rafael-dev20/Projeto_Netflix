<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    use HasFactory;

    protected $fillable = [
        'temporada', 'titulo', 'descricao', 'duracao', 'idObraAudiovisual'
    ];

    // Relacionamento com ObraAudiovisual
    public function obraAudiovisual()
    {
        return $this->belongsTo(ObraAudiovisual::class, 'idObraAudiovisual');
    }
}
