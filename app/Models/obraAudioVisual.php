<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obraAudioVisual extends Model
{
    use HasFactory;

    protected $table = 'obras_audiovisuais';

    protected $fillable = [
        'titulo', 'descricao', 'ano_lancamento', 'capa', 'idDiretor', 'idCategoria', 'tipo'
    ];

    // Relacionamentos
    public function categoria()
    {
        return $this->belongsTo(Category::class, 'idCategoria');
    }

    public function diretor()
    {
        return $this->belongsTo(Diretor::class, 'idDiretor');
    }

    public function episodios()
    {
        return $this->hasMany(Episodio::class, 'idObraAudiovisual');
    }
}
