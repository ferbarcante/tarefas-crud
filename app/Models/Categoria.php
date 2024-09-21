<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria';
    public $timestamps = false; // Desabilita timestamps

    protected $fillable = [
        "nome"
    ];

    public function tarefas(){
       return $this->hasMany(Tarefa::class, 'id_categoria');
    }

}
