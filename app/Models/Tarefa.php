<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

     protected $fillable = [
        'id_responsavel',
        'id_categoria',
        'inicio',
        'pausa',
        'termino',
        'tempo_gasto',
        'titulo'
    ];

    public function responsavel()
    {
        return $this->belongsTo(Responsavel::class, 'id_responsavel');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
