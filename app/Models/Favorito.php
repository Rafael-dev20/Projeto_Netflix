<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    protected $fillable = ['idUsuarios', 'idObraAudiovisual'];

    // Relacionamentos
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuarios');
    }

    public function obraAudiovisual()
    {
        return $this->belongsTo(ObraAudiovisual::class, 'idObraAudiovisual');
    }
}
