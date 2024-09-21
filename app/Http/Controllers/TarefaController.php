<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Responsavel;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index(){
        $tarefas = Tarefa::with(['responsavel', 'categoria'])->get();
        return view("tarefa.index", compact('tarefas'));
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

    public function iniciar(Request $request){

        $tarefa = Tarefa::find(id: $request -> id);

        if($tarefa->termino){
            return redirect()->back()->withErrors(['Essa tarefa já foi finalizada']);
        }

        $tarefa->inicio = now();
        $tarefa->save();

        return redirect()->route('tarefa.index')->with('success', 'Tarefa iniciada!');
    }

    public function pausar(Request $request){
        $tarefa= Tarefa::find($request -> id);

        if(!$tarefa->inicio){
            return redirect()->back()->withErrors(['Essa tarefa não foi iniciada']);
        }

        if($tarefa->termino){
            return redirect()->back()->withErrors(['Essa tarefa já foi finalizada']);
        }

        $tarefa->pausa = now();
        $tarefa->save();

        return redirect()->route('tarefa.index')->with('success','Tarefa pausada!');
    }

    public function finalizar(Request $request){
        $tarefa = Tarefa::find($request -> id);

        if(!$tarefa->inicio){
            return redirect()->back()->withErrors(['Essa tarefa não foi iniciada']);
        }

        if($tarefa->termino){
            return redirect()->back()->withErrors(['Essa tarefa já foi finalizada']);
        }

        $tarefa->termino = now();
        $tarefa->save();

        return redirect()->route('tarefa.index')->with('success','Tarefa finalizada!');
    }
}
