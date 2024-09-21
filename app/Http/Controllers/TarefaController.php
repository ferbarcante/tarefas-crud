<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Responsavel;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index(){
        return view("tarefa.index");
    }

    public function create(){
        $responsaveis = Responsavel::all();
        $categorias = Categoria::all();
    
        return view('tarefa.create', compact('responsaveis', 'categorias'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'titulo' => 'required|string',
            'id_responsavel' => 'required|exists:responsavel,id',
            'id_categoria' => 'required|exists:categoria,id',
        ]);    

        Tarefa::create($data);

        return redirect()->route('tarefa.index');
    
    }

    public function iniciar($id){

        $tarefa = Tarefa::findOrFail($id);

        if($tarefa->finalizado){
            return redirect()->back()->withErrors(['Essa tarefa já foi finalizada']);
        }

        $tarefa->inicio = now();
        $tarefa->save();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa iniciada com sucesso!');
    }

}
