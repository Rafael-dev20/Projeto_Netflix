<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obraAudioVisual extends Model
{
    use HasFactory;

    protected $table = 'obras_audiovisuais';

    public $timestamps = false;

    protected $fillable = [
        'titulo', 'descricao', 'ano_lancamento', 'idDiretor', 'idCategoria', 'idVideo'
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

    public function video()
    {
        return $this->belongsTo(Video::class, 'idVideo');
    }

    public function episodios()
    {
        return $this->hasMany(Episodio::class, 'idObraAudiovisual');
    }
}
