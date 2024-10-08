<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    use HasFactory;

    protected $table = 'responsavel';
    public $timestamps = false;

    protected $fillable = [
        'nome'
    ];

    public function tarefas(){
         return $this->hasMany(Tarefa::class, 'id_responsavel');
    }

}
