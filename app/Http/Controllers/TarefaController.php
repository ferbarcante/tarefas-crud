<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Responsavel;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
            return redirect()->back()
            ->withErrors(['Essa tarefa já foi finalizada']);
        }

        $tarefa->inicio = now();
        $tarefa->save();

        return redirect()->route('tarefa.index')
        ->with('success', 'Tarefa iniciada!');
    }

    public function pausar(Request $request){
        $tarefa= Tarefa::find($request -> id);

        if(!$tarefa->inicio){
            return redirect()->back()
            ->withErrors(['Essa tarefa não foi iniciada']);
        }

        if($tarefa->termino){
            return redirect()->back()
            ->withErrors(['Essa tarefa já foi finalizada']);
        }

        $tarefa->pausa = now();
        $tarefa->save();

        return redirect()->route('tarefa.index')
        ->with('success','Tarefa pausada!');
    }

    public function retomar(Request $request) {
        $tarefa = Tarefa::find($request->id);
    
        if (!$tarefa->pausa) {
            return redirect()->back()->withErrors(['Essa tarefa não está pausada']);
        }
    
        if ($tarefa->termino) {
            return redirect()->back()
            ->withErrors(['Essa tarefa já foi finalizada']);
        }
    
        $tarefa->retomada = now();
        $tarefa->save();
    
        return redirect()->route('tarefa.index')
        ->with('success', 'Tarefa retomada!');
    }

    public function finalizar(Request $request){
        $tarefa = Tarefa::find($request -> id);

        if(!$tarefa->inicio){
            return redirect()->back()
            ->withErrors(['Essa tarefa não foi iniciada']);
        }

        if($tarefa->termino){
            return redirect()->back()
            ->withErrors(['Essa tarefa já foi finalizada']);
        }

        $tarefa->termino = now();
        $tarefa->save();

        return redirect()->route('tarefa.index')
        ->with('success','Tarefa finalizada!');
    }

    public function exibir() {
        $tarefas = Tarefa::with(['responsavel', 'categoria'])->get();
    
        $tarefasComTempo = $tarefas->map(function($tarefa) {
       
        $tarefa->inicio = Carbon::parse($tarefa->inicio);
        $tarefa->termino = $tarefa->termino ? 
        Carbon::parse($tarefa->termino) : null;
        $tarefa->pausa = $tarefa->pausa ? 
        Carbon::parse($tarefa->pausa) : null;
        $tarefa->retomada = $tarefa->retomada ? 
        Carbon::parse($tarefa->retomada) : null;
    
        $tarefa->tempo_gasto = $this->calcularTempoGasto($tarefa);
        $tarefa->save();

        return $tarefa;
        });
    
        return view('tarefa.exibir', 
        compact('tarefasComTempo'));
    }
    

    public function calcularTempoGasto($tarefa) {
        if (!$tarefa) {
            return 'Tarefa não encontrada';
        }
    
        $inicio = $tarefa->inicio;
        $termino = $tarefa->termino;
    
        if ($termino) {
            $tempoTotal = $termino->diffInMinutes($inicio);
    
            if ($tarefa->pausa && $tarefa->retomada) {
                $pausa = $tarefa->pausa;
                $retomada = $tarefa->retomada;
                $tempoPausado = $pausa->diffInMinutes($retomada);
                $tempoTotal -= $tempoPausado; 
            }
    
            return $tempoTotal;
        }
    
        return 'N/A';
    }


}
